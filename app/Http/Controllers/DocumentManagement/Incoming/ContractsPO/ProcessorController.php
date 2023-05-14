<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\ContractsPO;

use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    public function processorList(){

        return response()->json(['listAll' => DmContractpo::all()]);

}
}
