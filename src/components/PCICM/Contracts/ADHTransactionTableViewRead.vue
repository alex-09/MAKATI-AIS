<template>
    <div id="delivery-table">
        <div class="min-h-[400px] max-h-[400px] overflow-auto bg-white border-1 border-[#05C64B] border-solid">
            <!-- Sticky header applied in <table> and <thead> -->
            <table class="border-separate border-spacing-0">
                <thead class=" sticky top-0 left-0 right-0 bg-white z-50 border-b-[10px] border-[#000000] border-solid">
                    <tr>
                        <th>ITEM NO.</th>
                        <th>SSCOPE OF WORKS</th>
                        <th>AMOUNT PROGRAMMED</th>
                        <th>PERCEENTAGE (&) PROGRAMMED</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="i in 1" :key="i">
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
    </div>
</template>
<style scoped>
#delivery-table{
    border: 2px solid #05c46b;
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