<template>
    <table>
        <thead>
            <tr>
                <th>TRUST FUND RECEIPTS</th>
                <th>IMPLEMENTING OFFICE</th>
                <th>RECEIPTS</th>
                <th>OBLIGATION</th>
                <th>BALANCE</th>
                <th>UTILIZATION RATE</th>
            </tr>
        </thead>
        <tr><td>A. DONATION FROM PRIVATE SECTOR</td></tr>
        <tbody v-for="value in 3 " :key="value">
            <tr class="boldtext"><td>1. PRIVATE COMPANY NO. 1</td></tr>
            <tr class="boldtext"><td>MAIN FUND TITLE NO. 1</td></tr>
            <tr class="normaltext" v-for="value in 3" :key="value">
                <td>Sub-Fund Title No. 1 (Purpose No. 1)</td>
                <td>Department/Office</td>
                <td>999,999.99</td>
                <td>999,999.99</td>
                <td>999,999.99</td>
                <td>99.99%</td>
            </tr>
            <tr class="italictext">
                <td>Sub-Total for Private Company No. 1</td>
                <td></td>
                <td>999,999.99</td>
                <td>999,999.99</td>
                <td>999,999.99</td>
                <td>99.99%</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>TOTAL FROM OTHER GOVERNMENT AGENCIES</td>
                <td></td>
                <td>999,999.99</td>
                <td>999,999.99</td>
                <td>999,999.99</td>
                <td>99.99%</td>
            </tr>
        </tfoot>
    </table>
</template>
<style scoped>
table{
    table-layout: auto;
    width: 100%;
}
tr > :nth-child(1){
    width: 220px;
}
tr > :nth-child(2){
    width: 250px;
}
tr > :nth-child(3){
    width: 120px;
}
tr > :nth-child(4), tr > :nth-child(5){
    width: 100px;
}
tr > :nth-child(6) {
    width: 130px;
}


tr{
    display: flex;
    border-bottom: 1px solid #3a354152;
}
td, th {
    padding-top: 6px;
    padding-bottom: 6px;
    padding-left: 16px;
    padding-right: 16px;
    white-space: nowrap;
    
    text-align: center;
}
tbody > tr > :nth-child(1), table > tr > td{
    text-align: start;
    padding-top: 4px;
    padding-bottom: 4px;
    padding-left: 16px;
}

thead{
    
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
}
thead > tr > :nth-child(1){
    text-align: start;
    padding-left: 16px;
}
th {
    padding-top: 6px ;
    padding-bottom: 11px;
}
table > tr{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
}
tbody > .boldtext {
    font-weight: 600;
    font-size: 12px;
    line-height: 21px;
}
tbody > .normaltext {
    font-weight: 400;
    font-size: 14px;
    line-height: 21px;
}
tbody > .normaltext > :nth-child(2){
    font-style: italic;
}
tbody > .italictext {
    font-weight: 600;
    font-style: italic;
    font-size: 14px;
    line-height: 21px;
}

tfoot > tr {
    font-size: 14px;
    font-weight: 600;
    font-style: italic;
    line-height: 21px;
}

 
</style>
    