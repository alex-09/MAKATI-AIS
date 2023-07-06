<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant;

use App\Models\Allotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\AllotReviewerController;

class AllotCAController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM list_allotment')]);
    }

    public function view(Request $request){

        return (new AllotReviewerController)->view($request);
    }

    public function update(Request $request)
    {

        Allotment::where('allot_id', $request->allot_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'Approved',
                'remarks' => $request->remarks
            ]);;


        return response()->json(['message' => 'The account has been successfully Approved.']);
    }

    public function reject(Request $request){

        return (new AllotReviewerController)->reject($request);
    }
}
