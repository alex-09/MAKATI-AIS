<script>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import Textbox from "../../../components/budgetComponent/allotmentComponent/textbox.vue";
import Dropdown from "../../../components/budgetComponent/allotmentComponent/dropdown.vue";
import TableComponent1 from "../../../components/budgetComponent/appropriationComponents/AppropriationTable1.vue";
import axios from "axios";
import { ref } from "vue";
import DeptAPI from "../../../api_request/documentManagement/departmentDrop";

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
      deptOptions: [],
      budgetYear: [],
      fundingSource: [],
      referenceDocument: [],
      typeOfAppropriation: [],
      department: [],

      selectedbudYr: "",
      selectedfundSrc: "",
      selectedrefDoc: "",
      selectedtypAppro: "",
      selectedDprtmnt: "",

      titleProject: [
        "titleProjectoption1",
        "titleProjectoption2",
        "titleProjectoption3",
        "titleProjectoption4",
      ],
      selectedtitleProject: "",
      titleActivity: [
        "titleActivityoption1",
        "titleActivityoption2",
        "titleActivityoption3",
        "titleActivityoption4",
      ],
      selectedtitleActivity: "",
      officeCode: "",

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
      totalExpense: [],

      forRev: false,
      appro_id: "",

      number: 1000000000,
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
      if (check == true) {
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
      if (check == true) {
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
      if (check == true) {
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
    getTotal(
      mainProgramIndex,
      programIndex,
      projectIndex,
      activityIndex,
      expenseIndex
    ) {
      let totalitem = "";
      totalitem =
        this.mainProgramForms[mainProgramIndex].programForms[programIndex]
          .projectForms[projectIndex].activityForms[activityIndex]
          .expensesClassifications;
      let sum = 0;
      for (const expense of totalitem) {
        sum += parseFloat(expense.amount);
      }
      this.mainProgramForms[mainProgramIndex].programForms[
        programIndex
      ].projectForms[projectIndex].activityForms[activityIndex].expenseTotal =
        sum;
    },

    async saveAppropriation() {
      const enrollApp = [];
      let check = false;
      check = this.validationForm();
      if (check == check) {
        for (const mainProgramFormKey in this.mainProgramForms) {
          let mainProgramFormItem = this.mainProgramForms[mainProgramFormKey];
          for (const programFormKey in mainProgramFormItem.programForms) {
            let programFormItem =
              mainProgramFormItem.programForms[programFormKey];
            const programForms = {
              program: programFormItem.programTitle,
              program_code: programFormItem.programAipCode,
              projectForms: [],
            };
            for (const projectFormKey in programFormItem.projectForms) {
              let projectFormItem =
                programFormItem.projectForms[projectFormKey];
              const projectForms = {
                project: projectFormItem.projectTitle,
                project_code: projectFormItem.projectAipCode,
                activityForms: [],
              };
              for (const activityFormKey in projectFormItem.activityForms) {
                let activityFormItem =
                  projectFormItem.activityForms[activityFormKey];
                const activityForms = {
                  activity: activityFormItem.activityTitle,
                  activity_aip_code: activityFormItem.activityAipCode,
                  activity_description: activityFormItem.activityDescription,
                  expenseTotal: activityFormItem.expenseTotal,
                  expensesClassifications: [],
                };
                for (const expenseClassificationsKey in activityFormItem.expensesClassifications) {
                  let expenseClassificationsItem =
                    activityFormItem.expensesClassifications[
                      expenseClassificationsKey
                    ];
                  const expensesClassifications = {
                    account_code: expenseClassificationsItem.accountCode,
                    account_name: expenseClassificationsItem.accountName,
                    appro_amount: expenseClassificationsItem.amount,
                  };
                  activityForms.expensesClassifications.push(
                    expensesClassifications
                  );
                }
                projectForms.activityForms.push(activityForms);
              }
              programForms.projectForms.push(projectForms);
            }
            enrollApp.push({ programForms });
          }
        }
        await axios
          .post("appropriation/enrollappro", {
            mainProgramForms: enrollApp,

            budget_year_id: this.selectedbudYr,
            fundSource_id: this.selectedfundSrc,
            reference_document: this.selectedrefDoc,
            approType_id: this.selectedtypAppro,
            department_code_id: this.selectedDprtmnt,
          })
          .then((res) => {
            localStorage.setItem("appro_id", res.data.appro_id);
            this.forRev = true;
            this.appro_id = res.data.appro_id;
            // (this.forRev = true), this.$emit("data-to-parent", this.forRev);
          });
      }
    },
    async saveNewAppropriation() {
      const enrollApp = [];
      let check = false;
      check = this.validationForm();
      if (check == true) {
        for (const mainProgramFormKey in this.mainProgramForms) {
          let mainProgramFormItem = this.mainProgramForms[mainProgramFormKey];
          for (const programFormKey in mainProgramFormItem.programForms) {
            let programFormItem =
              mainProgramFormItem.programForms[programFormKey];
            const programForms = {
              program: programFormItem.programTitle,
              program_code: programFormItem.programAipCode,
              projectForms: [],
            };
            for (const projectFormKey in programFormItem.projectForms) {
              let projectFormItem =
                programFormItem.projectForms[projectFormKey];
              const projectForms = {
                project: projectFormItem.projectTitle,
                project_code: projectFormItem.projectAipCode,
                activityForms: [],
              };
              for (const activityFormKey in projectFormItem.activityForms) {
                let activityFormItem =
                  projectFormItem.activityForms[activityFormKey];
                const activityForms = {
                  activity: activityFormItem.activityTitle,
                  activity_aip_code: activityFormItem.activityAipCode,
                  activity_description: activityFormItem.activityDescription,
                  expenseTotal: activityFormItem.expenseTotal,
                  expensesClassifications: [],
                };
                for (const expenseClassificationsKey in activityFormItem.expensesClassifications) {
                  let expenseClassificationsItem =
                    activityFormItem.expensesClassifications[
                      expenseClassificationsKey
                    ];
                  const expensesClassifications = {
                    account_code: expenseClassificationsItem.accountCode,
                    account_name: expenseClassificationsItem.accountName,
                    appro_amount: expenseClassificationsItem.amount,
                  };
                  activityForms.expensesClassifications.push(
                    expensesClassifications
                  );
                }
                projectForms.activityForms.push(activityForms);
              }
              programForms.projectForms.push(projectForms);
            }
            enrollApp.push({ programForms });
          }
        }
        await axios
          .post("appropriation/addProgram", {
            mainProgramForms: enrollApp,
            appro_id: localStorage.getItem("appro_id"),
            department_code_id: this.selectedDprtmnt,
            budget_year_id: this.selectedbudYr,
          })
          .then((res) => {
            localStorage.setItem("appro_id", res.data.donation_id);

            // (this.forRev = true), this.$emit("data-to-parent", this.forRev);
          });
      }
    },
    forReview() {
      axios
        .post("appropriation/forReview", {
          appro_id: this.appro_id,
        })
        .then(
          (this.forRev = false),
          this.$router.push("/List-of-Appropriation")
        )
        .catch((error) => {
          // Handle the error
          console.error("An error occurred:", error);
        });
    },
    close() {
      this.$router.push("/Budget");
    },
  },
  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.budgetYear = res.data.Year;
      this.fundingSource = res.data.fundSource;
      this.referenceDocument = res.data.ReferenceDocument;
      this.typeOfAppropriation = res.data.approType;
      this.department = res.data.department;
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
        <p class="font-bold text-2xl text-other-blue">
          Enroll New Appropriation
        </p>
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
          >
            <option value="" disabled selected>Select Budget Year</option>
            <option v-for="by in budgetYear" :value="by.year">
              {{ by.year }}
            </option>
          </select>
          <!---->
          <!-- FUNDING SOURCE DROPDOWN -->
          <div class="text-sm font-semibold lg:ml-14">Funding Source</div>
          <!-- <div class="relative h-30 text-sm">
            <Dropdown :dataArray="fundSrc" :placeholder="'Funding Source'" />
          </div> -->
          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedfundSrc"
          >
            <option value="" disabled selected>Select Funding Source</option>
            <option v-for="fs in fundingSource" :value="fs.fundSource_id">
              {{ fs.fund_Source }}
            </option>
          </select>
          <!---->
          <!-- REFERENCE DOCUMENT DROPDOWN -->
          <div class="text-sm font-semibold">Reference Document</div>
          <!-- <div class="relative h-30 text-sm">
            <Dropdown :dataArray="refDoc" :placeholder="'Reference Document'" />
          </div> -->

          <input
            placeholder="Enter Reference Document"
            type="text"
            class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            v-model="selectedrefDoc"
          />
          <!---->
          <!-- TYPE OF APPROPRIATION DROPDOWN -->
          <div class="text-sm font-semibold lg:ml-14">
            Type of Appropriation
          </div>
          <!-- <div class="relative h-30 text-sm">
            <Dropdown
              :dataArray="typAppro"
              :placeholder="'Type of Appropriation'"
            />
          </div> -->
          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedtypAppro"
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
          <!---->
          <!-- DEPARTMENT DROPDOWN -->
          <div class="text-sm font-semibold">Department</div>
          <!-- <div class="relative h-30 text-sm">
            <Dropdown :dataArray="Dprtmnt" :placeholder="'Department'" />
          </div> -->

          <select
            class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            v-model="selectedDprtmnt"
          >
            <option value="" disabled selected>
              Select a Department/Office
            </option>
            <option v-for="d in department" :value="d.department_code">
              {{ d.department_name }}
            </option>
          </select>
          <!---->
          <!-- OFFICE CODE TEXTBOX -->
          <div class="text-sm font-semibold lg:ml-14">Office Code</div>
          <!-- <div class="relative h-30 text-sm">
            <Textbox placeholder="Enter Office Code" />
          </div> -->
          <input
            placeholder="Enter Office Code"
            type="text"
            readonly="readonly"
            class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
            v-model="selectedDprtmnt"
          />
          <!---->
        </div>
      </div>

      <!-- PROGRAM FORM -->
      <div
        v-for="(mainProgramForm, mainProgramIndex) in mainProgramForms"
        :key="mainProgramIndex"
      >
        <div
          v-for="(programForm, programIndex) in mainProgramForm.programForms"
          :key="programIndex"
          class="border rounded-md relative border-[#3A35418A] mt-6 px-5 py-6"
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
              <path
                d="M7 10L12 15L17 10H7Z"
                fill="#3A3541"
                fill-opacity="0.54"
              />
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
                  <input
                    type="text"
                    placeholder="Enter Program Title"
                    class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                    v-model="programForm.programTitle"
                  />
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
                    placeholder="Enter Program AIP Code"
                    class="border border-[#3a354147] flex items-center cursor-default rounded-md w-[360px] h-[32px] px-3 focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                    v-model="programForm.programAipCode"
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
                    <!-- <Textbox placeholder="Enter Project Title" /> -->
                    <input
                      type="text"
                      placeholder="Enter Project Title"
                      class="border w-[360px] h-[32px] border-[#3a354147] flex items-center cursor-default rounded-md px-3 focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                      v-model="projectForm.projectTitle"
                    />
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
                      placeholder="Enter Project AIP Code"
                      class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                      v-model="projectForm.projectAipCode"
                    />
                  </div>
                </div>
              </div>

              <div
                v-for="(
                  activityForm, activityIndex
                ) in projectForm.activityForms"
                :key="activityIndex"
              >
                <div></div>
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
                      <input
                        type="text"
                        placeholder="Enter Program Activity Title"
                        class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                        v-model="activityForm.activityTitle"
                      />
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
                        placeholder="Enter Activity AIP Code"
                        class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                        v-model="activityForm.activityAipCode"
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
                    Kindly click the add button to add expenses
                  </p>
                </div>
                <div
                  class="text-sm font-semibold mt-4"
                  v-if="programForm.isVisible"
                >
                  Expenses Classification
                </div>
                <div class="flex justify-center" v-if="programForm.isVisible">
                  <table class="w-800 text-xs">
                    <thead class="font-semibold">
                      <tr>
                        <th>ACCOUNT CODE</th>
                        <th>ACCOUNT NAME</th>
                        <th>AMOUNT</th>
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
                            type="text"
                            class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                            v-model="expense.accountCode"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                            v-model="expense.accountName"
                          />
                        </td>
                        <td>
                          <input
                            type="number"
                            v-model.number="expense.amount"
                            class="border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:outline-none focus:border-none focus-visible:ring-2 focus-visible:ring-opacity-100 focus-visible:ring-other-black-100"
                            @input="
                              getTotal(
                                mainProgramIndex,
                                programIndex,
                                projectIndex,
                                activityIndex,
                                expenseIndex
                              )
                            "
                          />
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <button
                            class="bg-light-green rounded-sm text-white py-2 px-7"
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
                            ADD EXPENSES
                          </button>
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tfoot class="font-semibold">
                      <th>Total</th>
                      <td></td>
                      <td>
                        <span
                          >Total Amount:
                          {{
                            activityForm.expenseTotal?.toLocaleString()
                          }}</span
                        >
                      </td>
                    </tfoot>
                  </table>
                </div>
                <hr class="my-16" v-if="programForm.isVisible" />
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

          <div
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
          </div>
        </div>
      </div>
      <div
        class="border rounded-md justify-end flex items-center border-[#3A35418A] mt-2 px-5"
      >
        <div class="flex-end font-normal text-sm">ADD PROGRAM</div>
        <img
          class="block"
          src="../../../components/budgetComponent/appropriationComponents/FAB.svg"
          @click="addProgram"
        />
      </div>
      <div
        class="justify-between sm:justify-end mt-4 flex px-5 text-white sm:gap-x-11"
      >
        <button class="bg-11thBtn py-2 w-125 rounded-md" @click="forReview">
          FOR REVIEW
        </button>
        <button class="bg-danger-color py-2 w-125 rounded-md" @click="close()">
          CLOSE
        </button>
      </div>
    </div>
  </div>
</template>
<style scoped>
td,
th {
  width: 250px;
  border-bottom: 1px solid #3a35418a;
  text-align: center;

  padding-top: 6px;
  padding-bottom: 6px;
}
</style>
