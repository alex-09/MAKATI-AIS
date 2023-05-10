<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\COA\AssetsController;
use App\Http\Controllers\COA\EquityController;
use App\Http\Controllers\COA\IncomeController;
use App\Http\Controllers\COA\ExpensesController;
use App\Http\Controllers\COA\LiabilitiesController;
use App\Http\Controllers\COA\PreviousAccController;
use App\Http\Controllers\COA\export\AssetExportController;
use App\Http\Controllers\COA\Import\AssetImportController;
use App\Http\Controllers\COA\Export\EquityExportController;
use App\Http\Controllers\COA\Export\IncomeExportController;
use App\Http\Controllers\COA\Import\EquityImportController;
use App\Http\Controllers\COA\Import\IncomeImportController;

use App\Http\Controllers\COA\Export\ExpensesExportController;
use App\Http\Controllers\COA\Export\LiabilityExportController;
use App\Http\Controllers\BAT\TrustFund\ListTr\ListTRController;
use App\Http\Controllers\COA\Import\LiabilitiesImportController;
use App\Http\Controllers\BAT\TrustFund\Reviewer\ReviewTRController;
use App\Http\Controllers\BAT\TrustFund\Processor\ListsrcTRController;
use App\Http\Controllers\BAT\TrustFund\DivisioHead\DHToApproveController;
use App\Http\Controllers\BAT\TrustFund\CityAccountant\CAToApproveController;
use App\Http\Controllers\BAT\TrustFund\Processor\UpdateTR\UpdateTRController;
use App\Http\Controllers\BAT\ExecutiveBudget\Allotment\ListAllotmentController;
use App\Http\Controllers\BAT\ExecutiveBudget\Allotment\EnrollAllotmentController;
use App\Http\Controllers\BAT\ExecutiveBudget\Allotment\UpdateAllotmentController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\PrevRecController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\UnexpendedController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\PrintRecController;
use App\Http\Controllers\DocumentManagement\Receiving\PreAudit\PrevTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PreAudit\printPreAudController;
use App\Http\Controllers\BAT\ExecutiveBudget\Appropriation\ListAppropriationController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\LGUCounterPartController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\PrintCommController;
use App\Http\Controllers\BAT\ExecutiveBudget\Appropriation\EnrollAppropriationController;
use App\Http\Controllers\BAT\ExecutiveBudget\Appropriation\UpdateAppropriationController;
use App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions\ReceiveChecksController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\CreateCommController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\RecContractPOController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEBusinessController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\EnrollTransReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\CommunicationController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEIndividualController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\DonationPrivateSectorController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\NewPayTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEGovernementAgencyController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\NewTransactionsController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\PreviousTransactionsController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\PrintReceivingReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions\PrintRecivingReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment\PayrollAppointmentReceivingController;
use App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment\PayrollsAndAppointmentController;

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

    Route::get('/index', [PreviousAccController::class, 'coaDates']); 

    //ROUTES FOR VIEWING PREVIOUS ACCOUNTS USING DATESS
    Route::get('/previousAsset', [PreviousAccController::class, 'prevAsset']); 
    Route::get('/previousLiability', [PreviousAccController::class, 'prevLiability']); 
    Route::get('/previousEquity', [PreviousAccController::class, 'prevEquity']); 
    Route::get('/previousExpenses', [PreviousAccController::class, 'prevExpenses']); 
    Route::get('/previousIncome', [PreviousAccController::class, 'prevIncome']); 
    
    //ROUTES FOR ASSETS
    Route::get('/showAssets', [AssetsController::class, 'showAssets']); 
    Route::post('/enrollAssets', [AssetsController::class, 'enrollAssets']); 
    Route::post('/updateAssetStatus/{id}', [AssetsController::class, 'UpdateAssetStatus']); 
    Route::post('/addAssetDescription/{id}', [AssetsController::class, 'AddAssetDescription']); 
    Route::post('/approveAssetAccount/{id}', [AssetsController::class, 'approveAccount']); 
    Route::post('/disApproveAssetAccount/{id}', [AssetsController::class, 'disApproveAccount']); 
    Route::get('/listTempAsset', [AssetsController::class, 'listTemp']); 
    Route::post('/transferAsset', [AssetsController::class, 'move']); 
    Route::post('/disapproveAsset', [AssetsController::class, 'disapprove']); 

    //ROUTES FOR EQUITY
    Route::get('/showEquity', [EquityController::class, 'showEquity']); 
    Route::post('/enrollEquity', [EquityController::class, 'enrollEquity']); 
    Route::post('/updateEquityStatus/{id}', [EquityController::class, 'UpdateEquityStatus']); 
    Route::post('/addEquityDescription/{id}', [EquityController::class, 'AddEquityDescription']);
    Route::post('/approveEquityAccount/{id}', [EquityController::class, 'approveAccount']); 
    Route::post('/disApproveEquityAccount/{id}', [EquityController::class, 'disApproveAccount']); 
    Route::get('/listTempEquity', [EquityController::class, 'listTemp']); 
    Route::post('/transferEquity', [EquityController::class, 'move']); 
    Route::post('/disapproveEquity', [EquityController::class, 'disapprove']); 

    //ROUTES FOR EXPENSES
    Route::get('/showExpenses', [ExpensesController::class, 'showExpenses']);
    Route::post('/enrollExpenses', [ExpensesController::class, 'enrollExpenses']);  
    Route::post('/updateExpensesStatus/{id}', [ExpensesController::class, 'UpdateExpensesStatus']); 
    Route::post('/addExpensesDescription/{id}', [ExpensesController::class, 'AddExpensesDescription']);
    Route::post('/approveExpensesAccount/{id}', [ExpensesController::class, 'approveAccount']); 
    Route::post('/disApproveExpensesAccount/{id}', [ExpensesController::class, 'disApproveAccount']); 
    Route::get('/listTempExpenses', [ExpensesController::class, 'listTemp']); 
    Route::post('/transferExpenses', [ExpensesController::class, 'move']); 
    Route::post('/disapproveExpenses', [ExpensesController::class, 'disapprove']); 

    //ROUTES FOR INCOME
    Route::get('/showIncome', [IncomeController::class, 'showIncome']); 
    Route::post('/enrollIncome', [IncomeController::class, 'enrollIncome']); 
    Route::post('/updateIncomeStatus/{id}', [IncomeController::class, 'UpdateIncomeStatus']);
    Route::post('/addIncomeDescription/{id}', [IncomeController::class, 'AddIncomeDescription']);
    Route::post('/approveIncomeAccount/{id}', [IncomeController::class, 'approveAccount']); 
    Route::post('/disApproveIncomeAccount/{id}', [IncomeController::class, 'disApproveAccount']); 
    Route::get('/listTempIncome', [IncomeController::class, 'listTemp']); 
    Route::post('/transferIncome', [IncomeController::class, 'move']); 
    Route::post('/disapproveIncome', [IncomeController::class, 'disapprove']); 

    //ROUTES FOR LIABILITIES
    Route::get('/showLiabilities', [LiabilitiesController::class, 'showLiabilities']); 
    Route::post('/enrollLiabilities', [LiabilitiesController::class, 'enrollLiabilities']); 
    Route::post('/updateLiabilitiesStatus/{id}', [LiabilitiesController::class, 'UpdateLSiabilitiesStatus']);
    Route::post('/addLiabilitiesDescription/{id}', [LiabilitiesController::class, 'AddLiabilitiesDescription']);
    Route::post('/approveLiabilitiesAccount/{id}', [LiabilitiesController::class, 'approveAccount']); 
    Route::post('/disApproveLiabilitiesAccount/{id}', [LiabilitiesController::class, 'disApproveAccount']); 
    Route::get('/listTempLiabilities', [LiabilitiesController::class, 'listTemp']); 
    Route::post('/transferLiabilities', [LiabilitiesController::class, 'move']); 
    Route::post('/disapproveLiabilities', [LiabilitiesController::class, 'disapprove']); 

    //IMPORT ACCOUNTS   
    Route::post('/importAsset', [AssetImportController::class, 'import']); 
    Route::post('/importLiability', [LiabilitiesImportController::class, 'import']); 
    Route::post('/importEquity', [EquityImportController::class, 'import']); 
    Route::post('/importExpenses', [ExpensesImportController::class, 'import']); 
    Route::post('/importIncome', [IncomeImportController::class, 'import']); 

    Route::get('/exportAsset', [AssetExportController::class, 'export']); 
    Route::get('/exportLiability', [LiabilityExportController::class, 'export']); 
    Route::get('/exportEquity', [EquityExportController::class, 'export']); 
    Route::get('/exportExpenses', [ExpensesExportController::class, 'export']); 
    Route::get('/exportIncome', [IncomeExportController::class, 'export']); 

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
    Route::get('/showRecComm', [PrintCommController::class, 'display']); 
    Route::post('/createComm', [CreateCommController::class, 'store']);

    Route::get('/filterBearer', [CommunicationController::class, 'filterBearer']);
    Route::post('/update/{id}', [CommunicationController::class, 'updateComm']); 
    Route::get('/search', [CommunicationController::class, 'searchComm']); 
    Route::post('/actionHistory/{id}', [CommunicationController::class, 'createActionHistory']); 
    Route::get('/frs', [CommunicationController::class, 'commFrs']); 
    Route::get('/aics', [CommunicationController::class, 'commAics']);
    Route::get('/viewPdf', [CommunicationController::class, 'viewPdf']);

});

