<script setup>
import barGraph from "../budgetComponent/graphComponent/barComponent.vue";
import donutGraph from "../budgetComponent/graphComponent/donutComponent.vue";
import { ref } from "vue";
const isOpen = ref(true);
const GFData = [
  { month: "Jan", allotData: 50, approData: 100, obligData: 75 },
  { month: "Feb", allotData: 50, approData: 100, obligData: 75 },
  { month: "Mar", allotData: 50, approData: 100, obligData: 75 },
  { month: "Apr", allotData: 50, approData: 100, obligData: 75 },
  { month: "May", allotData: 50, approData: 100, obligData: 75 },
  { month: "Jun", allotData: 50, approData: 100, obligData: 75 },
  { month: "Jul", allotData: 50, approData: 100, obligData: 75 },
  { month: "Aug", allotData: 50, approData: 100, obligData: 75 },
  { month: "Sep", allotData: 50, approData: 100, obligData: 75 },
  { month: "Oct", allotData: 50, approData: 100, obligData: 75 },
  { month: "Nov", allotData: 50, approData: 100, obligData: 75 },
  { month: "Dec", allotData: 50, approData: 100, obligData: 75 },
];

const SEFData = [
  { month: "Jan", allotData: 50, approData: 34, obligData: 75 },
  { month: "Feb", allotData: 50, approData: 73, obligData: 75 },
  { month: "Mar", allotData: 50, approData: 87, obligData: 75 },
  { month: "Apr", allotData: 50, approData: 21, obligData: 75 },
  { month: "May", allotData: 50, approData: 72, obligData: 75 },
  { month: "Jun", allotData: 50, approData: 53, obligData: 75 },
  { month: "Jul", allotData: 50, approData: 43, obligData: 75 },
  { month: "Aug", allotData: 50, approData: 100, obligData: 75 },
  { month: "Sep", allotData: 50, approData: 100, obligData: 75 },
  { month: "Oct", allotData: 50, approData: 100, obligData: 75 },
  { month: "Nov", allotData: 50, approData: 100, obligData: 75 },
  { month: "Dec", allotData: 50, approData: 100, obligData: 75 },
];
</script>
<script>
import axios from "axios";
export default {
  data() {
    return {
      gfyear: [],
      sfyear: [],

      approType: "Current Appropriations",
      currentAppropriation: [],
    };
  },
  async created() {
    await axios.post("", this.year).then((res) => {
      this.gfyear = res.data.genfund;
      this.sfyear = res.data.SEFData;
    });
  },
  //current appro
  async created() {
    await axios.post("", this.approType).then((res) => {
      this.currentAppropriation = res.data.appro;
    });
  },
  methods: {
    handleDataFromChild(data) {
      this.gfyear = data;
    },
    handleDataFromChild2(data) {
      this.sfyear = data;
    },
  },
};
</script>
<template>
  <div class="container p-0 m-0 max-w-full">
    <h1 class="lg:w-800 uppercase text-2xl font-bold text-center">
      calendar year 2023
    </h1>
    gfyear: {{ gfyear }} sfyear: {{ sfyear }}
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-800">
        <!-- TABLE -->
        <div class=" " v-if="isOpen">
          <table class="w-full divide-gray-200">
            <thead class="bg-other-blue">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-left text-other-black-100 uppercase"
                ></th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                >
                  general fund
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                >
                  special education fund
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                >
                  total
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td
                  class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                >
                  {{ approType }}
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                ></td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                ></td>
                <td
                  v-if="isOpen"
                  class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap"
                >
                  <button
                    @click="
                      approType == 'Current Appropriations'
                        ? (approType = 'Continuing Appropriations')
                        : (approType = 'Current Appropriations')
                    "
                  >
                    <svg
                      width="32"
                      height="32"
                      viewBox="0 0 32 32"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect width="32" height="32" rx="16" fill="#1890FF" />
                      <path
                        d="M13.3331 8L11.4531 9.88L17.5598 16L11.4531 22.12L13.3331 24L21.3331 16L13.3331 8Z"
                        fill="#3A3541"
                      />
                    </svg>
                  </button>
                </td>
                <td
                  v-if="!isOpen"
                  class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap"
                >
                  <button @click="isOpen = !isOpen">
                    <svg
                      width="32"
                      height="32"
                      viewBox="0 0 32 32"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect
                        x="32"
                        y="32"
                        width="32"
                        height="32"
                        rx="16"
                        transform="rotate(-180 32 32)"
                        fill="#1890FF"
                      />
                      <path
                        d="M18.6669 24L20.5469 22.12L14.4402 16L20.5469 9.88L18.6669 8L10.6669 16L18.6669 24Z"
                        fill="#3A3541"
                      />
                    </svg>
                  </button>
                </td>
              </tr>
              <!-- APPROPRIATION ROW -->
              <tr>
                <td
                  class="pl-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  appropriation
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- ALLOTMENT ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  allotment
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- OBLIGATION ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  obligation
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- BLANK ROW -->
              <tr>
                <td
                  class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-4 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-4 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-4 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
              </tr>
              <!-- BALANCES ROW -->
              <tr>
                <td
                  class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                >
                  BALANCES OF:
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-2 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-2 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
              </tr>
              <!-- -APPROPRIATION ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  -APPROPRIATION
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- -ALLOTMENT ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  -OBLIGATION
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="flex" v-if="!isOpen">
          <table class="w-full divide-y divide-gray-200">
            <thead class="bg-other-blue">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-left text-other-black-100 uppercase"
                ></th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                >
                  general fund
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                >
                  special education fund
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                >
                  total
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td
                  class="pl-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                >
                  Continuing Appropriation
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                ></td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                ></td>
                <td
                  v-if="isOpen"
                  class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap"
                >
                  <button @click="isOpen = !isOpen">
                    <svg
                      width="32"
                      height="32"
                      viewBox="0 0 32 32"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect width="32" height="32" rx="16" fill="#1890FF" />
                      <path
                        d="M13.3331 8L11.4531 9.88L17.5598 16L11.4531 22.12L13.3331 24L21.3331 16L13.3331 8Z"
                        fill="#3A3541"
                      />
                    </svg>
                  </button>
                </td>
                <td
                  v-if="!isOpen"
                  class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap"
                >
                  <button @click="isOpen = !isOpen">
                    <svg
                      width="32"
                      height="32"
                      viewBox="0 0 32 32"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect
                        x="32"
                        y="32"
                        width="32"
                        height="32"
                        rx="16"
                        transform="rotate(-180 32 32)"
                        fill="#1890FF"
                      />
                      <path
                        d="M18.6669 24L20.5469 22.12L14.4402 16L20.5469 9.88L18.6669 8L10.6669 16L18.6669 24Z"
                        fill="#3A3541"
                      />
                    </svg>
                  </button>
                </td>
              </tr>
              <!-- APPROPRIATION ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  appropriation
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- ALLOTMENT ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  allotment
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- OBLIGATION ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  obligation
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- BLANK ROW -->
              <tr>
                <td
                  class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-4 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-4 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-4 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
              </tr>
              <!-- BALANCES ROW -->
              <tr>
                <td
                  class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                >
                  BALANCES OF:
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-2 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-2 text-center text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                ></td>
              </tr>
              <!-- -APPROPRIATION ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  -APPROPRIATION
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
              <!-- -ALLOTMENT ROW -->
              <tr>
                <td
                  class="px-6 py-2 text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  -OBLIGATION
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-center text-sm font-normal text-gray-800 whitespace-nowrap uppercase"
                >
                  999,999.99
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <donutGraph />
      </div>

      <div class="flex-1">
        <barGraph
          barID="id"
          graphTitle="GENERAL FUND"
          :dataValue="GFData"
          @data-updated="handleDataFromChild"
        />
        <barGraph
          barID="id2"
          graphTitle="SPECIAL EDUCATION FUND"
          :dataValue="SEFData"
          @data-updated="handleDataFromChild2"
        />
      </div>
    </div>
    <div class="container max-w-full px-0 mx-0">
      <!-- TABLE -->
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="p-1.5 container inline-block align-middle">
            <div class="xxl:max-w-screen-2xl">
              <div class="overflow-hidden">
                <table class="min-w-full 1536:max-w-screen-2xl">
                  <thead class="bg-other-blue">
                    <tr>
                      <th
                        scope="col"
                        colspan="5"
                        class="px-6 py-3 text-xs font-bold text-left text-other-black-100 uppercase"
                      ></th>
                      <th
                        scope="col"
                        colspan="2"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        balance of
                      </th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <thead class="bg-other-blue">
                    <tr>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-left text-other-black-100 uppercase"
                      >
                        office code
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        department
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        appropriation
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        allotment
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        obligations
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        appropriation
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        allotment
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-xs font-bold text-center text-other-black-100 uppercase"
                      >
                        utilization rate
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    <tr>
                      <td
                        class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                      ></td>
                      <td
                        class="px-6 py-2 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                      >
                        general fund
                      </td>
                      <td
                        class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                      ></td>
                      <td
                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
                      >
                        <button></button>
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                      ></td>
                      <td
                        class="px-6 py-2 text-sm font-semibold text-gray-800 whitespace-nowrap capitalize"
                      >
                        Executive Services
                      </td>
                      <td
                        class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap"
                      ></td>
                      <td
                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
                      >
                        <button></button>
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                      >
                        1011
                      </td>
                      <td
                        class="px-6 py-2 text-sm font-semibold text-gray-800 whitespace-nowrap capitalize"
                      >
                        -Office of the Mayor
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        99.99%
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap uppercase"
                      ></td>
                      <td
                        class="px-6 py-2 text-sm font-semibold text-gray-800 whitespace-nowrap capitalize"
                      >
                        Sub-total - Executive Services
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        999,999.99
                      </td>
                      <td
                        class="px-6 py-2 text-center text-sm text-gray-800 whitespace-nowrap"
                      >
                        99.99%
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
