<template>
    <div class="container my-4 mt-8">
        <div class="container grid place-content-center px-0">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">payee's information</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Name of Payee</span>
                    <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="payeeName">
                </div>
            </div>
            <p class="capitalize text-other-black text-2xl font-bold mb-4 mt-8">transaction details</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Particulars</span>
                    <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="particular">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Amount</span>
                    <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        id="amount"
                        v-model="amount"
                        @input="validateNumber($event, 'amount');">
                </div>
            </div>
            <p class="capitalize text-other-black text-2xl font-bold mb-4 mt-8">bearer's Information</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Bearer's Name</span>
                    <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="bearerName">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Contact No.</span>
                    <input 
                    type="text" 
                    class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                    id="bearerContact"
                    v-model="bearerContact"
                    @input="validateNumber($event, 'bearerContact');">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210 ">Department/Office</span>
                    <select 
                        class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="bearerDept">
                        <option value="" disabled selected>Select a Department/Office</option>
                        <option v-for="bearerDeptOption in bearerDeptOptions" :key="bearerDeptOption.department_code" :value="bearerDeptOption.department_code">{{ bearerDeptOption.department_name }}</option>
                    </select>
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Email</span>
                    <input 
                        type="email" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="bearerEmail">
                </div>
            </div>
            <div class="grid grid-rows-1 gap-8 xxxxl:gap-80">
                <div class="flex flex-row justify-end">
                    <div class="flex gap-4 justify-end mt-9">
                        <button 
                            class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded"
                            @click="clearData">
                            clear
                        </button>
                        <button 
                            class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
                            @click="sendTrans">
                            save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Swal from "sweetalert2";

import DeptAPI from '../../../../api_request/documentManagement/departmentDrop'

export default {
    data() {
        return {
            payeeName: '',
            particular: '',
            amount: '',
            bearerName: '',
            bearerDept: '',
            bearerDeptOptions: [],
            bearerContact: '',
            bearerEmail: '',
        }
    },
    mounted() {
        DeptAPI().then(bearerDeptOptions => {
            this.bearerDeptOptions = bearerDeptOptions;
        });
    },
    methods: {
        // function na number then specific special characters pwede iinput
        validateNumber(event, field) {
        const regex = /^[0-9,-.+]+$/; // regex pattern to only allow numbers, - and , and .
            if (!regex.test(event.target.value)) {
                event.target.value = event.target.value.replace(/[^\d]/g, ""); // remove any non-numeric characters
                this[field] = event.target.value; // update the data property
            } else {
                this[field] = event.target.value; // update the data property if input is valid
            }
        },
        // function para maclear lahat ng dapat na ininput
        clearData() {
            this.payeeName = '';
            this.particular = '';
            this.amount = '';
            this.bearerName = '';
            this.bearerDept = '';
            this.bearerContact = '';
            this.bearerEmail = '';
        },
        // function para sa pagstore ng new transaction
        async sendTrans() {
            try {                
                const createTrans = {
                    payee_name: this.payeeName,
                    particulars: this.particular,
                    amount: this.amount,
                    current_bearer: this.bearerName,
                    current_bearer_dept: this.bearerDept,
                    current_bearer_contact_number: this.bearerContact,
                    current_bearer_email: this.bearerEmail
                };

                // API REQUEST FOR CREATE OF ACCOUNT
                const createResponse = await axios.post("Payment-Transaction/storePT", createTrans);
                console.log(createResponse.data)
                await Swal.fire({
                    text: "Your entry has been successfully added. The account has been subject to Approval.",
                    html: `<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">${createResponse.data.message}</span></div></div>`,
                    showConfirmButton: true,
                });
            } catch (error) {
                console.error(error);
            }
        }
    }

}
</script>

