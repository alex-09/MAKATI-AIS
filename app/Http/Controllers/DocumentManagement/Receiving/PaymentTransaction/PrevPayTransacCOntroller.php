<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Receiving\PaymentTransaction\PrevPayTransacRepository;

class PrevPayTransacCOntroller extends Controller
{
    private $prevPayTransac;

    public function __construct(PrevPayTransacRepository $prevPayTransac)
    {
        $this->prevPayTransac = $prevPayTransac;
    }

    public function search(Request $request){
        try{
            return $this->prevPayTransac->searchTransac($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request){
        try{
            return $this->prevPayTransac->saveTransac($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }


}
