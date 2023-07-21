<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import SearchIcon from "../../../components/icons/Budgetary/searchIcon.vue";
import Searchbox from "../../../components/TRComponents/reusableComponents/Searchbox.vue";
// import ListTable from '../../../components/budgetComponent/appropriationList.vue';
import { ref } from "vue";
import axios from "axios";

const records = ref([
  {
    id: 1,
    program: "Name of Program",
    project: "Name of Project",
    activity: "Accounting",
    aip: "100-000-2-101-001-000-000",
    amount: "999,999.99",
    status: "Approved",
  },
  {
    id: 2,
    program: "Name of Program",
    project: "Name of Project",
    activity: "Accounting",
    aip: "100-000-2-101-001-000-000",
    amount: "999,999.99",
    status: "Approved",
  },
  {
    id: 3,
    program: "Name of Program",
    project: "Name of Project",
    activity: "Accounting",
    aip: "100-000-2-101-001-000-000",
    amount: "999,999.99",
    status: "Disapproved",
  },
  {
    id: 4,
    program: "Name of Program",
    project: "Name of Project",
    activity: "Accounting",
    aip: "100-000-2-101-001-000-000",
    amount: "999,999.99",
    status: "Approved",
  },
  {
    id: 5,
    program: "Name of Program",
    project: "Name of Project",
    activity: "Accounting",
    aip: "100-000-2-101-001-000-000",
    amount: "999,999.99",
    status: "Not yet approved",
  },
]);
</script>

<template>
  <div class="sticky top-0 left-0 z-50">
    <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
    <NavBar :navbartitle="'Executive Budget'" />
  </div>
  <div class="container p-0 font-Inter">
    <!--title and searchbox-->
    <div class="px-0 sticky top-0 left-0">
      <div class="mx-[35px] mt-[21px]">
        <div class="items-center pl-[75px] flex w-full justify-between">
          <div class="font-bold text-[22px] leading-[27px] m">
            List of Appropriation
          </div>
          <div class="w-[400px] h-32 relative">
            <!-- <Searchbox /> -->
            <input
              type="search"
              class="text-sm py-[auto] icon border border-[#3a354147] flex items-center cursor-default rounded-md w-full h-full focus:ring-0 focus:outline-none focus:border-[#3a354147]"
              @input="search"
              v-model="searchField"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded my-6 justify-center overflow-hidden">
      <div class="w-full text-center overflow-auto max-h-[700px]">
        <table class="min-w-max w-full table-fixed">
          <thead>
            <tr class="text-gray-600 uppercase text-sm leading-normal">
              <td class="py-3 px-6 text-center">
                <input
                  class=""
                  type="checkbox"
                  id="checkbox"
                  v-model="checked"
                />
              </td>
              <th class="py-3 px-6 text-left">Date</th>
              <th class="py-3 px-6 text-left">time</th>
              <th class="py-3 px-6 text-left">type</th>
              <th class="py-3 px-6 text-left">budget year</th>
              <th class="py-3 px-6 text-left">funding source</th>
              <th class="py-3 px-6 text-left">type of appropriation</th>
              <th class="py-3 px-6 text-left">department office</th>
              <th class="py-3 px-6 text-left">office code</th>
              <th class="py-3 px-6 text-left">Name of Program</th>
              <th class="py-3 px-6 text-left">Name of Project</th>
              <th class="py-3 px-6 text-left">Name of Activity</th>
              <th class="py-3 px-6 text-left">AIP Reference Code</th>
              <th class="py-3 px-6 text-left">Amount</th>
              <th class="py-3 px-6 text-left">Status</th>
              <th class="py-3 px-6 text-left">action</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm leading-normal">
            <tr
              class="border-b border-gray-200 hover:bg-gray-100"
              v-for="listitem in this.list"
              :key="listitem.id"
            >
              <td class="py-3 px-6 text-center">
                <input
                  class=""
                  type="checkbox"
                  id="checkbox"
                  v-model="listitem.checked"
                />
              </td>
              <td class="py-3 px-6 text-left">{{ listitem.Date }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.time }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.type }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.budget_year_id }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.fund_Source }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.appro_type }}</td>
              <td class="py-3 px-6 text-left">
                {{ listitem.department_name }}
              </td>
              <td class="py-3 px-6 text-left">
                {{ listitem.department_code_id }}
              </td>
              <td class="py-3 px-6 text-left">{{ listitem.program }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.project }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.activity }}</td>
              <td class="py-3 px-6 text-left">{{ listitem.AIPCode }}</td>
              <td class="py-3 px-6 text-left">
                {{ listitem.appro_total.toLocaleString() }}
              </td>

              <td
                class="py-3 px-6 text-left text-blue-400"
                v-if="listitem.status === 'Approved'"
              >
                {{ listitem.status }}
              </td>
              <td
                class="py-3 px-6 text-left text-red-400"
                v-else-if="listitem.status === 'Disapproved'"
              >
                {{ listitem.status }}
              </td>
              <td class="py-3 px-6 text-left text-gray-500" v-else>
                {{ listitem.status }}
              </td>
              <td class="py-3 px-7 text-left flex gap-2">
                <button
                  class="border-slate-300 border-2 rounded-lg text-yellow-100 font-bold text-[24px] p-1"
                >
                  P</button
                ><button
                  class="border-slate-300 border-2 rounded-lg text-yellow-100 font-bold text-[24px] p-1"
                >
                  E</button
                ><button
                  class="border-slate-300 border-2 rounded-lg text-yellow-100 font-bold text-[24px] p-1"
                >
                  A</button
                ><button
                  class="border-slate-300 border-2 rounded-lg text-yellow-100 font-bold text-[24px] p-1"
                >
                  D
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- <div
      class="justify-between sm:justify-end mt-4 flex px-5 text-white sm:gap-x-11"
    >
      <button class="bg-button-blue py-2 w-125 rounded-md">RE-PROCESS</button>
      <button class="bg-danger-color py-2 w-125 rounded-md">CANCEL</button>
    </div> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      list: [
        {
          checked: false,
        },
      ],
      searchField: "",
    };
  },
  methods: {
    async search() {
      await axios
        .post("appropriation/searchAppro", {
          search: this.searchField,
        })
        .then((res) => {
          this.list = res.data.result;
        });
    },
  },
  async created() {
    await axios.get("appropriation/listAppro").then((res) => {
      this.list = res.data.data;
    });
  },
};
</script>
