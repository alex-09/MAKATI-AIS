<?php

namespace App\Http\Controllers;

use App\Models\Appropriation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        
        $data = Appropriation::with('program')->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
