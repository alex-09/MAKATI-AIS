<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\DivisionHead;

use App\Models\PEBusiness;
use App\Models\PEIndividual;
use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Models\PEGovernmentAgency;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PayeeDivisionHeadController extends Controller
{
    public function list()
    {
        return response()->json(['list' => DB::select('CALL get_payee_list()')]);
    }

    public function view($id, $type)
    {
        return response()->json(['data' => DB::select('CALL select_payee(?,?)',array($id, $type))]);
    }

    public function forCA(Request $request){
        if($request->type == 'Individual'){
            $approve = PEIndividual::where('id', $request->id); 
            $approve->update(['status' => 'FOR APPROVAL - CA']);

            return response()->json(['message' => 'Payee has been approved. Pending final approval of the City Accountant']);
        }elseif($request->type == 'Sole Proprietorship' || $request->type == 'Partnership' || $request->type == 'Corporation' || $request->type == 'Cooperative'){
            $approve = PEBusiness::where('id', $request->id);
            $approve->update(['status' => 'FOR APPROVAL - CA']);

            return response()->json(['message' => 'Payee has been approved. Pending final approval of the City Accountant']);
        }elseif($request->type == 'Government'){
            $approve = PEGovernmentAgency::where('id', $request->id);
            $approve->update(['status' => 'FOR APPROVAL - CA']);

            return response()->json(['message' => 'Payee has been approved. Pending final approval of the City Accountant']);
        }

        ActionHistory::create([
            'type_id' => $request->payee_id,
            'type' => 'Payee Enrollment',
            'particulars' => 'For Approval - CA',
            'user' => $request->user
        ]);
    }

    public function reject(Request $request){
        if($request->type == 'Individual'){
            $approve = PEIndividual::where('id', $request->id);
            $approve->update(['status' => 'Rejected']);

            return response()->json(['message' => 'Payee has been Rejected']);
        }elseif($request->type == 'Sole Proprietorship' || $request->type == 'Partnership' || $request->type == 'Corporation' || $request->type == 'Cooperative'){
            $approve = PEBusiness::where('id', $request->id);
            $approve->update(['status' => 'Rejected']);

            return response()->json(['message' => 'Payee has been Rejected']);
        }elseif($request->type == 'Government'){
            $approve = PEGovernmentAgency::where('id', $request->id);
            $approve->update(['status' => 'Rejected']);

            return response()->json(['message' => 'Payee has been Rejected']);
        }

        ActionHistory::create([
            'type_id' => $request->payee_id,
            'type' => 'Payee Enrollment',
            'particulars' => 'FRejected By DH',
            'user' => $request->user
        ]);
    }
}
