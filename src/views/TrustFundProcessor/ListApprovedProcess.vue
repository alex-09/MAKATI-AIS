<script setup>
import HeaderBar from "../../components/TRComponents/headerComponent/HeaderComponent.vue";
import NavBar from "../../components/TRComponents/navComponents/NavComponent.vue";
import TableComponent2 from "../../components/TRComponents/ListofTRComponents/TableComponent2.vue";
import Searchbox from "../../components/TRComponents/reusableComponents/Searchbox.vue";
</script>
<script>
import router from "../../router/index";
export default {
  methods: {
    close() {
      this.$router.push("/budget-management/trust-fund");
    },
  },
};
</script>
<template>
  <div class="overflow-auto h-[100vh]">
    <!--header and navigation-->
    <div class="sticky top-0 left-0 z-50 h-[max-content] w-full">
      <HeaderBar :pagetitle="'Budgetary Account Transaction'" />
      <NavBar :navbartitle="'Trust Funds'" />
    </div>

    <!--title and searchbox-->
    <!-- <div class="px-0 sticky top-0 left-0">
      <div class="mx-[30px] mt-[21px]">
        <div class="items-center flex w-full justify-between">
          <div class="font-bold text-[24px] leading-[27px] m">
            List of Trust Receipts on Process
          </div>
          <div class="h-32 relative"> -->
    <!-- <Dropdown /> -->
    <!-- <select v-model="sourceOfTrustReceipts">
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
      </div>
    </div> -->

    <!--table-->
    <div class="px-[30px] mt-10">
      <TableComponent2 />
    </div>

    <!--button-->
    <div class="items-center flex justify-center mt-3 sticky top-0 left-0">
      <button
        class="font-medium text-[15px] leading-[26px] px-[26px] h-42 text-white bg-danger-color rounded-[5px]"
        @click="close"
      >
        CLOSE
      </button>
    </div>
  </div>
</template>
