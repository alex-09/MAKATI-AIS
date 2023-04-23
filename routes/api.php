<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\COA\AssetsController;
use App\Http\Controllers\COA\EquityController;
use App\Http\Controllers\COA\IncomeController;
use App\Http\Controllers\COA\ExpensesController;
use App\Http\Controllers\COA\Import\AssetImport;
use App\Http\Controllers\COA\SelectDateController;
use App\Http\Controllers\COA\LiabilitiesController;
use App\Http\Controllers\Allotment\ListAllotmentController;
use App\Http\Controllers\COA\Import\EquityImportController;
use App\Http\Controllers\COA\Import\IncomeImportController;
use App\Http\Controllers\Allotment\EnrollAllotmentController;
use App\Http\Controllers\Allotment\UpdateAllotmentController;
use App\Http\Controllers\COA\Import\ExpensesImportController;
use App\Http\Controllers\Communication\CommunicationController;
use App\Http\Controllers\COA\Import\LiabilitiesImportController;
use App\Http\Controllers\Appropriation\ListAppropriationController;
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


Route::prefix('makati')->group(function() {
    
    Route::post('/register', [AuthController::class, 'register']); 

    Route::post('/login', [AuthController::class, 'login']); 
    
    Route::post('/logout', [AuthController::class, 'logout']); 

});

Route::middleware(['auth'])->group(function () {

});

Route::prefix('coa')->group(function() {

    Route::get('/index', [SelectDateController::class, 'coaDates']); 
    Route::get('/previousAccounts', [SelectDateController::class, 'prevAccount']); 
    
    //ROUTES FOR ASSETS
    Route::get('/showAssets', [AssetsController::class, 'showAssets']); 
    Route::post('/enrollAssets', [AssetsController::class, 'enrollAssets']); 
    Route::post('/updateAssetStatus/{id}', [AssetsController::class, 'UpdateAssetStatus']); 
    Route::post('/addAssetDescription/{id}', [AssetsController::class, 'AddAssetDescription']); 
    Route::post('/approveAssetAccount/{id}', [AssetsController::class, 'approveAccount']); 
    Route::post('/disApproveAssetAccount/{id}', [AssetsController::class, 'disApproveAccount']); 

    //ROUTES FOR EQUITY
    Route::get('/showEquity', [EquityController::class, 'showEquity']); 
    Route::post('/enrollEquity', [EquityController::class, 'enrollEquity']); 
    Route::post('/updateEquityStatus/{id}', [EquityController::class, 'UpdateEquityStatus']); 
    Route::post('/addEquityDescription/{id}', [EquityController::class, 'AddEquityDescription']);
    Route::post('/approveEquityAccount/{id}', [EquityController::class, 'approveAccount']); 
    Route::post('/disApproveEquityAccount/{id}', [EquityController::class, 'disApproveAccount']); 

    //ROUTES FOR EXPENSES
    Route::get('/showExpenses', [ExpensesController::class, 'showExpenses']);
    Route::post('/enrollExpenses', [ExpensesController::class, 'enrollExpenses']);  
    Route::post('/updateExpensesStatus/{id}', [ExpensesController::class, 'UpdateExpensesStatus']); 
    Route::post('/addExpensesDescription/{id}', [ExpensesController::class, 'AddExpensesDescription']);
    Route::post('/approveExpensesAccount/{id}', [ExpensesController::class, 'approveAccount']); 
    Route::post('/disApproveExpensesAccount/{id}', [ExpensesController::class, 'disApproveAccount']); 

    //ROUTES FOR INCOME
    Route::get('/showIncome', [IncomeController::class, 'showIncome']); 
    Route::post('/enrollIncome', [IncomeController::class, 'enrollIncome']); 
    Route::post('/updateIncomeStatus/{id}', [IncomeController::class, 'UpdateIncomeStatus']);
    Route::post('/addIncomeDescription/{id}', [IncomeController::class, 'AddIncomeDescription']);
    Route::post('/approveIncomeAccount/{id}', [IncomeController::class, 'approveAccount']); 
    Route::post('/disApproveIncomeAccount/{id}', [IncomeController::class, 'disApproveAccount']); 

    //ROUTES FOR LIABILITIES
    Route::get('/showLiabilities', [LiabilitiesController::class, 'showLiabilities']); 
    Route::post('/enrollLiabilities', [LiabilitiesController::class, 'enrollLiabilities']); 
    Route::post('/updateLiabilitiesStatus/{id}', [LiabilitiesController::class, 'UpdateLSiabilitiesStatus']);
    Route::post('/addLiabilitiesDescription/{id}', [LiabilitiesController::class, 'AddLiabilitiesDescription']);
    Route::post('/approveLiabilitiesAccount/{id}', [LiabilitiesController::class, 'approveAccount']); 
    Route::post('/disApproveLiabilitiesAccount/{id}', [LiabilitiesController::class, 'disApproveAccount']); 

    //IMPORT ACCOUNTS   
    Route::post('/importAsset', [AssetImportController::class, 'import']); 
    Route::post('/importLiability', [LiabilitiesImportController::class, 'import']); 
    Route::post('/importEquity', [EquityImportController::class, 'import']); 
    Route::post('/importExpenses', [ExpensesImportController::class, 'import']); 
    Route::post('/importIncome', [IncomeImportController::class, 'import']); 

});

Route::prefix('appropriation')->group(function () {

    //ENROLL
    Route::get('/index', [EnrollAppropriationController::class, 'dropdownList']); 
    Route::get('/approtypes', [EnrollAppropriationController::class, 'ApproTypes']); 
    Route::post('/enrollappro', [EnrollAppropriationController::class, 'EnrollAppro']); 
    Route::post('/addProgram', [EnrollAppropriationController::class, 'addProgram']); 
    Route::post('/forReview', [EnrollAppropriationController::class, 'forReview']); 

    //UPDATE
    Route::get('/filterProg', [UpdateAppropriationController::class, 'getProgram']);
    Route::get('/filterProj', [UpdateAppropriationController::class, 'getProject']);
    Route::get('/filterAct', [UpdateAppropriationController::class, 'getActivity']);
    Route::get('/filter', [UpdateAppropriationController::class, 'FilterAppropriation']);
    Route::post('/addActivity', [UpdateAppropriationController::class, 'addActivity']);
    Route::post('/updateAppro', [UpdateAppropriationController::class, 'updateAppro']);

    //LIST 
    Route::get('/listAppro', [ListAppropriationController::class, 'index']);

});

Route::prefix('allotment')->group(function () {

    //ENROLL
    Route::get('/filter', [EnrollAllotmentController::class, 'filterAllot']);
    Route::post('/enroll', [EnrollAllotmentController::class, 'enrollAllotment']);

    //UPDATE
    Route::get('/filterAllot', [UpdateAllotmentController::class, 'filter']);
    Route::get('/updateAllot', [UpdateAllotmentController::class, 'update']);

    //LIST
    Route::get('/listAllot', [ListAllotmentController::class, 'list']);


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
