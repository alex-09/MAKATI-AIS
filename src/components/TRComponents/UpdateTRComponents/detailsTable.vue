<template>
  <table class="mt-[13px]">
    <thead>
      <th>SUB-FUND TITLE</th>
      <th>REFERENCE</th>
      <th>REASON FOR UPDATE</th>
      <th>LATEST BALANCE</th>
      <th>ADDITION</th>
      <th>DEDUCTION</th>
      <th>UPDATED BALANCE</th>
    </thead>
    <tbody>
      <tr v-for="value in 1" :key="value">
        <td>
          <div><Textbox disabled /></div>
        </td>
        <td>
          <div><Textbox disabled /></div>
        </td>
        <td>
          <div><Textbox disabled /></div>
        </td>
        <td>
          <div><Textbox disabled /></div>
        </td>
        <td>
          <div><Textbox disabled /></div>
        </td>
        <td>
          <div><Textbox disabled /></div>
        </td>
        <td>
          <div><Textbox disabled /></div>
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script setup>
import Textbox from "../reusableComponents/Textbox.vue";
</script>
<script>
import axios from "axios";
export default {
  async created() {
    await axios.post("trustfunds/updateTr").then((res) => {
      console.log(res.data);
    });
  },
};
</script>
<style scoped>
/* table { 
  width: 100%; 
  border-collapse: collapse; 
} */
div {
  height: 32px;
}
td {
  padding: 3px 6px;
  border-bottom: 1px solid #3a354147;
}
th {
  border-bottom: 1px solid #3a354147;
  font-weight: 600;
  font-size: 12px;
  line-height: 24px;
}

@media only screen and (max-width: 1024px) {
  /* Force table to not be like tables anymore */
  table,
  tbody,
  td,
  tr {
    display: block;
  }
  table {
    width: 70%;
  }
  tr:nth-of-type(odd) {
    background: #eee;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  thead,
  th {
    display: none;
  }

  tr {
    border-radius: 6px;
    margin-bottom: 3px;
    padding: 3px 6px;
  }

  td {
    justify-content: space-between;
    align-items: center;

    display: flex;
    text-align: center;
  }
  td > div {
    width: 65%;
  }

  td:before {
    width: 25%;

    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    text-align: end;
  }
  td:nth-of-type(1):before {
    content: "SUB-FUND TITLE";
  }
  td:nth-of-type(2):before {
    content: "REFERENCE";
  }
  td:nth-of-type(3):before {
    content: "REASON FOR UPDATE";
  }
  td:nth-of-type(4):before {
    content: "LATEST BALANCE";
  }
  td:nth-of-type(5):before {
    content: "ADDITION";
  }
  td:nth-of-type(6):before {
    content: "DEDUCTION";
  }
  td:nth-of-type(7):before {
    content: "UPDATED BALANCE";
  }
}
</style>
