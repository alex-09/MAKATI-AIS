<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Http\Requests\COARequest;
use App\Services\ExpensesServices;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    //DISPLAY EXPENSES
    public function showExpenses(ExpensesServices $services){
        return $services->show();
    }
    //ENROLL NEW EXPENSES
    public function EnrollExpenses(COARequest $request, ExpensesServices $services){
        try{
            return $services->enrollEquity($request);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }
    //UPDATE STATUS
    public function UpdateExpensesStatus($id, ExpensesServices $services){
        try{
            return $services->updateStatus($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    //ADD DESCRIPTION
    public function AddExpensesDescription(Request $request, $id, ExpensesServices $services){
        try{
            return $services->updateDesc($request, $id);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    public function approveAccount($id, ExpensesServices $services){
        try{
            return $services->approve($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disApproveAccount($id, ExpensesServices $services){
        try{
            return $services->disApprove($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }
}
