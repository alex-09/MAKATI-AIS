<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac;

use Illuminate\Http\Request;
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
        return $this->printRepository->List();
    }


    public function print(Request $request)
    {
        return $this->printRepository->print($request);
    }
    
}
