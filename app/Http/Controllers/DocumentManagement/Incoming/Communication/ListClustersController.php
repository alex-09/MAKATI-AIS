<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\Communication;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListClustersController extends Controller
{
    public function getBK(){
        return response()->json(['listBk' => DB::select('CALL get_frs_bk()')]);
    }

    public function getBAM(){
        return response()->json(['listBam' => DB::select('CALL get_frs_bam()')]);
    }

    public function getFrd(){
        return response()->json(['listFrd' => DB::select('CALL get_frs_frd()')]);
    }

    public function getPRD(){
        return response()->json(['listPrd' => DB::select('CALL get_aics_prd()')]);
    }

    public function getPCIC(){
        return response()->json(['listPcic' => DB::select('CALL get_aics_pcic()')]);
    }

    public function getDivision(){
        return response()->json(['listDivision' => DB::select('CALL get_aics_Division()')]);
    }

    public function getAD(){
        return response()->json(['listAd' => DB::select('CALL get_aics_Ad()')]);
    }

    public function getFRS(){
        return response()->json(['listFrs' => DB::select('CALL get_frs()')]);
    }

    public function getAICS(){
        return response()->json(['listAics' => DB::select('CALL get_aics()')]);
    }
}
