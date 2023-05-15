<?php

namespace App\Http\Controllers\Dropdown;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DropdownController extends Controller
{
    public function departmentlist(){
        return response()->json(['department' => DB::select('CALL departments()'),]);
    }
}
