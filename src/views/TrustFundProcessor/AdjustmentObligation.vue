<script setup>
import HeaderBar from "../../components/TRComponents/headerComponent/HeaderComponent.vue";
import NavBar from "../../components/TRComponents/navComponents/NavComponent.vue";
import { ref } from "vue";
import Textbox from "../../components/TRComponents/reusableComponents/Textbox.vue";
import SearchboxVue from "../../components/TRComponents/reusableComponents/Searchbox.vue";
import TableVue from "../../components/TRComponents/AdjustmentObligation/adjustmentobligtable.vue";
const purposeCount = ref(2);
const STRDrop = [
  "Donation from Private Sector",
  "Unexpended Balance of LDRRMF",
  "Transfer from Other Government Agencies",
  "LGU Counterpart Contribution for Specific Projects",
];
var StrOption = ref("Donation from Private Sector");
</script>

<template>
  <!--header and navigation bar-->
  <div class="sticky top-0 left-0 z-50">
    <HeaderBar :pagetitle="'Budgetary Account Transaction'" />
    <NavBar :navbartitle="'Trust Funds'" />
  </div>

  <div class="container min-w-full px-0">
    <div class="mx-[69px] mt-[21px] bg-white">
      <!--title and search-->
      <div class="mx-[42px]">
        <div
          class="items-center flex-col lg:flex-row flex w-full justify-between"
        >
          <div class="font-bold text-[24px] leading-[27px]">Update FURS</div>
          <div class="flex-col md:flex-row flex items-center gap-x-[54px]">
            <div class="font-semibold text-sm">Search FURS Number:</div>
            <div class="w-full lg:w-[400px] h-32 relative">
              <SearchboxVue />
            </div>
          </div>
        </div>
      </div>
      <!--GRID1-->
      <div v-for="(listarr, listkey) in list" :key="listkey">
        <div
          class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
          v-for="(listval, listarrkey) in listarr"
          :key="listarrkey"
        >
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Implementing Office:</div>
            <div class="h-32 relative">
              <input
                type="text"
                class="bg-[initial] texst-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="listval.department_id"
              />
            </div>
          </div>
          <div
            class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2"
          >
            <div class="font-semibold text-sm">FURS Number:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="listval.furstNumber"
              />
            </div>
          </div>
          <div
            class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center"
          >
            <div class="font-semibold text-sm">Particulars:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="listval.description"
              />
            </div>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Type of Transactions:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="listval.type"
              />
            </div>
          </div>
          <div
            class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2"
          >
            <div class="font-semibold text-sm">FURS Amount</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="listval.amount"
              />
            </div>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Purchase Request No.:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="purchaseRequestNo"
              />
            </div>
          </div>
          <div
            class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2"
          >
            <div class="font-semibold text-sm">Purchase Request Date:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="purchaseRequestDate"
              />
            </div>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Payee:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="payee"
              />
            </div>
          </div>
          <div
            class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2"
          >
            <div class="font-semibold text-sm">Requesting Official:</div>
            <div class="h-32 relative">
              <!-- <Textbox :placeholder="'edit placeholder'" /> -->
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="requestingOfficial"
              />
            </div>
          </div>
        </div>
      </div>
      <!--GRID 2-->
      <div
        class="py-[17px] outline outline-[6px] outline-[#ffecb3] rounded-[24px] shadow-[0px_2px_10px_0px_#00000040] grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
        v-for="(listarr, listkey) in list.list"
        :key="listkey"
      >
        <div v-if="listkey !== subcount">
          <div
            class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center"
          >
            <div
              class="font-bold text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] after:flex-[1] after:border-b-[1px]"
            >
              Details of Source of Fund
            </div>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Source of Trust Receipts:</div>

            <!-- <Dropdown /> -->
            <select v-model="sourceOfTrustReceipts">
              <option value="" disabled selected>
                Select Type of Government
              </option>
              <option value="2">Donation from Private Sector</option>
              <option value="3">Unexpended Balance of LDRRMF</option>
              <option value="1">Transfer from Other Government Agencies</option>
              <option value="4">
                LGU Counterpart Contribution for Specific Projects
              </option>
            </select>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Company / Agency Name:</div>

            <select
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            >
              <option value="" disabled selected>
                Select a Department/Office
              </option>
              <option
                v-for="deptOption in deptOptions"
                :key="deptOption.department_code"
                :value="deptOption.department_code"
              >
                {{ deptOption.department_name }}
              </option>
            </select>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Main Fund Title:</div>
            <!-- <div class="h-32 relative"> -->
            <!-- <Textbox :placeholder="'Select Sub Fund Title'" /> -->
            <!-- <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="mainFundTitle"
              />
            </div> -->
            <div class=" ">
              <!-- <Dropdown /> -->
              <select v-if="sourceOfTrustReceipts == 0">
                <option selected disabled>Main Fund Title</option>
              </select>
              <select
                v-if="sourceOfTrustReceipts == 1"
                v-model="selectedMainFundTitle"
              >
                <option selected disabled>Main Fund Title</option>
                <option v-for="title in this.selectedSource1">
                  {{ title }}
                </option>
              </select>
              <select
                v-if="sourceOfTrustReceipts == 2"
                v-model="selectedMainFundTitle"
              >
                <option selected disabled>Main Fund Title</option>
                <option v-for="title in this.selectedSource2">
                  {{ title }}
                </option>
              </select>
              <select
                v-if="sourceOfTrustReceipts == 3"
                v-model="selectedMainFundTitle"
              >
                <option selected disabled>Main Fund Title</option>
                <option v-for="title in this.selectedSource3">
                  {{ title }}
                </option>
              </select>
              <select
                v-if="sourceOfTrustReceipts == 4"
                v-model="selectedMainFundTitle"
              >
                <option selected disabled>Main Fund Title</option>
                <option v-for="title in this.selectedSource4">
                  {{ title }}
                </option>
              </select>
            </div>
          </div>
          <div class="grid lg:grid-cols-[194px_auto] items-center">
            <div class="font-semibold text-sm">Sub Fund Title:</div>
            <div class="">
              <!-- <Textbox :placeholder="'Select Amount Allocated'" /> -->
              <!-- <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="subFundTitle"
              /> -->
              <select v-model="selectedMainFundTitle">
                <option selected disabled>Main Fund Title</option>
                <option v-for="title in this.selectedSource4">
                  {{ title }}
                </option>
              </select>
            </div>
          </div>

          <div class="md:col-span-2">
            <TableVue />
          </div>
          <div class="md:col-span-2 flex justify-center gap-x-[26px]">
            <button class="h-42 px-[26px] bg-dashboardBtn3 rounded-[5px]">
              SAVE
            </button>
            <button
              class="h-42 px-[26px] text-white bg-danger-color rounded-[5px]"
            >
              CANCEL
            </button>
          </div>
        </div>
        <!--button to add purpose div-->
        <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
          <div
            class="font-normal text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] italic after:flex-[1] after:border-b-[1px]"
          >
            <button
              class="font-normal text-[14px] leading-[24px] px-[10px] py-[3.5px] bg-[#ffecb3] italic rounded-md"
              @click="loopSubcount"
            >
              + Add more Purpose
            </button>
          </div>
        </div>
      </div>
      <div
        v-if="StrOption == STRDrop[1]"
        class="mt-[18px] font-normal text-sm col-span-2 flex items-center before:flex-grow before:border-b-[1px] after:flex-[1] after:border-b-[1px]"
      >
        <button
          class="px-[10px] py-[8px] bg-[#ffecb3] italic rounded-md"
          @click="loopMaincount"
        >
          + Add more Main Fund Title
        </button>
      </div>
      <div class="my-[25px] gap-x-[27px] flex px-[41px]">
        <button
          class="px-[26px] h-42 border rounded-[5px] bg-button-blue text-white"
        >
          FOR REVIEW
        </button>
        <!-- <button class=" px-[26px] h-42 border rounded-[5px] bg-danger-color text-white">
                    CANCEL
                </button> -->
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import DeptAPI from "../../api_request/documentManagement/departmentDrop";
export default {
  data() {
    return {
      list: [],
      subcount: 1,
      maincount: 1,
      deptOptions: [],
      sourceOfTrustReceipts: "",
      selectedMainFundTitle: "",
    };
  },
  methods: {
    loopSubcount() {
      this.subcount++;
    },
    loopMaincount() {
      this.maincount++;
    },
  },
  // async created() {
  //   await axios.post("trustfunds/updateObli").then((res) => {
  //     this.list = res.data;
  //   });
  // },
  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });
  },
};
</script>
