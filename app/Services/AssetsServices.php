<?php 

namespace App\Services;

use App\Models\COAAssets;
use Illuminate\Http\Request;

use App\Http\Requests\COARequest;
use Illuminate\Support\Facades\DB;

class AssetsServices 
{
    public function show($request){

        if ($request->search != NULL){

            $search = $request->search;
            $list = COAAssets::where(function ($q) use ($search) {
                $q->orWhere('account_title', 'like', "%{$search}%")
                  ->orWhere('account_code', 'like', "%{$search}%");
            })->get();

        } else {
            $list = DB::select('CALL get_CurrYear()');
        }

        return response()->json([
            'status' => True,
            'list' => $list,
        ]);
    }

    public function enrollAssets(COARequest $request){
            
        COAAssets::create([
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

        $status = COAAssets::find($id);

        if($status['status'] == 'enable'){
            $status->update([
                'status' => 'disable'
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Account disabled successfully',
            ]);
        }else{
            $status->update([
                'status' => 'enable'
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Account Enabled successfully',

            ]);
        }
    }

    public function updateDesc(Request $request, $id){

        $assetDescrip = COAAssets::find($id);
        $assetDescrip->update([
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Description Updated Success',
        ]);
    }

    public function approve($id){
        $app = COAAssets::find($id);
        $app->update([
            'status' => 'enable'
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Approved Account',
        ]);
    }

    public function disApprove($id){
        COAAssets::find($id)->delete();

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