<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\COA\AssetsController;
use App\Http\Controllers\COA\EquityController;
use App\Http\Controllers\COA\IncomeController;
use App\Http\Controllers\COA\ExpensesController;
use App\Http\Controllers\Auth\UserImportController;
use App\Http\Controllers\COA\LiabilitiesController;
use App\Http\Controllers\COA\PreviousAccController;
use App\Http\Controllers\Dropdown\DropdownController;
use App\Http\Controllers\COA\export\AssetExportController;

use App\Http\Controllers\COA\Import\AssetImportController;
use App\Http\Controllers\COA\Export\EquityExportController;
use App\Http\Controllers\COA\Export\IncomeExportController;
use App\Http\Controllers\COA\Import\EquityImportController;
use App\Http\Controllers\COA\Import\IncomeImportController;
use App\Http\Controllers\COA\Export\ExpensesExportController;
use App\Http\Controllers\COA\Import\ExpensesImportController;
use App\Http\Controllers\COA\Export\LiabilityExportController;
use App\Http\Controllers\BAT\TrustFund\ListTr\ListTRController;
use App\Http\Controllers\COA\Import\LiabilitiesImportController;
use App\Http\Controllers\BAT\TrustFund\Reviewer\ReviewTRController;
use App\Http\Controllers\BAT\TrustFund\Processor\ListsrcTRController;
use App\Http\Controllers\BAT\TrustFund\DivisioHead\DHToApproveController;
use App\Http\Controllers\BAT\TrustFund\ListObli\ListObligationController;
use App\Http\Controllers\DocumentManagement\Outgoing\BOT\OGBotController;
use App\Http\Controllers\BAT\TrustFund\DivisioHead\DHObligationController;
use App\Http\Controllers\BAT\TrustFund\Reviewer\ReviewObligationController;
use App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead\ApproDHController;
use App\Http\Controllers\BAT\TrustFund\CityAccountant\CAToApproveController;
use App\Http\Controllers\BAT\TrustFund\CityAccountant\ObligationCAController;
use App\Http\Controllers\BAT\TrustFund\Processor\UpdateTR\UpdateTRController;
use App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant\ApproCAController;
use App\Http\Controllers\BAT\ExecutiveBudget\Dropdwons\ExecDropdwonController;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;
use App\Http\Controllers\DocumentManagement\Receiving\OD\NewTransacController;
use App\Http\Controllers\BAT\TrustFund\Report\Dashboard\DashboardReportController;
use App\Http\Controllers\BAT\TrustFund\Processor\Obligation\TFObligationController;
use App\Http\Controllers\DocumentManagement\Outgoing\PreAudit\OGPreauditController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\PrevRecController;
use App\Http\Controllers\DocumentManagement\Receiving\OD\PreviousTransacController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\UnexpendedController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\ReceiptPOController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\PrintRecController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\ProcessorController;
use App\Http\Controllers\DocumentManagement\Receiving\PreAudit\PrevTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PreAudit\printPreAudController;
use App\Http\Controllers\DocumentManagement\Receiving\OD\ODReceivingReceiptController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\OGContractPOController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\LGUCounterPartController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\DivisionHeadController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\ReceiptOthersController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\PrintCommController;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment\ListAllotmentController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\CreateCommController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\RecContractPOController;
use App\Http\Controllers\DocumentManagement\Incoming\Communication\ListClustersController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\CityAccountantController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\ReceiptContractController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PayeeListController;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment\EnrollAllotmentController;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment\UpdateAllotmentController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\ProcessorActionController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEBusinessController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\EnrollTransReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\CommunicationController;
use App\Http\Controllers\BAT\TrustFund\Processor\UpdateObligation\UpdateObligationController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEIndividualController;
use App\Http\Controllers\DocumentManagement\Incoming\CollectionDeposit\CDForProcessController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\DivisionHeadActionController;
use App\Http\Controllers\DocumentManagement\Outgoing\Communications\OGCommunicationController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\DonationPrivateSectorController;
use App\Http\Controllers\DocumentManagement\Outgoing\PaymentTransaction\OGPaytransacController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\CityAccountantActionController;
use App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions\ReceiveChecksController;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation\ListAppropriationController;
use App\Http\Controllers\DocumentManagement\Incoming\CollectionDeposit\CDActionHistoryController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\NewPayTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\ListPayTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\PrevPayTransacCOntroller;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation\EnrollAppropriationController;
use App\Http\Controllers\DocumentManagement\Incoming\Communication\CityAccountant\CommCAController;
use App\Http\Controllers\DocumentManagement\Outgoing\CheckTranscation\OGCheckTransactionController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEGovernementAgencyController;
use App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions\PrintRecivingReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\DivisionHead\EditPayeeController;
use App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument\CollectionDepositController;
use App\Http\Controllers\DocumentManagement\Incoming\Communication\CityAccountant\CAActionHistoryController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\NewTransactionsController;
use App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment\PayAppDropdownController;
use App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument\CollectionDepositReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\DivisionHead\PayeeDivisionHeadController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\PreviousTransactionsController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\PrintReceivingReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\CityAccountant\PayeeCityAccountantController;
use App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment\PayrollsAndAppointmentController;
use App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment\PayrollAppointmentReceivingController;

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

    Route::post('/userImport', [UserImportController::class, 'Import']);

    Route::post('/forgot-pass', [AuthController::class, 'forgotPass']);
    Route::post('/reset-pass', [AuthController::class, 'reset']);

    // Route::get('/getUser', [UserController::class, 'getDetails']); 

});

