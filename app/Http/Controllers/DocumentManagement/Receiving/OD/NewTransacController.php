<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DMODNewTransac;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\ODNewTransac;

class NewTransacController extends Controller
{
    public function insertNewTransac(ODNewTransac $request){
        try{

            $date = Carbon::now()->format('Y-m');

            $table = DMODNewTransac::all();
            if($table->isEmpty()){
                $transac_id = "OTHER-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
            }else{
                $lastId = DMODNewTransac::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transac_id = "OTHER-" . $date . "-" . str_pad(++$botId, 7, '0', STR_PAD_LEFT);
            }
    
            $odnewtransac = DMODNewTransac::create(['transaction_id_no' => $transac_id] + $request->validated());
            return response()->json([
                'status' => true,
                'message' => 'Your entry has been successfully saved under Transaction ID Number '.$transac_id,
                'data' => $odnewtransac
            ]);
    
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
            }
}
