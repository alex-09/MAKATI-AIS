<script>
    import UploadIcon from '../../../../icons/Document/UploadIcon.vue'
    import DeptAPI from '../../../../../api_request/documentManagement/departmentDrop.js'

    import axios from 'axios'
    import Swal from "sweetalert2";

    export default {
        components: {
            UploadIcon,
        },
        data() {
            return {
                selectedTrans: '',
                selectedFunds: '',
                selectedDept: '',
                deptOptions: [],
                selectedDocu: '',
                selectedEmp: '',
                subject: '',
                cafoa_obr: '',
                caf: '',
                numberPersonnel: '',
                amount: '',
                periodFrom: '',
                periodTo: '',

                bearerName: '',
                bearerAddress: '',
                bearerContact: '',
                selectedBearerDept: '',
                bearerDeptOptions: [],
                selectedFileName: null,
                selectedFile: null,
            }
        },
        mounted() {
            DeptAPI().then(deptOptions => {
                this.deptOptions = deptOptions;
            });

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
            openFileInput() {
                this.$refs.fileInput.click();
            },
            onFileSelected(event) {
                const file = event.target.files[0];
                if (!file) return;
                if (!file.name.endsWith('.pdf')) {
                    alert('Please select a valid PDF file');
                    this.selectedFileName = null;
                    this.selectedFile = null;
                    return;
                }
                this.selectedFileName = file.name;
                this.selectedFile = file;
            },
            // function para maclear lahat ng dapat na ininput
            clearData() {
                this.selectedTrans = '';
                this.selectedFunds = '';
                this.selectedDept = '';
                this.selectedDocu = '';
                this.selectedEmp = '';
                this.subject = '';
                this.cafoa_obr = '';
                this.caf = '';
                this.numberPersonnel = '';
                this.amount = '';
                this.periodFrom = '';
                this.periodTo = '';
                this.bearerName = '';
                this.bearerAddress = '';
                this.bearerContact = '';
                this.selectedBearerDept = '';
                this.selectedFileName = '';
                this.selectedFile = null;
            },
            // function para sa pagstore ng new transaction
            async sendPayroll() {
                try {
                    const formData = new FormData(); // Create a FormData object

                    const createPayroll = {
                        transaction_type: this.selectedTrans,
                        fund_source: this.selectedFunds,
                        department: this.selectedDept,
                        payroll_type: this.selectedDocu,
                        employment_type: this.selectedEmp,
                        subject: this.subject,
                        cafoa_obr: this.cafoa_obr,
                        caf: this.caf,
                        personnel_number: this.numberPersonnel,
                        amount: this.amount,
                        covered_from: this.periodFrom,
                        covered_to: this.periodTo,
                        bearer_name: this.bearerName,
                        bearer_address: this.bearerAddress,
                        bearer_contact: this.bearerContact,
                        bearer_dept: this.selectedBearerDept,
                        document: this.selectedFile,
                    };

                    formData.append('file', this.selectedFile);

                    for (const key in createPayroll) {
                        formData.append(key, createPayroll[key]);
                    }

                    const createResponse = await axios.post("Payroll-Appointment/receive-appointment", formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data' // Set the content type to multipart/form-data
                                            }
                                        });
                    console.log(createResponse.data)
                    await Swal.fire({
                        text: "Your entry has been successfully added. The account has been subject to Approval.",
                        html: `<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">${createResponse.data.message}</span></div></div>`,
                        showConfirmButton: true,
                    });

                    // TO CLEAR THE INPUT FIELDS
                    this.selectedTrans = '';
                    this.selectedFunds = '';
                    this.selectedDept = '';
                    this.selectedDocu = '';
                    this.selectedEmp = '';
                    this.subject = '';
                    this.cafoa_obr = '';
                    this.caf = '';
                    this.numberPersonnel = '';
                    this.amount = '';
                    this.periodFrom = '';
                    this.periodTo = '';
                    this.bearerName = '';
                    this.bearerAddress = '';
                    this.bearerContact = '';
                    this.selectedBearerDept = '';
                    this.selectedFileName = '';
                    this.selectedFile = null;
                } catch (error) {
                    console.error(error);
                }
            }
        }
    }
