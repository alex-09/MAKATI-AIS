<script setup>
    import DropDown from './dropDown.vue'
    import { ref } from 'vue'

    const dept = [
        {value: 1, label: 'Office of the Mayor' },
        {value: 2, label: 'Public Safety Department' },
        {value: 3, label: 'Liga ng mga Barangay' },
        {value: 4, label: 'Business Permits Office' },
        {value: 5, label: 'Office of the Vice Mayor' },
        {value: 6, label: 'International Relations Department' },
        {value: 7, label: "City Administrator's Office" },
        {value: 8, label: 'Budget Department' },
        {value: 9, label: 'Accounting Department' },
        {value: 10, label: 'Finance Department' },
        {value: 11, label: 'Assessment Department' },
        {value: 12, label: 'Information and Community Relations Department' },
    ];

    const dept2 = [
        {value: 1, label: 'Office of the Mayor' },
        {value: 2, label: 'Public Safety Department' },
        {value: 3, label: 'Liga ng mga Barangay' },
        {value: 4, label: 'Business Permits Office' },
        {value: 5, label: 'Office of the Vice Mayor' },
        {value: 6, label: 'International Relations Department' },
        {value: 7, label: "City Administrator's Office" },
        {value: 8, label: 'Budget Department' },
        {value: 9, label: 'Accounting Department' },
        {value: 10, label: 'Finance Department' },
        {value: 11, label: 'Assessment Department' },
        {value: 12, label: 'Information and Community Relations Department' },
    ];

    const form = ref({
        dept_id: null,
        dept2_id: null,
    });
</script>

<script>
import axios from 'axios';
import Swal from "sweetalert2";

import DeptAPI from '../../../../api_request/documentManagement/departmentDrop'
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue'

export default {
    components: {
        SearchIcon
    }
}
</script>

<template>
    <div class="container my-4 mt-8">
        <div class="container grid place-content-center px-0">
            <div class="flex flex-row my-1 items-center mb-8">
                <span class="font-semibold text-sm text-other-black w-210">Transaction No.</span>
                <label class="relative ml-8">
                    <input 
                    type="text" 
                    class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
                </label>
            </div>
            <p class="capitalize text-other-black text-2xl font-bold mb-4">payee's information</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Name of Payee</span>
                    <span class="px-2 h-32 text-sm text-gray-500 flex items-center">Juan Dela Cruz</span>
                </div>
            </div>
            <p class="capitalize text-other-black text-2xl font-bold mb-4 mt-8">transaction details</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Particulars</span>
                    <span class="px-2 h-32 text-sm text-gray-500 flex items-center">Sample particulars description</span>
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Amount</span>
                    <span class="px-2 h-32 text-sm text-gray-500 flex items-center">Php 999,999.99</span>
                </div>
            </div>
            <p class="capitalize text-other-black text-2xl font-bold mb-4 mt-8">bearer's Information</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Bearer's Name</span>
                    <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Contact No.</span>
                    <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210 ">Department/Office</span>
                    <DropDown
                        placeholder="Select Deparment"
                        v-model="form.dept_id"
                        :options="dept"
                    />
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Email</span>
                    <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
            </div>
            <div class="grid grid-rows-1 gap-8 xxxxl:gap-80">
                <div class="flex flex-row justify-end">
                    <div class="flex gap-4 justify-end mt-9">
                        <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">clear</button>
                        <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>