<?php

namespace App\Http\Controllers\Dropdown;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DeptDropdownController extends Controller
{
    public function list(){
        return response()->json(['list' => Department::all()]);
    }
}
