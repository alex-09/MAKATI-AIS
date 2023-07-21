<script setup>
import HeaderBar from "../../components/TRComponents/headerComponent/HeaderComponent.vue";
import NavBar from "../../components/TRComponents/navComponents/NavComponent.vue";
import detailsTable from "../../components/TRComponents/UpdateTRComponents/detailsTable.vue";
import Dropdown from "../../components/TRComponents/reusableComponents/Dropdown.vue";
</script>
<script>
import axios from "axios";
import router from "../../router/index";
export default {
  data() {
    return {
      sourceOfTrustReceipts: "",
      list: [],
      mainFundTitle: [],
      selectedMainFundTitle: null,
      selectedSource1: [],
      selectedSource2: [],
      selectedSource3: [],
      selectedSource4: [],
    };
  },
  methods: {
    searchProcess() {
      if (this.sourceOfTrustReceipts !== "")
        if (this.selectedMainFundTitle !== null) {
          axios
            .post("trustfunds/searchTr", {
              id: this.sourceOfTrustReceipts,
              main_title: this.selectedMainFundTitle,
            })
            .then((res) => {
              this.list = res.data.result;
            });
        }
    },
    optionHidden() {
      alert("Please select");
    },
    updateTr(value) {
      // console.log(value);
      alert(value.addition);
      axios.post("trustfunds/updateTr", {
        id: value.id,
        update_reasons: value.update_reasons,
        addition: value.addition,
        deduction: value.deduction,
        type: value.type,
      });
    },
    forReview() {
      axios
        .post("trustfunds/unexpendedForReview", {
          tfid: localStorage.getItem("unex_id"),
        })
        .then(
          localStorage.removeItem("unex_id")(
            (this.forRev = false)
            // this.$router.push("/budget-management/trust-fund")
          )
        );
    },
    back() {
      this.$router.push("/budget-management/trust-fund");
    },
  },
  // created() {
  //   alert("Create");
  // },
  async mounted() {
    await axios.get("trustfunds/listMainFund").then((res) => {
      this.mainFundTitle = res.data.list;
      for (let list in this.mainFundTitle) {
        let listitem = this.mainFundTitle[list];
        if (listitem.tr_type == 1) {
          this.selectedSource1.push(listitem.main_fund_title);
        }
        if (listitem.tr_type == 2) {
          this.selectedSource2.push(listitem.main_fund_title);
        }
        if (listitem.tr_type == 3) {
          this.selectedSource3.push(listitem.main_fund_title);
        }
        if (listitem.tr_type == 4) {
          this.selectedSource4.push(listitem.main_fund_title);
        }
      }
      console.log();
    });
  },
};
</script>
<template>
  <!--header and navigation bar-->
  <div class="sticky top-0 z-50">
    <HeaderBar :pagetitle="'Budgetary Account Transaction'" />
    <NavBar :navbartitle="'Trust Funds'" />
  </div>

  <!--body -->
  <div class="container min-w-full px-0">
    <div class="mx-[35px] mt-[21px]">
      <!--title-->
      <div class="items-center">
        <div class="font-bold text-[24px] leading-[27px] m">
          Update Trust Receipts
        </div>
      </div>
      <!--dropdowns -->
      <div
        class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] mt-[27px] gap-x-[42px]"
      >
        <div class="grid md:grid-cols-[194px_auto] md:col-span-1 items-center">
          <div class="font-semibold text-sm">Source of Trust Receipts:</div>
          <div class="h-32 relative">
            <!-- <Dropdown /> -->
            <select 
            class="rounded-[6px] w-[400px] h-[32px] text-[14px] py-0"
            v-model="sourceOfTrustReceipts">
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
        </div>
        <div class="grid md:grid-cols-[194px_auto] md:col-span-1 items-center">
          <div class="font-semibold text-sm">Main Fund Title:</div>
          <div class="h-32 relative">
            <!-- <Dropdown /> -->
            <select 
            class="rounded-[6px] w-[400px] h-[32px] text-[14px] py-0"
            v-if="sourceOfTrustReceipts == 0">
              <option selected disabled>Main Fund Title</option>
            </select>
            <select
              class="w-[400px] h-[32px]"
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
      </div>

      <!--back and process buttons-->
      <div class="flex mt-7 gap-x-5 items-center justify-end">
        <button
          class="px-[26px] font-medium text-[15px] leading-[26px] h-42 text-white bg-danger-color rounded-[5px] shadow-md"
          @click="back"
        >
          BACK
        </button>
        <button
          class="px-[26px] font-medium text-[15px] leading-[26px] h-42 bg-dashboardBtn3 rounded-[5px] shadow-md"
          @click="searchProcess"
        >
          PROCESS
        </button>
      </div>

      <!--table-->
      <div
        class="flex items-center justify-center font-bold text-[22px] leading-[27px] mt-[27px]"
      >
        Details of Updates
      </div>
      <detailsTable v-if="this.list <= 0" />

      <!--for review and cancel button-->
      <div class="my-[25px] gap-x-[27px] flex justify-end">
        <button
          class="px-[26px] rounded-[5px] h-42 bg-button-blue text-white"
          @click="forReview"
        >
          FOR REVIEW
        </button>
        <!-- <button class="px-[26px] rounded-[5px] h-42 bg-danger-color text-white">
          CANCEL
        </button> -->
      </div>
    </div>
  </div>
</template>
