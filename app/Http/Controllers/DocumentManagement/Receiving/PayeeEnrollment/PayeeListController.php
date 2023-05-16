<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PayeeListController extends Controller
{
    public function list()
    {
        return response()->json(['list' => DB::select('pe_get_payee_name()')]);
    }
}
