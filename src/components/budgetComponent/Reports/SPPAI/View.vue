<script setup>
import SearchIcon from "../../../icons/Budgetary/searchIcon.vue";
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
      search: "",
      selectedbudYr: "",
    };
  },
  methods: {
    emitDataUpdated() {
      this.$emit("data-updated", this.search, this.selectedbudYr);
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
  <div class="flex flex-row justify-between">
    <div class="mx-8 mt-8">
      <span class="text-2xl font-bold text-other-blue"
        >Status of Program/Projects/Activities Implementations</span
      >
    </div>
    <div class="mx-8 mt-8">
      <label class="relative">
        <input
          type="text"
          name="search"
          placeholder="Search"
          class="w-308 h-144 border rounded px-4 focus:outline-none text-sm bg-search-color"
          v-model="search"
          @input="emitDataUpdated"
        />
        <SearchIcon
          class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
        />
      </label>
    </div>
  </div>
  <div class="flex flex-row">
    <div class="flex items-center mx-8 mt-4">
      <p class="text-sm font-semibold text-other-black capitalize">
        budget year
      </p>
    </div>
    <div class="flex items-center mx-8 mt-4">
      <select
        class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
        v-model="selectedbudYr"
        @change="emitDataUpdated"
      >
        <option value="" disabled selected>Select Budget Year</option>
        <option v-for="by in year" :value="by.year">
          {{ by.year }}
        </option>
      </select>
    </div>
    <div class="flex items-center mt-4">
      <p class="text-sm font-semibold text-other-black capitalize">
        As of December 31 20XX
      </p>
    </div>
  </div>
</template>
