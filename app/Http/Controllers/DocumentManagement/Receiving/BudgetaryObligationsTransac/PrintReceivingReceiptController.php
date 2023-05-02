<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Receiving\BOT\PrintTransactionRepository;

class PrintReceivingReceiptController extends Controller
{
    private $printRepository;

    public function __construct(PrintTransactionRepository $printRepository)
    {
        $this->printRepository = $printRepository;
    }


    public function listPrintReceiver()
    {
        return $this->printRepository->displayList();
    }


    // public function searchBearer($bearer)
    // {
    //     return $this->printRepository->searchBearer($bearer);
    // }
    
}
