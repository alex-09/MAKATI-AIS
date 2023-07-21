<script setup>
import BaseListbox from "../baseListbox.vue";
import { ref } from "vue";

const form = ref({
  year_id: null,
});
</script>
<script>
import axios from "axios";
export default {
  data() {
    return {
      year: [],
      department: [],
      aipcode: [],
      activity: [],

      selectedbudYr: "",
      selectedDep: "",
      selectedAipCode: "",
      selectedActivity: "",
      budgetYear: [],

      isPer: null,
    };
  },
  methods: {
    sendDataToParent() {
      this.$emit(
        "data-updated",
        this.selectedbudYr,
        this.selectedDep,
        this.selectedAipCode,
        this.selectedActivity
      );
    },
  },
  async created() {
    await axios.get("appropriation/dropdown").then((res) => {
      this.year = res.data.Year;
    });
  },
};
</script>
<template>
  <div class="float-left mx-8 mt-8 my-6">
    <span class="text-2xl font-bold text-other-blue"
      >Registries of Application, Allotment and Obligations</span
    >
  </div>
  <!-- RADIO BUTTON -->
  <div class="container grid justify-items-center">
    <div class="flex items-center gap-36">
      <!-- RADIO 1 BUTTON AND LABEL -->
      <div class="flex items-center">
        <input
          type="radio"
          name="newTrans"
          id=""
          v-model="isPer"
          value="true"
        />
        <label
          for="newTrans"
          class="text-sm font-semibold text-other-black ml-3"
          >Per Department</label
        >
      </div>
      <!-- RADIO 2 BUTTON ANDLABEL -->
      <div class="flex items-center">
        <input
          type="radio"
          name="newTrans"
          id=""
          v-model="isPer"
          value="false"
        />
        <label
          for="newTrans"
          class="text-sm font-semibold text-other-black ml-3"
          >Per Activity</label
        >
      </div>
    </div>
  </div>
  <!-- DROPDOWNS -->
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
          <option v-for="by in year" :value="by.year">
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
          v-model="selectedbudYr"
        >
          <option value="" disabled selected>Select Department</option>
          <option v-for="dep in department" :value="dep">
            {{ dep }}
          </option>
        </select>
      </div>
    </div>
  </div>
  <div class="container flex flex-row p-0 px-8">
    <div class="grid grid-flow-col auto-cols-max gap-8 my-2">
      <div class="flex items-center mr-14">
        <p class="text-sm font-semibold text-other-black capitalize">
          AIP Code
        </p>
      </div>
      <div class="flex items-center mx-4">
        <select
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
          v-model="selectedAipCode"
        >
          <option value="" disabled selected>Select AIP Code</option>
          <option v-for="aip in aipcode" :value="aip">
            {{ aip }}
          </option>
        </select>
      </div>
      <div class="flex items-center mr-14 ml-1">
        <p class="text-sm font-semibold text-other-black">Name of Activity</p>
      </div>
      <div class="flex items-center mx-3">
        <select
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
          v-model="selectedActivity"
        >
          <option value="" disabled selected>Select Activity</option>
          <option v-for="act in activity" :value="act">
            {{ act }}
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
