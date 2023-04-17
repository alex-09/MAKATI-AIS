<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\COARequest;
use App\Models\COALiabilities;
use Illuminate\Support\Facades\DB;

class LiabilitiesServices 
{
    public function show(){

        $pending = COALiabilities::where('status', 'pending')->get();

        $yearslist = DB::select('CALL coa_assets()');
        return response()->json([

            'status' => True,
            'message' => 'Assets Display Successfully',
            'list' => $yearslist,
            'pending' => $pending
        ]);
    }

    public function enrollEquity(COARequest $request){
            
        COALiabilities::create([
            'date_effectivity' => Carbon::now(),
            'status' => 'pending'
        ] +
            $request->validated(),
        );

        return response()->json([
            'status' => true,
            'message' => 'Account Enrolled Successfully',
        ]);

    }

    public function updateStatus($id){

        $status = COALiabilities::find($id)->first();

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

        $assetDescrip = COALiabilities::find($id)->first();
        $assetDescrip->update([
            
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Description Updated Success',
        ]);
    }

    public function approve($id){
        $app = COALiabilities::find($id);
        $app->update([
            'status' => 'enable'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Approved Account',
        ]);
    }

    public function disApprove($id){
        COALiabilities::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Account Disapproved',
        ]);
    }

    public function error($th){
        return response()->json([ 
            'status' => true,
            'message' => 'something went wrong',
            'error' => $th->getMessage()
        ]);
    }
}