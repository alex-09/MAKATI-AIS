<script setup>
import SearchIcon from "../../../icons/Budgetary/searchIcon.vue";
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
    async search() {
      await axios.post("/", this.search).then((res) => {
        balance = res.data.expense;
      });
    },
  },
};
</script>
<template>
  dataFromParent: {{ balance }}
  <!-- SUB BUTTONS AND SEARCH BAR -->
  <div class="container flex flex-row p-0 my-4 px-8">
    <div class="flex justify-between">
      <div class="flex justify-between">
        <div>
          <button
            class="uppercase text-xs text-white rounded font-medium bg-button-green-dark h-144 w-261"
            @click="$router.push({ path: '/Pre-Closing-SBU-Reports' })"
          >
            status of budget utilization
          </button>
        </div>

        <div class="mx-8">
          <button
            class="uppercase text-xs text-white rounded font-medium bg-dark-green h-144 w-512"
            @click="$router.push({ path: '/Pre-Closing-SPPAI-Reports' })"
          >
            status of program/projects/activities implementation
          </button>
        </div>
      </div>

      <div>
        <label class="relative left-2/3 ml-3">
          <input
            type="text"
            name="search"
            placeholder="Search"
            class="w-308 h-144 border rounded px-4 focus:outline-none text-sm bg-search-color"
            v-model="search"
          />

          <SearchIcon
            class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
          />
        </label>
      </div>
    </div>
  </div>
  <!-- TABLE -->
  <div class="container min-w-full px-6">
    <div class="flex flex-col">
      <div class="p-1.5 inline-block align-middle">
        <div class="overscroll-x-contain">
          <table class="w-1400 divide-y divide-gray-200 mr-8">
            <thead>
              <tr>
                <th colspan="4"></th>
                <th></th>
                <th
                  colspan="2"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  balance of
                </th>
                <th></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                >
                  Title
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  Appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  Allotment
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
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td
                  class="px-6 py-2 text-xs font-medium text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  current appropriation
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                >
                  personal service
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                  v-for="data in dataFromParent"
                >
                  {{ data.value3 }}
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                  v-for="data in dataFromParent"
                >
                  {{ data.value2 }}
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.9911
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                >
                  maintenance and other operation expenses
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-medium text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  continuing appropriation
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                >
                  capital outlay
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-medium text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  total
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
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
  <!-- CLOSE BUTTON -->
  <div class="container">
    <div class="float-right">
      <button
        class="uppercase text-base font-medium w-125 h-42 rounded bg-danger-color text-white"
      >
        close
      </button>
    </div>
  </div>
</template>
