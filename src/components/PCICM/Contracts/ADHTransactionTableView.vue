<template>
    <div id="delivery-table">
        <table>
            <thead>
                <tr>
                    <th>STOCK/PROPERTY NO.</th>
                    <th>UNIT</th>
                    <th>DESCRIPTION</th>
                    <th>BRAND</th>
                    <th>QUANTITY (A)</th>
                    <th>UNITY COST (B)</th>
                    <th>TOTAL COST (C = A X B)</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in 7" :key="i">
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                    <td>
                        <div>
                            <Textbox />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
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
tr>:nth-child(1)>div{
    align-items: center;
    display: flex;
    text-align: center;
    gap: 12px;
    padding-left: 16px;
    height: 32px;
}
</style>
<script setup>

import Textbox from '../../TRComponents/reusableComponents/Textbox.vue';
</script>