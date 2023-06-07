<?php 

namespace App\Services;

use App\Models\COAExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\COAExpensesTemp;
use App\Http\Requests\COARequest;
use Illuminate\Support\Facades\DB;
use App\Models\COAExpensesPrevious;

class ExpensesServices 
{
    public function show(Request $request){

        if ($request->search != NULL){

            $search = $request->search;
            $list = COAExpenses::where(function ($q) use ($search) {
                $q->orWhere('account_title', 'like', "%{$search}%")
                  ->orWhere('account_code', 'like', "%{$search}%");
            })->get();

        } else {
            $list = DB::select('CALL get_expensesCurrYear()');
            $date = DB::select('CALL get_expensesSetYear()');
        }

        return response()->json([
            'list' => $list,
            'date' => $date
        ]);
    }

    public function enrollExpenses(COARequest $request){
            
        COAExpenses::create([
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

        $status = COAExpenses::find($id);

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

        $assetDescrip = COAExpenses::find($id);
        $assetDescrip->update([
            
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Description Updated Success',
        ]);
    }

    public function approveByDh($id){
        $app = COAExpenses::find($id);
        $app->update(['status' => 'For Approval - CA']);

        return response()->json(['message' => 'Approved Account']);
    }

    public function approveByCacc($id){
        $app = COAExpenses::find($id);
        $app->update(['status' => 'enable']);

        return response()->json(['message' => 'Approved Account']);
    }

    public function disApprove($id){
        COAExpenses::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Account Disapproved',
        ]);
    }

    
    public function displayTemp(){
        $list = COAExpensesTemp::all();
        return response()->json(['list' => $list]);
    }

    public function forApprovalCa($request){
        $update = COAExpensesTemp::whereIn('id', $request->id);
        $update->update(['approval_status' => 'For Approval - CA']);

        return response()->json(['message' => 'For Approval - CA']);
    }

    public function approveByCa($request){

        $accounts = COAExpenses::all();
        $accounts->replicate()->setTable('coa_expenses_previouses')->save();
        $accounts->truncate();

        COAExpensesTemp::whereIn('id', $request->id)->each(function ($newRecord){
            $newRecord->update(['approval_status' => 'Approved']);
            $newRecord->replicate()->setTable('coa_expenses')->save();
        });

        COAExpensesTemp::whereIn('id', $request->id)->delete();

        return response()->json(['message' => 'Approved and Successfully moved to current']);
    }

    public function cancelUplaod($request){
        COAExpensesTemp::whereIn('id', $request->id)->delete();

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