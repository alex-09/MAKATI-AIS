<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Http\Requests\COARequest;
use App\Http\Controllers\Controller;
use App\Services\LiabilitiesServices;

class LiabilitiesController extends Controller
{
    //DISPLAY LIABILITIES
    public function showLiabilities(LiabilitiesServices $services){
        return $services->show();
    }

    //ENROLL NEW LIABILITIES
    public function EnrollLiabilities(COARequest $request, LiabilitiesServices $services){
        try{
            return $services->enrollLiabilities($request);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    //UPDATE STATUS
    public function UpdateLiabilitiesStatus($id, LiabilitiesServices $services){
        try{
            return $services->updateStatus($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    //ADD DESCRIPTION
    public function AddLiabilitiesDescription(Request $request, $id, LiabilitiesServices $services){
        try{
            return $services->updateDesc($request, $id);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    public function approveAccount($id, LiabilitiesServices $services){
        try{
            return $services->approve($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disApproveAccount($id, LiabilitiesServices $services){
        try{
            return $services->disApprove($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }
    
}
