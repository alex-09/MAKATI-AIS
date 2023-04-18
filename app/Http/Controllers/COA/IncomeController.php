<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Services\IncomeServices;
use App\Http\Requests\COARequest;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    //DISPLAY INCOME
    public function showIncome(IncomeServices $services){
        return $services->show();
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
            return $services->updateDesc($request, $id);
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

    public function approveAccount($id, IncomeServices $services){
        try{
            return $services->approve($id);
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
}
