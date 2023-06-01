<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Services\IncomeServices;
use App\Http\Requests\COARequest;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    //DISPLAY INCOME
    public function showIncome(Request $request, IncomeServices $services){
        return $services->show($request);
    }

    //ENROLL NEW INCOME
    public function EnrollIncome(COARequest $request, IncomeServices $services){
        try{
            return $services->enrollIncome($request);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    //UPDATES STATUS
    public function UpdateIncomeStatus(Request $request, $id, IncomeServices $services){
        try{
            return $services->updateStatus($request, $id);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    public function AddIncomeDescription(Request $request, $id, IncomeServices $services){
        try{
            return $services->updateDesc($request, $id);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    public function approveAccountDh($id, IncomeServices $services){
        try{
            return $services->approveByDh($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function approveAccountCa($id, IncomeServices $services){
        try{
            return $services->approveByCacc($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disApproveAccount($id, IncomeServices $services){
        try{
            return $services->disApprove($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function listTemp(IncomeServices $services){
        return $services->displayTemp();
    }

    public function forApprovalCa(IncomeServices $services, Request $request){
        try{
            return $services->forApprovalCa($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function approveByCa(IncomeServices $services, Request $request){
        try{
            return $services->approveByCa($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disapprove(IncomeServices $services, Request $request){
        try{
            return $services->cancelUplaod($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }
}
