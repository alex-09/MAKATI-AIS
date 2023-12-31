<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Http\Requests\COARequest;
use App\Services\ExpensesServices;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    //DISPLAY EXPENSES
    public function showExpenses(Request $request, ExpensesServices $services){
        return $services->show($request);
    }
    //ENROLL NEW EXPENSES
    public function EnrollExpenses(COARequest $request, ExpensesServices $services){
        try{
            return $services->enrollExpenses($request);
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

    public function approveAccountDh($id, ExpensesServices $services){
        try{
            return $services->approveByDh($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function approveAccountCa($id, ExpensesServices $services){
        try{
            return $services->approveByCacc($id);
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

    public function listTemp(ExpensesServices $services){
        return $services->displayTemp();
    }

    public function forApprovalCa(ExpensesServices $services, Request $request){
        try{
            return $services->forApprovalCa($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function approveByCa(ExpensesServices $services, Request $request){
        try{
            return $services->approveByCa($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disapprove(ExpensesServices $services, Request $request){
        try{
            return $services->cancelUplaod($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }
}
