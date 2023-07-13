<script setup>
import Textbox from '../../../../../TRComponents/reusableComponents/Textbox.vue';
import ServicesLaborTable from './ServicesLaborTable.vue'
import ServicesSuppliesTable from './ServicesSuppliesTable.vue';
import TotalContractCost from './TotalContractCost.vue'
import addComponent from '../../../../../icons/Document/addComponent.vue';

const emits = defineEmits([
    'returntomainView'
])
const i = {id: 6}

</script>
<template>
    <div class=" pt-[30px] px-[90px]" >
        <span class=" grid-title">CONTRACT DATA ENTRY</span>
        <div class=" grid grid-cols-2 mt-[26px] gap-x-[108px] mb-[17px] gap-y-[15px] ">
            <div class="flex justify-between items-center">
                <span class="label-text">Name of Payee</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center col-start-1">
                <span class="label-text">Date of Contract</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="label-text">Contract Number</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-[10px]">
            <div class="outline outline-1 outline-[#15B9E9]">
                <button class="flex items-center font-semibold text-xs">
                    <addComponent /> LABOR COMPONENT
                </button>
                <ServicesLaborTable/>
            </div>
            <div class="outline outline-1 outline-[#15B9E9]">
                <button class="flex items-center font-semibold text-xs">
                    <addComponent/> SUPPLIES COMPONENT
                </button>
                <ServicesSuppliesTable/>
            </div>
            <div class="outline outline-1 outline-[#15B9E9]">
                <TotalContractCost />
            </div>
        </div>
        
        
        <div class=" my-[21px] flex justify-end">
            <div class="md:w-[70%] flex justify-end gap-[14px] flex-wrap text-white">
                <button class="h-42 px-[26px] rounded-[5px] bg-primary-color ">ADD PAGE</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-[#A60000] ">DELETE PAGE</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-save-color ">VIEW DATA ENCODED</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-button-blue ">SAVE</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-danger-color " @click="$emit('returntomainView', i)">CANCEL</button>
            </div>
        </div>


    </div>
</template>
<style scoped>
.label-text{
    width: 206px;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
}
.grid-title{
    font-weight: 700;
    font-size: 22px;
    line-height: 27px;
}
.component-container{
    height: 32px;
    position: relative;
    flex-grow: 1;
}
</style>
