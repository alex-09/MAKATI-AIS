<template>
    <table>
        <thead>
            <tr>
                <th>
                    <div>
                        <div></div>
                        <span>DATE</span>
                    </div>
                </th>
                <th>NUMBER</th>
                <th>PAYEE</th>
                <th>PARTICULARS</th>
                <th>CONTRACT AMOUNT</th>
                <th>CONTRACT DATE</th>
                <th>CONTRACT NUMBER</th>
                <th>TYPE OF CONTRACT</th>
                <th>ASSIGN TO</th>
                <th>STATUS</th>
                <th>TRANSACTION DETAILS</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="i in 7" :key="i">
                
                <td>
                    <div>
                        <input type="checkbox">
                        <span>AUTOFILL</span>
                    </div>
                </td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td>AUTOFILL</td>
                <td><div class="input-container"><Dropdown/></div></td>
                <td><div class="input-container"><Dropdown/></div></td>
                <td>
                    <div class="border border-[#3a354147] rounded-md h-32 flex justify-center items-center">
                        <eyeIcon style="width: 25px; height: 25px;"/>
                    </div>
                </td>
                <td>
                    <div>
                        <button class="table-actions-btn text-[#73D9F6]">R</button>
                        <button class="table-actions-btn text-[#73D9F6]">E</button>
                        <button class="table-actions-btn text-[#73D9F6]">A</button>
                        <button class="table-actions-btn text-[#73D9F6]">D</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script setup>
import eyeIcon from '../../icons/Menu/eyeIcon.vue'
import Dropdown from '../../TRComponents/reusableComponents/Dropdown.vue';
</script>
<style scoped>
table{
    min-width: max-content;
    border: 2px solid #05c46b;
}
th{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    align-items: center;
    padding: 6px 4px;
}
td{
    font-weight: 600;
    font-size: 10px;
    line-height: 24px;
    text-align: center;
    padding: 6px 4px;
    
}
td, th{
    border-bottom: 1px solid gray;
}
tr>:nth-child(1)>div{
    align-items: center;
    display: flex;
    text-align: center;
    gap: 12px;
    padding-left: 16px;
}
tr>:nth-child(1)>div>span{
    flex-grow: 1;
}
tr>:nth-child(12)>div{
    display: flex;
    justify-content: space-around;
}
/* table cells width */
tr>:nth-child(1){
    width: 172px;

}
tr>:nth-child(2),
tr>:nth-child(n+5){
    width: 160px;
}
tr>:nth-child(3),
tr>:nth-child(4){
    width: 300px;
}
</style>