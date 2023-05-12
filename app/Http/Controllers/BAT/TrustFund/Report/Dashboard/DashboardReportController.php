<?php

namespace App\Http\Controllers\BAT\TrustFund\Report\Dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardReportController extends Controller
{
    public function pieReport(){
        $data = DB::select('CALL trust_fund_report_1');
        return response()->json(['list' => $data]);
    }
}
