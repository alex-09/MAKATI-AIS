<script>
import showAssetAPI from "../../api_request/chartAccounts/current/asset";
import PendingView from "./pending/pendingTable.vue";
import PendingApprovalView from "./pending/pendingApprovalTable.vue";
import TableView from "./table/tableView.vue";

import axios from "axios";
import Swal from "sweetalert2";

export default {
  name: "App",
  components: {
    PendingView,
    TableView,
    PendingApprovalView,
  },
  data() {
    return {
      account_group: "01",
      major_account_group: "",
      sub_major_account_group: "",
      general_ledger_accounts: "",
      sub_ledger_accounts: "",
      sub_sub_ledger_accounts: "",
      account_title: "",
      description: "",
      date_effectivity: "",
      accounts: [],
      currentDate: null,
      coa_title: null,
      userRole: "",
      userDetails: '',
      userPosition: '',
      userDivision: '',

      showAdd: false,
    };
  },
  mounted() {
    // const userRole = this.$route.params.userRole;
    this.userRole = this.$route.params.userRole;
  },
  methods: {
    showAddAccount() {
        this.showAdd = !this.showAdd;
    },
    // LILIPAT YUNG FOCUS SA KASUNOD NA INPUT FIELDS
    focusNextOncePopulated(event, max) {
      if (event.target.value.length === max) {
        const nextElement =
          this.$refs?.[`input-${Number(event.target.dataset.index) + 1}`];
        if (nextElement) nextElement.focus();
      }
    },
    // ETO YUNG VALIDATION NA ONLY NUMBERS LANG TATANGGAPIN SA INPUT FIELDS
    validateNumber(event, field) {
      const regex = /^[0-9]*$/; // regex pattern to only allow numbers
      if (!regex.test(event.target.value)) {
        event.target.value = event.target.value.replace(/[^\d]/g, ""); // remove any non-numeric characters
        this[field] = event.target.value; // update the data property
      } else {
        this[field] = event.target.value; // update the data property if input is valid
      }
    },
    // // CREATE FUNCTION FOR ACCOUNT
    async createAccount() {
      try {
        // API REQUEST TO CHECK IF THE ACCOUNT CODE IS EXISTING
        const response = await axios.get(
          "coa/showAssets"
        );
        const existingAccounts = response.data.list;
        const currentYear = response.data.date;
        const accountCodeExists = existingAccounts.some(
          (account) => account.account_code === this.account_code
        );
        if (accountCodeExists) {
          await Swal.fire({
            text: "The account code already exists.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M43.45 43.45H35.55V19.75H43.45M43.45 59.25H35.55V51.35H43.45M39.5 0C34.3128 0 29.1764 1.0217 24.384 3.00676C19.5916 4.99182 15.2372 7.90137 11.5693 11.5693C4.16159 18.977 0 29.0239 0 39.5C0 49.9761 4.16159 60.023 11.5693 67.4307C15.2372 71.0986 19.5916 74.0082 24.384 75.9932C29.1764 77.9783 34.3128 79 39.5 79C49.9761 79 60.023 74.8384 67.4307 67.4307C74.8384 60.023 79 49.9761 79 39.5C79 34.3128 77.9783 29.1764 75.9932 24.384C74.0082 19.5916 71.0986 15.2372 67.4307 11.5693C63.7628 7.90137 59.4084 4.99182 54.616 3.00676C49.8236 1.0217 44.6872 0 39.5 0Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The account code already exists.</span></div></div>',
            confirmButtonText: "OK",
            customClass: {
              container: "flex flex-col-reverse sm:flex-row",
              confirmButton:
                "ml-auto mx-2 mb-2 sm:mb-0 sm:ml-2 text-white font-bold py-2 px-4 rounded uppercase bg-primary-color",
              cancelButton:
                "mb-2 mx-2 sm:mb-0 text-white font-bold py-2 px-4 rounded uppercase bg-danger-color",
            },
            buttonsStyling: false,
          });
          return;
        }
        const newAccount = {
          account_group: this.account_group,
          major_account_group: this.major_account_group,
          sub_major_account_group: this.sub_major_account_group,
          general_ledger_accounts: this.general_ledger_accounts,
          sub_ledger_accounts: this.sub_ledger_accounts,
          sub_sub_ledger_accounts: this.sub_sub_ledger_accounts,
          account_title: this.account_title,
          account_code: this.account_code,
          description: this.description,
          date_effectivity: response.data.date[0]["date_effectivity"],
          coa_title: response.data.list[0]["coa_title"],
        };
        // API REQUEST FOR CREATE OF ACCOUNT
        const createResponse = await axios.post(
          "coa/enrollAssets",
          newAccount
        );
        console.log(createResponse.data);
        await Swal.fire({
          text: "Your entry has been successfully added. The account has been subject to Approval.",
          html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Your entry has been successfully added. The account has been subject to Approval.</span></div></div>',
          showConfirmButton: false,
          timer: 1500,
        });
        window.location.reload();
      } catch (error) {
        console.error(error);
      }
    },
    // API REQUEST TO ABLE TO VIEW THE PENDING ACCOUNTS
    async getAccount() {
      const api = showAssetAPI();
      await api.getAccount();
    },
  },
  computed: {
    account_code() {
      return `${this.account_group}-${this.major_account_group}-${this.sub_major_account_group}-${this.general_ledger_accounts}-${this.sub_ledger_accounts}-${this.sub_sub_ledger_accounts}`;
    },
  },
  async created() {
      const response = await axios.get('me');


        this.userDetails = response.data.user.userdesignation
        this.userPosition = response.data.user.position
        this.userDivision = response.data.user.division
        console.log(response.data.user.position);
    }
};
</script>

