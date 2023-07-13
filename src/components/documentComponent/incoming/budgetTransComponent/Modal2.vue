<template>
    <div class=" fixed z-10 top-0 left-0 right-0 bottom-0  w-[full] h-[full] border flex flex-col justify-center items-center bg-[rgba(0,0,0,0.4)]">
        <div class=" w-[468px] gap-y-[20px] bg-white border flex flex-col justify-center items-center rounded-md">
        <div class="p-[20px]  ">
                <svg width="80" height="79" viewBox="0 0 80 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M58.1305 22.041L32.1 48.0715L17.9195 33.9305L12.35 39.5L32.1 59.25L63.7 27.65L58.1305 22.041ZM40 0C18.196 0 0.5 17.696 0.5 39.5C0.5 61.304 18.196 79 40 79C61.804 79 79.5 61.304 79.5 39.5C79.5 17.696 61.804 0 40 0ZM40 71.1C22.541 71.1 8.4 56.959 8.4 39.5C8.4 22.041 22.541 7.9 40 7.9C57.459 7.9 71.6 22.041 71.6 39.5C71.6 56.959 57.459 71.1 40 71.1Z" fill="#0E4572"/>
                </svg>
            </div>
            <span class="px-[20px] font-normal text-[16px] leading-[24px] text-center">Your entry has been successfully saved under the same Transaction ID Number</span>
        <div class="flex justify-end font-medium text-[14px] leading-[24px] gap-x-[8px] w-full px-[10px] pb-[10px]">
            <button class="px-[12px] py-[7px] text-[#0E4572] ">PRINT</button>
            <button class="px-[12px] py-[7px] text-[#F8274C]" @click="sendEmit">CLOSE</button>
        </div>
        </div>
    </div>
</template>
<script setup>
import { defineEmits } from 'vue';
const emits = defineEmits([
    'closeModal'
])

function sendEmit() {
    emits('closeModal')
}
</script>
