<script setup>
import Textbox from '../../../TRComponents/reusableComponents/Textbox.vue';
import Dropdown from './dropDown.vue';
import newTransTable from './newTransViews/newTransTable.vue';
import { ref } from 'vue';
const Contract = ref([ {id: 0 , label: 'GOODS'}, {id: 1, label: 'SERVICES'},
{id: 2 , label: 'INFRASTRUCTURE'}, {id: 3 , label: 'CONSULTANCY'}, {id: 4, label: 'FRAMEWORK AGREEMENT'}, 
{id: 5 , label: 'ORDERING AGREEMENT'}, {id: 6 , label: 'OTHERS'} ])
const SelectedContract = ref(null)
const emits = defineEmits([
    'changeView'
])
</script>

<template>
    <div class="  px-[90px]" >
        <span class=" grid-title">CONTRACT DETAILS</span>
        
        <div class=" grid grid-cols-2 mt-[26px] gap-x-[108px] mb-[17px] gap-y-[15px] ">
            <div class="flex justify-between items-center">
                <span class="label-text">Type of Contract</span>
                <div class="component-container ">
                    <Dropdown :data-array="Contract" v-model="SelectedContract" :placeholder="'Select Type of Contract'"/>
                </div>
            </div>
            
            <div class="flex justify-between items-center">
                <span class="label-text">Contract Amount</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
            
            <div class="flex justify-between items-center">
                <span class="label-text">Contract Date</span>
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
            <div class="flex justify-between  items-start">
                <span class="label-text">Mode of Procurement</span>
                <div class="component-container">
                    <Dropdown/>
                </div>
            </div>
            <div class="flex justify-between  items-start">
                <span class="label-text">Purchase Request No,</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between col-span-2  items-start">
                <span class="label-text">Summary of Cost estimate Number(INFRA)</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between col-span-2  items-center">
                <span class="label-text">Name of Project</span>
                <div class="h-[64px] flex-grow relative">
                    <Textbox/>
                </div>
            </div>
        </div>
        <span class=" grid-title">PAYEE DETAILS</span>
        <div class=" grid grid-cols-2 mt-[26px] gap-x-[108px] mb-[17px] gap-y-[15px] ">
            <div class="flex justify-between items-center">
                <span class="label-text">Name of Payee</span>
                <div class="component-container ">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between col-span-2 items-center">
                <span class="label-text">Address</span>
                <div class="component-container ">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="label-text">Name of Authorized</span>
                <div class="component-container ">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="label-text">Designation</span>
                <div class="component-container ">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="label-text">Contact Number</span>
                <div class="component-container ">
                    <Dropdown/>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="label-text">Company's TIN</span>
                <div class="component-container ">
                    <Textbox/>
                </div>
            </div>
        </div>
        <span class=" grid-title ">DELIVERY DETAILS AND PAYMENT TERMS</span>
        <div class=" grid grid-cols-2 mt-[26px] gap-x-[108px] mb-[17px] gap-y-[15px] ">
            <div class="flex justify-between  items-center">
                <span class="label-text">Place of Delivery</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
            <div class="flex justify-between  items-center">
                <span class="label-text">Payment Term</span>
                <div class="component-container">
                    <Textbox/>
                </div>
            </div>
        </div>
        <span class=" grid-title ">DELIVERY TERM:</span>
        <div class="outline outline-1 outline-[#15b9e9] mt-[23px]">
            <newTransTable />
        </div>
        
        <div class=" my-[21px] flex justify-end">
            <div class="md:w-[70%] flex justify-end gap-[14px] flex-wrap text-white">
                <button class="h-42 px-[26px] rounded-[5px] bg-primary-color " @click="$emit('changeView', SelectedContract)">ENTER DETAILS</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-button-blue ">SAVE FOR APPROVAL</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-button-green-dark ">FOR BUDGETARY OBLIGATION</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-danger-color ">CLEAR</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-save-color ">VIEW CONTRACT</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-[#862bfb] ">1ST APPROVAL</button>
                <button class="h-42 px-[26px] rounded-[5px] bg-dark-green ">SAVE FOR APPROVAL</button>
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