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
      expense: [],
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
      approid: "",
      aipcode: "",
      aipact: "",
      activityCode: "",
      programCode: "",
      projectCode: "",
      typeOfAdjustment: "",
      sourceDocument: "",
      supplementalBudget: "",
      dateOfDocument: "",

      detailsForm: [],

      //file
      selectedFileName: null,
      selectedFile: null,
      showButton: false,

      adjustmentdisp: "",
    };
  },
  methods: {
    async getDep() {
      await axios
        .post("allotment/getAllotDepartment", {
          year: this.selectedbudYr,
          appro_type: this.selectedtypAppro,
        })
        .then((res) => {
          console.log(res);
          // localStorage.setItem("appro_id", res.appro_id);
          this.department = res.data.department;
        });
    },
    //get prog
    async getProg() {
      await axios
        .post("allotment/getAllotProgram", {
          department: this.selectedDprtmnt,
          appro_type: this.selectedtypAppro,
          year: this.selectedbudYr,
        })
        .then((res) => {
          this.program = res.data.program;
        });
    },
    async getProj(selectedValue) {
      const [programCode, programAllot] = selectedValue.split(",");
      this.programCode = programCode;
      this.id = programAllot;

      await axios
        .post("allotment/getAllotProject", {
          program: programCode,
          allot_id: programAllot,
        })
        .then((res) => {
          this.project = res.data.project;
        });
    },
    async getActivity(selectedValue) {
      const [projectCode, projectAllot] = selectedValue.split(",");
      this.projectCode = projectCode;
      this.id = projectAllot;
      await axios
        .post("allotment/getAllotActivity", {
          project: projectCode,
          allot_id: projectAllot,
        })
        .then((res) => {
          this.activity = res.data.activity;
          // this.aipcode = res.data.activity[0].AIPCode;
          // this.id = res.data.activity[0].allot_id;
        });
    },
    async getExpense(selectedValue) {
      const [activityCode, activityAllot] = selectedValue.split(",");
      this.activityCode = activityCode;
      this.id = activityAllot;
      await axios
        .post("allotment/getAllotExpense", {
          aipcode: activityCode,
          allot_id: activityAllot,
        })
        .then((res) => {
          this.showButton = true;
          this.expense = res.data.activity_descript;
          this.approid = res.data.activity_descript[0].appro_id;
        });
    },
    getBalance(max) {
      for (const exp of this.expense) {
        if (exp.addition == null) {
          exp.addition = 0;
        }
        if (exp.deduction == null) {
          exp.deduction = 0;
        }
        if (isNaN(exp.addition)) {
          exp.addition = 0;
        }
        if (isNaN(exp.deduction)) {
          exp.deduction = 0;
        }
        // if (exp.deduction > max) {
        //   exp.deduction = max;
        // }
      }
    },
    getBalance2(max) {
      for (const exp of this.expense) {
        if (exp.addition == null) {
          exp.addition = 0;
        }
        if (exp.deduction == null) {
          exp.deduction = 0;
        }
        if (isNaN(exp.addition)) {
          exp.addition = 0;
        }
        if (isNaN(exp.deduction)) {
          exp.deduction = 0;
        }
        // if (exp.deduction > max) {
        //   exp.deduction = max;
        // }
      }
    },
    splitAdjustment(selectedValue) {
      const [selectedAdj, adjustmenttype] = selectedValue.split(",");
      this.typeOfAdjustment = selectedAdj;
      this.adjustmentdisp = adjustmenttype;
    },
    async addActivity() {
      await axios
        .post("allotment/getApproInfo", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          this.detailsForm.push({ expense: res.data.expense });
        });
    },
    async updateActivity() {
      await axios.post("allotment/updateAllot", {
        department: this.selectedDprtmnt,
        budget_year: this.selectedbudYr,
        source_document: this.selectedFileName,
        type_of_adjustment: this.typeOfAdjustment,
        adjustment_number: this.supplementalBudget,
        date_of_document: this.dateOfDocument,
        appro_id: this.approid,
        aip_code: this.aipcode,
        allot_id: this.id,
        expense: this.expense,
      });

      await axios
        .post("allotment/reportAllotment", {
          aipcode: this.aipcode,
          appro_id: this.id,
        })
        .then((res) => {
          router.push({
            path: "/Allotment-Update-Details",
            name: "Allotment Update Details",
            query: { res: JSON.stringify(res.data) },
          });
        });
    },
    async addAccount(arr) {
      await axios
        .post("allotment/getApproInfo", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          this.detailsForm[arr].expense.push(res.data.expense[0]);
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
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.budgetYear = res.data.Year;
      this.fundingSource = res.data.fundSource;
      this.typeOfAppropriation = res.data.approType;
      this.adjustment = res.data.adjustment;
    });
  },
};
</script>
<template>
  <div class="container w-100 min-w-full grid px-0 justify-items-center">
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
                @change="getProg()"
              >
                <option value="" disabled selected>Select Department</option>
                <option v-for="dep in department" :value="dep.department_code">
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
                <option
                  v-for="prog in program"
                  :value="`${prog.program_code},${prog.allot_id}`"
                >
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
                <option
                  v-for="proj in project"
                  :value="`${proj.project_code},${proj.allot_id}`"
                >
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
              >
                <option value="" disabled selected>Select Activity</option>
                <option
                  v-for="act in activity"
                  :value="`${act.AIPCode},${act.allot_id}`"
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
              <span> Type of Appropriation</span>
            </div>
            <div>
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="selectedtypAppro"
                @change="getDep"
              >
                <option value="" disabled selected>
                  Select Type of Appropriation
                </option>
                <option
                  v-for="toa in typeOfAppropriation"
                  :value="toa.approType_id"
                >
                  {{ toa.appro_type }}
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
                  :value="selectedDprtmnt"
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
                  :value="programCode"
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
                  :value="projectCode"
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
              @click="getExpense(selectedAct)"
            >
              search
            </button>
          </div>
          <!-- <div>
            <button
              class="w-125 h-42 bg-danger-color text-white uppercase rounded-lg"
            >
              close
            </button>
          </div> -->
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
            <div>
              <div class="absolute">{{ adjustmentdisp }}</div>
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
                  placeholder="Enter Source Document"
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
              appropriation
            </th>

            <th
              scope="col"
              colspan="4"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              allotment
            </th>

            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              unalloted balance
            </th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              balance
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
              adjusted balance
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr v-for="exp in expense">
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
              {{ exp.activity }}
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.AIPCode }}
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.account_name }}
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.account_code }}
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.appro_amount }}
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.balance }}
            </td>
            <td>
              <input
                type="text"
                placeholder=" "
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.addition"
                :disabled="
                  exp.deduction != null &&
                  exp.deduction != '' &&
                  exp.deduction > 0
                "
                @input="getBalance(exp.appro_amount), (exp.deduction = 0)"
              />
            </td>
            <td>
              <input
                type="text"
                placeholder=" "
                class="text-right bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="exp.deduction"
                :disabled="
                  exp.addition != null && exp.addition != '' && exp.addition > 0
                "
                @input="getBalance2(exp.appro_amount), (exp.addition = 0)"
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.adjusted_balance }}
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              {{ exp.unalloted_balance }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- </div> -->

  <div class="grid justify-items-end">
    <div class="float-right mx-16 flex gap-4">
      <button
        class="text-base uppercase font-medium text-white bg-button-blue w-163 h-42 rounded-lg"
        @click="updateActivity"
        v-if="showButton"
      >
        save
      </button>
      <button
        class="text-base uppercase font-medium text-white bg-sixthBtn w-163 h-42 rounded-lg"
        @click="
          router.push({
            path: '/Budget',
          })
        "
      >
        cancel
      </button>
    </div>
  </div>
</template>
