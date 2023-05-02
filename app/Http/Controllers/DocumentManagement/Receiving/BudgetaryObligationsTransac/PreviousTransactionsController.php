<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DMBudgetaryObligationsTransac;
use App\Repositories\DocumentManagement\Receiving\BOT\PrevTransactionRepository;

class PreviousTransactionsController extends Controller
{
    private $prevRepository;

    public function __construct(PrevTransactionRepository $prevRepository)
    {
        $this->prevRepository = $prevRepository;
    }

    public function previousList(){

        $listData = DMBudgetaryObligationsTransac::all();
        return response()->json(['data' => $listData]);
    }
    

    public function viewdata(DMBudgetaryObligationsTransac $id){

        return response()->json(['data' => $id]);
    }


    public function editData(Request $request, $id){
        try {
            return $this->prevRepository->editTransaction($id, $request);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }   
}
