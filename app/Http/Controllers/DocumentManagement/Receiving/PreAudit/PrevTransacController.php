<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PreAudit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\PreAudRequest;
use App\Repositories\DocumentManagement\Receiving\PreAudit\PrevPreAudRepository;

class PrevTransacController extends Controller
{

    private $prevPreAudit;
    
    public function __construct(PrevPreAudRepository $prevPreAudit){

        $this->prevPreAudit = $prevPreAudit;
    }


    public function search(Request $request){
        try{
            
            return $this->prevPreAudit->searchTransac($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    
    public function save(PreAudRequest $request){
        try{

            return $this->prevPreAudit->savePreAud($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
