<?php

use App\Http\Controllers\Appropriation\EnrollAppropriationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\COA\Assets_controller;
use App\Http\Controllers\COA\Equity_controller;
use App\Http\Controllers\COA\Expenses_controller;
use App\Http\Controllers\COA\Income_controller;
use App\Http\Controllers\COA\Liabilities_controller;
use App\Http\Controllers\Allotment\EnrollAllotmentController;
use Illuminate\Support\Facades\Route;

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
    
    Route::get('/showAssets', [Assets_controller::class, 'showAssets']); 

    Route::get('/showEquity', [Equity_controller::class, 'showEquity']); 

    Route::get('/showExpenses', [Expenses_controller::class, 'showExpenses']); 

    Route::get('/showIncome', [Income_Controller::class, 'showIncome']); 

    Route::get('/showLiabilities', [Liabilities_controller::class, 'showLiabilities']); 

});

Route::prefix('appropriation')->group(function () {

    Route::get('/yearlist', [EnrollAppropriationController::class, 'YearList']); 

    Route::get('/approtypes', [EnrollAppropriationController::class, 'ApproTypes']); 

    Route::post('/enrollappro', [EnrollAppropriationController::class, 'EnrollAppro']); 

    Route::get('/filter', [EnrollAppropriationController::class, 'FilterAppropriation']);

    Route::get('/assets', [EnrollAppropriationController::class, 'GetCoaAssets']);

});

Route::prefix('allotment')->group(function () {

    Route::get('filter', [EnrollAllotmentController::class, 'filterAllotment']); 
    Route::post('enroll', [EnrollAllotmentController::class, 'enrollAllotment']); 
    Route::post('showList', [EnrollAllotmentController::class, 'showList']); 
    Route::post('update/{id}', [EnrollAllotmentController::class, 'updateAllotment']); 
});






