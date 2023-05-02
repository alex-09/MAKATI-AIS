<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ContractPO;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Receiving\CONTRACTPO\PrintRecContractPORepository;

class PrintRecController extends Controller
{
    private $printRepository;

    public function __construct(PrintRecContractPORepository $printRepository)
    {
        $this->printRepository = $printRepository;
    }


    public function listTransac()
    {
        return $this->printRepository->displayList();
    }
}
