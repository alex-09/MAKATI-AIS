<script setup>
import axios from "axios";
import BaseListbox from "./baseListbox.vue";
import { ref } from "vue";
import { useRouter } from "vue-router";
import router from "../../../router";

const isNewTrans = ref(true);
</script>
<script>
export default {
  data() {
    return {
      deptOptions: [],
      budgetYear: [],
      fundingSource: [],
      referenceDocument: [],
      typeOfAppropriation: [],
      department: [],
      program: [],
      project: [],
      activity: [],
      responseData: [],
      adjustment: [],

      selectedbudYr: "",
      selectedfundSrc: "",
      selectedrefDoc: "",
      selectedtypAppro: "",
      selectedDprtmnt: "",
      selectedProg: "",
      prog: "",
      selectedProj: "",
      selectedAct: "",
      id: "",
      aipact: "",
      activityCode: "",
      typeOfAdjustment: "",
      sourceDocument: "",
      supplementalBudget: "",
      dateOfDocument: "",
      selectedDprtmntSplit: "",
      detailsForm: [],
      //file
      selectedFileName: null,
      selectedFile: null,

      addActCounter: 1,
      showAddActivity: false,

      accountCounts: 0,
      adjustmentdisp: "",
    };
  },

  methods: {
    async getDep() {
      await axios
        .post("appropriation/getDepartment", {
          year: this.selectedbudYr,
          fund_source: this.selectedfundSrc,
        })
        .then((res) => {
          console.log(res);
          // localStorage.setItem("appro_id", res.appro_id);
          this.department = res.data.department;
        });
    },
    //get prog
    async getTitles(selectedValue) {
      const [departmentCode, appro_id] = selectedValue.split(",");
      this.id = appro_id;
      this.selectedDprtmntSplit = departmentCode;
      await axios
        .post("appropriation/getProgram", {
          department: departmentCode,
          appro_id: this.id,
        })
        .then((res) => {
          this.program = res.data.program;
          res.data.program.forEach((program) => {
            this.id = program.appro_id;
          });
        });
    },
    async getProj(selectedValue) {
      const [programCode, appro_id] = selectedValue.split(",");
      this.prog = programCode;
      await axios
        .post("appropriation/getProject", {
          program: programCode,
          appro_id: this.id,
        })
        .then((res) => {
          this.project = res.data.project;
        });
    },
    getBalance(max, adjust, expIndex) {
      for (const exp of this.detailsForm[adjust].expense) {
        if (isNaN(exp.addition)) {
          exp.addition = 0;
        }
        if (isNaN(exp.deduction)) {
          exp.deduction = 0;
        }
        if (exp.deduction > max) {
          exp.deduction = max;
        }
      }
      this.detailsForm[adjust].expense[expIndex].balance =
        parseFloat(this.detailsForm[adjust].expense[expIndex].appro_amount) +
        parseFloat(this.detailsForm[adjust].expense[expIndex].addition);
    },
    getBalance2(max, adjust, expIndex) {
      for (const exp of this.detailsForm[adjust].expense) {
        if (isNaN(exp.addition)) {
          exp.addition = 0;
        }
        if (isNaN(exp.deduction)) {
          exp.deduction = 0;
        }
        if (exp.deduction > max) {
          exp.deduction = max;
        }
      }
      this.detailsForm[adjust].expense[expIndex].balance =
        parseFloat(this.detailsForm[adjust].expense[expIndex].appro_amount) -
        parseFloat(this.detailsForm[adjust].expense[expIndex].deduction);
    },
    splitActivity(selectedValue) {
      const [selactivityCode, activityaip] = selectedValue.split(",");
      this.activityCode = selactivityCode;
      this.aipact = activityaip;
    },
    async splitActivity2(selectedValue, index, expindex) {
      const [selactivityCode, activityaip, aname] = selectedValue.split(",");
      this.activityCode = selactivityCode;
      this.aipact = activityaip;

      await axios
        .post("appropriation/getApproInfo", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          this.detailsForm[index].expense = res.data.expense;
          this.detailsForm[index].count = res.data.expense.length;
          this.detailsForm[index].expense[expindex].selectedAct = aname;
        });
    },
    splitAdjustment(selectedValue) {
      const [selectedAdj, adjustmenttype] = selectedValue.split(",");
      this.typeOfAdjustment = selectedAdj;
      this.adjustmentdisp = adjustmenttype;
    },
    async getActivity(selectedValue) {
      const [projectCode, appro_id] = selectedValue.split(",");
      await axios
        .post("appropriation/getActivity", {
          program: this.prog,
          project: projectCode,
          appro_id: this.id,
        })
        .then((res) => {
          this.activity = res.data.acitivity;
        });
    },
    async getInfo() {
      await axios
        .post("appropriation/getApproInfo", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          this.detailsForm = [];
          this.accountCounts = res.data.expense.length;
          const expenseItem = res.data.expense;
          expenseItem.addition = 0;
          expenseItem.deduction = 0;
          this.detailsForm.push({
            expense: expenseItem,
            count: res.data.expense.length,
          });
        });
      this.showAddActivity = true;
    },
    async addActivity() {
      this.addActCounter++;
      this.detailsForm.push({ expense: [{}] });
    },
    async updateActivity() {
      await axios.post("appropriation/UpdateAppro", {
        details_form: this.detailsForm,
        aip_code: this.aipact,
        appro_id: this.id,
        type_of_adjustment: this.typeOfAdjustment,
        source_document: this.selectedFileName,
        adjustment_no: this.supplementalBudget,
        date_of_document: this.dateOfDocument,
      });
      await axios
        .post("appropriation/reportAppro", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          router.push({
            path: "/Appropriation-Update-Details",
            name: "Update-Details",
            query: { res: JSON.stringify(res.data) },
          });
        })
        .catch((error) => {
          console.error(error);
        });
    },
    async addAccount(arr) {
      await axios
        .post("appropriation/getApproInfo", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          const expenseItem = res.data.expense[0];
          expenseItem.account_name = "";
          expenseItem.account_code = "";
          expenseItem.appro_amount = "";
          expenseItem.addition = 0;
          expenseItem.deduction = 0;
          this.detailsForm[arr].expense.push(expenseItem);
        });
    },
    openFileInput() {
      this.$refs.fileInput.click();
    },
    onFileSelected(event) {
      const file = event.target.files[0];
      if (!file) return;
      if (!file.name.endsWith(".pdf")) {
        alert("Please select a valid PDF file");
        this.selectedFileName = null;
        this.selectedFile = null;
        return;
      }
      this.selectedFileName = file.name;
      this.selectedFile = file;
    },
    setup() {
      const router = useRouter();

      const pushToListView = () => {
        router.push({
          name: "Update Details",
          query: {
            aipcode: this.aipact,
            appro_id: this.id,
          },
        });
      };

      return {
        pushToListView,
      };
    },
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.budgetYear = res.data.Year;
      this.fundingSource = res.data.fundSource;
      this.adjustment = res.data.adjustment;
    });
  },
};
</script>
<template>
  <div class="container w-100 min-w-full grid px-0 justify-items-center">
    <div class="mt-5 mx-4">
      <!-- RADIO 1 BUTTON AND LABEL -->
    </div>
    <!-- NEW TRANSACTION -->

    <!-- PREV TRANSACTION -->
    <div>
      <div
        class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
      >
        <!-- FIRST COLUMN -->
        <div>
          <!-- BUDGET YEAR -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Budget Year</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedbudYr"
                @change="getDep"
              >
                <option value="" disabled selected>Select Budget Year</option>
                <option v-for="by in budgetYear" :value="by.year">
                  {{ by.year }}
                </option>
              </select>
            </div>
          </div>

          <!-- DEPARTMENT -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Department</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedDprtmnt"
                @change="getTitles(selectedDprtmnt)"
              >
                <option value="" disabled selected>Select Department</option>
                <option
                  v-for="dep in department"
                  :value="`${dep.department_code},${dep.appro_id}`"
                >
                  {{ dep.department_name }}
                </option>
              </select>
            </div>
          </div>
          <!-- TITLE OF THE PROGRAM -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Title of the Program</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedProg"
                @change="getProj(selectedProg)"
              >
                <option value="" disabled selected>Select Program</option>
                <option v-for="prog in program" :value="prog.program_code">
                  {{ prog.program }}
                </option>
              </select>
            </div>
          </div>
          <!-- TITLE OF THE PROJECT -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Title of the Project</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedProj"
                @change="getActivity(selectedProj)"
              >
                <option value="" disabled selected>Select Project</option>
                <option v-for="proj in project" :value="proj.project_code">
                  {{ proj.project }}
                </option>
              </select>
            </div>
          </div>
          <!-- TITLE OF THE ACTIVITY -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Title of the Activity</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedAct"
                @change="splitActivity(selectedAct)"
              >
                <option value="" disabled selected>Select Activity</option>
                <option
                  v-for="act in activity"
                  :value="`${act.activity_code},${act.AIPCode}`"
                >
                  {{ act.activity }}
                </option>
              </select>
            </div>
          </div>
        </div>
        <!-- SECOND COLUMN -->
        <div>
          <!-- FUNDING SOURCE -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span> Funding Source</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedfundSrc"
                @change="getDep"
              >
                <option value="" disabled selected>
                  Select Funding Source
                </option>
                <option v-for="fs in fundingSource" :value="fs.fundSource_id">
                  {{ fs.fund_Source }}
                </option>
              </select>
            </div>
          </div>

          <!-- OFFICE CODE -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Office Code</span>
            </div>
            <div class="mr-8">
              <div>
                <input
                  type="text"
                  name=""
                  readonly="readonly"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  :value="selectedDprtmntSplit"
                />
              </div>
            </div>
          </div>
          <!-- AIP CODE (PROGRAM)-->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>AIP Code (Program)</span>
            </div>
            <div class="mr-8">
              <div>
                <input
                  type="text"
                  name=""
                  readonly="readonly"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  :value="selectedProg"
                />
              </div>
            </div>
          </div>
          <!-- AIP CODE (PROJECT) -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>AIP Code (Project)</span>
            </div>
            <div class="mr-8">
              <div>
                <input
                  type="text"
                  name=""
                  readonly="readonly"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  :value="selectedProj"
                />
              </div>
            </div>
          </div>
          <!-- AIP CODE (ACTIVITY) -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>AIP Code (Activity)</span>
            </div>
            <div class="mr-8">
              <div>
                <input
                  type="text"
                  name=""
                  readonly="readonly"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  :value="activityCode"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container px-4">
        <div class="flex justify-end gap-4">
          <div>
            <button
              class="w-125 h-42 bg-button-blue text-white uppercase rounded-lg"
              @click="getInfo"
            >
              search
            </button>
          </div>
        </div>
      </div>

      <div
        class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
      >
        <div>
          <!-- TYPE OF ADJUSTMENT -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span>Type of Adjustment</span>
            </div>
            <div class="">
              <!-- <div class="absolute">{{ adjustmentdisp }}</div> -->
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="typeOfAdjustment"
              >
                <option value="" disabled selected>
                  Select Type of Adjustment
                </option>
                <option v-for="ad in adjustment" :value="ad.id">
                  {{ ad.adjustment_type }}
                </option>
              </select>
            </div>
          </div>
          <!-- SOURCE DOCUMENT -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div class=" ">Source Document</div>
            <div class=" ">
              <input
                type="file"
                ref="fileInput"
                @change="onFileSelected"
                class="absolute opacity-0 cursor-pointer bg-[initial] text-sm border-[1px] border-[#3a354147] items-center rounded-md px-3 focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                accept=".pdf"
              />
              <div
                class="border border-gray-300 rounded-md py-1 px-2 flex items-center justify-between text-sm"
              >
                <span>{{ selectedFileName }}</span>
                <button
                  type="button"
                  @click="openFilePicker"
                  class="ml-2 h-[25px] bg-[#FFECB3] text-[#606060] text-[14px] font-semibold px-4 rounded cursor-pointer flex justify-center items-center gap-1"
                >
                  <svg
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M6.6 13.4998V8.69983L5 10.2998"
                      stroke="#606060"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M6.59998 8.69983L8.19998 10.2998"
                      stroke="#606060"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M17 7.9V11.9C17 15.9 15.4 17.5 11.4 17.5H6.6C2.6 17.5 1 15.9 1 11.9V7.1C1 3.1 2.6 1.5 6.6 1.5H10.6"
                      stroke="#606060"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M17 7.9H13.8C11.4 7.9 10.6 7.1 10.6 4.7V1.5L17 7.9Z"
                      stroke="#606060"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  Choose File
                </button>
              </div>
            </div>
          </div>
        </div>
        <div>
          <!-- SUPPLEMENTAL BUDGET NUMBER -->
          <div
            class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
          >
            <div>
              <span v-for="ad in adjustment"
                >{{ typeOfAdjustment == ad.id ? ad.adjustment_type : "" }}
              </span>
              Number
            </div>
            <div class="mr-8">
              <div>
                <input
                  type="text"
                  placeholder="Enter Adjustment"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  v-model="supplementalBudget"
                />
              </div>
            </div>
          </div>
          <div>
            <!-- DATE OF DOCUMENT -->
            <div
              class="grid grid-cols-2 xs:grid-cols-2 sm:grid-cols-3 gap-4 my-1"
            >
              <div>
                <span>Date of Document</span>
              </div>
              <div class="mr-8">
                <div>
                  <input
                    type="date"
                    placeholder="Enter Source Document"
                    class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                    v-model="dateOfDocument"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container float-left px-8 my-8">
    <span class="text-base font-bold text-other-black"
      >Details of Adjustment</span
    >
  </div>
  <div class="bg-white rounded my-6 justify-center">
    <div class="w-full text-center overflow-auto max-h-[700px]">
      <table class="min-w-max w-full table-fixed">
        <thead>
          <tr>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              Office Code
            </th>
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
              Appropriation
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
              Balance
            </th>
          </tr>
        </thead>
        <tbody
          class="divide-y divide-gray-200"
          v-for="(detail, detailskey) in detailsForm"
          :key="detailskey"
        >
          <tr v-for="(exp, expIndex) in detail.expense" :key="expIndex">
            <td
              v-if="expIndex == 0"
              class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.department_code_id }}
            </td>
            <td v-else></td>
            <td
              v-if="expIndex == 0"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center text-ellipsis overflow-hidden"
            >
              <span :value="exp.activity">
                {{ exp.appro_type }}
              </span>
            </td>
            <td v-else></td>
            <td
              v-if="expIndex == 0"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <span v-if="detailskey == 0" :value="exp.activity">
                {{ exp.activity }}
              </span>
              <div class="relative" v-if="detailskey != 0">
                <select
                  class="text-white bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  v-model="exp.selectedAct"
                  :placeholder="exp.selectedAct"
                  @change="
                    splitActivity2(exp.selectedAct, detailskey, expIndex)
                  "
                >
                  <option
                    class="text-black"
                    v-for="act in activity"
                    :value="`${act.activity_code},${act.AIPCode},${act.activity}`"
                  >
                    {{ act.activity }}
                  </option>
                </select>
                <span class="relative bottom-6 right-9">{{
                  exp.activity
                }}</span>
              </div>
            </td>
            <td v-else></td>
            <td
              v-if="expIndex == 0"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <span v-if="detailskey == 0" :value="exp.AIPCode">
                {{ exp.AIPCode }}
              </span>
              <span v-if="detailskey != 0" :value="exp.AIPCode">
                {{ exp.AIPCode }}
              </span>
            </td>
            <td v-else></td>
            <!-- <td
              v-if="detail.count > expIndex"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              >
                <option>
                  {{ exp.account_name }}
                </option>
              </select>
            </td> -->
            <td
              v-if="expIndex < accountCounts"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <span v-if="detailskey == 0" :value="exp.AIPCode">
                {{ exp.account_name }}
              </span>
              <span v-if="detailskey != 0" :value="exp.AIPCode">
                {{ exp.account_name }}
              </span>
            </td>
            <td v-else>
              <input
                type="text"
                placeholder="Enter Account Name"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.account_name"
              />
            </td>
            <!-- account code -->
            <td
              v-if="expIndex < accountCounts"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <span v-if="detailskey == 0" :value="exp.AIPCode">
                {{ exp.account_code }}
              </span>
              <span v-if="detailskey != 0" :value="exp.AIPCode">
                {{ exp.account_code }}
              </span>
            </td>
            <td v-else>
              <input
                type="text"
                placeholder="Enter Account Code"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.account_code"
              />
            </td>
            <td
              v-if="expIndex < accountCounts"
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <span v-if="detailskey == 0" :value="exp.AIPCode">
                {{ exp.appro_amount }}
              </span>
              <span v-if="detailskey != 0" :value="exp.AIPCode">
                {{ exp.appro_amount }}
              </span>
            </td>
            <td v-else>
              <input
                type="text"
                placeholder="Enter Account Code"
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.appro_amount"
              />
            </td>
            <td v-if="expIndex < accountCounts">
              <input
                type="text"
                placeholder="Addition"
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.addition"
                :disabled="
                  exp.deduction != null &&
                  exp.deduction != '' &&
                  exp.deduction > 0
                "
                @input="
                  getBalance(exp.appro_amount, detailskey, expIndex),
                    (exp.deduction = 0)
                "
              />
            </td>
            <td v-else>
              <input
                type="text"
                placeholder="Addition"
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1 bg-gray-500"
                v-model="exp.addition"
                readonly="readonly"
                :disabled="
                  exp.deduction != null &&
                  exp.deduction != '' &&
                  exp.deduction > 0
                "
                @input="
                  getBalance(exp.appro_amount, detailskey, expIndex),
                    (exp.deduction = 0)
                "
              />
            </td>
            <td v-if="expIndex < accountCounts">
              <input
                type="text"
                placeholder="Deduction"
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.deduction"
                :disabled="
                  exp.addition != null &&
                  exp.addition != '' &&
                  exp.deduction > 0
                "
                @input="
                  getBalance2(exp.appro_amount, detailskey, expIndex),
                    (exp.addition = 0)
                "
              />
            </td>
            <td v-else>
              <input
                type="text"
                placeholder="Deduction"
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1 bg-gray-500"
                readonly="readonly"
                v-model="exp.deduction"
                :disabled="
                  exp.addition != null &&
                  exp.addition != '' &&
                  exp.deduction > 0
                "
                @input="
                  getBalance2(exp.appro_amount, detailskey, expIndex),
                    (exp.addition = 0)
                "
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.balance }}
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
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- </div> -->
  <div class="flex justify-end gap-4 mx-16">
    <button
      class="text-base uppercase font-medium text-white bg-addBtn w-163 h-42 rounded-lg"
      @click="addActivity"
      v-if="addActCounter < activity.length"
      v-show="showAddActivity"
    >
      add activity
    </button>
    <button
      class="text-base uppercase font-medium text-white bg-button-blue w-163 h-42 rounded-lg"
      @click="updateActivity"
      v-show="showAddActivity"
    >
      save
    </button>
  </div>
</template>
