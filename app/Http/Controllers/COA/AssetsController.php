<?php

namespace App\Http\Controllers\COA;

use App\Models\COAAssets;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AssetsController extends Controller
{
    //DISPLAY ASSETS
    public function showAssets(){

        $yearslist = DB::select('CALL coa_assets()');

        return response()->json([

            'status' => True,
            'message' => 'Assets Display Successfully',
            'data' => $yearslist
        ]);
    }

    //ENROLL NEW ASSETS
    public function EnrollAssets(Request $request){

        try{

            $validateAssets = $request->validate([
                
                'account_group' => 'required|max:2|min:2',
                'major_account_group' => 'required|max:2|min:2',
                'sub-major_account_group' => 'required|max:2|min:2',
                'general_ledger_accounts' => 'required|max:3|min:3',
                'sub_ledger_accounts' => 'required|max:3|min:3',
                'sub-sub_ledger_accounts' => 'required|max:3|min:3',
                'account_code' => 'required',
                'account_title' => 'required',

            ]);

            $currDate = Carbon::now()->toDateString();

            $insertedData = COAAssets::create([

                'account_group' => $validateAssets['account_group'],
                'major_account_group' => $validateAssets['major_account_group'],
                'sub-major_account_group' => $validateAssets['sub-major_account_group'],
                'general_ledger_accounts' => $validateAssets['general_ledger_accounts'],
                'sub_ledger_accounts' => $validateAssets['sub_ledger_accounts'],
                'sub-sub_ledger_accounts' => $validateAssets['sub-sub_ledger_accounts'],
                'account_code' => $validateAssets['account_code'],
                'account_title' => $validateAssets['account_title'],
                'status' => 0,
                'date' => $currDate

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Asset Enrolled Successfully',
                'data' => $insertedData
            ]);

        }catch (\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }

    }

    //UPDATE STATUS
    public function UpdateAssetStatus($id){

        try{

            $status = COAAssets::where('id', $id)->first();

            if($status['status'] == 1){

                $status->update([
                    'status' => 0
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Update successfully',
                    'data' => '0'
                ]);

            }else{

                $status->update([
                    'status' => 1
                ]);
    
                return response()->json([
                    'status' => true,
                    'message' => 'Update successfully',
                    'data' => '1'
                ]);
            }

        }catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function AddAssetDescription(Request $request, $id){

        try{

            $assetDescrip = COAAssets::where('id', $id)->first();

            $insertDescrip = $assetDescrip->update([

                'description' => $request->description
            
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Description Updated Success',
                'data' => $insertDescrip
            ]);

        }catch (\Throwable $th){

            return response()->json([ 
                'status' => true,
                'message' => 'something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
    
}