</script>
<template>
    <div class="container mt-4">
        <div class="container grid place-content-center px-0">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">Receive Payrolls and Appointment</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="grid grid-row-4 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Type of Transaction</span>
                        <select 
                            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="selectedTrans">
                            <option value="" disabled selected>Select a Type of Transaction</option>
                            <option value="Appointment">Appointment</option>
                            <option value="Payroll">Payroll</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Fund Source</span>
                        <select 
                            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="selectedFunds">
                            <option value="" disabled selected>Select a Fund Source</option>
                            <option value="Bank Loan">Bank Loan</option>
                            <option value="Economic Enterprises Management Office">Economic Enterprises Management Office</option>
                            <option value="Trust Fund">Trust Fund</option>
                            <option value="Special Educational Fund">Special Educational Fund</option>
                        </select>
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Department/Office</span>
                        <select 
                            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="selectedDept">
                            <option value="" disabled selected>Select a Department/Office</option>
                            <option v-for="deptOption in deptOptions" :key="deptOption.department_code" :value="deptOption.department_code">{{ deptOption.department_name }}</option>
                        </select>
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Type of Document</span>
                        <select 
                            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="selectedDocu">
                            <option value="" disabled selected>Select a Type of Document</option>
                            <option value="Appointmenmt">Appointmenmt</option>
                            <option value="Payroll for Salaries">Payroll for Salaries</option>
                            <option value="Payroll for Overtime">Payroll for Overtime</option>
                            <option value="Payroll for RATA">Payroll for RATA</option>
                        </select>
                    </div>
                     <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Type of Employment</span>
                        <select 
                            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="selectedEmp">
                            <option value="" disabled selected>Select a Type of Employment</option>
                            <option value="Regular">Regular</option>
                            <option value="Casual">Casual</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Consultant">Consultant</option> 
                        </select>
                    </div>
                </div>
                <div class="grid grid-row-4">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">CAFOA/OBR</span>
                        <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="cafoa_obr">
                    </div>
                    <div class="flex flex-row my-1 items-center ">
                        <span class="font-semibold text-sm text-other-black w-210 ">CAF</span>
                        <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="caf">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Number of Personnel</span>
                        <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            v-model="numberPersonnel">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Amount</span>
                        <input 
                            type="text" 
                            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                            id="amount"
                            v-model="amount">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Period Covered:</span>
                        <span class="font-semibold text-sm text-other-black w-56 mr-4">From</span><input type="date" v-model="periodFrom" class="w-180 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                        <span class="font-semibold text-sm text-other-black w-56 mx-4">To</span><input type="date" v-model="periodTo" class="w-180 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                </div>
            </div>
            <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-210">Subject</span>
                <input 
                type="text" 
                class="w-1140 xxxxl:w-1435 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="subject">
            </div>
        </div>
        <div class="container grid place-content-center px-0 mt-12">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">bearer's Information</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="grid grid-row-3 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Name of Bearer</span>
                        <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="bearerName">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Address</span>
                        <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="bearerAddress">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Attached Document:</span>
                        <label @click="openFileInput" class="flex items-center h-32 p-4 gap-3 rounded border border-input-color border-dashed bg-upload-color cursor-pointer">
                            <UploadIcon />
                            <div class="space-y-2">
                                <h4 class="text-base font-semibold text-gray-500">Upload a file</h4>
                            </div>
                        </label>
                        <input type="file" ref="fileInput" style="display: none" @change="onFileSelected" accept=".pdf" />
                        <span v-if="selectedFileName" class="text-primary-color font-normal text-sm px-8">{{ selectedFileName }}</span>
                    </div>
                    <div class="flex flex-row mt-9 items-center"></div>
                </div>
                <div class="grid grid-row-3">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Contact No. </span>
                        <input 
                        type="text" 
                        class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="bearerContact">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Department/Office</span>
                        <select class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                        v-model="selectedBearerDept">
                            <option value="" disabled selected>Select a Department/Office</option>
                            <option v-for="bearerDeptOption in bearerDeptOptions" :key="bearerDeptOption.department_code" :value="bearerDeptOption.department_code">{{ bearerDeptOption.department_name }}</option>
                        </select>
                    </div>
                    <div class="flex flex-row my-1 items-center"></div>
                    <div class="flex flex-row justify-end">
                        <div class="flex gap-4 justify-end mt-9">
                            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded" @click="clearData">clear</button>
                            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded" @click="sendPayroll">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>