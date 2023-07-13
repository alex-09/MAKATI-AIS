<template>
    <div v-if="!viewThis" class="pt-[30px] px-[90px]">
        <div class="flex justify-between ">
            <div class=" font-bold text-[22px] leading-[27px] ">List of New Transaction Budgetary Obligation</div>
            <div class="flex gap-x-[24px] items-center"  >
                <span class=" font-semibold text-[14px] leading-[17px]">Transaction No. </span>
                <div class="h-[32px] w-[291px]">
                    <Searchbox/>
                </div>
            </div>
        </div>
        <div class="mt-[20px]">
            <ul class=" flex gap-x-2">
                <li v-for="(item, i) in months" :key="item"
                :class="[i == selectedmonth ? ' bg-[#73D9F6] text-black': 'outline-[#0e4572] outline outline-1  text-[#0e4572]', ' rounded-3xl  p-[4px] text-center cursor-pointer select-none']"
                @click="selectedmonth = i">
                {{ item }}
                </li>
            </ul>

            <PTTable/>
            <div class="flex justify-end py-1">
                <button class="px-[26px] py-[8px] rounded-md bg-[#16b1ff] text-white" @click="viewThis = true">VIEW</button>
            </div>
        </div>
    </div>



    <div v-if="viewThis" class=" pt-[30px] px-[90px]">
        <span class=" font-bold text-[22px] leading-[27px]">Budgetary Obligation Transaction</span>
        
        <div class=" grid grid-cols-2 mt-[26px] gap-x-[108px] mb-[11px] gap-y-[15px] ">
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Type of Document</span>
                <div class="h-32 relative flex-grow ">
                    <Dropdown/>
                </div>
            </div>
            <div></div>
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Name of Department/Office</span>
                <div class="h-32 relative flex-grow">
                    <Dropdown/>
                </div>
            </div>
            <div></div>
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Processing Slip No.</span>
                <div class="h-32 relative flex-grow">
                    <Dropdown/>
                </div>
            </div>
            <div></div>
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Particulars</span>
                <div class="h-[85px] relative flex-grow">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between  items-start">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Amount</span>
                <div class="h-32 relative flex-grow">
                    <Textbox/>
                </div>
            </div>
        </div>
        <span class=" font-bold text-[22px] leading-[27px] ">Bearer's Information</span>
        <div class=" grid grid-cols-2 mt-[26px] gap-x-[108px] gap-y-[15px] ">
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Name of Bearer</span>
                <div class="h-32 relative flex-grow ">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Contact No.</span>
                <div class="h-32 relative flex-grow ">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Department / Office</span>
                <div class="h-32 relative flex-grow ">
                    <Dropdown/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="w-[206px] font-semibold text-[14px] leading-[17px]">Email</span>
                <div class="h-32 relative flex-grow ">
                    <Textbox/>
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-x-[14px] my-[21px]">
            <button class="h-42 px-[26px] rounded-[5px] bg-danger-color text-white">CLEAR</button>
            <button class="h-42 px-[26px] rounded-[5px] bg-[#16b1ff] text-white" @click="sendEmit">SAVE</button>
        </div>
    </div> 
</template>
<script setup>
import Searchbox from '../../../TRComponents/reusableComponents/Searchbox.vue';
import { ref } from 'vue';
import Textbox from '../../../TRComponents/reusableComponents/Textbox.vue';
import Dropdown from '../../../TRComponents/reusableComponents/Dropdown.vue';
import PTTable from './PTTable.vue'
import { defineEmits } from 'vue';
const emits = defineEmits([
    'showmodal2'
])
function sendEmit() {
    emits('showmodal2')
}
const viewThis = ref(false)
const selectedmonth = ref(0)
const months = ref(['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN' ,'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'])
</script>
