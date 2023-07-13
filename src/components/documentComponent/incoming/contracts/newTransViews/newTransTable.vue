<template>
<div>
    <table>
        <thead>
            <tr>
                <th>PARTICULARS</th>
                <th>DELIVERY TERM</th>
                <th>DUE DATE</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="value in tableRowCount" :key="value">
                <td><div></div></td>
                <td><div></div></td>
                <td><div></div></td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-center">
        <button class="flex items-center">
            <addIcon/>
            <span class="text-[#606060] font-normal text-sm ">ADD ROW</span>
        </button>
    </div>
</div>
    

</template>
<script setup>
import { ref } from 'vue'
import addIcon from '../../../../icons/Document/AddIcon.vue'

const tableRowCount = ref(5)
</script>
<style scoped>
table{
    table-layout: fixed;
    width: 100%;
    
}
tr{
    border-bottom: 1px solid gray;
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