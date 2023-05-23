<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CTReceiveChecks;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CheckTransacRequest;

class ReceiveChecksController extends Controller
{
   
    public function storeReceiveChecks(CheckTransacRequest $request){

        try{
            $date = Carbon::now()->format('Y-M');

            $table = CTReceiveChecks::all();
            if($table->isEmpty()){
                $transac_id = "PT-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
            }else{
                $lastId = CTReceiveChecks::latest('id')->select('id')->first();
                $ptId = $lastId['id'];
                $transac_id = "PT-" . $date . "-" . str_pad(++$ptId, 7, '0', STR_PAD_LEFT);
            }

            $payeeinfo = CTReceiveChecks::create(["transaction_id_num" => $transac_id] + $request->validated());
        
            return response()->json([
                'status' => true,
                'message' => 'Your entry has been successfully saved under Transaction ID Number '.$transac_id,
                'data' => $payeeinfo
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
