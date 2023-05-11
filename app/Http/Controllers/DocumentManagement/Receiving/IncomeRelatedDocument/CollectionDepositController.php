<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CollectionDeposit;
use App\Models\DMCollectionDeposit;
use Illuminate\Http\Request;

class CollectionDepositController extends Controller
{
    public function insertCollectionDeposit(CollectionDeposit $request){
        try{
    
            $collectiondeposit = DMCollectionDeposit::create($request->validated());
        
            return response()->json([
                'status' => true,
                'message' => 'Successfully Enrolled',
                'data' => $collectiondeposit
            ]);
    
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
            }
}
