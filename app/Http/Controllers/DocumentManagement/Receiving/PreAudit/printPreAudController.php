<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PreAudit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Receiving\PreAudit\PrintPreAudRepository;

class printPreAudController extends Controller
{
    private $printPreAudit;
    
    public function __construct(PrintPreAudRepository $printPreAudit){

        $this->printPreAudit = $printPreAudit;
    }

    public function listAll(){

        return $this->printPreAudit->list();
    }

    public function print(Request $request)
    {
        return $this->printPreAudit->print($request);
    }
}
