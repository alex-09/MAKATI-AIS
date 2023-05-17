<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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
use App\Http\Controllers\BAT\ExecutiveBudget\Allotment\ListAllotmentController;
use App\Http\Controllers\BAT\ExecutiveBudget\Allotment\EnrollAllotmentController;
use App\Http\Controllers\BAT\ExecutiveBudget\Allotment\UpdateAllotmentController;
use App\Http\Controllers\BAT\TrustFund\Report\Dashboard\DashboardReportController;
use App\Http\Controllers\BAT\TrustFund\Processor\Obligation\TFObligationController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\PrevRecController;
use App\Http\Controllers\DocumentManagement\Receiving\OD\PreviousTransacController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\UnexpendedController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\ReceiptPOController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\PrintRecController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\ProcessorController;
use App\Http\Controllers\DocumentManagement\Receiving\PreAudit\PrevTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PreAudit\printPreAudController;
use App\Http\Controllers\DocumentManagement\Receiving\OD\ODReceivingReceiptController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\LGUCounterPartController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\DivisionHeadController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\ReceiptOthersController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\PrintCommController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\CreateCommController;
use App\Http\Controllers\DocumentManagement\Receiving\ContractPO\RecContractPOController;
use App\Http\Controllers\DocumentManagement\Incoming\Communication\ListClustersController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\CityAccountantController;
use App\Http\Controllers\DocumentManagement\Outgoing\ContractPO\ReceiptContractController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PayeeListController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\ProcessorActionController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEBusinessController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\EnrollTransReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\Communication\CommunicationController;
use App\Http\Controllers\BAT\TrustFund\Processor\UpdateObligation\UpdateObligationController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEIndividualController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\DivisionHeadActionController;
use App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts\DonationPrivateSectorController;
use App\Http\Controllers\DocumentManagement\Incoming\ContractsPO\CityAccountantActionController;
use App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions\ReceiveChecksController;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation\ListAppropriationController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\NewPayTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\ListPayTransacController;
use App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction\PrevPayTransacCOntroller;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation\EnrollAppropriationController;
use App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation\UpdateAppropriationController;
use App\Http\Controllers\DocumentManagement\Incoming\CollectionDeposit\CDActionHistoryController;
use App\Http\Controllers\DocumentManagement\Incoming\CollectionDeposit\CDForProcessController;
use App\Http\Controllers\DocumentManagement\Incoming\Communication\CityAccountant\CommCAController;
use App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment\PEGovernementAgencyController;
use App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions\PrintRecivingReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument\CollectionDepositController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\NewTransactionsController;
use App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument\CollectionDepositReceiptController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\PreviousTransactionsController;
use App\Http\Controllers\DocumentManagement\Receiving\BudgetaryObligationsTransac\PrintReceivingReceiptController;
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
    Route::post('/updateLiabilitiesStatus/{id}', [LiabilitiesController::class, 'UpdateLiabilitiesStatus']);
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
    Route::get('/dropdown', [ExecDropdwonController::class, 'execDropdown']); 
    Route::get('/dropdown2', [ExecDropdwonController::class, 'execDropdown2']); 
    Route::post('/enrollappro', [EnrollAppropriationController::class, 'EnrollAppro']); 
    Route::post('/forReview', [EnrollAppropriationController::class, 'forReview']); 
    //LIST 
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
    Route::post('/enroll', [EnrollAllotmentController::class, 'enrollAllotment']);
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
    Route::post('/updateCA/{id}', [CommCAController::class, 'update']);

    Route::get('/getBK', [ListClustersController::class, 'getBK']);
    Route::get('/getBAM', [ListClustersController::class, 'getBAM']);
    Route::get('/getFrd', [ListClustersController::class, 'getFrd']);
    Route::get('/getPRD', [ListClustersController::class, 'getPRD']);
    Route::get('/getPCIC', [ListClustersController::class, 'getPCIC']);
    Route::get('/getDivision', [ListClustersController::class, 'getDivision']);
    Route::get('/getAD', [ListClustersController::class, 'getAD']);
    Route::get('/getFRS', [ListClustersController::class, 'getFRS']);
    Route::get('/getAICS', [ListClustersController::class, 'getAICS']);

    
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
    // Route::get('/listReceiver/{bearer}', [PrintReceivingReceiptController::class, 'searchBearer']);

});

