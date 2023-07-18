<template>
    <div class="min-h-[400px] max-h-[400px] overflow-auto bg-white border-1 border-[#05C64B] border-solid">
        <table>
            <thead>
                <tr>
                    <th>ITEM NO.</th>
                    <th>UNIT (A)</th>
                    <th>QTY (B)</th>
                    <th>DESCRIPTION (C)</th>
                    <th>RATE PER PERIOD</th>
                    <th>TOTAL COST PER PERIOD (E = BxD)</th>
                    <th>NUMBER OF PERIOD (F)</th>
                    <th>TOTAL COST (G = ExF)</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in 1" :key="i">
                    <td>
                        <div >
                            <Textbox placeholder/>
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div >
                            <Textbox />
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="3" >
                        <div>
                            <Textbox placeHolder="TOTAL AMOUNT IN WORDS"/>
                        </div>
                    </td>
                    <td colspan="4">
                        <div>
                            <Textbox />
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