Route::group(['middleware'=>'auth:sanctum'], function () {

    Route::get('/me', [UserController::class, 'me']);

});

Route::prefix('Dropdowns')->group(function() {

    Route::get('/department', [DropdownController::class, 'departmentlist']); 
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
    Route::post('/approveAssetAccountDh/{id}', [AssetsController::class, 'approveAccountDh']); 
    Route::post('/approveAssetAccountCa/{id}', [AssetsController::class, 'approveAccountCa']); 
    Route::post('/disApproveAssetAccount/{id}', [AssetsController::class, 'disApproveAccount']); 
    Route::get('/listTempAsset', [AssetsController::class, 'listTemp']); 
    Route::post('/AssetforApprovalCa', [AssetsController::class, 'forApprovalCa']); 
    Route::post('/assetApproveByCa', [AssetsController::class, 'approveByCa']); 
    Route::post('/disapproveAsset', [AssetsController::class, 'disapprove']); 

    //ROUTES FOR EQUITY
    Route::get('/showEquity', [EquityController::class, 'showEquity']); 
    Route::post('/enrollEquity', [EquityController::class, 'enrollEquity']); 
    Route::post('/updateEquityStatus/{id}', [EquityController::class, 'UpdateEquityStatus']); 
    Route::post('/addEquityDescription/{id}', [EquityController::class, 'AddEquityDescription']);
    Route::post('/approveEquityAccountDh/{id}', [EquityController::class, 'approveAccountDh']); 
    Route::post('/approveEquityAccountCa/{id}', [EquityController::class, 'approveAccountCa']);  
    Route::post('/disApproveEquityAccount/{id}', [EquityController::class, 'disApproveAccount']); 
    Route::get('/listTempEquity', [EquityController::class, 'listTemp']); 
    Route::post('/equityforApprovalCa', [EquityController::class, 'forApprovalCa']); 
    Route::post('/EquityApproveByCa', [EquityController::class, 'approveByCa']); 
    Route::post('/disapproveEquity', [EquityController::class, 'disapprove']); 

    //ROUTES FOR EXPENSES
    Route::get('/showExpenses', [ExpensesController::class, 'showExpenses']);
    Route::post('/enrollExpenses', [ExpensesController::class, 'enrollExpenses']);  
    Route::post('/updateExpensesStatus/{id}', [ExpensesController::class, 'UpdateExpensesStatus']); 
    Route::post('/addExpensesDescription/{id}', [ExpensesController::class, 'AddExpensesDescription']);
    Route::post('/approveExpensesAccountDh/{id}', [ExpensesController::class, 'approveAccountDh']); 
    Route::post('/approveExpensesAccountCa/{id}', [ExpensesController::class, 'approveAccountCa']); 
    Route::post('/disApproveExpensesAccount/{id}', [ExpensesController::class, 'disApproveAccount']); 
    Route::get('/listTempExpenses', [ExpensesController::class, 'listTemp']); 
    Route::post('/expensesforApprovalCa', [ExpensesController::class, 'forApprovalCa']); 
    Route::post('/ExpensesApproveByCa', [ExpensesController::class, 'approveByCa']); 
    Route::post('/disapproveExpenses', [ExpensesController::class, 'disapprove']); 

    //ROUTES FOR INCOME
    Route::get('/showIncome', [IncomeController::class, 'showIncome']); 
    Route::post('/enrollIncome', [IncomeController::class, 'enrollIncome']); 
    Route::post('/updateIncomeStatus/{id}', [IncomeController::class, 'UpdateIncomeStatus']);
    Route::post('/addIncomeDescription/{id}', [IncomeController::class, 'AddIncomeDescription']);
    Route::post('/approveIncomeAccountDh/{id}', [IncomeController::class, 'approveAccountDh']); 
    Route::post('/approveIncomeAccountCa/{id}', [IncomeController::class, 'approveAccountCa']); 
    Route::post('/disApproveIncomeAccount/{id}', [IncomeController::class, 'disApproveAccount']); 
    Route::get('/listTempIncome', [IncomeController::class, 'listTemp']); 
    Route::post('/incomeforApprovalCa', [IncomeController::class, 'forApprovalCa']); 
    Route::post('/incomeApproveByCa', [IncomeController::class, 'approveByCa']); 
    Route::post('/disapproveIncome', [IncomeController::class, 'disapprove']); 

    //ROUTES FOR LIABILITIES
    Route::get('/showLiabilities', [LiabilitiesController::class, 'showLiabilities']); 
    Route::post('/enrollLiabilities', [LiabilitiesController::class, 'enrollLiabilities']); 
    Route::post('/updateLiabilitiesStatus/{id}', [LiabilitiesController::class, 'UpdateLiabilitiesStatus']);
    Route::post('/addLiabilitiesDescription/{id}', [LiabilitiesController::class, 'AddLiabilitiesDescription']);
    Route::post('/approveLiabilitiesAccountDh/{id}', [LiabilitiesController::class, 'approveAccountDh']); 
    Route::post('/approveLiabilitiesAccountCa/{id}', [LiabilitiesController::class, 'approveAccountCa']); 
    Route::post('/disApproveLiabilitiesAccount/{id}', [LiabilitiesController::class, 'disApproveAccount']); 
    Route::get('/listTempLiabilities', [LiabilitiesController::class, 'listTemp']); 
    Route::post('/liabilityforApprovalCa', [LiabilitiesController::class, 'forApprovalCa']); 
    Route::post('/liabilityincomeApproveByCa', [LiabilitiesController::class, 'approveByCa']); 
    Route::post('/disapproveLiabilities', [LiabilitiesController::class, 'disapprove']); 

    //IMPORT ACCOUNTS   
    Route::post('/importAsset', [AssetImportController::class, 'import']); 
    Route::post('/importLiability', [LiabilitiesImportController::class, 'import']); 
    Route::post('/importEquity', [EquityImportController::class, 'import']); 
    Route::post('/importExpenses', [ExpensesImportController::class, 'import']); 
    Route::post('/importIncome', [IncomeImportController::class, 'import']); 

    Route::get('/exportAsset', [AssetExportController::class, 'export']); 
    Route::get('/exportLiabilities', [LiabilityExportController::class, 'export']); 
    Route::get('/exportEquity', [EquityExportController::class, 'export']); 
    Route::get('/exportExpenses', [ExpensesExportController::class, 'export']); 
    Route::get('/exportIncome', [IncomeExportController::class, 'export']); 

});

