<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\COA\AssetsController;
use App\Http\Controllers\COA\EquityController;
use App\Http\Controllers\COA\IncomeController;
use App\Http\Controllers\COA\ExpensesController;
use App\Http\Controllers\COA\LiabilitiesController;
use App\Http\Controllers\Appropriation\EnrollAppropriationController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {

});


Route::prefix('makati')->group(function(){
    
    Route::post('/register', [AuthController::class, 'register']); 

    Route::get('/login', [AuthController::class, 'login']); 
    
    Route::post('/logout', [AuthController::class, 'logout']); 

});

Route::prefix('coa')->group(function(){
    
    Route::get('/showAssets', [AssetsController::class, 'showAssets']); 

    Route::get('/showEquity', [EquityController::class, 'showEquity']); 

    Route::get('/showExpenses', [ExpensesController::class, 'showExpenses']); 

    Route::get('/showIncome', [IncomeController::class, 'showIncome']); 

    Route::get('/showLiabilities', [LiabilitiesController::class, 'showLiabilities']); 

});

Route::prefix('appropriation')->group(function () {

    Route::get('/yearlist', [EnrollAppropriationController::class, 'YearList']); 

    Route::get('/approtypes', [EnrollAppropriationController::class, 'ApproTypes']); 

    Route::post('/enrollappro', [EnrollAppropriationController::class, 'EnrollAppro']); 

    Route::get('/filter', [EnrollAppropriationController::class, 'FilterAppropriation']);

    Route::get('/assets', [EnrollAppropriationController::class, 'GetCoaAssets']);

});


