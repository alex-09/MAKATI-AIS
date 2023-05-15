<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;

class ApproCAController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('CALL get_appro_ca()')]);
    }

    public function view($id, $aipcode){

        return (new ApproReviewerController)->view($id, $aipcode);
    }
}
