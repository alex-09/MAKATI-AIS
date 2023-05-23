<?php

namespace App\Repositories\BAT\Executive\Processor;

use App\Models\AppropriationDetails;
use Illuminate\Support\Facades\DB;

class UpdateApproRepository{

    public function filter($request)
    {
        $data = DB::select(
            'call exec_get_appropriation(?,?,?,?,?,?)',
            array(
                $request->budyear,
                $request->dept_code,
                $request->fundSource,
                $request->program,
                $request->project,
                $request->activity
            )
        );
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function update($request)
    {
        $data = AppropriationDetails::where('id', $request->id);
        $data->update(['latest_appro_total' => $request->latest_appro_total,
                'latest_appro_amount' => $request->latest_appro_amount,
                'type' => 'Update']);

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }
}