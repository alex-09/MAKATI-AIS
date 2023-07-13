<template>
    <table>
        <thead>
            <tr>
                <th>ITEM NO.</th>
                <th>UNIT (A)</th>
                <th>QTY. (B)</th>
                <th>DESCRIPTION (C)</th>
                <th>RATE PER PERIOD (D)</th>
                <th>TOTAL COST PER PERIOD (E = B*D)</th>
                <th>NUMBER OF PERIOD</th>
                <th>TOTAL COST (G=E*F)</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="value in tableRowCount" :key="value">
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
        <tfoot>
            <tr>
                <td colspan="3"><div>TOTAL AMOUNT IN WORDS</div></td>
                <td colspan="4"><div></div></td>
                <td><div>PHPXXXX.00</div></td>
            </tr>
        </tfoot>
    </table>
</template>
<script setup>
import { ref } from 'vue'
const tableRowCount = ref(5)
</script>
<style scoped>
table{
    table-layout: fixed;
    width: 100%;

}
tr > :nth-child(4){
    width: 283px;
}
tr{
    border-top: 1px solid gray;
}
th{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    letter-spacing: 0.17px;
}
td, th{
    padding: 6px 3px;
}
td > div {
    
    height: 32px;
    border: 1px solid gray;
    border-radius: 6px;
    display: flex;
    align-items: center;
    padding: 0px 17px;
}
</style>