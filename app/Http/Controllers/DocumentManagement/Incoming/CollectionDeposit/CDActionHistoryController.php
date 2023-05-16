<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\CollectionDeposit;

use App\Http\Controllers\Controller;
use App\Models\DMCollectionDeposit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CDActionHistoryController extends Controller
{
    public function cdActionHistory(){

        $listActionHistory = DMCollectionDeposit::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'particulars',
            'sender'
        )->get();

        return response()->json(['data' => $listActionHistory]);
   
    }
}