Route::prefix('trustfunds')->group(function () {

    //PROCESSOR
    route::get('/listsrcs', [ListsrcTRController::class, 'list']);
    Route::post('/unexpended', [UnexpendedController::class, 'insertData']); 
    Route::post('/counterpart', [LGUCounterPartController::class, 'insertData']); 
    Route::post('/enrolltransfer', [EnrollTransReceiptController::class, 'enrollNew']); 
    Route::post('/enrollDonation', [DonationPrivateSectorController::class, 'enrollDonate']); 

    Route::get('/forReviewTr', [ListTRController::class, 'listforReview']);
    Route::get('/approvedTr', [ListTRController::class, 'listapproved']);
    
    Route::get('/searchTr', [UpdateTRController::class, 'search']);
    Route::post('/updateTr', [UpdateTRController::class, 'update']);

    //VIEW TRUST RECEIPT
    Route::post('/viewTr', [ListTRController::class, 'view']);

    //REVIEWER
    Route::post('/toDiviHead', [ReviewTRController::class, 'reviewed']);
    Route::post('/revReject', [ReviewTRController::class, 'reject']);

    //DIVISION HEAD
    Route::post('/forCATr', [DHToApproveController::class, 'reviewed']);
    Route::post('/DHReject', [DHToApproveController::class, 'reject']);

    //CITYACCOUNTANT
    Route::post('/CAApproveTr', [CAToApproveController::class, 'reviewed']);
    Route::post('/CAReject', [CAToApproveController::class, 'reject']);
});

