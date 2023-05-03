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

        return $this->prevPreAudit->searchTransac($request);
    }

    
    public function save(PreAudRequest $request){
        
        return $this->prevPreAudit->savePreAud($request);
    }
}
