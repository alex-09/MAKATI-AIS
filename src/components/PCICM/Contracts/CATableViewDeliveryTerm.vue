<template> 
    <div id="delivery-table">
        <div class="min-h-[400px] max-h-[400px] overflow-auto bg-white">
            <!-- Sticky header applied in <table> and <thead> -->
            <table class="border-separate border-spacing-0 w-full">
                <thead class=" sticky top-0 bg-white z-5 border-solid border-2 border-[#3a354147] p-0 ">
                    <tr >
                        <th>PARTICULARS</th>
                        <th>DELIVERY TERM</th>
                        <th>DUE DATE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="i in 1" :key="i">
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
                </tbody>
                
            </table>
        </div>

        <div class="w-full flex justify-center items-center border-t-[1px] border-[#3a354147] border-solid">
            <button >
                <svg xmlns="http://www.w3.org/2000/svg" fill="#05c46b" viewBox="0 0 24 24" stroke-width="1" stroke="white" class="w-30 h-30">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
            ADD ROW
        </div>
    </div>
    
</template>
<style scoped>
#delivery-table{
    border: 1px solid #05c46b;
}
/* table{
    min-width: 100%;
    table-layout: auto;
} */
th, tr {
    border-bottom: 1px solid #3a354147;
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
/* tr>:nth-child(1)>div{
    align-items: center;
    display: flex;
    text-align: center;
    gap: 12px;
    padding-left: 16px;
    height: 32px;
} */
</style>
<script setup>

import Textbox from '../../TRComponents/reusableComponents/Textbox.vue';
</script>