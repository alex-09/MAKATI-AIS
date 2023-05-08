<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\Communication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Receiving\Communications\PrintCommRepository;

class PrintCommController extends Controller
{
    private $PrintCommRepo;

    public function __construct(PrintCommRepository $PrintCommRepo)
    {
        return $this->PrintCommRepo = $PrintCommRepo;
    }

    public function display(){

        return $this->PrintCommRepo->list();
    }

    
}
