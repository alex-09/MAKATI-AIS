<?php

use App\Http\Controllers\Appropriation\EnrollAppropriationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('makati')->group(function(){
    Route::apiResource('/login', LoginController::class);
});

Route::post('/EnrollAppro', [EnrollAppropriationController::class, 'EnrollAppro']);
