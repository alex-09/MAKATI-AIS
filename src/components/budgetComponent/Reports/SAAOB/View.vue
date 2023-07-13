<script setup>
import BaseListbox from "../baseListbox.vue";
import HeaderMenu from "../../../navigationComponent/headerComponent.vue";
import NavBar from "../../../navigationComponent/navbarComponent.vue";
import { ref } from "vue";
import axios from "axios";

const form = ref({
  year_id: null,
});
</script>

<script>
export default {
  data() {
    return {
      selectedbudYr: "",
      selectedDep: "",
      budgetYear: [],
    };
  },
  methods: {
    sendDataToParent() {
      this.$emit("data-updated", this.selectedbudYr, this.selectedDep);
    },
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.budgetYear = res.data.Year;
    });
  },
};
</script>

<template>
  <div class="float-left mx-8 mt-8">
    <span class="text-2xl font-bold text-other-blue"
      >Statement of Appropriation, Allotment, Obligation and Balances</span
    >
  </div>
  <div class="container flex flex-row p-0 px-8">
    <div class="grid grid-flow-col auto-cols-max gap-8 my-5">
      <div class="flex items-center mr-8">
        <p class="text-sm font-semibold text-other-black capitalize">
          budget year
        </p>
      </div>
      <div class="flex items-center mx-5">
        <select
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
          v-model="selectedbudYr"
        >
          <option value="" disabled selected>Select Budget Year</option>
          <option v-for="by in budgetYear" :value="by.year">
            {{ by.year }}
          </option>
        </select>
      </div>
      <div class="flex items-center mr-8">
        <p class="text-sm font-semibold text-other-black capitalize">
          department/office
        </p>
      </div>
      <div class="flex items-center mx-5">
        <select
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
          v-model="selectedDep"
        >
          <option value="" disabled selected>Select Department/Office</option>
          <option v-for="by in budgetYear" :value="by.year">
            {{ by.year }}
          </option>
        </select>
      </div>
      <div class="flex items-center mx-8">
        <button
          class="w-120 h-42 bg-button-blue rounded-md text-white uppercase font-medium"
          @click="sendDataToParent"
        >
          Search
        </button>
      </div>
    </div>
  </div>
</template>
