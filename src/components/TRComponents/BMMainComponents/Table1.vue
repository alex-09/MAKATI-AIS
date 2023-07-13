<script>
export default {
  data() {
    return {
      A: [],
      B: [],
      C: [],
      D: [],
    };
  },
  async created() {
    await axios.get("").then((res) => {});
  },
};
</script>

<template>
  <table>
    <thead class="text-xs font-semibold">
      <tr class="bg-other-blue">
        <th colspan="4" class="py-[8.5px]">
          <div>
            <p>AS OF DECEMBER 31,2023</p>
          </div>
        </th>
      </tr>
      <tr class="bg-other-blue">
        <th class="w-[300px]"></th>
        <th class="w-[150px] py-[8.5px]">TRUST RECEIPTS</th>
        <th class="w-[150px]">OBLIGATIONS</th>
        <th class="w-[150px]">UNUTILIZED</th>
      </tr>
    </thead>
    <tbody class="font-normal">
      <tr class="h-32">
        <td colspan="4"></td>
      </tr>
      <tr>
        <td class="column1">A. Donation from Private Sector</td>
        <td v-for="item in A">{{ item }}</td>
      </tr>
      <tr>
        <td class="column1">B. Transfer from Other Government Agencies</td>
        <td v-for="item in B">{{ item }}</td>
      </tr>
      <tr>
        <td class="column1">
          C. Unexpended Balance of Local Disaster Risk Reduction and Management
          Fund
        </td>
        <td v-for="item in C">{{ item }}</td>
      </tr>
      <tr>
        <td class="column1">
          D. LGU Counterpart Contribution For Specific Projects
        </td>
        <td v-for="item in D">{{ item }}</td>
      </tr>
      <tr class="h-32">
        <td colspan="4"></td>
      </tr>
    </tbody>
    <tfoot>
      <td class="column1 last">BALANCES OF:</td>
      <td>999,999.99</td>
      <td>999,999.99</td>
      <td>999,999.99</td>
    </tfoot>
  </table>
</template>
<style scoped>
td {
  text-align: center;
  white-space: normal;
  font-weight: 400;
  font-size: 14px;
  padding-top: 4px;
  padding-bottom: 4px;

  border-bottom: 1px solid grey;
}
th {
  border-bottom: 1px solid grey;
}
.column1 {
  text-align: start;
  padding-left: 16px;
}
.last {
  font-weight: 600;
  line-height: 1rem;
  font-size: 12px;
}
</style>