<template>
  <TableView />
  <div class="container my-4">
    <div class="my-4 flex flex-row gap-4 cursor-pointer 1536:w-[250px]" @click="showAddAccount">
      <p class="text-2xl uppercase font-bold text-primary-color">add account</p>
      <div v-if="!showAdd" class="flex justify-center items-center">
        <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.5 20.5417C17.3563 20.5423 17.2139 20.5151 17.0812 20.4616C16.9484 20.4081 16.8281 20.3293 16.7271 20.23L11.6667 15.2717C11.5334 15.072 11.473 14.8346 11.4951 14.5976C11.5173 14.3606 11.6207 14.1377 11.7888 13.9646C11.9569 13.7914 12.18 13.6782 12.4223 13.6429C12.6646 13.6076 12.912 13.6524 13.125 13.77L17.5 18.02L21.875 13.77C22.088 13.6524 22.3354 13.6076 22.5777 13.6429C22.82 13.6782 23.0431 13.7914 23.2112 13.9646C23.3793 14.1377 23.4827 14.3606 23.5049 14.5976C23.527 14.8346 23.4666 15.072 23.3333 15.2717L18.2292 20.23C18.0359 20.4204 17.7751 20.5319 17.5 20.5417Z" fill="#0E4572"/>
        </svg>
      </div>
      <div v-if="showAdd" class="flex justify-center items-center">
        <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.5 13.4583C17.6437 13.4577 17.7861 13.4849 17.9188 13.5384C18.0515 13.5919 18.1719 13.6707 18.2729 13.77L23.3333 18.7283C23.4666 18.928 23.527 19.1654 23.5049 19.4024C23.4827 19.6394 23.3793 19.8623 23.2112 20.0354C23.0431 20.2086 22.82 20.3218 22.5777 20.3571C22.3354 20.3924 22.088 20.3476 21.875 20.23L17.5 15.98L13.125 20.23C12.912 20.3476 12.6646 20.3924 12.4223 20.3571C12.18 20.3218 11.9569 20.2086 11.7888 20.0354C11.6207 19.8623 11.5173 19.6394 11.4951 19.4024C11.473 19.1654 11.5334 18.928 11.6667 18.7283L16.7708 13.77C16.9641 13.5796 17.2249 13.4681 17.5 13.4583Z" fill="#0E4572"/>
        </svg>
      </div>
    </div>
    <input type="date" v-model="date_effectivity" hidden />
    <div v-if="showAdd">
      <div class="grid grid-cols-7 gap-4 justify-center mb-4">
        <div class="grid grid-cols-1 gap-2">
          <span class="text-xs text-center mb-4 font-normal">Account Group</span>
          <input
            type="text"
            class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="account_group"
            v-model="account_group"
            data-index="0"
            ref="input-0"
            @input="
              focusNextOncePopulated($event, 2);
              validateNumber($event, 'account_group');
            "
            placeholder="01"
            readonly
          />
        </div>
        <div class="grid grid-cols-1 gap-2">
          <span class="text-xs text-center mb-4 font-normal"
            >Major Account Group</span
          >
          <input
            type="text"
            class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="major_account_group"
            v-model="major_account_group"
            data-index="1"
            ref="input-1"
            @input="
              focusNextOncePopulated($event, 2);
              validateNumber($event, 'major_account_group');
            "
          />
          <span
            v-if="major_account_group.length > 2"
            class="text-xs text-danger-color text-normal"
            >Maximum length is 2 characters.</span
          >
        </div>
        <div class="grid grid-cols-1 gap-2">
          <span class="text-xs text-center mb-4 font-normal"
            >Sub-Major Account Group</span
          >
          <input
            type="text"
            class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="sub_major_account_group"
            v-model="sub_major_account_group"
            data-index="2"
            ref="input-2"
            @input="
              focusNextOncePopulated($event, 2);
              validateNumber($event, 'sub_major_account_group');
            "
          />
          <span
            v-if="sub_major_account_group.length > 2"
            class="text-xs text-danger-color text-normal"
            >Maximum length is 2 characters.</span
          >
        </div>
        <div class="grid grid-cols-1 gap-2">
          <span class="text-xs text-center mb-4 font-normal"
            >General Ledger Accounts</span
          >
          <input
            type="text"
            class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="general_ledger_accounts"
            v-model="general_ledger_accounts"
            data-index="3"
            ref="input-3"
            @input="
              focusNextOncePopulated($event, 3);
              validateNumber($event, 'general_ledger_accounts');
            "
          />
          <span
            v-if="general_ledger_accounts.length > 3"
            class="text-xs text-danger-color text-normal"
            >Maximum length is 3 characters.</span
          >
        </div>
        <div class="grid grid-cols-1 gap-2">
          <span class="text-xs text-center mb-4 font-normal"
            >Sub-Ledger Accounts</span
          >
          <input
            type="text"
            class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="sub_ledger_accounts"
            v-model="sub_ledger_accounts"
            data-index="4"
            ref="input-4"
            @input="
              focusNextOncePopulated($event, 3);
              validateNumber($event, 'sub_ledger_accounts');
            "
          />
          <span
            v-if="sub_ledger_accounts.length > 3"
            class="text-xs text-danger-color text-normal"
            >Maximum length is 3 characters.</span
          >
        </div>
        <div class="grid grid-cols-1 gap-2">
          <span class="text-xs text-center mb-4 font-normal"
            >Sub-Sub-Ledger Accounts</span
          >
          <input
            type="text"
            class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="sub_sub_ledger_accounts"
            v-model="sub_sub_ledger_accounts"
            data-index="5"
            ref="input-5"
            @input="
              focusNextOncePopulated($event, 3);
              validateNumber($event, 'sub_sub_ledger_accounts');
            "
          />
          <span
            v-if="sub_sub_ledger_accounts.length > 3"
            class="text-xs text-danger-color text-normal"
            >Maximum length is 3 characters.</span
          >
        </div>
        <div class="grid grid-cols-1 justify-items-center items-center">
          <button
            @click="createAccount"
            class="w-100 h-[30px] bg-dashboardBtn9 uppercase rounded text-base font-semibold"
          >
            Add
          </button>
        </div>
      </div>
      <div class="grid grid-cols-7 gap-4 justify-center mt-4">
        <div class="col-span-4">
          <div class="grid grid-cols-1">
            <span class="text-xs text-center mb-4 font-normal"
              >Account Title</span
            >
            <input
              type="text"
              class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              id="account_title"
              v-model="account_title"
              required
            />
          </div>
        </div>
        <div class="col-span-3">
          <div class="grid grid-cols-1">
            <span class="text-xs text-center mb-4 font-normal">Account Code</span>
            <input
              type="text"
              class="h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              id="accountCode"
              :value="account_code"
              readonly
            />
          </div>
        </div>
      </div>
      <div class="grid grid-cols-7 gap-4 justify-center mt-4">
        <div class="col-span-7">
          <div class="grid grid-cols-1">
            <span class="text-xs text-center mb-4 font-normal">Description</span>
            <textarea
              class="border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              id="description"
              v-model="description"
              cols="100"
              rows="3"
            >
            </textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div v-if="this.userDetails === 'City Accountant' || this.userPosition === 'Assistant Department Head forFRS'" >
    <PendingView />
  </div>
  <div v-if="this.userPosition === 'Division Head' && this.userDivision === 'Financial Reporting Division' || this.userPosition === 'Processor'">
    <PendingApprovalView />
  </div>
</template>
