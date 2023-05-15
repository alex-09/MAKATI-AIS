<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead;

use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApproDHController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('CALL get_appro_division_head()')]);
    }

    public function view($id, $aipcode){

        return (new ApproReviewerController)->view($id, $aipcode);
    }
}
