<template>
    <div class="overflow-auto h-max">
        <div class="sticky top-0 left-0 mb-5">
            <label class="font-bold text-[22px] text-[#606060]">CONTRACT DATA ENTRY</label>
        </div>
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2  gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1 ">
                        <label class="input-label-name">Name of Payee</label>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
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

        <div class="my-[11px] flex flex-col gap-2 border-solid border-[#05C64B] border">
            
            <div class="flex items-center">
                <button class=" bg-[#05C64B] w-30 m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="05C64B" viewBox="0 0 24 24" stroke-width="3" stroke="black" class=" ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>  
                </button>
                <span>LABOR COMPONENT</span>
            </div>

            <TableViewLaborComponent />
        </div>

        <div class="my-[11px] flex flex-col gap-2 border-solid border-[#05C64B] border">
            <div class="flex items-center">
                <button class=" bg-[#05C64B] w-30 m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="05C64B" viewBox="0 0 24 24" stroke-width="3" stroke="black" class=" ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>  
                </button>
                <span>SUPPLIES COMPONENT</span>
            </div>
            <TableViewSupplyComponent />
        </div>
    </div>

    <div class=" w-4/5 flex gap-[20px] mr-0 ml-auto justify-end mb-[4rem] mt-[2rem] max-lg:mr-auto">
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
import TableViewLaborComponent from '../LaborComponent.vue';
import TableViewSupplyComponent from '../SuppliesComponent.vue';
import TextBox from '../../../TRComponents/reusableComponents/Textbox.vue';

    export default {
        components: {
            TableViewLaborComponent,
            TableViewSupplyComponent,
            TextBox
        }
    }
</script>
