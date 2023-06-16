<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\Communication;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CreateCommRequest;
use App\Models\ReceiveCommType;
use App\Repositories\DocumentManagement\Receiving\Communications\CreateCommRepository;
use Database\Seeders\ReceiveCommunicationType;

class CreateCommController extends Controller
{
    private $CreateCommRepo;

    public function __construct(CreateCommRepository $CreateCommRepo)
    {
        return $this->CreateCommRepo = $CreateCommRepo;
    }

    public function listAssistants(){
        return response()->json(['list' => DB::select('SELECT * FROM users_division_heads')]);
    }

    public function store(CreateCommRequest $request){
        try{
            return $this->CreateCommRepo->store($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }
}
