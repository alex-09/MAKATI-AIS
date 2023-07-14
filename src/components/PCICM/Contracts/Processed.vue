<template>
    <div class="overflow-auto h-[100vh]">
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2 gap-x-[45px]">
                    <div class="grid-cell-container">
                        <label class="input-label-name">Transaction Number</label>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                    <div class="grid-cell-container ">
                        <label class="input-label-name">Name of Payee</label>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3  gap-x-[45px]">
                    <div class="grid-cell-container ">
                        <label class="input-label-name">Contract Date</label>
                        <div class="input-container">
                            <input type="date" class=" rounded-md text-text-gray-100 w-full h-full">
                        </div>
                    </div>
                    <div class="grid-cell-container ">
                        <label class="input-label-name">Contract Number</label>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                    <div class="grid-cell-container ">
                        <label class="input-label-name">Contract Amount</label>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px]">
                    <div class="grid-cell-container ">
                        <label class="input-label-name">Particulars</label>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                </div>
            </div>
            <div class=" flex justify-end pl-[24px]">
                <button class="button-design-1 bg-[#05c46b]">SEARCH</button>
            </div>
        </div>
        <div class="my-[11px] gap-y-[11px] ">
            <label class=" title-heading-1 sticky top-0 left-0">ACTION HISTORY</label>
            <TableView />
        </div>
        <div class="w-4/5 flex gap-[20px] mr-0 ml-auto justify-end mb-[10px] max-lg:flex-col sticky top-0 left-0">
            <button class="button-design-1 text-white bg-[#0E4572]">ADD ENTRY</button>
            <button class="button-design-1 text-white bg-[#16B1FF]">SAVE</button>
            <button class="button-design-1 text-white bg-[#f8274c]">CLEAR</button>
            <button class="button-design-1 text-white bg-[#56CA00]">VIEW</button>
            <button class="button-design-1 text-white bg-[#A60000]">DELETE</button>
        </div>
    </div>
    
</template>

<script setup>
import TableView from './AHTableView.vue';
import Textbox from '../../TRComponents/reusableComponents/Textbox.vue';
</script>
