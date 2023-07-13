<script>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import Textbox from "../../../components/budgetComponent/allotmentComponent/textbox.vue";
import Dropdown from "../../../components/budgetComponent/allotmentComponent/dropdown.vue";
import TableComponent1 from "../../../components/budgetComponent/appropriationComponents/AppropriationTable1.vue";
import DetailsView from "../../../components/budgetComponent/Update/detailsView.vue";
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
import router from "../../../router";
export default {
  components: {
    Dropdown,
    NavBar,
    HeaderMenu,
    TableComponent1,
    Textbox,
  },
  data() {
    return {
      budYr: [],
      fundSrc: [],
      dprtmnt: [],
      refDoc: [],
      typAppro: [],
      prog: [],
      proj: [],
      act: [],
      exp: [],
      cafoa: [], // cafoa no.

      selectedBudYr: "",
      selectedFundSrc: "",
      selectedDprtmnt: "",
      selectedRefDoc: "",
      selectedTypAppro: "",
      selectedProg: "",
      selectedProj: "",
      selectedAct: "",
      selectedExp: "",
      selectedCafoa: "",

      isVisible: false,
    };
  },
  methods: {
    async getDep() {
      await axios
        .post("obligation/getDepartment", {
          year: this.selectedBudYr,
          fund_source: this.selectedFundSrc,
        })
        .then((res) => {
          this.dprtmnt = res.data.department;
        });
    },
    async getCafoa() {
      await axios.post("obligation/getCafoa").then((res) => {
        this.cafoa = res.data.cafoa;
      });
    },
    async getProg() {
      await axios.post("obligation/getProgram").then((res) => {
        this.prog = res.data.program;
      });
    },
    async search() {
      await axios.post("obligation/adjustObligation", {
        year: this.selectedBudYr,
        cafoa: this.selectedCafoa,
      });
    },
    async updateActivity() {
      await axios
        .post("obligation/reportObligation", {
          year: this.aipact,
          cafoa: this.id,
        })
        .then((res) => {
          router.push({
            path: "/Obligation-Update-Adjustment",
            name: "Obligation for update Adjustment",
            query: { res: JSON.stringify(res.data) },
          });
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.budYr = res.data.Year;
      this.fundSrc = res.data.fundSource;
    });
  },
};
</script>

<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <div class="container min-w-full px-0">
    <div class="mx-[69px] mt-[21px] bg-white">
      <!--title and search-->
      <p class="font-bold text-2xl text-other-blue">
        Adjustment of Obligations
      </p>
      <p class="font-normal text-sm text-text-gray">Details of CAFOA</p>
      <!--GRID1-->
      <div
        class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
      >
        <div class="grid lg:grid-cols-[194px_auto] items-cselectedFundSrcenter">
          <div class="font-semibold text-sm">Budget Year:</div>
          <div class="h-32 relative">
            <!-- <Dropdown :dataArray="budYr" :placeholder="'Budget Year'" /> -->
            <select
              name=""
              id=""
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="selectedBudYr"
              @change="getDep"
            >
              <option value="" selected disabled>Select Budget Year</option>
              <option v-for="by in budYr" :value="by.year">
                {{ by.year }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">Funding Source:</div>
          <div class="h-32 relative">
            <select
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="selectedFundSrc"
              @change="getDep"
            >
              <option value="" selected disabled>Select Budget Year</option>
              <option v-for="fs in fundSrc" :value="fs.fundSource_id">
                {{ fs.fund_Source }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center">
          <div class="font-semibold text-sm">Department Office:</div>
          <div class="h-32 relative">
            <select
              name=""
              id=""
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="selectedDprtmnt"
              @change="getCafoa"
            >
              <option value="" selected disabled>Select Department</option>
              <option
                value=""
                v-for="item in dprtmnt"
                :value="item.department_code"
              >
                {{ item.department_name }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">Type of Transactions:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center">
          <div class="font-semibold text-sm">Processing Slip No.:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">CAFOA Amount</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div
          class="grid md:grid-cols-[194px_auto] w-full md:col-span-2 items-center"
        >
          <div class="font-semibold text-sm">Particulars:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center">
          <div class="font-semibold text-sm">Purchase Request No.:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">Purchase Request Date:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center">
          <div class="font-semibold text-sm">Payee:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">Requesting Official:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center">
          <div class="font-semibold text-sm">CAFOA No.:</div>
          <div class="h-32 relative">
            <!-- <Dropdown :dataArray="Dprtmnt" :placeholder="'CAFOA No,'" /> -->
            <!-- <input
              type="text"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
              v-model="selectedCafoa"
            /> -->
            <select
              name=""
              id=""
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="selectedCafoa"
              @change="getProg"
            >
              <option value="" selected disabled>Select Department</option>
              <option value="" v-for="item in cafoa" :value="item.cafoa_no">
                {{ item.cafoa_no }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">Date of Adjustment:</div>
          <div class="h-32 relative">
            <!-- <Textbox :placeholder="'edit placeholder'" /> -->
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
              v-model="dateOfAdjustment"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center">
          <div class="font-semibold text-sm">Purchase/Contract No.:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
              v-model="purchaseNo"
            />
          </div>
        </div>
        <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
          <div class="font-semibold text-sm">Purchase/Contract Date:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
              v-model="purchaseData"
            />
          </div>
        </div>
        <div
          class="grid md:grid-cols-[194px_auto] w-full md:col-span-2 items-center"
        >
          <div class="font-semibold text-sm">Reason for Adjustment:</div>
          <div class="h-32 relative">
            <input
              type="text"
              readonly="readonly"
              class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
              v-model="reasonForAdjustment"
            />
          </div>
        </div>
      </div>
      <div
        class="justify-between sm:justify-end flex py-5 px-5 text-white sm:gap-x-11"
      >
        <button class="bg-button-blue py-2 w-125 rounded-md" @click="search">
          SEARCH
        </button>
      </div>
    </div>
    <div class="container float-left px-8 my-8">
      <span class="text-base font-bold text-other-black"
        >Details of Adjustment</span
      >
    </div>
    <div class="bg-white rounded my-6 justify-center">
      <div class="w-full text-center">
        <table class="min-w-max w-full table-fixed">
          <thead>
            <tr>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                Type of Appropriation
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                name of activity
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                aip code activtiy
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                account title
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                account code
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                latest obligation
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                addition
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                deduction
              </th>
              <th
                scope="col"
                class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                updated obligation
              </th>
            </tr>
          </thead>
          <tbody
            class="divide-y divide-gray-200"
            v-for="(detail, detailskey) in detailsForm"
            :key="detailskey"
          >
            <tr v-for="exp in detail.expense">
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center"
              >
                <!-- <span
                v-for="(ex, index) in expense"
                :key="index"
                :value="ex.department_code_id"
                >{{ detailskey == 0 ? ex.department_code_id : "" }}
              </span> -->
                {{ exp.department_code_id }}
              </td>
              <td
                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center text-ellipsis overflow-hidden"
              >
                <!-- <span
                v-for="(ex, index) in expense"
                :key="index"
                :value="ex.approType_id"
                >{{ detailskey == 0 ? ex.approType_id : "" }}</span
              > -->
                {{ exp.appro_type }}
              </td>
              <td
                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <!-- <span
                v-for="(ex, index) in expense"
                :key="index"
                :value="ex.activity"
                :selected="index === 0"
                >{{ detailskey == 0 ? ex.activity : "" }}</span
              > -->
                <select
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                >
                  <option>
                    {{ exp.activity }}
                  </option>
                </select>
              </td>
              <td
                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <!-- <span
                v-for="(ex, index) in expense"
                :key="index"
                :value="ex.AIPCode"
                :selected="index === 0"
                >{{ detailskey == 0 ? ex.AIPCode : "" }}</span
              > -->
                {{ exp.AIPCode }}
              </td>
              <td
                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <!-- <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="detail.accountTitle"
              >
                <option v-for="ex in expense" :value="ex.account_name" selected>
                  {{ ex.account_name }}
                </option>
              </select> -->
                <!-- <span
                v-for="(ex, index) in expense"
                :key="index"
                :value="ex.account_name"
                :selected="index === 0"
                >{{ ex.account_name }}</span
              > -->
                <select
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                >
                  <option>
                    {{ exp.account_name }}
                  </option>
                </select>
              </td>
              <td
                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <!-- <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="detail.accountCode"
              >
                <option v-for="ex in expense" :value="ex.account_code" selected>
                  {{ ex.account_code }}
                </option>
              </select> -->
                <!-- <span
                v-for="(ex, index) in expense"
                :key="index"
                :value="ex.account_code"
                :selected="index === 0"
              ></span
              > -->
                <select
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                >
                  <option>
                    {{ exp.account_code }}
                  </option>
                </select>
              </td>
              <td>
                <input
                  type="text"
                  placeholder="Enter Source Document"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  v-model="exp.addition"
                />
              </td>
              <td>
                <input
                  type="text"
                  placeholder="Enter Source Document"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  v-model="exp.deduction"
                />
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <button
                  class="text-base uppercase text-white bg-button-blue p-4 rounded-full"
                  v-if="detail.expense"
                  @click="addAccount(detailskey)"
                >
                  +
                </button>
              </td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <div
          class="justify-between sm:justify-end flex py-5 px-5 text-white sm:gap-x-11"
        >
          <button
            class="bg-button-green-dark py-2 w-125 rounded-md"
            @click="updateActivity"
          >
            SAVE
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
