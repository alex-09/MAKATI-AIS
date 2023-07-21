<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import ActionButton from "../../../components/obligationComponent/actionButton.vue";
import SearchIcon from "../../../components/icons/Budgetary/searchIcon.vue";
import Searchbox from "../../../components/TRComponents/reusableComponents/Searchbox.vue";
import { ref } from "vue";

// const records = ref([
//   {
//     id: 1,
//     date: "AUTOFILL",
//     time: "AUTOFILL",
//     number: "12345",
//     documenttype: "Document type",
//     referenceno: "0000-7836-1234",
//     department: "department",
//     particular: "particulars",
//     amount: "999,999.99",
//     dateprocess: "February 23, 2023",
//     status: "With Findings",
//   },
//   {
//     id: 2,
//     date: "AUTOFILL",
//     time: "AUTOFILL",
//     number: "12345",
//     documenttype: "Document type",
//     referenceno: "0000-7836-1234",
//     department: "department",
//     particular: "particulars",
//     amount: "999,999.99",
//     dateprocess: "February 23, 2023",
//     status: "With Findings",
//   },
//   {
//     id: 3,
//     date: "AUTOFILL",
//     time: "AUTOFILL",
//     number: "12345",
//     documenttype: "Document type",
//     referenceno: "0000-7836-1234",
//     department: "department",
//     particular: "particulars",
//     amount: "999,999.99",
//     dateprocess: "February 23, 2023",
//     status: "With Findings",
//   },
//   {
//     id: 4,
//     date: "AUTOFILL",
//     time: "AUTOFILL",
//     number: "12345",
//     documenttype: "Document type",
//     referenceno: "0000-7836-1234",
//     department: "department",
//     particular: "particulars",
//     amount: "999,999.99",
//     dateprocess: "February 23, 2023",
//     status: "With Findings",
//   },
//   {
//     id: 5,
//     date: "AUTOFILL",
//     time: "AUTOFILL",
//     number: "12345",
//     documenttype: "Document type",
//     referenceno: "0000-7836-1234",
//     department: "department",
//     particular: "particulars",
//     amount: "999,999.99",
//     dateprocess: "February 23, 2023",
//     status: "With Findings",
//   },
// ]);
</script>

<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <div class="mt-5 mx-4">
    <div class="px-5">
      <!--title and searchbox-->
      <div class="px-0 sticky top-0 left-0">
        <div class="mx-[35px] mt-[21px]">
          <div class="items-center pl-[75px] flex w-full justify-between">
            <div class="font-bold text-[22px] leading-[27px] m">
              List of Obligations
            </div>
            <div class="w-[400px] h-32 relative">
              <label class="relative left-1/3 ml-3">
                <input
                  type="text"
                  name="search"
                  placeholder="Search"
                  class="w-308 h-144 border rounded px-4 focus:outline-none text-sm bg-search-color"
                  v-model="searchTrans"
                  @change="search"
                />
                <SearchIcon
                  class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
                />
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white rounded my-6 justify-center overflow-hidden">
        <div class="w-full text-center overflow-auto max-h-[700px]">
          <table class="min-w-max w-full table-fixed">
            <thead>
              <tr
                class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal"
              >
                <td class="py-3 px-12 text-center">
                  <input
                    class=""
                    type="checkbox"
                    id="checkbox"
                    v-model="checked"
                  />
                </td>
                <th class="py-3 px-7 text-left">Date</th>
                <th class="py-3 px-7 text-left">Time</th>
                <th class="py-3 px-7 text-left">Number</th>
                <th class="py-3 px-7 text-left">Document Type</th>
                <th class="py-3 px-7 text-left">Reference No.</th>
                <th class="py-3 px-7 text-left">Department</th>
                <th class="py-3 px-7 text-left">Particulars</th>
                <th class="py-3 px-7 text-left">Amount</th>
                <th class="py-3 px-7 text-left">Date Process</th>
                <th class="py-3 px-7 text-left">Status</th>
                <th class="py-3 px-7 text-left">Action</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm leading-normal">
              <tr
                class="border-b border-gray-200 hover:bg-gray-100"
                v-for="record in records"
                :key="record.id"
              >
                <td class="py-3 px-6 text-center">
                  <input
                    class=""
                    type="checkbox"
                    id="checkbox"
                    v-model="checked"
                  />
                </td>
                <td class="py-3 px-7 text-left">{{ record.date }}</td>
                <td class="py-3 px-7 text-left">{{ record.time }}</td>
                <td class="py-3 px-7 text-left">{{ record.number }}</td>
                <td class="py-3 px-7 text-left">{{ record.docu_type_id }}</td>
                <td class="py-3 px-7 text-left">{{ record.referenceno }}</td>
                <td class="py-3 px-7 text-left">{{ record.department_id }}</td>
                <td class="py-3 px-7 text-left">{{ record.description }}</td>
                <td class="py-3 px-7 text-left">{{ record.amount }}</td>
                <td class="py-3 px-7 text-left">{{ record.date_process }}</td>
                <td class="py-3 px-7 text-left">{{ record.status }}</td>
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
      <div class="text-right fluid">
        <v-btn
          class="font-medium text-[15px]px-[26px] cursor-pointer px-[26px] py-2 bg-danger-color rounded-[5px] float-right mr-9"
          @click="$router.push('/Budget')"
        >
          CLOSE
        </v-btn>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      records: [],
      searchTrans: "",
    };
  },
  methods: {
    async search() {
      await axios
        .post("obligation/listObligation", this.searchTrans)
        .then((res) => {
          this.records = res.data.list;
        });
    },
  },
  async created() {
    await axios.get("obligation/list").then((res) => {
      this.records = res.data.list;
    });
  },
};
</script>
