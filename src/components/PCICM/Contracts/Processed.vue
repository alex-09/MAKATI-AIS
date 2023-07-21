<template>
    <div class="overflow-x-auto h-max">
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2 gap-x-[45px] max-[1098px]:grid-cols-1">
                    <div class="grid-cell-container max-[1098px]:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Transaction Number</label>
                        </div>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                    <div class="grid-cell-container max-[1098px]:py-1 ">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Name of Payee</label>
                        </div>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3  gap-x-[45px] max-[1098px]:grid-cols-1">
                    <div class="grid-cell-container max-[1098px]:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contract Date</label>
                        </div>
                        <div class="input-container">
                            <input type="date" class=" rounded-md text-text-gray-100 w-full h-full border-solid border border-[#3a354147]">
                        </div>
                    </div>
                    <div class="grid-cell-container max-[1098px]:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contract Number</label>
                        </div>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                    <div class="grid-cell-container max-[1098px]:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contract Amount</label>
                        </div>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-[1098px]:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1 ">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Particulars</label>
                        </div>
                        <div class="input-container">
                            <Textbox />
                        </div>
                    </div>
                </div>
                <div class=" flex flex-row justify-end  pl-[24px] min-[1098px]:hidden">
                    <button class="button-design-1 bg-[#05c46b]">SEARCH</button>
                </div>
            </div>

            <div class=" justify-end pl-[24px] max-[1098px]:hidden">
                <button class="button-design-1 bg-[#05c46b]">SEARCH</button>
            </div>
            
        </div>

        <div class="my-[20px]  flex flex-col gap-2 sticky">
            <label class="font-bold text-[22px]  text-[#606060]">ACTION HISTORY</label>
            <TableView />
        </div>
    </div>

    <div class="w-4/5 flex gap-[20px] mr-0 ml-auto justify-end mt-[10px] mb-[20px] sticky top-0 left-0 max-lg:mr-auto">
        <div class="w-screen">
            <button class="button-design-1 text-white bg-[#0E4572] w-[138px] m-2">ADD ENTRY</button>
            <button class="button-design-1 text-white bg-[#16B1FF] w-[138px] m-2">SAVE</button>
            <button class="button-design-1 text-white bg-[#f8274c] w-[138px] m-2">CLEAR</button>
            <button class="button-design-1 text-white bg-[#56CA00] w-[138px] m-2">VIEW</button>
            <button class="button-design-1 text-white bg-[#A60000] w-[138px] m-2">DELETE</button>
        </div>
    </div>
    
</template>

<script>
import TableView from './AHTableView.vue';
import Textbox from '../../TRComponents/reusableComponents/Textbox.vue';

export default {
    components: {
        TableView,
        Textbox
    }
}
</script>
