<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\PayTransacRequest;
use App\Repositories\DocumentManagement\Receiving\PaymentTransaction\NewPayTransacRepository;

class NewPayTransacController extends Controller
{
    private $newPayTransac;

    public function __construct(NewPayTransacRepository $newPayTransac)
    {
        $this->newPayTransac = $newPayTransac;
    }

    public function store(PayTransacRequest $request){
        try{
            return $this->newPayTransac->storetransac($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
