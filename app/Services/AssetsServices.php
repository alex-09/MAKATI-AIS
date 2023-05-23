<?php 

namespace App\Services;

use App\Models\COAAssets;
use Illuminate\Http\Request;
use App\Http\Requests\COARequest;
use App\Models\COAAssetsTemp;
use Illuminate\Support\Facades\DB;

class AssetsServices 
{
    public function show($request){

        if ($request->search != NULL){

            $list = DB::select('CALL get_assetCurrYear()');
            $search = $request->search;
            $list = COAAssets::where(function ($q) use ($search) {
                $q->orWhere('account_title', 'like', "%{$search}%")
                  ->orWhere('account_code', 'like', "%{$search}%");
            })->get();

        } else {
            $list = DB::select('CALL get_assetCurrYear()');
            $date = DB::select('CALL get_assetSetYear()');
        }

        return response()->json([
            'list' => $list,
            'date' => $date
        ]);
    }

    public function enrollAssets(COARequest $request)
    {
        try {
            COAAssets::create(
                [
                    'status' => 'pending'
                ] +
                    $request->validated(),
            );

            return response()->json(['message' => 'Account Enrolled Successfully']);

        }catch (\Throwable $th) {
            return $this->error($th);
        }
    }

    public function updateStatus($id){

        $status = COAAssets::find($id);
        if($status['status'] == 'enable'){

            $status->update(['status' => 'disable']);
            return response()->json(['message' => 'Account disabled successfully']);

        }else{

            $status->update(['status' => 'enable']);
            return response()->json(['message' => 'Account Enabled successfully']);

        }
    }

    public function updateDesc(Request $request, $id){
        $assetDescrip = COAAssets::find($id);
        $assetDescrip->update(['description' => $request->description]);

        return response()->json(['message' => 'Description Updated Success']);
    }

    public function approve($id){
        $app = COAAssets::find($id);
        $app->update(['status' => 'enable']);

        return response()->json(['message' => 'Approved Account']);
    }

    public function disApprove($id){
        COAAssets::find($id)->delete();

        return response()->json(['message' => 'Account Disapproved']);
    }

    public function displayTemp(){
        $list = COAAssetsTemp::all();
        return response()->json(['list' => $list]);
    }

    public function move($request){
        // $coa = $request->input();
        // foreach($coa as $key => $value){
            COAAssetsTemp::whereIn('id', $request->id)->each(function ($newRecord){
                $newRecord->replicate()->setTable('coa_assets')->save();
            });
        // }
        COAAssetsTemp::whereIn('id', $request->id)->delete();

        return response()->json(['message' => 'Successfully moved to current']);
    }

    public function cancelUplaod($request){
        COAAssetsTemp::whereIn('id', $request->id)->delete();

        return response()->json(['message' => 'Account Disapprove']);
    }

    public function error($th){
        return response()->json([ 
            'status' => false,
            'message' => 'something went wrong',
            'error' => $th->getMessage()
        ]);
    }
}