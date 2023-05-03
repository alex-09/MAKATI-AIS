<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use App\Services\AssetsServices;
use App\Http\Requests\COARequest;
use App\Http\Controllers\Controller;
use App\Models\COAAssets;

class AssetsController extends Controller
{
    //DISPLAY ASSETS
    public function showAssets(Request $request, AssetsServices $services){
        return $services->show($request);
    }

    //ENROLL NEW ASSETS
    public function EnrollAssets(COARequest $request, AssetsServices $services){
        try{
            return $services->enrollAssets($request);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    //UPDATE STATUS
    public function UpdateAssetStatus($id, AssetsServices $services){
        try{
            return $services->updateStatus($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function AddAssetDescription(Request $request, $id, AssetsServices $services){
        try{
            return $services->updateDesc($request, $id);
        }catch (\Throwable $th){
            return $services->error($th);
        }
    }

    public function approveAccount($id, AssetsServices $services){
        try{
            return $services->approve($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function disApproveAccount($id, AssetsServices $services){
        try{
            return $services->disApprove($id);
        }catch (\Throwable $th) {
            return $services->error($th);
        }
    }

    public function listTemp(AssetsServices $services){
        return $services->displayTemp();
    }

    public function move(AssetsServices $services){
        return $services->move();
    }

    public function disapprove(AssetsServices $services){
        return $services->cancelUplaod();
    }

}
