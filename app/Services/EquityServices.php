<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\COARequest;
use App\Models\COAEquity;
use Illuminate\Support\Facades\DB;

class EquityServices 
{
    public function show(Request $request){

        if ($request->search != NULL){

            $search = $request->search;
            $list = COAEquity::where(function ($q) use ($search) {
                $q->orWhere('account_title', 'like', "%{$search}%")
                  ->orWhere('account_code', 'like', "%{$search}%");
            })->get();

        } else {
            $list = DB::select('CALL get_equityCurrYear()');
            $date = DB::select('CALL get_equitySetYear()');
        }

        return response()->json([
            'status' => True,
            'list' => $list,
            'date' => $date
        ]);
    }

    public function enrollEquity(COARequest $request){
            
        COAEquity::create([
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

        $status = COAEquity::find($id);

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

        $assetDescrip = COAEquity::find($id)->first();
        $assetDescrip->update([
            
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Description Updated Success',
        ]);
    }

    public function approve($id){
        $app = COAEquity::find($id);
        $app->update([
            'status' => 'enable'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Approved Account',
        ]);
    }

    public function disApprove($id){
        COAEquity::find($id)->delete();

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