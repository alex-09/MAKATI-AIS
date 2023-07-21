<script setup>
import TransferView from "../../components/TRComponents/enrollTRComponents/TransferView.vue";
import UnexpendedView from "../../components/TRComponents/enrollTRComponents/UnexpendedView.vue";
import DonationView from "../../components/TRComponents/enrollTRComponents/DonationView.vue";
import Purpose from "../../components/TRComponents/enrollTRComponents/PurposeComponent.vue";
import STRDropdown from "../../components/TRComponents/enrollTRComponents/STRdropdown.vue";
import HeaderBar from "../../components/TRComponents/headerComponent/HeaderComponent.vue";
import NavBar from "../../components/TRComponents/navComponents/NavComponent.vue";
import LGUCounterpartView from "../../components/TRComponents/enrollTRComponents/LGUCounterpartView.vue";
import FundTitle from "../../components/TRComponents/enrollTRComponents/FundTitle.vue";

import Textbox from "../../components/TRComponents/reusableComponents/Textbox.vue";

const STRDrop = [
  "Donation from Private Sector",
  "Unexpended Balance of LDRRMF",
  "Transfer from Other Government Agencies",
  "LGU Counterpart Contribution for Specific Projects",
];
var StrOption = ref("Donation from Private Sector");

const props = defineProps({
  number: Number,
});
</script>

<script>
import axios from "axios";
import DeptAPI from "../../api_request/documentManagement/departmentDrop";
import { ref } from "vue";
let purposeCount = ref(1);
export default {
  data() {
    return {
      StrOption: "",
      // Donation from Private Sector data
      companyName: "",
      sourceDocu: "",
      generalDesc: "",
      officialRec: "",
      officialRecDate: "",
      officialRecAmount: "",

      //Unexpended balance of
      childMessage: "",

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
  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });
  },
  methods: {
    enrollTrust(mainIndex) {
      const createTrust = {};
    },
    cancelFund(fundIndex, mainIndex, index) {
      let sampl =
        this.fundForms[fundIndex].mainFundForms[mainIndex].subFundForms[index]
          .subFundTitle;
      alert(sampl);
      sampl = " ";
      alert(sampl);
    },
  },
};
</script>

<template>
  <!--header and navigation bar-->
  <div class="sticky top-0 left-0 z-50">
    <HeaderBar :pagetitle="'Budgetary Account Transaction'" />
    <NavBar :navbartitle="'Trust Funds'" />
  </div>

  <!--body-->
  <div class="container min-w-full px-0">
    <div class="mx-[69px] mt-[21px] bg-white">
      <!--title and STR Dropdown-->
      <div class="grid grid-row lg:grid-cols-2 items-center px-[42px] gap-x-12">
        <div class="grid grid-row lg:grid-cols-[auto_auto] items-center">
          <div class="font-bold text-[24px] leading-[27px] m">
            Enroll/New Trust Receipts
          </div>
          <div class="font-semibold text-sm text-center lg:text-end">
            Source of Trust Receipts:
          </div>
        </div>
        <div class="relative h-32 items-center">
          <STRDropdown :dataArray="STRDrop" v-model="StrOption" />
        </div>
      </div>
      <!--main grid depending on selected str-->
      <!-- <UnexpendedView
        v-if="StrOption == STRDrop[1]"
        @child-event="handleChildEvent"
      ></UnexpendedView>
      <p>Message from child: {{ childMessage }}</p> -->
      <DonationView v-if="StrOption == STRDrop[0]" />
      <UnexpendedView v-if="StrOption == STRDrop[1]" />
      <TransferView v-if="StrOption == STRDrop[2]" />
      <LGUCounterpartView v-if="StrOption == STRDrop[3]" />
    </div>
  </div>
</template>
