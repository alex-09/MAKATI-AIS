<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use Carbon\Carbon;
use App\Models\PEIndividual;
use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayeeEnrollment\IndividualRequest;

class PEIndividualController extends Controller
{

    public function storeIndividual(IndividualRequest $request){
        try{

            $date = Carbon::now()->format('Y-m');

            $table = PEIndividual::all();
            if($table->isEmpty()) {
                $payee_id = "PID-" . "IND-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
            }else {
                $lastId = PEIndividual::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $payee_id = "PID-" . "IND-" . $date . "-" . str_pad(++$botId, 7, '0', STR_PAD_LEFT);
            }

            $individualData = PEIndividual::create([
                'type_of_payee_id' => 'Individual',
                'payee_id' => $payee_id
            ] + $request->validated());

            ActionHistory::create([
                'type_id' => $payee_id,
                'type' => 'Payee Enrollment',
                'particulars' => 'Enroll Payee',
                'user' => $request->user
            ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully Enrolled',
            'data' => $individualData, 
        ]);

    }catch (\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => 'Something went Wrong',
            'error' => $th->getMessage()
        ]);
    }
}


    public function validateIndividualData()
    {
         return request()->validate([

            'type_of_payee_id' => 'required',
            'client_type' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'suffix' => 'required',
            'building_no' => 'required',
            'lot_no' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality_city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'date_registered' => 'required',
            'status' => 'required'
        ]);
    }

    
}
    
