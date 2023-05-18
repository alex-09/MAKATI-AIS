<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CreateCommunication;

class CreateCommRepository
{
    public function store($request){
        $date = Carbon::now()->format('Y-m');

        $table = CreateCommunication::all();
        if($table->isEmpty()){
            $transac_id = "M/C-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
        }else{
            $lastId = CreateCommunication::latest('id')->select('id')->first();
            $ptId = $lastId['id'];
            $transac_id = "M/C-" . $date . "-" . str_pad(++$ptId, 5, '0', STR_PAD_LEFT);
        }

        // $docuFile = $transac_id.'.'.$request->file('document')->getClientOriginalExtension();
        // $request->document->move(public_path('uploads'), $docuFile);

        $insertRecCom = CreateCommunication::create([
            'transac_id' => $transac_id,
            // "document" => $docuFile
            ] + $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully saved under M/C No. '.$transac_id,
            'data' => $insertRecCom
        ]);
    }
        
}