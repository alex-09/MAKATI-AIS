<template>
    <div class=" pt-[30px] px-[90px]" >
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
import Textbox from '../../../TRComponents/reusableComponents/Textbox.vue';
import Dropdown from '../../../TRComponents/reusableComponents/Dropdown.vue';
import { defineEmits } from 'vue';
const emits = defineEmits([
    'showmodal1'
])

function sendEmit() {
    emits('showmodal1')
}
</script>