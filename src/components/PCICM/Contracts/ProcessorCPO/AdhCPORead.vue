<template>
    <div class="overflow-auto h-max">
        <div class="sticky top-0 left-0 mb-5">
            <label class="font-bold text-[22px] text-[#606060]">CONTRACT DATA ENTRY</label>
        </div>
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2  gap-x-[45px]">
                    <div class="grid-cell-container max-md:py-1 ">
                        <label class="input-label-name ">Name of Payee</label>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    
                </div>
                <div class="grid grid-cols-2 gap-x-[45px]">
                    <div class="grid-cell-container max-md:py-1 ">
                        <label class="input-label-name">Date of Contract</label>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    <div class="grid-cell-container max-md:py-1 ">
                        <label class="input-label-name">Contract Number</label>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sticky top-0 left-0 mt-10 mb-5">
            <label class="font-bold text-[22px] text-[#606060] ">DELIVERY TERM</label>
        </div>

        <div class="my-[11px] flex flex-col gap-2">
            <TableView />
        </div>
    </div>

    <div class="w-4/5 flex gap-[20px] ml-auto justify-end mb-[10px] max-lg:flex-col max-lg:mr-auto">
        <div class="w-screen">
            <button class="button-design-1 text-white bg-[#0E4572] h-[3rem] m-2">ADD PAGE</button>
            <button class="button-design-1 text-white bg-[#A60000] h-[3rem] m-2">DELETE PAGE</button>
            <button class="button-design-1 text-white bg-[#56CA00] h-[3rem] m-2">VIEW DATA ENCODED</button>
            <button class="button-design-1 text-white bg-[#16B1FF] h-[3rem] m-2">SAVE</button>
            <button class="button-design-1 text-white bg-[#f8274c] h-[3rem] m-2">CANCEL</button>
        </div>
    </div>
    
</template>

<script>
import TableView from '../ADHTransactionTableViewRead.vue';
import TextBox from '../../../TRComponents/reusableComponents/Textbox.vue';

    export default {
        components: {
            TableView,
            TextBox
        }
    }
</script>
