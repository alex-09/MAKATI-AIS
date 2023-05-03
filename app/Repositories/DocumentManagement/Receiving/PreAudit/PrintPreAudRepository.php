<?php

namespace App\Repositories\DocumentManagement\Receiving\PreAudit;

use App\Models\DmPreAudit;
use Illuminate\Support\Facades\DB;

class PrintPreAudRepository
{
    public function list(){
        $listPrintReceiver = DmPreAudit::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id',
            'payee_name',
            'amount',
            'current_bearer'
        )->get();

        return response()->json(['data' => $listPrintReceiver]);
    }
}