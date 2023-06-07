<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\COALiabilities;
use App\Http\Requests\COARequest;
use App\Models\COALiabilitiesTemp;
use Illuminate\Support\Facades\DB;
use App\Models\COALiabilitiesPrevious;

class LiabilitiesServices 
{
    public function show(Request $request){

        if ($request->search != NULL){

            $search = $request->search;
            $list = COALiabilities::where(function ($q) use ($search) {
                $q->orWhere('account_title', 'like', "%{$search}%")
                  ->orWhere('account_code', 'like', "%{$search}%");
            })->get();

        } else {
            $list = DB::select('CALL get_liabilityCurrYear()');
            $date = DB::select('CALL get_liabilitySetYear()');
        }

        return response()->json([
            'status' => True,
            'list' => $list,
            'date' => $date
        ]);
    }

    public function enrollLiabilities(COARequest $request){
            
        COALiabilities::create([
            'status' => 'For Approval - DH'
        ] +
            $request->validated(),
        );

        return response()->json([
            'status' => true,
            'message' => 'Account Enrolled Successfully',
        ]);

    }

    public function updateStatus($id){

        $status = COALiabilities::find($id);

        if($status['status'] == 'enable'){
            $status->update([
                'status' => 'disable'
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Account disabled successfully',
                'data' => 'disable'
            ]);
        }else{
            $status->update([
                'status' => 'enable'
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Account Enabled successfully',
                'data' => 'enable'
            ]);
        }
    }

    public function updateDesc(Request $request, $id){

        $assetDescrip = COALiabilities::find($id);
        $assetDescrip->update([
            
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Description Updated Success',
        ]);
    }

    public function approveByDh($id){
        $app = COALiabilities::find($id);
        $app->update(['status' => 'For Approval - CA']);

        return response()->json(['message' => 'Approved Account']);
    }

    public function approveByCacc($id){
        $app = COALiabilities::find($id);
        $app->update(['status' => 'enable']);

        return response()->json(['message' => 'Approved Account']);
    }

    public function disApprove($id){
        COALiabilities::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Account Disapproved',
        ]);
    }

    public function displayTemp(){
        $list = COALiabilitiesTemp::all();
        return response()->json(['list' => $list]);
    }

    public function forApprovalCa($request){
        $update = COALiabilitiesTemp::whereIn('id', $request->id);
        $update->update(['approval_status' => 'For Approval - CA']);

        return response()->json(['message' => 'For Approval - CA']);
    }


    public function approveByCa($request){

        COALiabilities::all()->each(function ($newRecord){
            $newRecord->replicate()->setTable('coa_liabilities_previouses')->save();
            $newRecord->delete();
        });

        COALiabilitiesTemp::whereIn('id', $request->id)->each(function ($newRecord){
            $newRecord->update(['approval_status' => 'Approved']);
            $newRecord->replicate()->setTable('coa_liabilities')->save();   
        });
        COALiabilitiesTemp::whereIn('id', $request->id)->delete();

        return response()->json(['message' => 'Approved and Successfully moved to current']);
    }

    public function cancelUplaod($request){
        COALiabilitiesTemp::whereIn('id', $request->id)->delete();

        return response()->json(['message' => 'Account Disapprove']);
    }

    public function error($th){
        return response()->json([ 
            'status' => true,
            'message' => 'something went wrong',
            'error' => $th->getMessage()
        ]);
    }
}