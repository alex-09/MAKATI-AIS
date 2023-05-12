<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\ContractsPO;

use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use Illuminate\Http\Request;

class DivisionHeadController extends Controller
{
    public function divisionHeadList(){

        return response()->json(['listAll' => DmContractpo::all()]);

}
}
