<template>
  <div
    class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
  >
    <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
      <div class="font-semibold text-sm">Legal Basis:</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" v-model="legalBasis" /> -->
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.legalBasis"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>
    <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
      <div class="font-semibold text-sm">General Description:</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" v-model="sourceDocument" /> -->
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.generalDescription"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>
  </div>
  <FundTitle4
    :trustReceipt="trustReceipt"
    @data-to-parent="updateParentData"
  ></FundTitle4>
  <!-- <p>Message from child: {{ childMessage }}</p> -->
</template>

<script setup>
import FundTitle4 from "./FundTitle4.vue";
import Textbox from "../reusableComponents/Textbox.vue";
</script>

<script>
export default {
  components: {
    FundTitle4,
  },
  data() {
    return {
      childData: "",
      trustReceipt: {
        legalBasis: "",
        generalDescription: "",
      },
    };
  },
  methods: {
    updateParentData(res) {
      this.childData = res;
    },
  },
};
</script>
