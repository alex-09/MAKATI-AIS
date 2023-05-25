<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Carbon\Carbon;
use App\Models\ActionHistory;
use Illuminate\Support\Facades\DB;
use App\Models\CreateCommunication;

class CreateCommRepository
{
    public function store($request){
        $date = Carbon::now()->format('Y-m');

        $table = CreateCommunication::all();
        if($table->isEmpty()){
            $transac_id = "MC-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
        }else{
            $lastId = CreateCommunication::latest('id')->select('id')->first();
            $ptId = $lastId['id'];
            $transac_id = "MC-" . $date . "-" . str_pad(++$ptId, 5, '0', STR_PAD_LEFT);
        }

        $id = $request->mc_no == 0 ? $transac_id : $transac_id. '-'. $request->mc_no;
        $docuFile = $id.'.'.$request->file('document')->getClientOriginalExtension();
        $request->document->move(public_path('Document/DocumentManagement/Receiving/Communication'), $docuFile);

        $insertRecCom = CreateCommunication::create([
            'transac_id' => $id,
            "document" => env('APP_URL').'Document/DocumentManagement/Receiving/Communication/'.$docuFile
            ] + $request->validated());

            ActionHistory::create([
                'type_id' => $id,
                'type' => 'Communication',
                'particulars' => 'Create Communication',
                'user' => $request->user
            ]);

        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully saved under M/C No. '.$id,
            'data' => $insertRecCom
        ]);
    }
        
}