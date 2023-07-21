<script>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import TableComponent1 from "../../../components/budgetComponent/allotmentComponent/AllotmentTable1.vue";
import TableComponent2 from "../../../components/budgetComponent/allotmentComponent/AllotmentTable2.vue";
import Textbox from "../../../components/budgetComponent/allotmentComponent/textbox.vue";
import Dropdown from "../../../components/budgetComponent/allotmentComponent/dropdown.vue";
import axios from "axios";
import DeptAPI from "../../../api_request/documentManagement/departmentDrop";

import { ref } from "vue";
export default {
  components: {
    Dropdown,
    NavBar,
    HeaderMenu,
    TableComponent1,
    TableComponent2,
    Textbox,
  },
  data() {
    return {
      // deptOptions: [],
      budgetYear: [],
      fundingSource: [],
      department: [],
      typeOfAppropriation: [],
      department: [],
      programdb: [],
      project: [],
      activity: [],
      expense: [],
      expenseClassification: [],

      aip: "",
      selectedbudYr: "",
      selectedfundSrc: "",
      selectedDep: "",
      selectedtypAppro: "",
      selectedProg: "",
      selectedProj: "",
      selectedAct: "",
      selectedProgSplit: "",

      allotment: [],
      totalAllotment: "",
      totalAppropriation: "",
      totalBalance: "",

      program: [
        {
          project: [
            // {
            //   isVisible: false,
            //   activity: [
            //     {
            //       activityTitle: "",
            //       aipCode: "",
            //       activityDescription: "",
            //       expense: [
            //         {
            //           accountCode: "",
            //           accountName: "",
            //           appropriation: "",
            //           allotment: "",
            //           balance: "",
            //         },
            //       ],
            //     },
            //   ],
            // },
          ],
        },
      ],

      addCounter: 1,
      addActCounter: 1,
    };
  },
  methods: {
    async getDep() {
      await axios
        .post("allotment/getDepartment", {
          year: this.selectedbudYr,
          fund_source: this.selectedfundSrc,
        })
        .then((res) => {
          this.department = res.data.department;
        });
    },
    async getApproType() {
      await axios
        .post("allotment/getApproType", {
          year: this.selectedbudYr,
          fund_source: this.selectedfundSrc,
          department: this.selectedDep,
        })
        .then((res) => {
          this.typeOfAppropriation = res.data.approType;
        });
    },
    async getProgram() {
      await axios
        .post("allotment/getProgram", {
          year: this.selectedbudYr,
          fund_source: this.selectedfundSrc,
          department: this.selectedDep,
          appro_type: this.selectedtypAppro,
        })
        .then((res) => {
          this.program = res.data.program;
          res.data.program.forEach((program) => {
            this.id = program.appro_id;
          });
          this.program = res.data.program.map((program) => ({
            ...program,
            project: this.project,
          }));
        });
    },
    async getProject() {
      await axios
        .post("allotment/getProject", {
          appro_id: this.id,
          program: this.selectedProg,
        })
        .then((res) => {
          this.project = res.data.project;
        });
    },
    async getActivity() {
      await axios
        .post("allotment/getActivity", {
          appro_id: this.id,
          program: this.selectedProg,
          project: this.selectedProj,
        })
        .then((res) => {
          this.activity = res.data.activity;
          this.aip = res.data.activity[0].AIPCode;
        });
    },
    async getNewActivity(selected, prog, proj, count) {
      count = count - 1;
      await axios
        .post("allotment/getActivity", {
          appro_id: this.id,
          program: this.selectedProg,
          project: selected,
        })
        .then((res) => {
          this.program[prog].project[proj].activity = res.data.activity;
          res.data.activity.forEach((activity) => {
            this.aip = activity.AIPCode;
          });
        });
    },
    async getNewExpense(selected, prog, proj, act) {
      await axios
        .post("allotment/getExpense", {
          appro_id: this.id,
          aipcode: this.aip,
        })
        .then((res) => {
          this.expense = res.data.activity;
          this.program[prog].project[proj].activity[act].description =
            res.data.activity;
          this.program[prog].project[proj].activity[act].expense =
            res.data.activity_descript;
          let sum = 0;
          for (const exp of this.expenseClassification) {
            if (isNaN(exp.appro_amount)) {
              exp.appro_amount = 0;
            }
            sum += parseFloat(exp.appro_amount);
          }
          this.totalAppropriation = sum;
        });
    },
    addProject(prog, proj, act, exp) {
      this.program[prog].project.push({
        isVisible: false,
        count: 1,
        activity: [
          {
            activityTitle: "",
            aipCode: "",
            activityDescription: "",
            expense: [],
          },
        ],
      });
    },
    addActivity(count) {
      count++;
    },
    addExpense(prog, proj, act, exp) {
      this.program[prog].project[proj].activity[act].expense.push({
        accountCode: "",
        accountName: "",
        appropriation: "",
        allotment: "",
        balance: "",
      });
    },
    async saveAllot() {
      this.program.forEach((programItem) => {
        programItem.project.forEach((projectItem) => {
          projectItem.activity = projectItem.activity.filter(
            (activityItem) =>
              activityItem.expense && activityItem.expense.length > 0
          );
        });
      });

      await axios.post("allotment/enroll", {
        program: this.program,
        appro_id: this.id,
        aipcode: this.aip,
        year: this.selectedbudYr,
        fundSource_id: this.selectedfundSource,
        department: this.selectedDep,
      })
      .then((res) => {
        this.allot_id = res.data.allot_id;
        this.aip = res.data.aipcode;
      });
    },
    getTotal(max) {
      let sum = 0;
      for (const exp of this.expenseClassification) {
        if (exp.allotment > max) {
          exp.allotment = max;
        }
        if (isNaN(exp.allotment)) {
          exp.allotment = 0;
        }
        sum += parseFloat(exp.allotment);
      }
      this.totalAllotment = sum;

      for (const exp of this.expenseClassification) {
        exp.balance = exp.appro_amount - exp.allotment;
      }

      let sumbal = 0;
      for (const exp of this.expenseClassification) {
        if (isNaN(exp.balance)) {
          exp.balance = 0;
        }
        sumbal += parseFloat(exp.balance);
      }
      this.totalBalance = sumbal;
    },
    getTotalExpense(max, prog, proj, act) {
      let sumapp = 0;
      for (const exp of this.program[prog].project[proj].activity[act]
        .expense) {
        if (isNaN(exp.appro_amount)) {
          exp.appro_amount = 0;
        }
        sumapp += parseFloat(exp.appro_amount);
      }
      this.program[prog].project[proj].activity[act].totalAppropriation =
        sumapp;

      let sum = 0;
      for (const exp of this.program[prog].project[proj].activity[act]
        .expense) {
        if (exp.allotment > max) {
          exp.allotment = max;
        }
        if (isNaN(exp.allotment)) {
          exp.allotment = 0;
        }
        sum += parseFloat(exp.allotment);
      }
      this.program[prog].project[proj].activity[act].totalAllotment = sum;

      for (const exp of this.program[prog].project[proj].activity[act]
        .expense) {
        exp.balance = exp.appro_amount - exp.allotment;
      }
      let sumbal = 0;
      for (const exp of this.program[prog].project[proj].activity[act]
        .expense) {
        if (isNaN(exp.balance)) {
          exp.balance = 0;
        }
        sumbal += parseFloat(exp.balance);
      }
      this.program[prog].project[proj].activity[act].totalBalance = sumbal;
    },
    forReview() {
      axios
        .post("allotment/forReview", {
          allot_id: this.allot_id,
          aipcode: this.aip,
        })
        .then((this.forRev = false), this.$router.push("/List-of-Allotment"))
        .catch((error) => {
          // Handle the error
          console.error("An error occurred:", error);
        });
    },
    newProject() {
      this.addCounter++;
      console.log(this.program);
      this.program[0].project.push({
        isVisible: false,
        count: 1,
        activity: [
          {
            activityTitle: "",
            aipCode: "",
            activityDescription: "",
            expense: [],
          },
        ],
      });
    },
    clear() {
      this.addCounter--;
      this.program[0].project.pop({
        isVisible: false,
        activity: [
          {
            activityTitle: "",
            aipCode: "",
            activityDescription: "",
            expense: [
              {
                accountCode: "",
                accountName: "",
                appropriation: "",
                allotment: "",
                balance: "",
              },
            ],
          },
        ],
      });
    },
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.budgetYear = res.data.Year;
      this.fundingSource = res.data.fundSource;
    });
  },
  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });
  },
};
</script>

