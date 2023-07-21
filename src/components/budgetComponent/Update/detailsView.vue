<script setup>
import TableListbox from "./tableListbox.vue";
import { ref } from "vue";

const officeCode = [
  { value: 1, label: "1015" },
  { value: 2, label: "1013" },
  { value: 3, label: "1012" },
  { value: 4, label: "8020" },
  { value: 5, label: "5021" },
  { value: 6, label: "9022" },
];

const appropriation = [
  { value: 1, label: "CURRENT APPROPRIATION" },
  { value: 2, label: "CONTINUING APPROPRIATION" },
];

const activity = [
  { value: 1, label: "Activity 1" },
  { value: 2, label: "Activity 2" },
  { value: 3, label: "Activity 3" },
  { value: 4, label: "Activity 4" },
  { value: 5, label: "Activity 5" },
  { value: 6, label: "Activity 6" },
];

const code = [
  { value: 1, label: "1234" },
  { value: 2, label: "4567" },
  { value: 3, label: "7890" },
  { value: 4, label: "4312" },
  { value: 5, label: "3456" },
  { value: 6, label: "2345" },
];

const title = [
  { value: 1, label: "Account Title 1" },
  { value: 2, label: "Account Title 2" },
  { value: 3, label: "Account Title 3" },
  { value: 4, label: "Account Title 4" },
  { value: 5, label: "Account Title 5" },
  { value: 6, label: "Account Title 6" },
];

const accountCode = [
  { value: 1, label: "AT123" },
  { value: 2, label: "AT456" },
  { value: 3, label: "AT245" },
  { value: 4, label: "AT345" },
  { value: 5, label: "AT678" },
  { value: 6, label: "AT789" },
];

const form = ref({
  office_id: null,
  appropriation_id: null,
  activity_id: null,
  code: null,
  title: null,
  account_code: null,
});
</script>

<template>
  <!-- <div class="grid justify-items-center"> -->
  <div class="bg-white rounded my-6 justify-center">
    <div class="w-full text-center">
      <table class="min-w-max w-full table-fixed">
        <thead>
          <tr>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              Office Code
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              Type of Appropriation
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              name of activity
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              aip code activtiy
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              account title
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              account code
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              addition
            </th>
            <th
              scope="col"
              class="px-7 py-3 text-xs font-bold text-center text-gray-500 uppercase"
            >
              deduction
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
            <td
              class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center"
            >
              <TableListbox
                placeholder="Office code"
                v-model="form.office_id"
                :options="officeCode"
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <TableListbox
                placeholder="Appropriation"
                v-model="form.appropriation_id"
                :options="appropriation"
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <TableListbox
                placeholder="Activity Name"
                v-model="form.activity_id"
                :options="activity"
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <TableListbox
                placeholder="Activity Code"
                v-model="form.code"
                :options="code"
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <TableListbox
                placeholder="Account Title"
                v-model="form.title"
                :options="title"
              />
            </td>
            <td
              class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
            >
              <TableListbox
                placeholder="Account Code"
                v-model="form.account_code"
                :options="accountCode"
              />
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- </div> -->
  <div class="grid justify-items-end">
    <div class="float-right mx-16">
      <button
        class="text-base uppercase font-medium text-white bg-addBtn w-163 h-42 rounded-lg"
      >
        add activity
      </button>
    </div>
  </div>
  <div class="container px-4 py-4">
    <div class="flex justify-end gap-4">
      <RouterLink :to="{ name: 'Enroll' }">
        <button
          class="w-125 h-42 bg-button-blue text-white uppercase rounded-lg"
        >
          process
        </button>
      </RouterLink>
      <div>
        <button
          class="w-125 h-42 bg-danger-color text-white uppercase rounded-lg"
        >
          close
        </button>
      </div>
    </div>
  </div>
</template>
