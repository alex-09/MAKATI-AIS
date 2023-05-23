<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\CityAccountant;

use App\Models\PEBusiness;
use App\Models\PEIndividual;
use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Models\PEGovernmentAgency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\DivisionHead\PayeeDivisionHeadController;

class PayeeCityAccountantController extends Controller
{
    public function list()
    {
        return (new PayeeDivisionHeadController)->list();
    }

    public function view($id, $type)
    {
        return (new PayeeDivisionHeadController)->view($id, $type);
    }

    public function approved(Request $request){
        if($request->type == 'Individual'){
            $approve = PEIndividual::where('id', $request->id);
            $approve->update(['status' => 'Approved']);

            return response()->json(['message' => 'Payee has been approved.']);
        }elseif($request->type == 'Business'){
            $approve = PEBusiness::where('id', $request->id);
            $approve->update(['status' => 'Approved']);

            return response()->json(['message' => 'Payee has been approved.']);
        }elseif($request->type == 'Government'){
            $approve = PEGovernmentAgency::where('id', $request->id);
            $approve->update(['status' => 'Approved']);

            return response()->json(['message' => 'Payee has been approved.']);
        }

        ActionHistory::create([
            'type_id' => $request->payee_id,
            'type' => 'Payee Enrollment',
            'particulars' => 'Approved By CA',
            'user' => $request->user
        ]);
    }

    public function reject(Request $request)
    {
        return (new PayeeDivisionHeadController)->reject($request);
    }
}
