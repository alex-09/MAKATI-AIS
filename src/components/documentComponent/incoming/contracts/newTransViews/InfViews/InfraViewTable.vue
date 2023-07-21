<template>
    <table>
        <thead>
            <tr>
                <th>ITEM NO.</th>
                <th>SCOPE OF WORKS</th>
                <th>AMOUNT PROGRAMMED</th>
                <th>PERCENTAGE (%) PROGRAMMED</th>
                
            </tr>
        </thead>
        <tbody>
            <tr v-for="value in tableRowCount" :key="value">
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><div>TOTAL</div></td>
                <td><div>PHPXXXX.00</div></td>
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


th{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    padding: 6px 0px;
}
tr{
    border-bottom: 1px solid gray;
}
tbody > tr> td{
    padding: 10px 3px;
    text-align: center;
    font-weight: 600;
    font-size: 10px;
    line-height: 24px;
}
tfoot > tr > td > :nth-child(1){
    justify-content: start;
}
tfoot > tr > td{
    padding: 6px 3px;
}
tfoot > tr > td > div{
    height: 32px;
    border: 1px solid gray;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0px 17px;
}
</style>