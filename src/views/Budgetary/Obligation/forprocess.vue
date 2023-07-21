<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import SearchIcon from "../../../components/icons/Budgetary/searchIcon.vue";
import { ref } from "vue";
import axios from "axios";
</script>

<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <div class="container p-0 font-Inter">
    <div class="mt-5 mx-4">
      <div class="px-5">
        <p class="font-bold text-2xl text-other-blue">For Process</p>

        <div class="container grid justify-items-left">
          <div class="flex items-center gap-36">
            <!-- RADIO 1 BUTTON AND LABEL -->
            <div class="flex items-center">
              <input
                type="radio"
                name="newTrans"
                id=""
                v-model="isNewTrans"
                value="true"
              />
              <label
                for="newTrans"
                class="text-sm font-semibold text-other-black ml-3"
                >New Transactions</label
              >
            </div>
            <!-- RADIO 2 BUTTON ANDLABEL -->
            <div class="flex items-center">
              <input
                type="radio"
                name="newTrans"
                id=""
                v-model="isNewTrans"
                value="false"
              />
              <label
                for="newTrans"
                class="text-sm font-semibold text-other-black ml-3"
                >Previous Transactions</label
              >
            </div>

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

        <!-- New Transaction -->
        <!-- <div v-if="isNewTrans | isNewTrans === 'true'"> -->
        <div class="bg-white rounded my-6 justify-center overflow-hidden">
          <div class="w-full text-center overflow-auto max-h-[700px]">
            <table class="w-full table-fixed whitespace-normal">
              <!-- galawin mo to -->
              <thead>
                <tr
                  class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal"
                >
                  <td class="py-3 px-9 text-center">
                    <input
                      class=""
                      type="checkbox"
                      id="checkbox"
                      v-model="checked"
                    />
                  </td>

                  <!-- galawin mo tong mga py px hindi sila same ng value bagubaguhin mo na lnag hanggang makuha mo yung tamang size -->
                  <th class="py-3 px-11 text-left">Date</th>
                  <th class="py-3 px-11 text-left">Time</th>
                  <th class="py-3 px-11 text-left">Number</th>
                  <th class="py-3 px-11 text-left">Document Type</th>
                  <th class="py-3 px-11 text-left">Processing Slip No.</th>
                  <th class="py-3 px-11 text-left">Department</th>
                  <th class="py-3 px-11 text-left">Particulars</th>
                  <th class="py-3 px-11 text-left">Amount</th>
                  <th class="py-3 px-11 text-left">Transaction Type</th>
                  <th class="py-3 px-11 text-left">Action</th>
                </tr>
              </thead>

              <tbody
                class="text-gray-600 text-sm leading-normal whitespace-normal"
              >
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
                  <td class="py-3 px-11 text-left">
                    {{ record.date }}
                  </td>
                  <td class="py-3 px-11 text-left">
                    {{ record.time }}
                  </td>
                  <td class="py-3 px-11 text-left">
                    {{ record.number }}
                  </td>
                  <td class="py-3 px-11 text-left">
                    {{ record.docu_type_id }}
                  </td>
                  <td class="py-3 px-11 text-left">
                    {{ record.processing_slip_number }}
                  </td>
                  <td class="py-3 px-11 text-left">
                    {{ record.department_id }}
                  </td>
                  <td class="py-3 px-11 text-left">
                    {{ record.description }}
                  </td>
                  <td class="py-3 px-11 text-left">{{ record.amount }}</td>
                  <td class="py-3 px-11 text-left">
                    {{ record.transaction_type }}
                  </td>
                  <td class="flex gap-2">
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
          <RouterLink
            :to="{ name: 'Obligation for Process CAFOA' }"
            class="bg-blue-500 text-uppercase text-white font-bold py-2 px-6 rounded float-right mr-3"
          >
            PROCESS
          </RouterLink>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      records: [],
      searchTrans: "",
    };
  },
  methods: {
    async search() {
      await axios.get("obligation/", this.searchTrans).then((res) => {
        this.records = res.data.records;
      });
    },
  },
  async created() {
    await axios.get("obligation/listObligation").then((res) => {
      this.records = res.data.list;
    });
  },
};
</script>
