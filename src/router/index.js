import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // LOGIN ROUTER
    {
      path: "/sample",
      name: "sample",
      component: () => import("../views/SampleView.vue"),
    },

    // In process and Processed-------------------------------------------------
    {
      path: "/CityAccView",
      name: "CityAccView",
      component: () => import("../views/PCICM/Contracts/CityAccView.vue"),
    },
    {
      path: "/DivHeadView",
      name: "DivHeadView",
      component: () => import("../views/PCICM/Contracts/DivHeadView.vue"),
    },
    {
      path: "/AsstDeptHead",
      name: "AsstDeptHead",
      component: () => import("../views/PCICM/Contracts/AsstDeptHead.vue"),
    },
    //--------------------------------------------------------------------------

    // Processor - CA (delivery term, new transactions )
    {
      path: "/CityAccViewTransactions",
      name: "CityAccViewTransactions",
      component: () => import("../views/PCICM/Contracts/CityAccViewTransactions.vue"),
    },

    // PROCESSOR - ADH (contract data entry, transactions in process, table with input)
    {
      path: "/AsstDeptHeadViewTransactions",
      name: "AsstDeptHeadViewTransactions",
      component: () => import("../views/PCICM/Contracts/AsstDeptHeadViewTransactions.vue"),
    },

    // PROCESSOR - ADH (delivery term read, transactions in process)
    {
      path: "/AsstDeptHeadViewTransactionsRead",
      name: "AsstDeptHeadViewTransactionsRead",
      component: () => import("../views/PCICM/Contracts/AsstDeptHeadViewTransactionsRead.vue"),
    },

    // PROCESSOR - ADH (labor comp, supply comp, the one with + green btn, Contract Data Entry)
    {
      path: "/AsstDeptHeadViewTransactionsHead",
      name: "AsstDeptHeadViewTransactionsHead",
      component: () => import("../views/PCICM/Contracts/AsstDeptHeadViewTransactionsHead.vue"),
    },
    
    
    {
      path: "/",
      name: "login",
      component: () => import("../views/LoginView.vue"),
    },
    {
      path: "/forProcess",
      name: "obligationprocess",
      component: () => import("../views/Obligation/forprocess.vue"),
    },

    {
      path: "/obligationlist",
      name: "obligationList",
      component: () => import("../views/Obligation/obligationlist.vue"),
    },
    // MAIN MENU ROUTER
    {
      path: "/",
      name: "MainMenu",
      component: () => import("../views/MenuView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION ROUTER
    {
      path: "/Budget",
      name: "BudgetDashboard",
      component: () => import("../views/Budgetary/BudgetDashboard.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION APPROPRIATION ENROLL ROUTER
    {
      path: "/Appropriation-Enroll",
      name: "Enroll",
      component: () =>
        import("../views/Budgetary/Appropriation/enrollView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION APPROPRIATION UPDATE ROUTER
    {
      path: "/Appropriation-Update",
      name: "Update",
      component: () =>
        import("../views/Budgetary/Appropriation/updateView.vue"),
    },
    {
      path: "/Appropriation-Update-Details",
      name: "Update-Details",
      component: () =>
        import("../views/Budgetary/Appropriation/updateDetails.vue"),
    },

    // BUDGET ACCOUNT TRANSACTION APPROPRIATION LIST ROUTER
    {
      path: "/List-of-Appropriation",
      name: "List",
      component: () => import("../views/Budgetary/Appropriation/listView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION ALLOTMENT UPDATE ROUTER
    {
      path: "/Allotment-Update",
      name: "Allotment Update",
      component: () => import("../views/Budgetary/Allotment/updateView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION ALLOTMENT ENROLL ROUTER
    // {
    //   path: '/detailsAllotment',
    //   name: 'Allotment Enroll',
    //   component: () => import('../views/Budgetary/Allotment/detailsAllotment.vue')
    // },
    // BUDGET ACCOUNT TRANSACTION ALLOTMENT ENROLL ROUTER
    {
      path: "/Allotment-Enroll",
      name: "Allotment Enroll",
      component: () => import("../views/Budgetary/Allotment/enrollView.vue"),
    },

    // BUDGET ACCOUNT TRANSACTION ALLOTMENT LIST ROUTER
    {
      path: "/List-of-Allotment",
      name: "Allotment List",
      component: () => import("../views/Budgetary/Allotment/listView.vue"),
    },

    // BUDGET ACCOUNT TRANSACTION FOR PROCESS ROUTER
    {
      path: "/For-Process",
      name: "For Process",
      component: () => import("../views/Budgetary/Obligation/forprocess.vue"),
    },

    // BUDGET ACCOUNT TRANSACTION FOR OBLIGATION LIST ROUTER
    {
      path: "/List-of-Obligations",
      name: "Obligation List",
      component: () => import("../views/Budgetary/Obligation/listView.vue"),
    },

    // BUDGET ACCOUNT TRANSACTION FOR OBLIGATION LIST ROUTER
    {
      path: "/Adjustment-of-Obligations",
      name: "Obligation Adjustment",
      component: () =>
        import("../views/Budgetary/Obligation/adjustmentView.vue"),
    },

    // BUDGET ACCOUNT TRANSACTION REPORTS ROUTER
    {
      path: "/Pre-Closing-SAAOB-Reports",
      name: "Pre-Closing SAAOB",
      component: () => import("../views/Budgetary/Reports/SAAOBView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION REPORTS ROUTER
    {
      path: "/Pre-Closing-SBU-Reports",
      name: "Pre-Closing SBU",
      component: () => import("../views/Budgetary/Reports/SBUView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION REPORTS ROUTER
    {
      path: "/Pre-Closing-SPPAI-Reports",
      name: "Pre-Closing SPPAI",
      component: () => import("../views/Budgetary/Reports/SPPAIView.vue"),
    },
    // BUDGET ACCOUNT TRANSACTION REPORTS ROUTER
    {
      path: "/Pre-Closing-RAOO-Reports",
      name: "Pre-Closing RAOO",
      component: () => import("../views/Budgetary/Reports/RAOOView.vue"),
    },
    // DOCUMENT MANAGEMENT ROUTER
    {
      path: "/Document",
      name: "Document",
      component: () => import("../views/Document/DocumentSelection.vue"),
    },
    {
      path: "/Incoming",
      name: "Document Incoming",
      component: () => import("../views/Document/Incoming/IncomingView.vue"),
    },
    {
      path: "/Document-Incoming-PreAudit",
      name: "Document Incoming PreAudit",
      component: () =>
        import("../views/Document/Incoming/PreAudit/MainView.vue"),
    },
    {
      path: "/Document-Incoming-Contracts",
      name: "Document Incoming Contracts",
      component: () =>
        import("../views/Document/Incoming/Contracts/MainView.vue"),
    },
    // processor
    {
      path: "/Document-Incoming-Contracts-Processor",
      name: "Document Incoming Contracts Processor",
      component: () =>
        import("../views/Document/Incoming/Contracts/ProcessorView.vue"),
    },
    {
      path: "/Document-Incoming-Payment-Transaction",
      name: "Document Incoming Payment Transaction",
      component: () =>
        import("../views/Document/Incoming/PaymentTrans/MainView.vue"),
    },
    {
      path: "/Document-Incoming-Check-Transaction",
      name: "Document Incoming Check Transaction",
      component: () =>
        import("../views/Document/Incoming/CheckTrans/MainView.vue"),
    },
    {
      path: "/Document-Incoming-Communication-Receiving",
      name: "Document Incoming Communication Receive",
      component: () =>
        import("../views/Document/Incoming/Communication/MainView.vue"),
    },
    {
      path: "/Document-Incoming-Communication-Create",
      name: "Document Incoming Communication Create",
      component: () =>
        import("../views/Document/Incoming/Communication/CreateView.vue"),
    },
    {
      path: "/Document-Incoming-More-Payroll",
      name: "Document Incoming Payroll",
      component: () =>
        import("../views/Document/Incoming/Payrolls/MainView.vue"),
    },
    {
      path: "/Document-Incoming-More-RCD",
      name: "Document Incoming RCD",
      component: () => import("../views/Document/Incoming/RCD/MainView.vue"),
    },
    {
      path: "/Document-Incoming-More-Others",
      name: "Document Incoming Others",
      component: () => import("../views/Document/Incoming/Others/MainView.vue"),
    },
    // USER ROLES FOR DOCUMENT COMMUNICATION
    {
      path: "/Document-Incoming-Communication-City-Accountant",
      name: "Document Incoming Communication City Accountant",
      component: () => import("../views/Document/AccountantView.vue"),
    },
    {
      path: "/Document-Incoming-Payroll-City-Accountant",
      name: "Document Incoming Payroll City Accountant",
      component: () =>
        import("../views/Document/Incoming/Payrolls/AccountantView.vue"),
    },
    {
      path: "/Document-Incoming-RCD-City-Accountant",
      name: "Document Incoming RCD City Accountant",
      component: () =>
        import("../views/Document/Incoming/RCD/AccountantView.vue"),
    },
    {
      path: "/Document-Incoming-Communication-Reviewer",
      name: "Document Incoming Communication Reviewer",
      component: () => import("../views/Document/ReviewerView.vue"),
    },
    {
      path: "/Document-Incoming-Payroll-Reviewer",
      name: "Document Incoming Payroll Reviewer",
      component: () =>
        import("../views/Document/Incoming/Payrolls/ReviewerView.vue"),
    },
    {
      path: "/Document-Incoming-RCD-Reviewer",
      name: "Document Incoming RCD Reviewer",
      component: () =>
        import("../views/Document/Incoming/RCD/ReviewerView.vue"),
    },
    {
      path: "/Document-Incoming-Communication-Approver",
      name: "Document Incoming Communication Approver",
      component: () => import("../views/Document/ApproverView.vue"),
    },
    {
      path: "/Document-Incoming-Payroll-Approver",
      name: "Document Incoming Payroll Approver",
      component: () =>
        import("../views/Document/Incoming/Payrolls/ApproverView.vue"),
    },
    {
      path: "/Document-Incoming-RCD-Approver",
      name: "Document Incoming RCD Approver",
      component: () =>
        import("../views/Document/Incoming/RCD/ApproverView.vue"),
    },
    {
      path: "/Document-Incoming-Payroll-Processor",
      name: "Document Incoming Payroll Processor",
      component: () =>
        import("../views/Document/Incoming/Payrolls/ProcessorView.vue"),
    },
    {
      path: "/Outgoing",
      name: "Document Outgoing",
      component: () => import("../views/Document/Outgoing/OutgoingView.vue"),
    },
    //PAYEE ENROLLMENT
    {
      path: "/Document-PayeeEnrollment",
      name: "Document PayeeEnrollment",
      component: () => import("../views/Document/PayeeEnrollment/Index.vue"),
    },
    {
      path: "/Document-PayeeEnrollment-Approved",
      name: "Document PayeeEnrollment List Approved",
      component: () => import("../views/Document/PayeeEnrollment/listApproved.vue"),
    },

    // CHART OF ACCOUNTS ROUTER
    {
      path: "/Charts-Account",
      name: "ChartsLanding",
      component: () => import("../views/Chart/LandingSelection.vue"),
    },
    {
      path: "/Charts-Accounts",
      name: "Charts",
      component: () => import("../views/Chart/ChartsSelection.vue"),
    },
    // CHART OF ACCOUNTS PREV
    {
      path: "/Charts-Accounts",
      name: "Charts-prev",
      component: () => import("../views/Chart/LandingSelectionPrev.vue"),
    },
    {
      path: "/Charts-Accounts-Assets",
      name: "AssetsPrev",
      component: () => import("../views/Chart/Prev/AssetViewPre.vue"),
    },
    {
      path: "/Charts-Accounts-Liabilities",
      name: "LiabilitiesPrev",
      component: () => import("../views/Chart/Prev/LiabilityViewPre.vue"),
    },
    {
      path: "/Charts-Accounts-Equity",
      name: "EquityPrev",
      component: () => import("../views/Chart/Prev/EquityViewPre.vue"),
    },
    {
      path: "/Charts-Accounts-Income",
      name: "IncomePrev",
      component: () => import("../views/Chart/Prev/IncomeViewPre.vue"),
    },
    {
      path: "/Charts-Accounts-Expense",
      name: "ExpensePrev",
      component: () => import("../views/Chart/Prev/ExpenseViewPre.vue"),
    },
    // CHART OF ACCOUNTS NEW
    {
      path: "/Charts-Accounts-new",
      name: "Charts-new",
      component: () => import("../views/Chart/LandingSelectionNew.vue"),
    },
    {
      path: "/Charts-Accounts-Approval-Assets",
      name: "Charts-asset-approval",
      component: () => import("../views/Chart/New/AssetViewNew.vue"),
    },
    {
      path: "/Charts-Accounts-Approval-Liabilities",
      name: "Charts-liability-approval",
      component: () => import("../views/Chart/New/LiabilityViewNew.vue"),
    },
    {
      path: "/Charts-Accounts-Approval-Equity",
      name: "Charts-equity-approval",
      component: () => import("../views/Chart/New/EquityViewNew.vue"),
    },
    {
      path: "/Charts-Accounts-Approval-Income",
      name: "Charts-income-approval",
      component: () => import("../views/Chart/New/IncomeViewNew.vue"),
    },
    {
      path: "/Charts-Accounts-Approval-Expense",
      name: "Charts-expense-approval",
      component: () => import("../views/Chart/New/ExpenseViewNew.vue"),
    },
    // // TRY TABLE AND PROPS
    // {
    //   path: '/Charts-Account-Sample',
    //   name: 'Charts',
    //   component: () => import('../views/Chart/SampleChart.vue'),
    // },
    {
      path: "/Charts-Account-Assets",
      name: "ChartsAssets",
      component: () => import("../views/Chart/AssetView.vue"),
    },
    {
      path: "/Charts-Account-Liabilities",
      name: "Charts Liabilities",
      component: () => import("../views/Chart/LiabilityView.vue"),
    },
    {
      path: "/Charts-Account-Equity",
      name: "Charts Equity",
      component: () => import("../views/Chart/EquityView.vue"),
    },
    {
      path: "/Charts-Account-Income",
      name: "Charts Income",
      component: () => import("../views/Chart/IncomeView.vue"),
    },
    {
      path: "/Charts-Account-Expenses",
      name: "Charts Expenses",
      component: () => import("../views/Chart/ExpenseView.vue"),
    },

    {
      path: "/Not-Found",
      name: "404 Not Found",
      component: () => import("../views/Error/404.vue"),
    },
    //added by joe
    //TRUSTFUND PROCESSOR
    {
      path: "/Budget-Management",
      name: "Budget Management",
      component: () => import("../views/TrustFundProcessor/LandingPage.vue"),
    },
    {
      path: "/budget-management/trust-fund",
      name: "Trust Fund Information",
      component: () => import("../views/TrustFundProcessor/BMMain.vue"),
    },
    {
      path: "/budget-management/trust-fund/new-tr",
      name: "Enroll New Trust Receipts",
      component: () => import("../views/TrustFundProcessor/EnrollNewTR.vue"),
    },
    {
      path: "/budget-management/trust-fund/update-tr",
      name: "Update Trust Receipts",
      component: () => import("../views/TrustFundProcessor/UpdateTR.vue"),
    },
    {
      path: "/budget-management/trust-fund/tr-onprocess",
      name: "List of Trust Receipts on Process",
      component: () => import("../views/TrustFundProcessor/ListTRProcess.vue"),
    },
    {
      path: "/budget-management/trust-fund/tr-approved",
      name: "List of Approved Process",
      component: () =>
        import("../views/TrustFundProcessor/ListApprovedProcess.vue"),
    },
    {
      path: "/budget-management/trust-fund/furs-onprocess",
      name: "List of FURS on Process",
      component: () =>
        import("../views/TrustFundProcessor/ListFURSonProcess.vue"),
    },
    {
      path: "/budget-management/trust-fund/furs-approved",
      name: "List of FURS Approved",
      component: () =>
        import("../views/TrustFundProcessor/ListFURSApproved.vue"),
    },
    {
      path: "/budget-management/trust-fund/adjustment-obligation",
      name: "Adjustment of Obligation",
      component: () =>
        import("../views/TrustFundProcessor/AdjustmentObligation.vue"),
    },
    {
      path: "/budget-management/trust-fund/registries",
      name: "Registries of Trust Receipts and Obligation",
      component: () =>
        import("../views/TrustFundProcessor/RegistriesOfTROblig.vue"),
    },
    {
      path: "/budget-management/trust-fund/statements",
      name: "Statement of Trust Receipts, Obligations, and Balance",
      component: () =>
        import("../views/TrustFundProcessor/StatementOfTRObligBal.vue"),
    },

    {
      path: "/budgetary-obligation-transaction",
      name: "Budgetary Obligation Transaction",
      component: () =>
        import(
          "../views/Document/Incoming/budgetTrans/BudgetaryObligationTransactions.vue"
        ),
    },
    // outgoing

    {
      path: "/budgetary-obligation-transaction-outgoing",
      name: "Budgetary Obligation Transaction Outgoing",
      component: () =>
        import(
          "../views/Document/Outgoing/budgetTrans/BudgetaryObligationTransactions.vue"
        ),
    },
    {
      path: "/Document-Outgoing-Contracts",
      name: "Document Outgoing Contracts",
      component: () =>
        import("../views/Document/Outgoing/Contracts/MainView.vue"),
    },
    {
      path: "/Document-Outgoing-PreAudit",
      name: "Document Outgoing PreAudit",
      component: () =>
        import("../views/Document/Outgoing/PreAudit/MainView.vue"),
    },
    {
      path: "/Document-Outgoing-Payment-Transaction",
      name: "Document Outgoing Payment Transaction",
      component: () =>
        import("../views/Document/Outgoing/PaymentTrans/MainView.vue"),
    },
    {
      path: "/Document-Outgoing-Check-Transaction",
      name: "Document Outgoing Check Transaction",
      component: () =>
        import("../views/Document/Outgoing/CheckTrans/MainView.vue"),
    },
    {
      path: "/Document-Outgoing-Communications",
      name: "Document Outgoing Communications",
      component: () =>
        import("../views/Document/Outgoing/Communication/Communications.vue"),
    },
    {
      path: "/Document-Outgoing-Communications",
      name: "Document Outgoing Communications Dashboard",
      component: () =>
        import("../views/Document/Outgoing/Communication/OutgoingDashboard.vue"),
    },
    {
      path: "/Document-Outgoing-Payroll-Appointment",
      name: "Document Outgoing Payroll Appointment",
      component: () =>
        import("../views/Document/Outgoing/Payrolls/MainView.vue"),
    },
    {
      path: "/Document-Outgoing-More-RCD",
      name: "Document Outgoing RCD",
      component: () => import("../views/Document/Outgoing/RCD/MainView.vue"),
    },
    {
      path: "/Document-Outgoing-More-Others",
      name: "Document Outgoing Others",
      component: () => import("../views/Document/Outgoing/Others/MainView.vue"),
    },
    // Processing of Claims and Internal Control Management
    {
      path: "/PCICM",
      name: "Processing of Claims and Internal Control Management",
      component: () => import("../views/PCICM/LandingPage.vue"),
    },
    // City Accountant Contracts View
    {
      path: "/PCICM/CityAccountant",
      name: "City Accountant Contracts",
      component: () => import("../views/PCICM/Contracts/CityAccView.vue"),
    },
    // Division Head Contracts View
    {
      path: "/PCICM/DivisionHead",
      name: "Division Head Contracts",
      component: () => import("../views/PCICM/Contracts/DivHeadView.vue"),
    },
    // Assitant Department Head Contracts View
    {
      path: "/PCICM/AsstDeptHead",
      name: "Assistant Department Head Contracts",
      component: () => import("../views/PCICM/Contracts/AsstDeptHead.vue"),
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }

    // NEW ROUTES STARTS HERE
    // TRUST-FUNDS REVIEWER ROUTES
    {
      path: "/Budget-Management/Trust-Funds/List-TR-Process",
      name: "List of Trust Receipts on Process",
      component: () => import("../views/TrustFundProcessor/reviewer/ListTRProcess.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/List-TR-Process-Review",
      name: "List of Trust Receipts on Process - Review",
      component: () => import("../views/TrustFundProcessor/reviewer/Review.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/List-Approved-Process",
      name: "List of Approved Process",
      component: () => import("../views/TrustFundProcessor/reviewer/ListApproveProcess.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/Update-Trust-Receipts",
      name: "Update Trust Receipts",
      component: () => import("../views/TrustFundProcessor/reviewer/UpdateTR.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/List-FURS-Process",
      name: "List of FURS Process",
      component: () => import("../views/TrustFundProcessor/reviewer/ListFURSProcess.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/List-FURS-Process-Review",
      name: "List of FURS on Process - Review",
      component: () => import("../views/TrustFundProcessor/reviewer/FURSReview.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/List-Approved-FURS",
      name: "List of Approved FURS",
      component: () => import("../views/TrustFundProcessor/reviewer/ListApproveFURS.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/Reports-STROB",
      name: "Reports STROB",
      component: () => import("../views/TrustFundProcessor/reviewer/STROB.vue"),
    },
    {
      path: "/Budget-Management/Trust-Funds/Reports-RTRO",
      name: "Reports RTRO",
      component: () => import("../views/TrustFundProcessor/reviewer/RTRO.vue"),
    },
    {
      path: "/Document-Management/Reports/Communication",
      name: "Communication Dashboard Reports",
      component: () => import("../views/Document/Reports/ReportsView.vue"),
    },
    {
      path: "/Document-Management/Reports/Communication",
      name: "Communication Dashboard View",
      component: () => import("../views/Document/Reports/PrintView.vue"),
    },
    {
      path: "/Allotment-Update-Details",
      name: "Allotment Update Details",
      component: () => import("../views/Budgetary/Allotment/updateDetails.vue"),
    },
    {
      path: "/Obligation-For-Process-Details",
      name: "Obligation for Process CAFOA",
      component: () => import("../views/Budgetary/Obligation/CAFOA.vue"),
    },
    {
      path: "/Obligation-Update-Adjustment",
      name: "Obligation for update Adjustment",
      component: () => import("../views/Budgetary/Obligation/updateAdjustment.vue"),
    },
    {
      path: "/Obligation-Update-Cafoa",
      name: "Obligation for update CAFOA",
      component: () => import("../views/Budgetary/Obligation/updateCafoa.vue"),
    },
    {
      path: "/Details-Obligation-Acitvity",
      name: "Details of Obligation for Activity",
      component: () => import("../views/Budgetary/Obligation/Details.vue"),
    },
    {
      path: "/Updated-Registry-Obligation",
      name: "Updated Registry of Obligation",
      component: () => import("../views/Budgetary/Obligation/Registry.vue"),
    },

    // EXECUTIVE FUNDS ROUTES
    {
      path: "/Budget-Management/Executive-Funds/Dashboard",
      name: "Dashboard Executive Funds",
      component: () => import("../views/Budgetary/Reviewer/dashboard.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/A&CA-Dashboard",
      name: "Dashboard Executive Funds - Approver&CA",
      component: () => import("../views/Budgetary/Approver&CA/dashboard.vue"),
    },

    {
      path: "/Budget-Management/Executive-Funds/Enroll-Dashboard",
      name: "Enroll/New Dashboard Reviewer",
      component: () => import("../views/Budgetary/Reviewer/Appropriation/enrollView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Approver&CA-Enroll-Dashboard",
      name: "Enroll/New Dashboard - Approver&CA",
      component: () => import("../views/Budgetary/Approver&CA/Appropriation/enrollView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Details-Approval",
      name: "Details for Approval Appropriation - Reviewer",
      component: () => import("../views/Budgetary/Reviewer/Appropriation/details.vue"),
    },

    {
      path: "/Budget-Management/Executive-Funds/Update-Dashboard",
      name: "Update Dashboard Reviewer",
      component: () => import("../views/Budgetary/Reviewer/Appropriation/updateView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Approver&CA-Update-Dashboard",
      name: "Update Dashboard - Approver&CA",
      component: () => import("../views/Budgetary/Approver&CA/Appropriation/updateView.vue"),
    },

    {
      path: "/Budget-Management/Executive-Funds/Allotment-Enroll-Dashboard",
      name: "Enroll/New Allotment Dashboard Reviewer",
      component: () => import("../views/Budgetary/Reviewer/Allotment/enrollView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Allotment-Update-Dashboard",
      name: "Update Allotment Dashboard Reviewer",
      component: () => import("../views/Budgetary/Reviewer/Allotment/updateView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Appropriation-Update-Details-Approval",
      name: "Update Details Approval Appropriations",
      component: () => import("../views/Budgetary/Reviewer/Appropriation/update.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Allotment-Details-Approval",
      name: "Allotment Details Approval",
      component: () => import("../views/Budgetary/Reviewer/Allotment/details.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/List-Appropriation",
      name: "List of the Approved Appropriation",
      component: () => import("../views/Budgetary/Reviewer/Appropriation/list.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/List-Allotment",
      name: "List of the Approved Allotment",
      component: () => import("../views/Budgetary/Reviewer/Allotment/list.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Allotment-Enroll-Approval",
      name: "Allotment Enroll Approval",
      component: () => import("../views/Budgetary/Approver&CA/Allotment/enrollView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Allotment-Update-Approval",
      name: "Allotment Update Approval",
      component: () => import("../views/Budgetary/Approver&CA/Allotment/updateView.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/For-Review-Obligation-New",
      name: "For Review Obligation New",
      component: () => import("../views/Budgetary/Reviewer/Obligation/new.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/For-Review-Obligation-Update",
      name: "For Review Obligation Update",
      component: () => import("../views/Budgetary/Reviewer/Obligation/update.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/For-Assignment-Obligation",
      name: "For Assignment Obligation",
      component: () => import("../views/Budgetary/Approver&CA/Obligation/assignment.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/For-Review-Obligation",
      name: "For Review - DH",
      component: () => import("../views/Budgetary/Approver&CA/Obligation/review.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/For-Process-Obligation",
      name: "For Process - DH",
      component: () => import("../views/Budgetary/Approver&CA/Obligation/process.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Obligation-Details-Approval",
      name: "Obligation Details Approval",
      component: () => import("../views/Budgetary/Reviewer/Obligation/details.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/Obligation-Details-Update-Approval",
      name: "Obligation Details Update Approval",
      component: () => import("../views/Budgetary/Reviewer/Obligation/detailsUpdate.vue"),
    },
    {
      path: "/Budget-Management/Executive-Funds/List-Obligation",
      name: "List of Obligation for Process",
      component: () => import("../views/Budgetary/Reviewer/Obligation/list.vue"),
    },
  ],
});


export default router;
