<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\DivisionHead;

use App\Models\PEBusiness;
use App\Models\PEIndividual;
use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Models\PEGovernmentAgency;
use App\Http\Controllers\Controller;

class EditPayeeController extends Controller
{
    private function history($request, $update){

        $update->update(['status' => 'FOR APPROVAL - CA'] + $request->except(['type', 'user']));
        ActionHistory::create([
            'type_id' => $request->payee_id,
            'type' => 'Payee Enrollment',
            'particulars' => 'Edit Payee',
            'user' => $request->user
        ]);

        return response()->json(['message' => 'Payee updated successfully and now pending for approval of CA']);
    }

    public function update(Request $request){
        try{
            if($request->type == 'Individual'){
                $update = PEIndividual::where('id', $request->id); 
                return $this->history($request, $update);

            }elseif($request->type == 'Sole Proprietorship' || $request->type == 'Partnership' || $request->type == 'Corporation' || $request->type == 'Cooperative'){
                $update = PEBusiness::where('id', $request->id);
                return $this->history($request, $update);

            }elseif($request->type == 'Government'){
                $update = PEGovernmentAgency::where('id', $request->id);
                return $this->history($request, $update);
            }

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }
}
