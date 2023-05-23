<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\CollectionDeposit;

use App\Http\Controllers\Controller;
use App\Models\DMCollectionDeposit;
use Illuminate\Http\Request;

class CDForProcessController extends Controller
{
    public function cdForProcess(){

       
        return response()->json(['listAll' => DMCollectionDeposit::all()]);

        

}

}
