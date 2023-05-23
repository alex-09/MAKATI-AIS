<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\ContractsPO;

use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use Illuminate\Http\Request;

class CityAccountantController extends Controller
{
    public function cityAccountantList(){

            return response()->json(['listAll' => DmContractpo::all()]);
    
    }

    public function searchCPO($date, $number, $contract_no, $payeename){

        $searchResult = DmContractpo::where("created_at", $date)
                            ->where("transaction_id", $number)
                            ->where("contract_no", $contract_no)
                            ->where("payee_name", "like", "%", $payeename)->get();
        
              if($searchResult){

                return response()->json([
                    'status' => 404,
                    'error' => 'Not Found'
                ]);
            }
            else{
                return response()->json([

                    'status' => 200,
                    'data' => $searchResult
                ]);
            }
              
    }
}