Route::prefix('appropriation')->group(function () {

    //ENROLL
    Route::get('/dropdown', [ExecDropdwonController::class, 'execDropdown']); 
    Route::get('/dropdown2', [ExecDropdwonController::class, 'execDropdown2']); 
    Route::post('/enrollappro', [EnrollAppropriationController::class, 'EnrollAppro']); 
    Route::post('/forReview', [EnrollAppropriationController::class, 'forReview']); 
    //LIST s
    Route::get('/listAppro', [ListAppropriationController::class, 'index']);

    //REVIEWER
    Route::get('/listApproForReview', [ApproReviewerController::class, 'list']);
    Route::get('/viewApproForReview/{id}/{aipcode}', [ApproReviewerController::class, 'view']);
    Route::post('/updateApproForReview', [ApproReviewerController::class, 'update']);
    Route::post('/rejectApproForReview', [ApproReviewerController::class, 'reject']);

    //DIVISION HEAD
    Route::get('/listApproDivisionHead', [ApproDHController::class, 'list']);
    Route::get('/viewApproDH/{id}/{aipcode}', [ApproDHController::class, 'view']);
    Route::post('/updateApproDH', [ApproDHController::class, 'update']);
    Route::post('/rejectApproDH', [ApproDHController::class, 'reject']);

    //City Accountant
    Route::get('/listApproCA', [ApproCAController::class, 'list']);
    Route::get('/viewApproAC/{id}/{aipcode}', [ApproCAController::class, 'view']);
    Route::post('/updateApproCA', [ApproCAController::class, 'update']);
    Route::post('/rejectApproCA', [ApproCAController::class, 'reject']);
});

