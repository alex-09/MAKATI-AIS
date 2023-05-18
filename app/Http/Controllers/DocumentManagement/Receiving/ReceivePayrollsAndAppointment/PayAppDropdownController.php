<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment;

use Illuminate\Http\Request;
use App\Models\DmPayrollDocuTypes;
use App\Models\DmPayrollFundTypes;
use App\Http\Controllers\Controller;
use App\Models\DmPayrollEmployTypes;
use App\Models\DmPayrollTransacTypes;

class PayAppDropdownController extends Controller
{
    public function dropdown(){
        
        return response()->json([
            'docuTypes' => DmPayrollDocuTypes::all(),
            'empTypes' => DmPayrollEmployTypes::all(),
            'fundTypes' => DmPayrollFundTypes::all(),
            'TransacTypes' => DmPayrollTransacTypes::all()
        ]);
    }
}
