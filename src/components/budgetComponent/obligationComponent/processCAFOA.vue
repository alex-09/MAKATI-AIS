<script>
import axios, { formToJSON } from "axios";
import { useRouter } from "vue-router";
import router from "../../../router";
export default {
  data() {
    return {
      budgetYear: [],
      fundingSource: [],
      referenceDocument: [],
      typeOfAppropriation: [],
      department: [],
      program: [],
      project: [],
      activity: [],

      selectedbudYr: "",
      selectedfundSrc: "",
      selectedrefDoc: "",
      selectedtypAppro: "",
      selectedDprtmnt: "",
      selectedProg: "",
      selectedProj: "",
      selectedAct: "",
      appro_id: "",
      aipcode: "",

      typeOfTransaction: "",
      processSlipNo: "",
      cafoaAmount: "",
      particulars: "",
      purchaseRequestNo: "",
      purchaseRequestDate: "",
      payee: "",
      requestingOfficial: "",

      mainProgramForms: [
        {
          programForms: [
            {
              isVisible: false,
              programTitle: "",
              programAipCode: "",
              projectForms: [
                {
                  projectTitle: "",
                  projectAipCode: "",
                  activityForms: [
                    {
                      activityTitle: "",
                      activityAipCode: "",
                      activityDescription: "",
                      expenseTotal: "",
                      balanceTotal: "",
                      expensesClassifications: [
                        {
                          accountCode: "",
                          accountName: "",
                          amount: "",
                        },
                      ],
                    },
                  ],
                },
              ],
            },
          ],
        },
      ],
      totalitem: "",
    };
  },
  methods: {
    validationForm() {
      let check = false;
      for (let mainProgramForm in this.mainProgramForms) {
        let mainProgramFormItem = this.mainProgramForms[mainProgramForm];
        for (let programForm in mainProgramFormItem.programForms) {
          let programFormItem = mainProgramFormItem.programForms[programForm];

          for (let projectForm in programFormItem.projectForms) {
            let projectFormItem = programFormItem.projectForms[projectForm];
            for (let activityForm in projectFormItem.activityForms) {
              let activityFormItem =
                projectFormItem.activityForms[activityForm];
              for (let expenseClassifications in activityFormItem.expensesClassifications) {
                let expenseClassificationsItem =
                  activityFormItem.expensesClassifications[
                    expenseClassifications
                  ];
                if (
                  this.selectedbudYr == "" ||
                  this.selectedfundSrc == "" ||
                  this.selectedrefDoc == "" ||
                  this.selectedtypAppro == "" ||
                  this.selectedDprtmnt == "" ||
                  this.officeCode == "" ||
                  programForm.programTitle == "" ||
                  programForm.programAipCode == "" ||
                  projectForm.projectTitle == "" ||
                  projectForm.projectAipCode == "" ||
                  activityForm.activityTitle == "" ||
                  activityForm.activityAipCode == "" ||
                  expenseClassificationsItem.accountCode == "" ||
                  expenseClassificationsItem.accountName == "" ||
                  expenseClassificationsItem.amount == ""
                ) {
                  check = false;
                } else {
                  check = true;
                }
              }
            }
          }
        }
      }
      return check;
    },
    addProject(
      mainProgramIndex,
      programIndex,
      projectIndex,
      activityIndex,
      expenseIndex
    ) {
      let check = false;
      check = this.validationForm();
      if (check == check) {
        check = false;
        this.mainProgramForms[mainProgramIndex].programForms[
          programIndex
        ].projectForms.push({
          projectTitle: "",
          projectAipCode: "",
          activityForms: [
            {
              activityTitle: "",
              activityAipCode: "",
              activityDescription: "",
              expensesClassifications: [
                {
                  accountCode: "",
                  accountName: "",
                  amount: "",
                },
              ],
            },
          ],
        });
      } else {
        check = false;
      }
      check = false;
    },
    addActivity(
      mainProgramIndex,
      programIndex,
      projectIndex,
      activityIndex,
      expenseIndex
    ) {
      let check = false;
      check = this.validationForm();
      if (check == check) {
        this.mainProgramForms[mainProgramIndex].programForms[
          programIndex
        ].projectForms[projectIndex].activityForms.push({
          activityTitle: "",
          activityAipCode: "",
          activityDescription: "",
          expensesClassifications: [
            {
              accountCode: "",
              accountName: "",
              amount: "",
            },
          ],
        });
      }
    },
    addProgram(
      mainProgramIndex,
      programIndex,
      projectIndex,
      activityIndex,
      expenseIndex
    ) {
      let check = false;
      check = this.validationForm();
      if (check == true) {
        this.mainProgramForms.push({
          programForms: [
            {
              programTitle: "",
              programAipCode: "",
              projectForms: [
                {
                  projectTitle: "",
                  projectAipCode: "",
                  activityForms: [
                    {
                      activityTitle: "",
                      activityAipCode: "",
                      activityDescription: "",
                      expensesClassifications: [
                        {
                          accountCode: "",
                          accountName: "",
                          amount: "",
                        },
                      ],
                    },
                  ],
                },
              ],
            },
          ],
        });
      }
    },
    addExpense(
      mainProgramIndex,
      programIndex,
      projectIndex,
      activityIndex,
      expenseIndex
    ) {
      let check = false;
      check = this.validationForm();
      if (check == check) {
        this.mainProgramForms[mainProgramIndex].programForms[
          programIndex
        ].projectForms[projectIndex].activityForms[
          activityIndex
        ].expensesClassifications.push({
          accountCode: "",
          accountName: "",
          amount: "",
        });
      }
    },
    async getDep() {
      await axios
        .post("obligation/getDepartment", {
          year: this.selectedbudYr,
          fund_source: this.selectedfundSrc,
        })
        .then((res) => {
          this.department = res.data.department;
        });
    },
    async getTot() {
      await axios
        .post("obligation/getTot", {
          department: this.selectedDprtmnt,
        })
        .then((res) => {
          this.typeOfTransaction = res.data.typeOfTransaction;
        });
    },
    async getProg() {
      await axios
        .post("obligation/getProgram", {
          year: this.selectedbudYr,
          fund_source: this.selectedfundSrc,
          department: this.selectedDprtmnt,
        })
        .then((res) => {
          this.program = res.data.program;
          this.appro_id = res.data.program[0].appro_id;
        });
    },
    async getProj(main, prog) {
      await axios
        .post("obligation/getProject", {
          program: this.mainProgramForms[main].programForms[prog].programTitle,
          appro_id: this.appro_id,
        })
        .then((res) => {
          this.project = res.data.project;
        });
    },
    async getAct(main, prog, proj) {
      await axios
        .post("obligation/getActivity", {
          appro_id: this.appro_id,
          project:
            this.mainProgramForms[main].programForms[prog].projectForms[proj]
              .projectTitle,
        })
        .then((res) => {
          this.activity = res.data.acitivity;
          this.aipcode = res.data.acitivity[0].AIPCode;
        });
    },
    async getExp(main, prog, proj, act) {
      await axios
        .post("obligation/getExpense", {
          appro_id: this.appro_id,
          aipcode: this.aipcode,
        })
        .then((res) => {
          this.expense = res.data.expense;

          this.mainProgramForms[main].programForms[prog].projectForms[
            proj
          ].activityForms[act].expensesClassifications = res.data.expense;
        });
    },
    totalAmount(main, prog, proj, act, exp, max, amount) {
      let totalitem = "";
      totalitem =
        this.mainProgramForms[main].programForms[prog].projectForms[proj]
          .activityForms[act].expensesClassifications;
      let sum = 0;
      //get total

      for (const exp of totalitem) {
        if (exp.amount == undefined || exp.amount == "" || isNaN(exp.amount)) {
          exp.amount = 0;
        }
        if (exp.amount > max) {
          exp.amount = max;
        }
        exp.balance = exp.allot_amount - exp.amount;
        sum += parseFloat(exp.amount);
      }
      //sum
      this.mainProgramForms[main].programForms[prog].projectForms[
        proj
      ].activityForms[act].expenseTotal = sum;
      //get total
      let sumbal = 0;
      for (const exp of totalitem) {
        sumbal += parseFloat(exp.balance);
      }
      //sum
      this.mainProgramForms[main].programForms[prog].projectForms[
        proj
      ].activityForms[act].balanceTotal = sumbal;
    },
    async updateActivity() {
      // await axios.post(
      //   "/",
      //   this.mainProgramForms,
      //   this.selectedbudYr,
      //   this.selectedfundSrc,
      //   this.selectedDprtmt,
      //   this.typeOfTransaction,
      //   this.processSlipNo,
      //   this.cafoaAmount,
      //   this.particulars,
      //   this.purchaseRequestNo,
      //   this.purchaseRequestDate,
      //   this.payee,
      //   this.requestingOfficial,
      //   this.aipcode,
      //   this.appro_id
      // );
      await axios
        .post("obligation/reportObligation", {
          aipcode: this.aipact,
          appro_id: this.id,
        })
        .then((res) => {
          router.push({
            path: "/Obligation-Update-Cafoa",
            name: "Obligation for update CAFOA",
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
      this.budgetYear = res.data.Year;
      this.fundingSource = res.data.fundSource;
    });
  },
};
</script>
<template>
  <div class="flex justify-start m-8">
    <span class="text-[#1890FF] font-bold text-[22px]">
      For Process - CAFOA
    </span>
  </div>

  <div class="flex justify-start m-8">
    <div class="flex flex-col gap-4">
      <div class="flex flex-row gap-[100px]">
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Budget Year</span
          >
          <select
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="selectedbudYr"
            @change="getDep"
          >
            <option value="" selected disable>Select a Budget Year</option>
            <option v-for="by in budgetYear" :value="by.year">
              {{ by.year }}
            </option>
          </select>
        </div>
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Funding Source</span
          >
          <select
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="selectedfundSrc"
            @change="getDep"
          >
            <option value="" selected disable>Select a Budget Year</option>
            <option v-for="fs in fundingSource" :value="fs.fundSource_id">
              {{ fs.fund_Source }}
            </option>
          </select>
        </div>
      </div>
      <div class="flex flex-row gap-[100px]">
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Department/Office</span
          >
          <select
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="selectedDprtmnt"
            @change="getProg"
          >
            <option value="" selected disable>Select a Department</option>
            <option v-for="dep in department" :value="dep.department_code">
              {{ dep.department_name }}
            </option>
          </select>
        </div>
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Type of Transaction</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="typeOfTransaction"
          />
        </div>
      </div>
      <div class="flex flex-row gap-[100px]">
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Processing Slip No.</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="processingSlipNo"
          />
        </div>
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >CAFOA Amount</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="cafoaAmount"
          />
        </div>
      </div>
      <div class="flex flex-row gap-[100px] items-center">
        <span
          class="h-[32px] w-[220px] text-[14px] font-semibold text-[#606060]"
          >Particulars</span
        >
        <textarea
          name=""
          id=""
          cols="136"
          rows="5"
          class="border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          v-model="particulars"
        >
        </textarea>
      </div>
      <div class="flex flex-row gap-[100px]">
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Purchase Request No.</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="purchaseRequestNo"
          />
        </div>
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Purchase Request Date</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="purchaseRequestDate"
          />
        </div>
      </div>
      <div class="flex flex-row gap-[100px]">
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Payee</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="payee"
          />
        </div>
        <div class="flex flex-row gap-4 items-center">
          <span
            class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060]"
            >Requesting Official</span
          >
          <input
            type="text"
            name=""
            id=""
            class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="requestingOfficial"
          />
        </div>
      </div>
    </div>
  </div>
  <div
    v-for="(mainProgramForm, mainProgramIndex) in mainProgramForms"
    :key="mainProgramIndex"
  >
    <div
      v-for="(programForm, programIndex) in mainProgramForm.programForms"
      :key="programIndex"
      class="border rounded-md relative border-[#3A35418A] border-[#f5c639] mt-6 px-5 py-6 mx-4"
    >
      <div
        class="absolute top-0 right-0 cursor-pointer"
        @click="programForm.isVisible = !programForm.isVisible"
      >
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M7 10L12 15L17 10H7Z" fill="#3A3541" fill-opacity="0.54" />
        </svg>
      </div>
      <div class="flex flex-col gap-4">
        <div class="flex justify-between">
          <div class="flex flex-row xxxxl:gap-[200px]">
            <!-- TITLE OF THE PROGRAM -->
            <div class="text-sm font-semibold w-[330px]">
              Title of the Program
            </div>
            <div class="w-[360px] h-[32px] text-sm">
              <!-- <Textbox placeholder="Enter Program Title" /> -->

              <select
                name=""
                id=""
                class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="programForm.programTitle"
                @change="getProj(mainProgramIndex, programIndex)"
              >
                <option value="" selected disable>Select a Program</option>
                <option v-for="prog in program" :value="prog.program_code">
                  {{ prog.program }}
                </option>
              </select>
            </div>
          </div>

          <div class="flex flex-row xxxxl:gap-[200px]">
            <!-- AIP CODE PROGRAM -->
            <div class="text-sm font-semibold w-[330px]">
              AIP Code (Program)
            </div>
            <div class="w-[360px] h-[32px] text-sm">
              <!-- <Textbox placeholder="Enter Program AIP Code" /> -->
              <input
                type="text"
                readonly="readonly"
                placeholder="Enter Program AIP Code"
                class="border border-[#3a354147] flex items-center cursor-default rounded-md w-[360px] h-[32px] px-3 focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                v-model="programForm.programTitle"
              />
            </div>
          </div>
        </div>

        <div
          v-for="(projectForm, projectIndex) in programForm.projectForms"
          :key="projectIndex"
        >
          <div class="flex justify-between">
            <div class="flex flex-row xxxxl:gap-[200px]">
              <div
                class="text-sm font-semibold w-[330px]"
                v-if="programForm.isVisible"
              >
                Title of the Project
              </div>
              <div
                class="w-[360px] h-[32px] text-sm"
                v-if="programForm.isVisible"
              >
                <select
                  name=""
                  id=""
                  class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="projectForm.projectTitle"
                  @change="getAct(mainProgramIndex, programIndex, projectIndex)"
                >
                  <option value="" selected disable>Select a Project</option>
                  <option v-for="proj in project" :value="proj.project_code">
                    {{ proj.project }}
                  </option>
                </select>
              </div>
            </div>

            <div class="flex flex-row xxxxl:gap-[200px]">
              <!-- PROJECT AIP CODE -->
              <div
                class="text-sm font-semibold w-[330px]"
                v-if="programForm.isVisible"
              >
                AIP Code (Project)
              </div>
              <div
                class="w-[360px] h-[32px] text-sm"
                v-if="programForm.isVisible"
              >
                <!-- <Textbox placeholder="Enter Project AIP Code" /> -->
                <input
                  type="text"
                  readonly="readonly"
                  placeholder="Enter Project AIP Code"
                  class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                  v-model="projectForm.projectTitle"
                />
              </div>
            </div>
          </div>

          <div
            v-for="(activityForm, activityIndex) in projectForm.activityForms"
            :key="activityIndex"
          >
            <div class="flex justify-between mt-4">
              <div class="flex flex-row xxxxl:gap-[200px]">
                <!-- TITLE OF THE ACTIVITY -->
                <div
                  class="text-sm font-semibold w-[330px]"
                  v-if="programForm.isVisible"
                >
                  Title of the Activity
                </div>
                <div
                  class="w-[360px] h-[32px] text-sm"
                  v-if="programForm.isVisible"
                >
                  <!-- <Textbox placeholder="Enter Activity Title" /> -->
                  <select
                    name=""
                    id=""
                    class="h-[32px] w-[360px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                    v-model="activityForm.activityTitle"
                    @change="
                      getExp(
                        mainProgramIndex,
                        programIndex,
                        projectIndex,
                        activityIndex
                      )
                    "
                  >
                    <option value="" selected disable>
                      Select an Activity
                    </option>
                    <option v-for="act in activity" :value="act.activity_code">
                      {{ act.activity }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="flex flex-row xxxxl:gap-[200px]">
                <!-- ACTIVITY AIP CODE -->
                <div
                  class="text-sm font-semibold w-[330px]"
                  v-if="programForm.isVisible"
                >
                  AIP Code (Activity)
                </div>
                <div
                  class="w-[360px] h-[32px] text-sm"
                  v-if="programForm.isVisible"
                >
                  <!-- <Textbox placeholder="Enter Activity AIP Code" /> -->
                  <input
                    type="text"
                    readonly="readonly"
                    placeholder="Enter Activity AIP Code"
                    class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                    v-model="activityForm.activityTitle"
                  />
                </div>
              </div>
            </div>

            <!--ACTIVITY DESCRIPTION-->
            <div
              class="text-sm font-semibold mb-4"
              v-if="programForm.isVisible"
            >
              Activity Description
            </div>
            <textarea
              v-if="programForm.isVisible"
              type="text"
              class="col-span-1 lg:col-span-3 rounded-md w-full text-sm px-3 py-1 border border-[#3a354147] focus:border-transparent focus:outline-offset-0 focus:outline-2 focus:outline focus:outline-other-black-100 min-h-[100px]"
              rows="4"
              placeholder="Enter Activity Description"
              v-model="activityForm.activityDescription"
            ></textarea>
            <div
              class="col-spa n-1 sm:col-span-2 lg:col-span-4"
              v-if="programForm.isVisible"
            >
              <p class="font-bold text-base text-other-black mt-[20px]">
                Activity 1
              </p>
              <p class="font-normal text-sm text-text-gray mb-3">
                Kindly click the add button to add account title
              </p>
            </div>
            <div
              class="text-sm font-semibold mt-4"
              v-if="programForm.isVisible"
            >
              Details of Adjustment
            </div>
            <div class="flex justify-center" v-if="programForm.isVisible">
              <table class="w-800 text-xs">
                <thead class="font-semibold">
                  <tr>
                    <th>ACCOUNT TITLE</th>
                    <th>ACCOUNT CODE</th>
                    <th>APPROPRIATION</th>
                    <th>ALLOTMENT</th>
                    <th>AMOUNT OBLIGATED</th>
                    <th>BALANCE</th>
                  </tr>
                </thead>
                <tbody class="font-normal">
                  <tr
                    v-for="(
                      expense, expenseIndex
                    ) in activityForm.expensesClassifications"
                    :key="expenseIndex"
                  >
                    <td>
                      <input
                        readonly="readonly"
                        type="text"
                        class="border-none focus:ring-0"
                        v-model="expense.account_name"
                      />
                    </td>
                    <td>
                      <input
                        readonly="readonly"
                        type="text"
                        class="border-none focus:ring-0"
                        v-model="expense.account_code"
                      />
                    </td>
                    <td>
                      <input
                        readonly="readonly"
                        type="text"
                        class="border-none focus:ring-0"
                        v-model="expense.appro_amount"
                      />
                    </td>
                    <td>
                      <input
                        readonly="readonly"
                        type="text"
                        class="border-none focus:ring-0"
                        v-model="expense.allot_amount"
                      />
                    </td>
                    <td>
                      <input
                        type="number"
                        min="0"
                        v-model="expense.amount"
                        class="h-[32px] w-[260px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        @input="
                          totalAmount(
                            mainProgramIndex,
                            programIndex,
                            projectIndex,
                            activityIndex,
                            expenseIndex,
                            expense.allot_amount,
                            expense.amount
                          )
                        "
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        readonly="readonly"
                        class="border-none focus:ring-0"
                        v-model="expense.balance"
                      />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button
                        class="text-base uppercase text-white bg-button-blue p-4 rounded-full"
                        @click="
                          addExpense(
                            mainProgramIndex,
                            programIndex,
                            projectIndex,
                            activityIndex,
                            expenseIndex
                          )
                        "
                      >
                        +
                      </button>
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
                <tfoot class="font-semibold">
                  <th>Total</th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <span>Total Amount: {{ activityForm.expenseTotal }}</span>
                  </td>
                  <td>
                    <span>Total Balance: {{ activityForm.balanceTotal }}</span>
                  </td>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="flex gap-4 my-8" v-if="programForm.isVisible">
            <button
              class="py-2 px-7 bg-[#FFB400] rounded text-white"
              @click="
                addProject(
                  mainProgramIndex,
                  programIndex,
                  projectIndex,
                  activityIndex,
                  expenseIndex
                )
              "
            >
              ADD PROJECT
            </button>
            <button
              class="py-2 px-7 bg-tenthBtn rounded text-white"
              @click="
                addActivity(
                  mainProgramIndex,
                  programIndex,
                  projectIndex,
                  activityIndex,
                  expenseIndex
                )
              "
            >
              ADD ACTIVITY
            </button>
          </div>
        </div>
      </div>

      <!-- <div
        class="md:absolute right-0 bottom-0 justify-between sm:justify-end flex md:mr-5 md:mb-4 text-white sm:gap-x-11"
        v-if="programForm.isVisible"
      >
        <button
          class="bg-button-blue py-2 w-125 rounded-md"
          @click="
            forRev ? this.saveNewAppropriation() : this.saveAppropriation()
          "
        >
          SAVE
        </button>
        <button class="bg-danger-color py-2 w-125 rounded-md">CLEAR</button>
      </div> -->
    </div>
  </div>

  <div class="flex justify-end m-8 gap-8">
    <button
      class="w-[133px] h-[42px] rounded-[5px] text-white uppercase text-[15px] font-medium bg-[#16B1FF]"
      @click="updateActivity"
    >
      save
    </button>
    <button
      class="w-[133px] h-[42px] rounded-[5px] text-white uppercase text-[15px] font-medium bg-danger-color"
    >
      cancel
    </button>
  </div>
</template>
