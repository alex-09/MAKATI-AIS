<style scoped>
table {
  min-width: max-content;
  margin-top: 13px;
}
</style>

<template>
  <table class="min-w-max mt-[13px]">
    <thead class="font-semibold text-xs border-text-gray border-b-[1px]">
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
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.date"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.time"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.type"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.str_name"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.main_fund_title"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.sub_fund_title"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.implementing_office"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.amount_allocated"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.processor"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <input
              type="text"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
              :value="item.reviewer"
              disabled
            />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32">
            <Textbox :value="item.status" disabled />
          </div>
        </td>
        <td class="py-[6px] px-[3px]">
          <div class="h-32 flex justify-center gap-x-[15px]">
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
  async mounted() {
    await axios("trustfunds/listFurs").then((res) => {
      console.log(res.data);
      this.list = res.data;
    });
  },
};
</script>
