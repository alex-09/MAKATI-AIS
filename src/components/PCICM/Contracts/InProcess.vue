<template>
    <div class="overflow-x-auto h-max">
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-3 gap-x-[45px] max-md:grid-cols-1">
                    <div class=" max-sm:columns-1">
                        <label class="input-label-name">Date</label>
                        <div class="input-container">
                            <input type="date" class="rounded-md text-text-gray-100 w-full h-full">
                        </div>
                    </div>
                    <div class="">
                        <label class="input-label-name">Number</label>
                        <div class="input-container">
                            <Dropdown />
                        </div>
                    </div>
                    <div class=" ">
                        <label class="input-label-name">Contact Number</label>
                        <div class="input-container">
                            <Dropdown />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="">
                        <label class="input-label-name">Payee</label>
                        <div class="input-container">
                            <SearchBox />
                        </div> 
                    </div>
                    <div class=" ">
                        <label class="input-label-name">Type of Transaction</label>
                        <div class="input-container">
                            <Dropdown />
                        </div>
                    </div>
                </div>
                <div class=" flex flex-row justify-end  pl-[24px] md:hidden">
                    <button class="button-design-1 bg-[#05c46b]">SEARCH</button>
                </div>
            </div>

            <div class=" justify-end  pl-[24px] max-md:hidden">
                <button class="button-design-1 bg-[#05c46b]">SEARCH</button>
            </div>
            
        </div>
        

        <div class="my-[20px] flex flex-col gap-2 sticky ">
            <label class="font-bold text-[22px] text-[#606060]">FOR PROCESS</label>
            <TableView/>
        </div>
    </div>

    <div class=" flex gap-[20px] mt-[10px] mb-[20px] justify-end">
        <button class="button-design-1 text-white bg-[#16b1ff] w-[6rem]">SAVE</button>
        <button class="button-design-1 text-white bg-[#f8274c] w-[6rem]">CLEAR</button>
    </div>
    
</template>

<script setup>
import TableView from './FPTableView.vue';
import Dropdown from '../../TRComponents/reusableComponents/Dropdown.vue';
import SearchBox from '../../TRComponents/reusableComponents/Searchbox.vue';
</script>
