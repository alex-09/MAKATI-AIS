<template>
  <table>
    <thead>
      <tr>
        <td>SUB-FUND TITLE</td>
        <td>ACCOUNT TITLE</td>
        <td>ACCOUNT CODE</td>
        <td>AMOUNT OBLIGATED</td>
        <td>ADDITION</td>
        <td>DEDUCTION</td>
        <td>ADJUSTED OBLIGATION</td>
        <td>REMARKS</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
      </tr>
      <tr>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
        <td><div></div></td>
      </tr>
    </tbody>
  </table>
</template>
<style scoped>
table {
  width: 100%;
  table-layout: fixed;
  text-align: center;
}
thead {
  font-size: 12px;
  font-weight: 600;
  line-height: 24px;
}
tbody > :nth-child(1) > td {
  padding: 6px 3px;
  height: 124px;
}
tbody > :nth-child(2) > td {
  padding-left: 3px;
  padding-right: 3px;
  height: 32px;
}
tbody > tr > td > div {
  width: 100%;
  height: 100%;
  outline: 1px solid #3a354152;
  border-radius: 6px;
}
td {
  border-bottom: 1px solid #3a354152;
}
</style>
