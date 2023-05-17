<?php

namespace App\Repositories\DocumentManagement\Receiving\PreAudit;

use App\Models\DmPreAudit;
use Illuminate\Support\Facades\DB;

class PrintPreAudRepository
{
    public function list(){
        $listPrintReceiver = DB::select('CALL get_dm_preaudit()');

        return response()->json(['data' => $listPrintReceiver]);
    }

    public function print($request){
        $data = DmPreAudit::select('transaction_id', 'payee_name', 'particulars', 
                                    'amount', 'current_bearer')
                                    ->whereIn('id', $request->id)
                                    ->get();

        return response()->json([
            'list' => $data
        ]);
    }
}