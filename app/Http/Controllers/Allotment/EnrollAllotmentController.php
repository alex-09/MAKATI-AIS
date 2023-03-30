<?php

namespace App\Http\Controllers\Allotment;

use App\Http\Controllers\Controller;
use App\Models\status;
use App\Models\Allotment;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Throwable;

class EnrollAllotmentController extends Controller

{


    public function enrollAllotment(Request $request){

        try{

            $request->validate([

                'budget_year_id' => 'required',
                'fund_source' => 'required',
                'document_source' => 'required',
                'adjustment_type' => 'required',
                'appropriation_type' => 'required',
                'department' =>'required',
                'document_date' =>'required',
                'supplemental_budget_no'=>'required',
                'office_code'=>'required',
                'program'=>'required',
                'project'=>'required',
                'activity'=>'required',
                'status'=>'required'

            ]);

            $enrollDetails = new Allotment();

            $enrollDetails->budget_year_id=$request->input('budget_year_id');
            $enrollDetails->fund_source=$request->input('fund_source');
            $enrollDetails->document_source=$request->input('document_source');
            $enrollDetails->adjustment_type=$request->input('adjustment_type');
            $enrollDetails->appropriation_type=$request->input('appropriation_type');
            $enrollDetails->department=$request->input('department');
            $enrollDetails->document_date=$request->input('document_date');
            $enrollDetails->supplemental_budget_no=$request->input('supplemental_budget_no');
            $enrollDetails->office_code=$request->input('office_code');
            $enrollDetails->program=$request->input('program');
            $enrollDetails->project=$request->input('project');
            $enrollDetails->activity=$request->input('activity');
            $enrollDetails->status=$request->input('status');

            $enrollDetails->save();

            return response()->json([

                'status' => true,
                'message' => "Insert data success!",
                'details' => $enrollDetails,
            ]);

        }catch(\Throwable $th){

            return response()->json([

                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()

            ]);
        }

    }

    public function updateAllotment(Request $request, $id){

        try
        {
            $updateAllot = Allotment::find($id);
            $updateAllot->budget_year_id=$request->input('budget_year_id');
            $updateAllot->department=$request->input('department');
            $updateAllot->fund_source=$request->input('fund_source');
            $updateAllot->project=$request->input('project');
            $updateAllot->appropriation_type=$request->input('appropriation_type');
            $updateAllot->document_date=$request->input('document_date');
            $updateAllot->document_source=$request->input('document_source');
            $updateAllot->supplemental_budget_no=$request->input('supplemental_budget_no');
            $updateAllot->office_code=$request->input('office_code');
            $updateAllot->program=$request->input('program');
            $updateAllot->activity=$request->input('activity');
            $updateAllot->status=$request->input('status');
            $updateAllot->adjustment_type=$request->input('adjustment_type');

            $updateAllot->save();

            return response()->json([
                'status'=>true,
                'message1' => 'Succesfully Update'
            ]);
        }

        catch(Throwable $th)
        {
            return response()->json([

                'status'=>false,
                'message'=>'Something went wrong!',
                'error'=>$th->getMessage()
            ]);
        }
    }
    public function showList(){

        $allotments = Allotment::all();

        if(isset($allotments)){

            return response()->json([

                'status'=>true,
                'showAllotment'=>$allotments
            ]);
        }
        else{
            return response()->json([

                'error'=>'Not Found'
            ]);
        }

}
    public function filterAllotment(){

        try{
        

            $data = Allotment::join('programs', 'programs.id', '=', 'allotments.program')
            ->paginate(15);

           
            return response()->json($data);
            
        }catch(Throwable $th){
            return response()->json([

                'status'=>false,
                'message'=>'Something went wrong!',
                'error'=>$th->getMessage()
            ]);
        }
    }

}
