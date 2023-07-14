<template>
    <div id="delivery-table">
        <table>
            <thead>
                <tr>
                    <th>ITEM NO.</th>
                    <th>SSCOPE OF WORKS</th>
                    <th>AMOUNT PROGRAMMED</th>
                    <th>PERCEENTAGE (&) PROGRAMMED</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in 7" :key="i">
                    <td>
                        <div >
                            AUTOFILL
                        </div>
                    </td>
                    <td>
                        <div >
                            AUTOFILL
                        </div>
                    </td>
                    <td>
                        <div >
                            AUTOFILL
                        </div>
                    </td>
                    <td>
                        <div >
                            AUTOFILL
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2" >
                        <div>
                            <Textbox placeHolder="TOTAL"/>
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox placeHolder="PHPXXXX.00"/>
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox placeHolder="PHPXXXX.00"/>
                        </div>
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>
</template>
<style scoped>
#delivery-table{
    /* border: 2px solid #05c46b; */
}
table{
    min-width: 100%;
    table-layout: auto;
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
</style>
<script setup>

import Textbox from '../../TRComponents/reusableComponents/Textbox.vue';
</script>