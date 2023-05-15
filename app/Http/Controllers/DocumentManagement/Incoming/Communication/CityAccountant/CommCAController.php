<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\Communication\CityAccountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Incoming\Communications\UpdateCARepository;

class CommCAController extends Controller
{

    private $updateCARepo;

    public function __construct(UpdateCARepository $updateCARepo)
    {
        $this->updateCARepo = $updateCARepo;
    }

    public function list (){

        return response()->json(['list' => DB::select('CALL get_ca_communication()')]);
    }

    public function update (Request $request, $id){
        
        return $this->updateCARepo->update($request, $id);
    }
}
