<script setup>
import ViewIcon from "../../../icons/Budgetary/viewIcon.vue";
import SearchIcon from "../../../icons/Budgetary/searchIcon.vue";
import axios from "axios";
</script>
<script>
export default {
  props: {
    dataFromParent: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      search: "",
      balance: this.dataFromParent,
    };
  },
  methods: {
    async getSearch() {
      await axios.post("", this.search).then((res) => {
        balance = res.data;
      });
    },
  },
};
</script>
<template>
  dataFromParent: {{ balance }}
  <div class="mt-8">
    <label class="relative left-3/4 ml-3">
      <input
        type="text"
        name="search"
        placeholder="Search"
        class="w-308 h-144 border rounded px-4 focus:outline-none text-sm bg-search-color"
        v-model="search"
        @input="getSearch"
      />
      <SearchIcon
        class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
      />
    </label>
  </div>
  <!-- PER ACTIVITY TABLE -->
  <div class="container min-w-full px-6">
    <div class="flex flex-col">
      <div class="p-1.5 inline-block align-middle">
        <div class="overflow-y-none">
          <table class="w-1470 divide-y divide-gray-200">
            <thead>
              <tr>
                <th colspan="5"></th>
                <th
                  colspan="2"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  balance of
                </th>
                <th colspan="2"></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                >
                  Program/Projects/Activities
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  Aip reference code
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  allotment
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  obligation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  allotment
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  utilization rate
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <!-- SAMPLE PROJECT -->
              <tr v-for="bal in balance">
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  A. Name of Project
                  {{ bal }}
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  B. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- PER DEPARTMENT TABLE -->
  <div class="container min-w-full px-6">
    <div class="flex flex-col">
      <div class="p-1.5 inline-block align-middle">
        <div class="overflow-y-none">
          <table class="w-1470 divide-y divide-gray-200">
            <thead>
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                >
                  title
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  allotment
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  pbligation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  allotment
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  utilization rate
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                ></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <!-- CURRENT APPROPRIATION -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  CURRENT APPROPRIATION
                </td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Personal Services
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Maintinance and other Operation Expenses
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Financial Expenses
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Capital Outlay
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- CONTINUING APPROPRIATION -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  CONTINUING APPROPRIATION
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Capital Outlay
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  TOTAL
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