Route::prefix('allotment')->group(function () {

    //ENROLL
    Route::get('/filter', [EnrollAllotmentController::class, 'filterAllot']);
    Route::post('/enroll', [EnrollAllotmentController::class, 'enroll']);
    //UPDATE
    Route::get('/filterAllot', [UpdateAllotmentController::class, 'filter']);
    Route::get('/updateAllot', [UpdateAllotmentController::class, 'update']);
    //LIST
    Route::get('/listAllot', [ListAllotmentController::class, 'list']);


});

Route::prefix('ReceiveCommunication')->group(function () {

    Route::get('/commtype', [CommunicationController::class, 'commType']); 
    Route::post('/insert', [CommunicationController::class, 'receive_comms']); 
    Route::get('/showRecComm', [PrintCommController::class, 'display']); 
    Route::post('/createComm', [CreateCommController::class, 'store']);
    Route::get('/printComm', [PrintCommController::class, 'forPrint']);
    //CITY ACCOUNTANT
    Route::get('/listCA', [CommCAController::class, 'list']);
    Route::post('/updateCA', [CommCAController::class, 'update']);
    
    Route::get('/actionHistory/{id}', [CAActionHistoryController::class, 'list']); 
    Route::post('/addActHistory', [CAActionHistoryController::class, 'addActHistory']); 

    Route::get('/getBK', [ListClustersController::class, 'getBK']);
    Route::get('/getBAM', [ListClustersController::class, 'getBAM']);
    Route::get('/getFrd', [ListClustersController::class, 'getFrd']);
    Route::get('/getPRD', [ListClustersController::class, 'getPRD']);
    Route::get('/getPCIC', [ListClustersController::class, 'getPCIC']);
    Route::get('/getDivision', [ListClustersController::class, 'getDivision']);
    Route::get('/getAD', [ListClustersController::class, 'getAD']);
    Route::get('/getFRS', [ListClustersController::class, 'getFRS']);
    Route::get('/getAICS', [ListClustersController::class, 'getAICS']);

    //OUTGOING 
    Route::get('/listOutgoing', [OGCommunicationController::class, 'list']);
    Route::get('/listMc', [OGCommunicationController::class, 'listMc']);
    Route::get('/searchMc', [OGCommunicationController::class, 'searchMc']);
    Route::post('/updateMc', [OGCommunicationController::class, 'update']);
    Route::post('/transmital', [OGCommunicationController::class, 'transmital']);
    Route::post('/updateOutgoing', [OGCommunicationController::class, 'updateOutgoing']);
});

Route::prefix('trustfunds')->group(function () {

    //PROCESSOR
    route::get('/listsrcs', [ListsrcTRController::class, 'list']);
    Route::post('/unexpended', [UnexpendedController::class, 'insertData']); 
    Route::post('/counterpart', [LGUCounterPartController::class, 'insertData']); 
    Route::post('/enrolltransfer', [EnrollTransReceiptController::class, 'enrollNew']); 
    Route::post('/enrollDonation', [DonationPrivateSectorController::class, 'enrollDonate']); 
    //LIST TRUST RECEIPT
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
    //CITY ACCOUNTANT
    Route::post('/CAApproveTr', [CAToApproveController::class, 'reviewed']);
    Route::post('/CAReject', [CAToApproveController::class, 'reject']);
    //NEW OBLIGATION
    Route::get('/viewBot/{id}', [TFObligationController::class, 'view']);
    Route::post('/newObligation', [TFObligationController::class, 'store']);
    //LIST FURS 
    Route::get('/forReviewFurs', [ListObligationController::class, 'listforReview']);
    Route::get('/approvedFurs', [ListObligationController::class, 'listapproved']);
    Route::get('/viewFurs/{id}', [ListObligationController::class, 'view']);
    //OBLIGATION REVIEWER
    Route::post('/ObliToDiviHead', [ReviewObligationController::class, 'reviewed']);
    Route::post('/ObliRevReject', [ReviewObligationController::class, 'reject']);
    //OBLIGATION DIVISION HEAD
    Route::post('/ObliforCA', [DHObligationController::class, 'reviewed']);
    Route::post('/ObliDHReject', [DHObligationController::class, 'reject']);
    //CITY ACCOUNTANT
    Route::post('/obliCAApprove', [ObligationCAController::class, 'reviewed']);
    Route::post('/obliCAReject', [ObligationCAController::class, 'reject']);
    //SEARCH AND UPDATE FURS
    Route::get('/searchObli/{id}', [UpdateObligationController::class, 'search']);
    Route::post('/updateObli', [UpdateObligationController::class, 'update']);
    //REPORT DASHBOARD
    Route::get('/reportPIe', [DashboardReportController::class, 'pieReport']);
});

