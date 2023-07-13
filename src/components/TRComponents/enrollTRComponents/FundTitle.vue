<template>
  <!-- bordered div-->
  <div v-for="(fundForm, fundIndex) in fundForms" :key="fundIndex">
    <div
      v-for="(mainForm, mainIndex) in fundForm.mainFundForms"
      :key="mainIndex"
      class="grid grid-rows-1"
    >
      <div
        class="py-[17px] outline outline-[6px] outline-[#ffecb3] rounded-[24px] shadow-[0px_2px_10px_0px_#00000040] gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
      >
        <!--main fund title and textbox-->
        <div
          class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center mb-7"
        >
          <div class="font-semibold text-sm">Main Fund Title:</div>
          <div class="h-32 relative">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              v-model="mainForm.mainFundTitle"
              :disabled="
                mainIndex + 1 !== fundForm.mainFundForms.length
                  ? 1
                  : mainIndex == 0
                  ? forRev
                    ? 1
                    : 0
                  : 0
              "
            />
          </div>
        </div>
        <!--purpose div-->
        <div
          v-for="(subForm, index) in mainForm.subFundForms"
          :key="index"
          class="flex flex-col gap-3"
        >
          <div class="grid gap-4 mb-4">
            <div
              class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center"
            >
              <div
                class="font-normal text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] italic after:flex-[1] after:border-b-[1px]"
              >
                Purpose No. {{ index + 1 }}
              </div>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4 w-[100%]">
            <div class="grid lg:grid-cols-[194px_auto] items-center">
              <div class="font-semibold text-sm">Sub Fund Title:</div>
              <div class="h-32 relative">
                <input
                  type="text"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                  v-model="subForm.subFundTitle"
                  :placeholder="'Form ' + (index + 1) + ' Name'"
                  :disabled="
                    mainIndex + 1 !== fundForm.mainFundForms.length
                      ? 1
                      : index == 0
                      ? forRev
                        ? 1
                        : 0
                      : index + 1 == mainForm.subFundForms.length
                      ? 0
                      : 1
                  "
                />
              </div>
            </div>

            <div class="grid lg:grid-cols-[194px_auto] items-center none">
              <div class="font-semibold text-sm">Amount Allocated:</div>
              <div class="h-32 relative">
                <input
                  type="text"
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                  v-model="subForm.amountAllocated"
                  :disabled="
                    index + 1 !== mainForm.subFundForms.length
                      ? 1
                      : index == 0
                      ? forRev
                        ? 1
                        : 0
                      : 0
                  "
                />
              </div>
            </div>
          </div>
          <div
            class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center"
          >
            <div class="font-semibold text-sm">Specific Purpose:</div>
            <div class="h-32 relative">
              <input
                type="text"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
                v-model="subForm.specificPurpose"
                :disabled="
                  index + 1 !== mainForm.subFundForms.length
                    ? 1
                    : index == 0
                    ? forRev
                      ? 1
                      : 0
                    : 0
                "
              />
            </div>
          </div>
          <div class="grid grid-cols-4 gap-4 grid-flow-row-dense">
            <div class="grid lg:grid-cols-[194px_auto] items-center col-span-3">
              <div class="font-semibold text-sm">Implementing Office:</div>
              <div class="h-32 relative">
                <select
                  class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
                  v-model="subForm.selectedDept"
                  :disabled="
                    index + 1 !== mainForm.subFundForms.length
                      ? 1
                      : index == 0
                      ? forRev
                        ? 1
                        : 0
                      : 0
                  "
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
            </div>
            <div class="gap-x-[17px] flex items-center justify-end">
              <button
                class="font-medium text-[15px] leading-[24px] px-[26px] h-42 text-white bg-[#ff4c51] shadow-md rounded-[5px]"
                @click="cancelFund(fundIndex, mainIndex, index)"
                :disabled="
                  index + 1 !== mainForm.subFundForms.length
                    ? 1
                    : index == 0
                    ? forRev
                      ? 1
                      : 0
                    : 0
                "
              >
                CANCEL
              </button>
              <button
                class="font-medium text-[15px] leading-[24px] px-[26px] h-42 bg-[#ffecb3] shadow-md rounded-[5px]"
                @click="forRev ? addTR(index) : saveTR()"
                :disabled="
                  index + 1 !== mainForm.subFundForms.length
                    ? 1
                    : index == 0
                    ? forRev
                      ? 1
                      : 0
                    : 0
                "
              >
                SAVE
              </button>
            </div>
          </div>
        </div>

        <!--button to add purpose div-->
        <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
          <div
            class="font-normal text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] italic after:flex-[1] after:border-b-[1px]"
          >
            <button
              class="font-normal text-[14px] leading-[24px] px-[10px] py-[3.5px] bg-[#ffecb3] italic rounded-md"
              @click="addSubFund(fundIndex, mainIndex, index)"
            >
              + Add more Purpose
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--for review button-->
    <div
      class="my-[25px] gap-x-[27px] px-[41px] text-white grid justify-items-end"
    >
      <button
        v-if="forRev"
        class="font-medium text-[15px] leading-[26px] px-[26px] rounded-[5px] h-42 bg-button-blue"
        @click="forReview()"
      >
        FOR REVIEW
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import DeptAPI from "../../../api_request/documentManagement/departmentDrop";
export default {
  data() {
    return {
      StrOption: "",

      //Unexpended balance of
      childMessage: "",
      forRev: false,
      deptOptions: [],

      fundForms: [
        {
          mainFundForms: [
            {
              mainFundTitle: "",
              subFundForms: [
                {
                  subFundTitle: "",
                  amountAllocated: "",
                  specificPurpose: "",
                  selectedDept: "",
                },
              ],
            },
          ],
        },
      ],
    };
  },
  props: ["trustReceipt"],
  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });
  },
  methods: {
    async saveTR() {
      //
      let check = false;
      check = this.validation();
      const fundData = [];
      if (check == true) {
        for (const fundkey in this.fundForms) {
          let funditem = this.fundForms[fundkey];
          for (const mainkey in funditem.mainFundForms) {
            let mainitem = funditem.mainFundForms[mainkey];
            const mainFundForm = {
              main_fund_title: mainitem.mainFundTitle,
              sub_fund_form: [],
            };
            for (const subkey in mainitem.subFundForms) {
              let subitem = mainitem.subFundForms[subkey];
              const sub_fund_form = {
                sub_fund_title: subitem.subFundTitle,
                amount_allocated: subitem.amountAllocated,
                specific_purpose: subitem.specificPurpose,
                implementing_office: subitem.selectedDept,
              };
              mainFundForm.sub_fund_form.push(sub_fund_form);
            }
            fundData.push({ main_fund_form: [mainFundForm] });
          }
        }
        if (check == true) {
          await axios
            .post("trustfunds/enrollDonation", {
              fund_data: fundData,
              company_name: this.trustReceipt.nameOfCompany,
              document_source: this.trustReceipt.selectedFile,
              general_description: this.trustReceipt.generalDescription,
              official_receipt_amount: this.trustReceipt.officialReceiptAmount,
              official_receipt_no: this.trustReceipt.officialReceiptNo,
              official_receipt_date: this.trustReceipt.officialReceiptDate,
            })
            .then((res) => {
              localStorage.setItem("donation_id", res.data.donation_id);
              (this.forRev = true), this.$emit("data-to-parent", this.forRev);
            });
        }
      }

      // const createTrust = {};
    },
    async addTR(fundIndex, mainIndex, index) {
      const fundData = [];
      this.validation();
      if (this.validation() == true) {
        for (const fundkey in this.fundForms) {
          let funditem = this.fundForms[fundkey];
          for (const mainkey in funditem.mainFundForms) {
            let mainitem = funditem.mainFundForms[mainkey];
            const mainFundForm = {
              main_fund_title: mainitem.mainFundTitle,
              sub_fund_form: [],
            };
            let subitem = mainitem.subFundForms[index];
            const sub_fund_form = {
              sub_fund_title: subitem.subFundTitle,
              amount_allocated: subitem.amountAllocated,
              specific_purpose: subitem.specificPurpose,
              implementing_office: subitem.selectedDept,
            };
            mainFundForm.sub_fund_form.push(sub_fund_form);
            fundData.push({ main_fund_form: [mainFundForm] });
          }
          await axios
            .post("trustfunds/donationAddSubFund", {
              fund_data: fundData,
              tfid: localStorage.getItem("donation_id"),
            })
            .then((res) => {
              localStorage.setItem("donation_id", res.data.donation_id);
              (this.forRev = true), this.$emit("data-to-parent", this.forRev);
            });
        }
      }
    },
    validation() {
      let check = false;
      for (let fundkey in this.fundForms) {
        let funditem = this.fundForms[fundkey];
        for (let mainkey in funditem.mainFundForms) {
          let mainitem = funditem.mainFundForms[mainkey];
          for (let key in mainitem.subFundForms) {
            // Access the property key and its corresponding value
            let item = mainitem.subFundForms[key];
            // validate if it is empty
            if (
              this.trustReceipt.nameOfCompany == "" ||
              this.trustReceipt.selectedFile == null ||
              this.trustReceipt.generalDescription == "" ||
              this.trustReceipt.officialReceiptAmount == "" ||
              this.trustReceipt.officialReceiptDate == "" ||
              this.trustReceipt.officialReceiptNo == "" ||
              mainitem.mainFundTitle == "" ||
              item.subFundTitle == "" ||
              item.amountAllocated == "" ||
              item.specificPurpose == "" ||
              item.selectedDept == ""
            ) {
              check = false;
            } else {
              check = true;
            }
          }
        }
      }
      return check;
    },
    forReview() {
      axios
        .post("trustfunds/donationForReview", {
          tfid: localStorage.getItem("donation_id"),
        })
        .then(
          localStorage.removeItem("donation_id")((this.forRev = false))
          // this.$router.push("/Dashboard")
        )
        .catch((error) => {
          // Handle the error
          console.error("An error occurred:", error);
        });
    },
    addSubFund(fundIndex, mainIndex, index) {
      let check = false;
      check = this.validation();
      if (check == true) {
        this.fundForms[fundIndex].mainFundForms[mainIndex].subFundForms.push({
          subFundTitle: "",
          amountAllocated: "",
          specificPurpose: "",
          selectedDept: "",
        });
      }
    },
    addMainFund(fundIndex, mainIndex, index) {
      let check = false;
      check = this.validation();
      if (check == true) {
        this.fundForms[fundIndex].mainFundForms.push({
          mainFundTitle: "",
          subFundForms: [
            {
              subFundTitle: "",
              amountAllocated: "",
              specificPurpose: "",
              selectedDept: "",
            },
          ],
        });
      }
    },
    cancelFund(fundIndex, mainIndex, index) {
      let directory =
        this.fundForms[fundIndex].mainFundForms[mainIndex].subFundForms[index];
      directory.subFundTitle = "";
      directory.amountAllocated = "";
      directory.specificPurpose = "";
      directory.selectedDept = "";
    },
  },
  // async created() {
  //   const response = await axios
  //     .post("trustfunds/donationAddSubFund")
  //     .then((response) => {
  //       localStorage.setItem("donation_id", response);
  //       console.log(localStorage.setItem("donation_id", response));
  //     });
  // },
};
</script>