Route::prefix('BOT')->group(function () {

    Route::post('/insertNewTransac', [NewTransactionsController::class, 'insertNewTransac']); 
    Route::get('/previousTransac', [PreviousTransactionsController::class, 'previousList']);
    Route::get('/viewTransac/{id}', [PreviousTransactionsController::class, 'viewdata']);
    Route::post('/editTransac/{id}', [PreviousTransactionsController::class, 'editData']);
    Route::get('/listReceiver', [PrintReceivingReceiptController::class, 'listPrintReceiver']);
    // Route::get('/listReceiver/{bearer}', [PrintReceivingReceiptController::class, 'searchBearer']);

});

Route::prefix('ContractPO')->group(function () {

    Route::get('/listType', [RecContractPOController::class, 'listType']); 
    Route::post('/insertRec', [RecContractPOController::class, 'receiveCP']); 
    Route::get('/previousCP', [PrevRecController::class, 'list']);
    Route::post('/updatePrev/{id}', [PrevRecController::class, 'update']);
    Route::get('/listTransac', [PrintRecController::class, 'listTransac']);
    // Route::get('/listReceiver/{bearer}', [PrintReceivingReceiptController::class, 'searchBearer']);

 });

 Route::prefix('Pre-Audit')->group(function () {

    Route::get('/search', [PrevTransacController::class, 'search']); 
    Route::post('/save', [PrevTransacController::class, 'save']); 
    Route::get('/list', [printPreAudController::class, 'listAll']);

 });
 
 Route::prefix('Payment-Transaction')->group(function () {

    Route::post('/storePT', [NewPayTransacController::class, 'store']); 
    // Route::post('/save', [NewPayTransacController::class, 'save']); 
    // Route::get('/list', [NewPayTransacController::class, 'listAll']);

 });

 Route::prefix('Payee-Enroll')->group(function () {

    Route::post('/individual', [PEIndividualController::class, 'storeIndividual']); 
    Route::post('/business', [PEBusinessController::class, 'storeBusiness']); 
    Route::post('/government-agency', [PEGovernementAgencyController::class, 'storeAgency']); 
 });

 Route::prefix('Check-Transac')->group(function () {

    Route::post('/receive-checks', [ReceiveChecksController::class, 'storeReceiveChecks']); 
    Route::get('/receiving-print', [PrintRecivingReceiptController::class, 'listPrintReceiving']); 
 
 });

 Route::prefix('Payroll-Appointment')->group(function () {

    Route::post('/payroll-appointment', [PayrollsAndAppointmentController::class, 'payrollAppointment']); 
    Route::get('/receiving', [PayrollAppointmentReceivingController::class, 'payrollListReceiving']); 
 
 });