Route::prefix('BOT')->group(function () {

    Route::post('/insertNewTransac', [NewTransactionsController::class, 'insertNewTransac']); 
    Route::get('/previousTransac', [PreviousTransactionsController::class, 'previousList']);
    Route::get('/viewTransac/{id}', [PreviousTransactionsController::class, 'viewdata']);
    Route::post('/editTransac/{id}', [PreviousTransactionsController::class, 'editData']);
    Route::get('/listReceiver', [PrintReceivingReceiptController::class, 'listPrintReceiver']);
    Route::get('/print', [PrintReceivingReceiptController::class, 'print']);

    //OUTGOING
    Route::get('/list', [OGBotController::class, 'list']);
    Route::post('/botTransmital', [OGBotController::class, 'transmital']);
    Route::post('/BotUpdateOutgoing', [OGBotController::class, 'updateOutgoing']);
});

Route::prefix('ContractPO')->group(function () {

    Route::get('/listDropdown', [RecContractPOController::class, 'list']); 
    Route::post('/insertRec', [RecContractPOController::class, 'receiveCP']); 
    Route::get('/previousCP', [PrevRecController::class, 'view']);
    Route::post('/updatePrev/{id}', [PrevRecController::class, 'update']);
    Route::get('/listTransac', [PrintRecController::class, 'listTransac']);
    Route::get('/listPrint', [PrintRecController::class, 'print']);
    // Route::get('/listReceiver/{bearer}', [PrintReceivingReceiptController::class, 'searchBearer']);

    //OUTGOING
    Route::get('/list', [OGContractPOController::class, 'list']);
    Route::post('/CPTransmital', [OGContractPOController::class, 'transmital']);
    Route::post('/CPUpdateOutgoing', [OGContractPOController::class, 'updateOutgoing']);

 });

 Route::prefix('Pre-Audit')->group(function () {

    Route::get('/search', [PrevTransacController::class, 'search']); 
    Route::post('/save', [PrevTransacController::class, 'save']); 
    Route::get('/list', [printPreAudController::class, 'listAll']);
    Route::get('/print', [printPreAudController::class, 'print']);

    Route::get('/list', [OGPreauditController::class, 'list']);
    Route::post('/preaudTransmital', [OGPreauditController::class, 'transmital']);
    Route::post('/preaudpdateOutgoing', [OGPreauditController::class, 'updateOutgoing']);
 });
 
 Route::prefix('Payment-Transaction')->group(function () {

    Route::post('/storePT', [NewPayTransacController::class, 'store']); 
    Route::get('/searchPT', [PrevPayTransacCOntroller::class, 'search']); 
    Route::post('/updatePT', [PrevPayTransacCOntroller::class, 'update']);
    Route::get('/listPT', [ListPayTransacController::class, 'list']);
    Route::get('/printPT', [ListPayTransacController::class, 'print']);

    //OUTGOING
    Route::get('/list', [OGPaytransacController::class, 'list']);
    Route::post('/paytransacTransmital', [OGPaytransacController::class, 'transmital']);
    Route::post('/paytransacupdateOutgoing', [OGPaytransacController::class, 'updateOutgoing']);
 });

 Route::prefix('Payee-Enroll')->group(function () {

    Route::post('/individual', [PEIndividualController::class, 'storeIndividual']); 
    Route::post('/business', [PEBusinessController::class, 'storeBusiness']); 
    Route::post('/government-agency', [PEGovernementAgencyController::class, 'storeAgency']); 
    Route::get('/listPayeenName', [PayeeListController::class, 'list']); 
    //DH
    Route::get('/dhListPayee', [PayeeDivisionHeadController::class, 'list']); 
    Route::get('/dhViewPayee/{id}/{type}', [PayeeDivisionHeadController::class, 'view']); 
    Route::post('/dhApproved', [PayeeDivisionHeadController::class, 'forCA']); 
    Route::post('/dhReject', [PayeeDivisionHeadController::class, 'reject']); 
    Route::post('/dhUpdate', [EditPayeeController::class, 'update']); 
    //CA
    Route::get('/caListPayee', [PayeeCityAccountantController::class, 'list']); 
    Route::get('/caViewPayee/{id}/{type}', [PayeeCityAccountantController::class, 'view']); 
    Route::post('/caApproved', [PayeeCityAccountantController::class, 'approved']); 
    Route::post('/caReject', [PayeeCityAccountantController::class, 'reject']); 
 });

 Route::prefix('Check-Transac')->group(function () {

    Route::post('/receive-checks', [ReceiveChecksController::class, 'storeReceiveChecks']); 
    Route::get('/receiving-list', [PrintRecivingReceiptController::class, 'listPrintReceiving']); 
    Route::get('/receiving-print', [PrintRecivingReceiptController::class, 'forPrint']); 

    //OUTGOING
    Route::get('/list', [OGCheckTransactionController::class, 'list']);
    Route::post('/ctTransmital', [OGCheckTransactionController::class, 'transmital']);
    Route::post('/ctupdateOutgoing', [OGCheckTransactionController::class, 'updateOutgoing']);
 
 });

 Route::prefix('Payroll-Appointment')->group(function () {

    Route::get('/dropdown', [PayAppDropdownController::class, 'dropdown']); 
    Route::post('/receive-appointment', [PayrollsAndAppointmentController::class, 'payrollAppointment']); 
    Route::get('/list', [PayrollAppointmentReceivingController::class, 'list']); 
    Route::get('/print', [PayrollAppointmentReceivingController::class, 'print']); 
 
 });

 Route::prefix('Collection-Deposit')->group(function () {

    Route::post('/collection-deposit', [CollectionDepositController::class, 'insertCollectionDeposit']); 
    Route::get('/list', [CollectionDepositReceiptController::class, 'collectionDepostReceipt']); 
    Route::get('/print', [CollectionDepositReceiptController::class, 'collectionDepostReceipt']); 
 
    Route::get('/cd-for-process', [CDForProcessController::class, 'cdForProcess']); 
    Route::get('/cd-action-history', [CDActionHistoryController::class, 'cdActionHistory']); 
 });

 Route::prefix('DO')->group(function () {

    Route::post('/new-transac', [NewTransacController::class, 'insertNewTransac']); 
    Route::get('/search', [PreviousTransacController::class, 'search']); 
    Route::post('/update', [PreviousTransacController::class, 'update']); 
    Route::get('/list', [ODReceivingReceiptController::class, 'list']);
    Route::get('/print', [ODReceivingReceiptController::class, 'print']);
 
 });

 Route::prefix('Incoming-CPO')->group(function () {

    Route::post('/search{payeename}', [CityAccountantController::class, 'searchCPO']); 
    Route::get('/city-account', [CityAccountantController::class, 'cityAccountantList']); 
    Route::get('/division-head', [DivisionHeadController::class, 'divisionHeadList']); 
    Route::get('/processor', [ProcessorController::class, 'processorlist']); 
   
    Route::post('/add-action-city-accountant', [CityAccountantActionController::class, 'entryCityAccountant']); 
    Route::get('action-history-city-accountant', [CityAccountantActionController::class, 'listCityAccountAction']); 
    
    Route::post('/add-action-division-head', [DivisionHeadActionController::class, 'entryHeadDivision']); 
    Route::get('action-history-division-head', [DivisionHeadActionController::class, 'listDivisionHeadAction']); 
   
    Route::post('/add-action-processor', [ProcessorActionController::class, 'entryProcessor']); 
    Route::get('action-history-processor', [ProcessorActionController::class, 'listProcessorAction']); 
});

Route::prefix('Outgoing-CPO')->group(function () {


    Route::get('/receipt-contract', [ReceiptContractController::class, 'receiptContract']); 
    Route::get('/receipt-po', [ReceiptPOController::class, 'receiptPO']); 
    Route::get('/receipt-others', [ReceiptOthersController::class, 'receiptOthers']); 

    Route::get('/transmittal-contract', [ReceiptContractController::class, 'transmittalContractList']); 
    Route::get('/transmittal-po', [ReceiptPOController::class, 'transmittalPOList']); 
    Route::get('/transmittal-others', [ReceiptOthersController::class, 'transmittalOthersList']); 



    
});


