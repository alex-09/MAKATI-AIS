<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\PayrollApointment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\PayrollAppointment\OutgointPayrollAppointmentRepository;

class OPayrollAppointController extends Controller
{
    private $outgoingpayAppointtransacRepo;

    public function __construct(OutgointPayrollAppointmentRepository $outgoingpayAppointtransacRepo)
    {
        $this->outgoingpayAppointtransacRepo = $outgoingpayAppointtransacRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_payrollappoint_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingpayAppointtransacRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingpayAppointtransacRepo->updateOutgoing($request);
    }
}
