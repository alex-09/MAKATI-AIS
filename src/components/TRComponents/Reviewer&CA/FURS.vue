<template>
    <div class="hidden">
        <p>Received data:</p>
        <p>ID: {{ this.id }}</p>
    </div>
    <div class="flex justify-center items-center flex-col">
        <div class="mx-[50px] mt-[50px]">
            <span class="text-[22px] font-semibold uppercase">details of furs</span>
            <div class="flex flex-col gap-2 mt-[25px]">
                <div class="flex flex-row gap-14 h-[32px] items-center">
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Implementing office:</span>
                        <span>Sample</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">FURS Amount:</span>
                        <span>Sample</span>
                    </div>
                </div>
                <div class="flex flex-row gap-2 h-[32px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Particulars:</span>
                    <span>Sample</span>
                </div>
                <div class="flex flex-row gap-14 h-[32px] items-center">
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Type of Transaction:</span>
                        <span>Sample</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">

                    </div>
                </div>
                <div class="flex flex-row gap-14 h-[32px] items-center">
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Purchase Request No.:</span>
                        <span>Sample</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Purchase Request Date:</span>
                        <span>Sample</span>
                    </div>
                </div>
                <div class="flex flex-row gap-14 h-[32px] items-center">
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Payee:</span>
                        <span>Sample</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Requesting Official:</span>
                        <span>Sample</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-[50px] mt-[50px] w-[1143px] max-h border-[6px] border-[#FFECB3] p-8 flex-col flex rounded-[32px]">
            <div
                class="font-semibold text-[#3A3541] text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] after:flex-[1] after:border-b-[1px]"
            >
                Details of Source of Funds
            </div>
            <div class="flex flex-row gap-14 h-[32px]">
                <div class="flex flex-row gap-2 h-[32px] w-[800px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Source of Trust Receipt:</span>
                    <span>sample</span>
                </div>
                <div class="flex flex-row gap-2 h-[32px] w-[500px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Company / Agency Name:</span>
                    <span>sample</span>
                </div>
            </div>
            <div class="flex flex-row gap-14 h-[32px]">
                <div class="flex flex-row gap-2 h-[32px] w-[800px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Main Fund Title:</span>
                    <span>sample</span>
                </div>
                <div class="flex flex-row gap-2 h-[32px] w-[500px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Sub-Fund Title:</span>
                    <span>sample</span>
                </div>
            </div>
            <!-- TABLE STARTS HERE -->
            <div class="flex justify-center mt-[30px]">
                <div class="overflow-x-auto max-h max-w">
                    <table class="divide-y max-w divide-gray-200 mr-8">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    sub-fund title
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    latest balance of trust receipt
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    account title
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    account code
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    amount obligated
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    balance
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-semibold text-center text-[#3A3541] uppercase">
                                    remarks
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                    N/A
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div v-if="this.userdesignation === 'Reviewer' && this.position == 'Assistant Division Head'">
            <div class="flex flex-col items-center justify-center my-[30px]">
                <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
                <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
            </div>
            <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
                <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]">for approval - dh</button>
                <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color">reject</button>
                <RouterLink :to="{ name: 'List of FURS Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
            </div>
        </div>
        <div v-if="this.userdesignation === 'Approver' && this.position == 'Division Head'">
            <div class="flex flex-col items-center justify-center my-[30px]">
                <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
                <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
            </div>
            <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
                <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]">for approval - CA</button>
                <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color">reject</button>
                <RouterLink :to="{ name: 'List of FURS Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
            </div>
        </div>
        <div v-if="this.userdesignation === 'City Accountant' && this.position == 'City Accountant' || this.userdesignation === 'Assistant Department Head froFRS'">
            <div class="flex flex-col items-center justify-center my-[30px]">
                <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
                <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
            </div>
            <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
                <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]">approve</button>
                <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color">reject</button>
                <RouterLink :to="{ name: 'List of FURS Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from "sweetalert2";
    export default {
        props: {
            id: {
                type: String,
                required: true
            },
        },
        data() {
            return {
                responseData: null,
                remarks: '',
                userdesignation: '',
                position: ''
            };
        },
        mounted() {
            axios
            .get(`trustfunds/viewFurs/${this.id}`)
            .then(response => {
                // Handle the response data
                this.responseData = response.data.list;
                console.log(this.responseData);
            })
            .catch(error => {
                // Handle errors
                console.log(error);
            });
        },
        async created() {
            const response = await axios.get("me");

            this.userFirstName = response.data.user.firstname;
            this.userLastName = response.data.user.surname;
            this.userdesignation = response.data.user.userdesignation;
            this.position = response.data.user.position;
            this.user = this.userFirstName + " " + this.userLastName;
        }
    }
</script>