Route::prefix('ContractPO')->group(function () {

    Route::get('/listDropdown', [RecContractPOController::class, 'list']); 
    Route::post('/insertRec', [RecContractPOController::class, 'receiveCP']); 
    Route::get('/previousCP', [PrevRecController::class, 'view']);
    Route::post('/updatePrev/{id}', [PrevRecController::class, 'update']);
    Route::get('/listTransac', [PrintRecController::class, 'listTransac']);
    Route::get('/listPrint', [PrintRecController::class, 'print']);
    // Route::get('/listReceiver/{bearer}', [PrintReceivingReceiptController::class, 'searchBearer']);

 });

 Route::prefix('Pre-Audit')->group(function () {

    Route::get('/search', [PrevTransacController::class, 'search']); 
    Route::post('/save', [PrevTransacController::class, 'save']); 
    Route::get('/list', [printPreAudController::class, 'listAll']);
    Route::get('/print', [printPreAudController::class, 'print']);

 });
 
 Route::prefix('Payment-Transaction')->group(function () {

    Route::post('/storePT', [NewPayTransacController::class, 'store']); 
    Route::get('/searchPT', [PrevPayTransacCOntroller::class, 'search']); 
    Route::post('/updatePT', [PrevPayTransacCOntroller::class, 'update']);
    Route::get('/listPT', [ListPayTransacController::class, 'list']);
    Route::get('/printPT', [ListPayTransacController::class, 'print']);

 });

 Route::prefix('Payee-Enroll')->group(function () {

    Route::post('/individual', [PEIndividualController::class, 'storeIndividual']); 
    Route::post('/business', [PEBusinessController::class, 'storeBusiness']); 
    Route::post('/government-agency', [PEGovernementAgencyController::class, 'storeAgency']); 
    Route::get('/listPayee', [PayeeListController::class, 'list']); 
 });

 Route::prefix('Check-Transac')->group(function () {

    Route::post('/receive-checks', [ReceiveChecksController::class, 'storeReceiveChecks']); 
    Route::get('/receiving-list', [PrintRecivingReceiptController::class, 'listPrintReceiving']); 
    Route::get('/receiving-print', [PrintRecivingReceiptController::class, 'forPrint']); 
 
 });

 Route::prefix('Payroll-Appointment')->group(function () {

    Route::post('/payroll-appointment', [PayrollsAndAppointmentController::class, 'payrollAppointment']); 
    Route::get('/receiving', [PayrollAppointmentReceivingController::class, 'payrollListReceiving']); 
 
 });

 Route::prefix('Collection-Deposit')->group(function () {

    Route::post('/collection-deposit', [CollectionDepositController::class, 'insertCollectionDeposit']); 
    Route::get('/cd-receiving', [CollectionDepositReceiptController::class, 'collectionDepostReceipt']); 
 
    Route::get('/cd-for-process', [CDForProcessController::class, 'cdForProcess']); 
    Route::get('/cd-action-history', [CDActionHistoryController::class, 'cdActionHistory']); 
 });

 Route::prefix('OD')->group(function () {

    Route::post('/new-transac', [NewTransacController::class, 'insertNewTransac']); 
    Route::post('/prev-transac', [PreviousTransacController::class, 'insertPrevTransac']); 
    Route::get('/newtransac-receipt', [ODReceivingReceiptController::class, 'newTransacReceipt']);
    Route::get('/prevtransac-receipt', [ODReceivingReceiptController::class, 'prevTransacReceipt']);
 
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


