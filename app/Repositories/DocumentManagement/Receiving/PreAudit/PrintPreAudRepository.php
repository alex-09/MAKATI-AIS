<?php

namespace App\Repositories\DocumentManagement\Receiving\PreAudit;

use App\Models\DmPreAudit;
use Illuminate\Support\Facades\DB;

class PrintPreAudRepository
{
    public function list(){

        return response()->json(['data' => DB::select('CALL get_dm_preaudit()')]);
    }

    public function print($request){
        $ids = implode(",", $request->id);
        return response()->json(['list' => DB::select('CALL dm_print_preaudit_sp(?)', array($ids))]);
    }
}