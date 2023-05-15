<?php

namespace App\Repositories\DocumentManagement\Receiving\BOT;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\DMBudgetaryObligationsTransac;
use App\Http\Requests\DocumentManagement\Receiving\BOTRequest;

class NewTransactionRepository{

    public function list(){
        $list = DB::select('CALL tf_list_obli_rec()');
        return response()->json(['list' => $list ]);
    }

    public function store(BOTRequest $request){

        $date = Carbon::now()->format('Y-M');

        $table = DMBudgetaryObligationsTransac::all();
        if($table->isEmpty()){
            $transac_id = "BOT-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
        }else{
            $lastId = DMBudgetaryObligationsTransac::latest('id')->select('id')->first();
            $botId = $lastId['id'];
            $transac_id = "BOT-" . $date . "-" . str_pad(++$botId, 7, '0', STR_PAD_LEFT);
        }

        DMBudgetaryObligationsTransac::create([
            'transaction_id' => $transac_id,
        ] + $request->validated());

        return response()->json([
            'message' => 'Your entry has been successfully saved under Transaction ID Number ' . $transac_id
        ], 200);

    }
}
