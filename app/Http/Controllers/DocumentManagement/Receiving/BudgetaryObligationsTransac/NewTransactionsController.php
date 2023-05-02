<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\BOTRequest;
use App\Repositories\DocumentManagement\Receiving\BOT\NewTransactionRepository;

class NewTransactionsController extends Controller
{
    private $transacRepo;

    public function __construct(NewTransactionRepository $transacRepo)
    {
        $this->transacRepo = $transacRepo;
    }

    public function insertNewTransac(BOTRequest $request){

    try{
        return $this->transacRepo->store($request); 
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}