<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />

  <div class="container p-0 font-Inter">
    <div class="mt-5 mx-4">
      <div class="px-5">
        <p class="font-bold text-2xl text-other-blue">Enroll New Allotment</p>
        <p class="font-normal text-sm text-text-gray">
          Please fill out all the necessary field to enroll new appropriation
        </p>
        <div
          class="my-4 grid grid-flow-row sm:grid-cols-2 items-center lg:grid-cols-[auto_360px_auto_360px] gap-y-3"
        >
          <!-- BUDGET YEAR DROPDOWN -->
          <div class="text-sm font-semibold">Budget Year</div>
          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedbudYr"
            placeholder="Select Budget Year"
            @change="getDep"
          >
            <option value="" disabled selected>Select a Budget Year</option>
            <option v-for="bud in budgetYear" :value="bud.year">
              {{ bud.year }}
            </option>
          </select>

          <!---->
          <!-- FUNDING SOURCE DROPDOWN -->
          <div class="text-sm font-semibold lg:ml-14">Funding Source</div>
          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedfundSrc"
            placeholder="Select Funding Source"
            @change="getDep"
          >
            <option value="" disabled selected>Select a Funding Source</option>
            <option v-for="fund in fundingSource" :value="fund.fundSource_id">
              {{ fund.fund_Source }}
            </option>
          </select>
          <!---->
          <!-- REFERENCE DOCUMENT DROPDOWN -->
          <div class="text-sm font-semibold">Department</div>
          <!-- <div class="relative h-30 text-sm">
            <Dropdown :dataArray="refDoc" :placeholder="'Reference Document'" />
          </div> -->

          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedDep"
            placeholder="Select Funding Source"
            @change="getApproType"
          >
            <option value="" disabled selected>
              Select a Department/Office
            </option>
            <option v-for="dep in department" :value="dep.department_code">
              {{ dep.department_name }}
            </option>
          </select>
          <!---->
          <!-- TYPE OF APPROPRIATION DROPDOWN -->
          <div class="text-sm font-semibold lg:ml-14">
            Type of Appropriation
          </div>
          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedtypAppro"
            @click="getProgram"
          >
            <option value="" disabled selected>
              Select a Department/Office
            </option>
            <option
              v-for="typ in typeOfAppropriation"
              :value="typ.approType_id"
            >
              {{ typ.appro_type }}
            </option>
          </select>
          <!---->
          <!-- TITLE OF THE PROGRAM DROPDOWN -->
          <div class="text-sm font-semibold">Title of the Program</div>

          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedProg"
          >
            <option value="" disabled selected>
              Select a Department/Office
            </option>
            <option v-for="prog in program" :value="prog.program_code">
              {{ prog.program }}
            </option>
          </select>
          <!---->
          <!-- AIP CODE (PROGRAM) DROPDOWN -->
          <div class="text-sm font-semibold lg:ml-14">AIP Code (Program)</div>
          <div class="relative h-30 text-sm">
            <!-- <Textbox placeholder="Enter Program AIP Code" /> -->
            <input
              type="text"
              name=""
              readonly="readonly"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              :value="selectedProg"
            />
          </div>
          <!---->
          <!-- </div> -->
          <div
            class="col-span-1 sm:col-span-2 lg:col-span-4 justify-between sm:justify-end flex text-white sm:gap-x-11"
          >
            <button
              class="bg-button-blue py-2 w-125 rounded-md"
              @click="getProject"
            >
              SEARCH
            </button>
          </div>
          <!-- </div><div class=" px-5 mt-4"> -->
          <!-- <div class="  grid grid-flow-row sm:grid-cols-2 items-center lg:grid-cols-[auto_360px_auto_360px] gap-y-3"> -->
          <!-- TITLE OF THE PROJECT -->
        </div>
      </div>
      <div v-for="(prog, progIndex) in program" :key="progIndex">
        <div
          class="border relative rounded-md flex flex-col gap-4 border-[#3A35418A] mt-6 px-5 py-6"
          v-for="(proj, projIndex) in prog.project"
          :key="projIndex"
        >
          <div
            class="absolute top-0 right-0 cursor-pointer"
            @click="proj.isVisible = !proj.isVisible"
          >
            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M7 10L12 15L17 10H7Z"
                fill="#3A3541"
                fill-opacity="0.54"
              />
            </svg>
          </div>
          <!-- <p class="font-normal text-sm text-text-gray mb-3">
            Kindly click the add button to add expenses
          </p> -->

          <div class="flex flex-row justify-between">
            <div class="text-sm font-semibold">Title of the Project</div>
            <div class="relative h-30 text-sm">
              <!-- <input
                type="text"
                placeholder="Enter Project Title"
                class="border border-[#3a354147] flex items-center cursor-default rounded-md w-[360px] px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                v-model="proj.projectTitle"
              /> -->
              <select
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                v-model="proj.selectedProj"
                @click="
                  getNewActivity(
                    proj.selectedProj,
                    progIndex,
                    projIndex,
                    proj.count
                  )
                "
              >
                <option value="" disabled selected>Select a Project</option>
                <option v-for="p in project" :value="p.project_code">
                  {{ p.project }}
                </option>
              </select>
            </div>
            <!---->
            <div class="text-sm font-semibold lg:ml-14">AIP Code (Project)</div>
            <div class="h-30 text-sm">
              <input
                type="text"
                readonly="readonly"
                placeholder="Enter Project AIP Code"
                class="border border-[#3a354147] flex items-center cursor-default rounded-md w-[360px] px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                v-model="proj.selectedProj"
              />
            </div>
          </div>
          <div
            v-if="proj.isVisible"
            class="sm:grid-cols-2 items-center lg:grid-cols-[auto_360px_auto_360px] gap-y-3"
            v-for="(act, actIndex) in proj.activity"
            :key="actIndex"
          >
            <div v-if="proj.count >= actIndex + 1">
              <div class="flex flex-row justify-between" v-if="proj.isVisible">
                <div class="text-sm font-semibold">Title of the Activity</div>
                <div class="relative h-30 text-sm">
                  <select
                    class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                    v-model="act.selectedAct"
                    @click="
                      getNewExpense(
                        act.selectedAct,
                        progIndex,
                        projIndex,
                        actIndex
                      )
                    "
                  >
                    <option value="" disabled selected>
                      Select an Activity
                    </option>
                    <option v-for="a in proj.activity" :value="a.activity_code">
                      {{ a.activity }}
                    </option>
                  </select>
                </div>
                <!---->
                <div class="text-sm font-semibold lg:ml-14">
                  AIP Code (Activity)
                </div>
                <div class="relative h-30 text-sm">
                  <input
                    type="text"
                    readonly="readonly"
                    placeholder="Enter Activity AIP Code"
                    class="border border-[#3a354147] flex items-center cursor-default rounded-md w-[360px] px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                    v-model="act.selectedAct"
                  />
                </div>
              </div>

              <!--ACTIVITY DESCRIPTION-->
              <div
                class="flex flex-row mt-[16px] justify-between"
                v-if="proj.isVisible"
              >
                <div class="text-sm font-semibold">Activity Description</div>
                <textarea
                  v-if="proj.isVisible"
                  v-for="pr in act.description"
                  readonly="readonly"
                  class="col-span-1 lg:col-span-3 rounded-md w-[79%] text-sm px-3 py-1 border border-[#3a354147] focus:border-transparent focus:outline-offset-0 focus:outline-2 focus:outline focus:outline-other-black-100"
                  rows="3"
                  :value="pr.activity_description"
                ></textarea>
                <div class="text-sm font-semibold">Reference Document</div>
                <div class="relative h-30 text-sm">
                  <input
                    v-for="exp in expense"
                    type="text"
                    placeholder=" Reference Document"
                    readonly="readonly"
                    class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                    :value="exp.reference_document"
                  />
                </div>
                <!---->
                <!-- TYPE OF APPROPRIATION DROPDOWN -->
                <div class="text-sm font-semibold lg:ml-14">
                  Date of Document
                </div>
                <div class="relative h-30 text-sm">
                  <input
                    v-for="exp in expense"
                    type="date"
                    class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                    :value="exp.date_document"
                    readonly="readonly"
                  />
                </div>
              </div>
              <div class="text-sm font-semibold mt-4" v-if="proj.isVisible">
                Expenses Classification
              </div>
              <div class="flex justify-center" v-if="proj.isVisible">
                <table class="w-800 text-xs">
                  <thead class="font-semibold">
                    <tr>
                      <th>ACCOUNT CODE</th>
                      <th>ACCOUNT NAME</th>
                      <th>APPROPRIATION</th>
                      <th>AMOUNT OF ALLOTMENT</th>
                      <th>BALANCE</th>
                    </tr>
                  </thead>
                  <tbody class="font-normal">
                    <tr v-for="(exp, expIndex) in act.expense" :key="expIndex">
                      <td>
                        {{ exp.account_code }}
                      </td>
                      <td>
                        {{ exp.account_name }}
                      </td>
                      <td>
                        {{ exp.appro_amount.toLocaleString() }}
                      </td>
                      <td>
                        <input
                          type="text"
                          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                          v-model="exp.allotment"
                          @input="
                            getTotalExpense(
                              exp.appro_amount,
                              progIndex,
                              projIndex,
                              actIndex
                            )
                          "
                        />
                      </td>
                      <td>{{ exp.balance?.toLocaleString() }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <!-- <button
                        @click="
                          addExpense(progIndex, projIndex, actIndex, expIndex)
                        "
                        class="bg-light-green rounded-sm text-white py-2 px-7"
                      >
                        ADD EXPENSES
                      </button> -->
                      </td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  <tfoot class="font-semibold">
                    <th>Total</th>
                    <td></td>
                    <td>{{ act.totalAppropriation?.toLocaleString() }}</td>
                    <td>{{ act.totalAllotment?.toLocaleString() }}</td>
                    <td>{{ act.totalBalance?.toLocaleString() }}</td>
                  </tfoot>
                </table>
              </div>
              <!-- button -->
            </div>
          </div>
          <div
            v-if="proj.isVisible"
            class="px-5 flex-col sm:flex-row flex justify-center sm:justify-start lg:pr-15 my-2 gap-4"
          >
            <button
              class="py-2 px-7 bg-tenthBtn rounded text-white"
              v-if="proj.count < proj.activity.length"
              @click="proj.count++"
            >
              ADD ACTIVITY
            </button>
          </div>
          <!-- //butons -->
        </div>
      </div>
      <div
        class="px-5 flex-col sm:flex-row flex justify-center sm:justify-start lg:pr-15 my-2 gap-4"
      >
        <button
          class="py-2 px-7 bg-fifthBtn rounded text-white"
          @click="newProject()"
          v-if="addCounter <= project.length"
        >
          ADD PROJECT
        </button>
      </div>
      <div
        class="justify-between sm:justify-end flex px-5 text-white sm:gap-x-11 mt-4 mb-4"
      >
        <button
          class="bg-button-green-dark py-2 w-125 rounded-md"
          @click="forReview"
        >
          FOR REVIEW
        </button>
        <button
          class="py-2 px-7 bg-button-blue rounded text-white"
          @click="saveAllot"
        >
          SAVE
        </button>

        <button
          class="py-2 px-7 bg-danger-color rounded text-white"
          @click="clear"
          v-if="addCounter > 1"
        >
          CLEAR
        </button>
      </div>
    </div>
  </div>
</template>
