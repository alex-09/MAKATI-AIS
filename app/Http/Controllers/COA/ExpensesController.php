<?php

namespace App\Http\Controllers\COA;

use App\Models\COAExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    //DISPLAY EXPENSES
    public function showExpenses(){

        $yearslist = DB::select('CALL coa_expenses()');

        return response()->json([

            'status' => True,
            'message' => 'Expenses Display Successfully',
            'data' => $yearslist
        ]);
    }

    //ENROLL NEW EXPENSES
    public function EnrollExpenses(Request $request){

        try{

            $validateAssets = $request->validate([
                
                'account_group' => 'required|max:2|min:2',
                'major_account_group' => 'required|max:2|min:2',
                'sub_major_account_group' => 'required|max:2|min:2',
                'general_ledger_accounts' => 'required|max:3|min:3',
                'sub_ledger_accounts' => 'required|max:3|min:3',
                'sub_sub_ledger_accounts' => 'required|max:3|min:3',
                'account_title' => 'required',

            ]);

            $currDate = Carbon::now()->format('Y');

            $insertedData = COAExpenses::create([

                'account_group' => $validateAssets['account_group'],
                'major_account_group' => $validateAssets['major_account_group'],
                'sub_major_account_group' => $validateAssets['sub_major_account_group'],
                'general_ledger_accounts' => $validateAssets['general_ledger_accounts'],
                'sub_ledger_accounts' => $validateAssets['sub_ledger_accounts'],
                'sub_sub_ledger_accounts' => $validateAssets['sub_sub_ledger_accounts'],
                'account_code' => $request->account_code,
                'account_title' => $validateAssets['account_title'],
                'status' => 'enable',
                'date' => $currDate

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Expenses Enrolled Successfully',
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
    public function UpdateExpensesStatus($id){

        try{

            $status = COAExpenses::where('id', $id)->first();

            if($status['status'] == 1){

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

        }catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    //ADD DESCRIPTION
    public function AddExpensesDescription(Request $request, $id){

        try{

            $assetDescrip = COAExpenses::where('id', $id)->first();

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
