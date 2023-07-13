<template>
    <div class="container my-4 mt-8">
        <div 
        class="container grid place-content-center px-0">
            <div class="flex flex-row my-1 items-center mb-8">
                <span class="font-semibold text-sm text-other-black w-210">Contract No.</span>
                <label class="relative ml-8">
                    <input 
                    type="text" 
                    class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                    v-model="transactionId"
                    @input="fetchContract">
                    <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
                </label>
            </div>
            <div>
                <p class="capitalize text-other-black text-2xl font-bold mb-4">details of contracts</p>
                <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                    <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Name of Payee</span>
                    <span class="px-2 h-32 text-sm text-gray-500 flex items-center">{{ searchContract?.payee_name }}</span>
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Amount</span>
                        <div v-if="searchContract">
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="amount"
                            v-model="searchContract.amount">
                        </div>
                        <div v-else>
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="amount">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                    <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210 ">Department/Office</span>
                    <span class="px-2 h-32 text-sm text-gray-500 flex items-center">{{ searchContract?.department_name }}</span>
                    </div>
                </div>
                <div class="grid grid-row-1 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-210">Particulars</span>
                    <span class="w-[1150px] xxxxl:w-[1435px] px-2 h-32 text-sm text-gray-500 flex items-center">{{ searchContract?.description }}</span>
                    </div>
                </div>
            </div>
            
            <div class="container grid place-content-center px-0 mt-12">
                <p class="capitalize text-other-black text-2xl font-bold mb-4">Bearer’s Information</p>
                <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Name of Bearer</span>
                        <div v-if="searchContract">
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="amount"
                            v-model="searchContract.payee_name">
                        </div>
                        <div v-else>
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Contact No.</span>
                        <div v-if="searchContract">
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="contact"
                            v-model="searchContract.current_bearer_contact_number"
                            @input="validateNumber($event, 'contact');">
                        </div>
                        <div v-else>
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="contact"
                            @input="validateNumber($event, 'contact');">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210 ">Department/Office</span>
                        <select class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="selectedTransactionDept"
                            @change="updateSelectedDept">
                            <option value="" disabled selected>Select a Department/Office</option>
                            <option v-for="bearerDeptOption in bearerDeptOptions" :key="bearerDeptOption.department_code" :value="bearerDeptOption.department_code">{{ bearerDeptOption.department_name }}</option>
                        </select>
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Email</span>
                        <div v-if="searchContract">
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="amount"
                            v-model="searchContract.payee_name">
                        </div>
                        <div v-else>
                            <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                        </div>
                    </div>
                </div>
                <div class="grid grid-rows-1 gap-8 xxxxl:gap-80">
                    <div class="flex flex-row justify-end">
                        <div class="flex gap-4 justify-end mt-9">
                            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded" @click="clearData">clear</button>
                            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from "sweetalert2";

import DeptAPI from '../../../../../api_request/documentManagement/departmentDrop'
import SearchIcon from '../../../../icons/Budgetary/searchIcon.vue'

export default {
    components: {
        SearchIcon,
    },
    data() {
        return {
            transactionId: 'PT-',
            contracts: [],
            contract: [],
            amount: '',
            displayedAmount: '',
            bearerName: '',
            bearerContact: '',
            selectedBearerDept: '',
            bearerDeptOptions: [],
            bearerEmail: '',
            searchContract: {},
            searchContracts: [],
            selectedTransactionDept: ''

        }
    },
    mounted() {
        DeptAPI().then(bearerDeptOptions => {
            this.bearerDeptOptions = bearerDeptOptions;
        });

        this.fetchContracts();
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
            this.transactionId = '';
            this.amount = '';
            this.bearerName = '';
            this.selectedBearerDept = '';
            this.bearerContact = '';
            this.bearerEmail = '';
        },
        // function to fetch contracts from the server
        fetchContracts() {
            axios
                .get(`ContractPO/listTransac`)
                .then(response => {
                    this.contracts = response.data.data;
                    console.log(this.contracts);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        // function to fetch contract based on transaction ID
        fetchContract() {
            const transactionId = this.transactionId.toLowerCase();
            const contract = this.contracts.find(
                contract => contract.transaction_id.toLowerCase() === transactionId
            );
            if (contract) {
                this.searchContract = contract;
                this.selectedTransactionDept = contract.department_code; // Update the selected department/office for the transaction
            } else {
                this.searchContract = null;
                this.selectedTransactionDept = ''; // Reset the selected department/office
            }
        },
        updateSelectedDept() {
            const selectedDept = this.bearerDeptOptions.find(option => option.department_code === this.selectedTransactionDept);
            if (selectedDept) {
                this.selectedBearerDept = selectedDept.department_code;
            }
        },
    },
    mounted() {
            axios.get(`ContractPO/listTransac`)
            .then(response => {
                this.contracts = response.data.data;
                console.log(this.contracts);
            })
            .catch(error => {
                console.log(error);
            })
        },
    computed: {
        searchContract() {
            return this.contracts.find(
            contract =>
                contract.transaction_id.toLowerCase() === this.transactionId.toLowerCase()
            ) || null;
        },
    }
}
</script>