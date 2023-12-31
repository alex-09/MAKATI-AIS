<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Http\Requests\COARequest;
use App\Http\Controllers\Controller;
use App\Services\EquityServices;

class EquityController extends Controller
{
    //DISPLAY EQUITY
    public function showEquity(Request $request, EquityServices $services){
        return $services->show($request);
    }

    //ENROLL NEW EQUITY
    public function EnrollEquity(COARequest $request, EquityServices $services){
        try{
            return $services->enrollEquity($request);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    //UPDATE STATUS
    public function UpdateEquityStatus($id, EquityServices $services){
        try{
            return $services->updateStatus($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    //ADD DESCRIPTION
    public function AddEquityDescription(Request $request, $id, EquityServices $services){
        try{
            return $services->updateDesc($request, $id);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    public function approveAccountDh($id, EquityServices $services){
        try{
            return $services->approveByDh($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function approveAccountCa($id, EquityServices $services){
        try{
            return $services->approveByCacc($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disApproveAccount($id, EquityServices $services){
        try{
            return $services->disApprove($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function listTemp(EquityServices $services){
        return $services->displayTemp();
    }

    public function forApprovalCa(EquityServices $services, Request $request){
        try{
            return $services->forApprovalCa($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function approveByCa(EquityServices $services, Request $request){
        try{
            return $services->approveByCa($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disapprove(EquityServices $services, Request $request){
        try{
            return $services->cancelUplaod($request);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }
    
}
