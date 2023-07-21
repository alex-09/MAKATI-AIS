<template>
  <div class="px-0 sticky top-0 left-0">
    <div class="mx-[30px] mt-[21px]">
      <div class="items-center flex w-full justify-between">
        <div class="font-bold text-[24px] leading-[27px] m">
          List of Trust Receipts on Process
        </div>
        <div class="h-32 relative">
          <!-- <Dropdown /> -->
          <select 
          class="rounded-[6px] w-[400px] h-[32px] text-[14px] py-0"
          v-model="sourceOfTrustReceipts" @change="search">
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
  </div>
  <table class="min-w-max mt-[40px]">
    <thead class="font-semibold text-xs border-text-gray border-b-[1px]">
      <th><input type="checkbox" /></th>
      <th class="w-[172px] py-[6px]">DATE</th>
      <th class="w-[160px]">TIME</th>
      <th class="w-[183px]">TYPE</th>
      <th class="w-[183px]">SOURCE OF TRUST RECEIPTS</th>
      <th class="w-[183px]">MAIN FUND TITLE</th>
      <th class="w-[183px]">SUB-FUND TITLE</th>
      <th class="w-[183px]">IMPLEMENTING OFFICE</th>
      <th class="w-[183px]">AMOUNT</th>
      <th class="w-[183px]">PROCESSOR</th>
      <th class="w-[183px]">REVIEWER</th>
      <th class="w-[183px]">STATUS</th>
      <th class="w-[183px]">ACTION</th>
    </thead>
    <tbody>
      <tr v-for="item in list.list" class="border-text-gray border-b-[1px]">
        <td class="px-[16px]">
          <div>
            <input type="checkbox" />
          </div>
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.date }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.time }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.type }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.str_name }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.main_fund_title }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.sub_fund_title }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.item.implementing_office }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.amount_allocated }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.processor }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.reviewer }}
        </td>
        <td class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
          {{ item.status }}
        </td>
        <td class="py-[6px] px-[3px] whitespace-nowrap text-center">
          <div class="flex flex-row gap-2 justify-center">
            <button
              class="outline-1 outline outline-[#3a354147] font-bold text-xl rounded-md h-full px-[7px] text-dashboardBtn3"
            >
              P
            </button>
            <button
              class="outline-1 outline outline-[#3a354147] font-bold text-xl rounded-md h-full px-[7px] text-dashboardBtn3"
            >
              E
            </button>
            <button
              class="outline-1 outline outline-[#3a354147] font-bold text-xl rounded-md h-full px-[7px] text-dashboardBtn3"
            >
              A
            </button>
            <button
              class="outline-1 outline outline-[#3a354147] font-bold text-xl rounded-md h-full px-[7px] text-dashboardBtn3"
            >
              D
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script setup>
import { ref } from "vue";
import Textbox from "../reusableComponents/Textbox.vue";

// var RowCount = ref(9);
</script>
<script>
import axios from "axios";
export default {
  data() {
    return {
      date: "",
      time: "",
      type: "",
      sourceOfTrustReceipts: "",
      mainFundTitle: "",
      subFundTitle: "",
      implementingOffice: "",
      amount: "",
      processor: "",
      reviewer: "",
      status: "",
      list: [],
    };
  },
  methods: {
    search() {
      axios
        .post("trustfunds/searchOnProcess", {
          tf_type: this.sourceOfTrustReceipts,
        })
        .then((res) => {
          console.log(res);
          this.list = res.data;
        });
    },
  },
  async mounted() {
    await axios("trustfunds/forReviewTr").then((res) => {
      this.list = res.data;
    });
  },
};
</script>
