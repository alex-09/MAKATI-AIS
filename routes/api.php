<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\COA\AssetsController;
use App\Http\Controllers\COA\EquityController;
use App\Http\Controllers\COA\IncomeController;
use App\Http\Controllers\COA\ExpensesController;
use App\Http\Controllers\COA\LiabilitiesController;
use App\Http\Controllers\Communication\CommunicationController;
use App\Http\Controllers\Appropriation\EnrollAppropriationController;
use App\Http\Controllers\Appropriation\UpdateAppropriationController;

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


Route::prefix('makati')->group(function() {
    
    Route::post('/register', [AuthController::class, 'register']); 

    Route::post('/login', [AuthController::class, 'login']); 
    
    Route::get('/logout', [AuthController::class, 'logout']); 

});

Route::prefix('coa')->group(function() {
    
    //ROUTES FOR ASSETS
    Route::get('/showAssets', [AssetsController::class, 'showAssets']); 
    Route::post('/enrollAssets', [AssetsController::class, 'enrollAssets']); 
    Route::post('/updateAssetStatus/{id}', [AssetsController::class, 'UpdateAssetStatus']); 
    Route::post('/addAssetDescription/{id}', [AssetsController::class, 'AddAssetDescription']); 

    //ROUTES FOR EQUITY
    Route::get('/showEquity', [EquityController::class, 'showEquity']); 
    Route::post('/enrollEquity', [EquityController::class, 'enrollEquity']); 
    Route::post('/updateEquityStatus/{id}', [EquityController::class, 'UpdateEquityStatus']); 
    Route::post('/addEquityDescription/{id}', [EquityController::class, 'AddEquityDescription']);

    //ROUTES FOR EXPENSES
    Route::get('/showExpenses', [ExpensesController::class, 'showExpenses']);
    Route::post('/enrollExpenses', [ExpensesController::class, 'enrollExpenses']);  
    Route::post('/updateExpensesStatus/{id}', [ExpensesController::class, 'UpdateExpensesStatus']); 
    Route::post('/addExpensesDescription/{id}', [ExpensesControllers::class, 'AddExpensesDescription']);

    //ROUTES FOR INCOME
    Route::get('/showIncome', [IncomeController::class, 'showIncome']); 
    Route::post('/enrollIncome', [IncomeController::class, 'enrollIncome']); 
    Route::post('/updateIncomeStatus/{id}', [IncomeController::class, 'UpdateIncomeStatus']);
    Route::post('/addIncomeDescription/{id}', [IncomeControllers::class, 'AddIncomeDescription']);

    //ROUTES FOR LIABILITIES
    Route::get('/showLiabilities', [LiabilitiesController::class, 'showLiabilities']); 
    Route::post('/enrollLiabilities', [LiabilitiesController::class, 'enrollLiabilities']); 
    Route::post('/updateLiabilitiesStatus/{id}', [LiabilitiesController::class, 'UpdateLiabilitiesStatus']);
    Route::post('/addLiabilitiesDescription/{id}', [LiabilitiesController::class, 'AddLiabilitiestion']);

});

Route::prefix('appropriation')->group(function () {

    //ENROLL
    Route::get('/yearlist', [EnrollAppropriationController::class, 'YearList']); 

    Route::get('/approtypes', [EnrollAppropriationController::class, 'ApproTypes']); 

    Route::post('/enrollappro', [EnrollAppropriationController::class, 'EnrollAppro']); 

    Route::post('/addProgram', [EnrollAppropriationController::class, 'addProgram']); 

    Route::post('/forReview', [EnrollAppropriationController::class, 'forReview']); 

    //UPDATE
    Route::get('/filter', [UpdateAppropriationController::class, 'FilterAppropriation']);

    Route::post('/addActivity', [UpdateAppropriationController::class, 'addActivity']);

    Route::post('/updateAppro', [UpdateAppropriationController::class, 'updateAppro']);

});

Route::prefix('ReceiveCommunication')->group(function () {

    Route::post('/insert', [CommunicationController::class, 'receive_comms']); 

    Route::get('/showRecComm', [CommunicationController::class, 'showRecComm']); 

    Route::get('/filterBearer', [CommunicationController::class, 'filterBearer']);

    Route::post('/update/{id}', [CommunicationController::class, 'updateComm']); 

    Route::get('/search', [CommunicationController::class, 'searchComm']); 

    Route::post('/actionHistory/{id}', [CommunicationController::class, 'createActionHistory']); 

    Route::get('/frs', [CommunicationController::class, 'commFrs']); 

    Route::get('/aics', [CommunicationController::class, 'commAics']);

    Route::get('/viewPdf', [CommunicationController::class, 'viewPdf']);

});

Route::prefix('TestRelationships')->group(function () {

    Route::get('test', [TestController::class, 'test']);

});