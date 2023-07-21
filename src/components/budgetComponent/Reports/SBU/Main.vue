<script setup>
import ViewIcon from "../../../icons/Budgetary/viewIcon.vue";
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
  balance: {{ balance }}
  <!-- TABLE -->
  <div class="container min-w-full px-6">
    <div class="flex flex-col">
      <div class="p-1.5 inline-block align-middle">
        <div class="overflow-y-scroll h-474">
          <table class="w-1400 divide-y divide-gray-200 mr-8">
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
                  object of expenditures
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  Account code
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
                ></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  current appropriation
                </td>
              </tr>
              <!-- PERSONAL SERVICES -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  personal services
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-other-black-100 whitespace-nowrap text-left uppercase"
                >
                  Salaries and Wages
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Salaries and Wages - Regular
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-other-black-100 whitespace-nowrap text-left uppercase"
                >
                  Other Compensation
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Personal Economic Relief Allowance (PERA)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Representation Allowance (RA)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-other-black-100 whitespace-nowrap text-left uppercase"
                >
                  Personnel Benefit Contributions
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Pension Benefits
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Retirement Gratuity
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <!-- TOTAL PERSONAL SERVICES -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  TOTAL PERSONAL SERVICES
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- MAINTENANCE AND OTHER OPERATING EXPENSES -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Maintenance and Other Operating Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Traveling Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Traveling Expenses - Local
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Training and Scholarship Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Training Expenses
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Supplies and Materials Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Office Supplies Expenses
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Utility Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Water Expenses
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Communication Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Postage and Courier Services
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <!-- TOTAL MODE -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  total mode
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- FINANCIAL EXPENSES -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Financial Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Financial Expenses
                </td>
              </tr>
              <tr>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Other Financial Charges
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Bills/Bonds/Loans Payable
                </td>
              </tr>
              <tr>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Discount on Bonds Payable - Domestic
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-10 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- TOTAL MODE -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  total mode
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- CAPITAL OUTLAY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  capital OUTLAY
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Land
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Land
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Buildings and Other Structures
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Hospitals and Health Centers
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <!-- TOTAL CAPITAL OUTLAY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  TOTAL CAPITAL OUTLAY
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- TOTAL CURRENT APPROPRIATION -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  TOTAL CURRENT APPROPRIATION
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- CONTINUING APPROPRIATION -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  CONTINUING APPROPRIATION
                </td>
              </tr>
              <!-- CAPITAL OUTLAY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  capital OUTLAY
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Land
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  Land
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              </tr>
              <!-- TOTAL CAPITAL OUTLAY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  TOTAL CAPITAL OUTLAY
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- TOTAL CURRENT APPROPRIATION -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  TOTAL CURRENT APPROPRIATION
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- GRAND TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  GRAND TOTAL
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- RECAPITULATION: -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left uppercase"
                >
                  RECAPITULATION:
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Current Appropriation
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  - Personal Services
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              <!-- BLANK TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  Continuing Appropriation
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  - Personal Services
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  5-01-02-030
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
              <!-- BLANK TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- GRAND TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-center text-other-black-100 whitespace-nowrap uppercase"
                >
                  GRAND TOTAL
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
