<template>
    <div class="hidden">
        <p>Received data:</p>
        <p>TFT: {{ tft }}</p>
        <p>TF: {{ tf }}</p>
        <p>STR: {{ str }}</p>
    </div>
    <div class="flex justify-center items-center flex-col">
        <div class="mx-[50px] mt-[50px]">
            <span class="text-[22px] font-bold uppercase">Unexpended Balance of LDRRMF</span>
            <div class="flex flex-col gap-2 mt-[25px]">
                <div class="flex flex-row gap-14 h-[32px] items-center">
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Budget Year:</span>
                        <span>{{ responseData.budget_year_id }}</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Legal Basis:</span>
                        <span>{{ responseData.legal_basis }}</span>
                    </div>
                </div>
                <div class="flex flex-row gap-2 h-[32px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Source Document:</span>
                    <span>{{ responseData.document_source }}</span>
                </div>
                <div class="flex flex-row gap-2 h-[32px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">General Description:</span>
                    <span>{{ responseData.general_description }}</span>
                </div>
                <div class="flex flex-row gap-14 h-[32px] items-center">
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Journal Entry Voucher No.:</span>
                        <span>{{ responseData.journal_voucher_no }}</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[460px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Journal Entry Voucher Date:</span>
                        <span>{{ responseData.journal_voucher_date }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-[50px] mt-[50px] w-[1143px] max-h border-[6px] border-[#FFECB3] p-8 flex-col flex rounded-[32px]">
            <div class="flex flex-row gap-2 h-[32px] items-center">
                <span class="text-[14px] font-semibold w-[200px]">Main Fund Title:</span>
                <span>{{ main_fund.main_fund_title }}</span>
            </div>
            <div v-for="(donation, index) in responseData2" :key="donation.tf_id" class="mt-[15px]">
                <div
                    class="font-normal text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] italic after:flex-[1] after:border-b-[1px]"
                >
                    Purpose No. {{ index + 1 }}
                </div>
                <div class="flex flex-row gap-14 h-[32px]">
                    <div class="flex flex-row gap-2 h-[32px] w-[800px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Sub-Fund Title:</span>
                        <span>{{ donation.sub_fund_title }}</span>
                    </div>
                    <div class="flex flex-row gap-2 h-[32px] w-[500px] items-center">
                        <span class="text-[14px] font-semibold w-[200px]">Amount Allocated:</span>
                        <span>{{ donation.amount_allocated }}</span>
                    </div>
                </div>
                <div class="flex flex-row gap-2 h-[32px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Specific Purpose:</span>
                    <span>{{ donation.specific_purpose }}</span>
                </div>
                <div class="flex flex-row gap-2 h-[32px] items-center">
                    <span class="text-[14px] font-semibold w-[200px]">Implementing Office:</span>
                    <span>{{ donation.implementing_office }}</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center my-[30px]">
            <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
            <textarea name="" id="" cols="100" rows="2" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]" v-if="this.userdesignation === 'Reviewer' && this.position == 'Assistant Division Head'">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtn()">for approval - dh</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtn()">reject</button>
            <RouterLink :to="{ name: 'List of Trust Receipts on Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]" v-if="this.userdesignation === 'Approver' && this.position == 'Division Head'">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtn()">for approval - ca</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtn()">reject</button>
            <RouterLink :to="{ name: 'List of Trust Receipts on Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]" v-if="this.userdesignation === 'City Accountant' && this.position == 'City Accountant' || this.userdesignation === 'Assistant Department Head froFRS'">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtn()">approve</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtn()">reject</button>
            <RouterLink :to="{ name: 'List of Trust Receipts on Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
    </div>

</template>
  
<script>
import axios from 'axios';
    export default {
        props: {
            tft: {
                type: String,
                required: true
            },
            tf: {
                type: String,
                required: true
            },
            str: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                responseData: '',
                main_fund: '',
                responseData2: [],
                remarks: '',
            };
        },
        methods: {
            async ApprovalBtn() {
                const ApprovalData = {
                    reviewer: this.user,
                    tf_id: this.tf,
                    tf_type: this.str,
                    remarks: this.remarks,
                }

                const approvalResponse = await axios.post("trustfunds/toDiviHead", ApprovalData)
                console.log(approvalResponse.data);
                await Swal.fire({
                    text: "This entry has been successfully added. The account has been subject for Approval - DH.",
                    html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">This entry has been successfully added. The account has been subject for Approval - DH.</span></div></div>',
                    showConfirmButton: false,
                    timer: 1500,
                });
                this.$router.push({ name: 'List of Trust Receipts on Process' });
            },
            async RejectBtn() {
                const RejectData = {
                    tf_id: this.tf,
                    tf_type: this.str,
                    remarks: this.remarks,
                }

                const rejectResponse = await axios.post("trustfunds/revReject", RejectData)
                console.log(rejectResponse.data)
                await Swal.fire({
                    text: "The account has been Rejected.",
                    html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="78" height="79" viewBox="0 0 78 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.1 51.35H42.9V59.25H35.1V51.35ZM35.1 19.75H42.9V43.45H35.1V19.75ZM38.961 0C17.433 0 0 17.696 0 39.5C0 61.304 17.433 79 38.961 79C60.528 79 78 61.304 78 39.5C78 17.696 60.528 0 38.961 0ZM39 71.1C21.762 71.1 7.8 56.959 7.8 39.5C7.8 22.041 21.762 7.9 39 7.9C56.238 7.9 70.2 22.041 70.2 39.5C70.2 56.959 56.238 71.1 39 71.1Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The account has been Rejected.</span></div></div>',
                    showConfirmButton: false,
                    timer: 1500,
                });
                this.$router.push({ name: 'List of Trust Receipts on Process' });
            }
        },
        mounted() {
            axios
            .post('trustfunds/viewTr', {
                tf_type: this.str,
                tf_id: this.tf
            })
            .then(response => {
                // Handle the response data
                this.responseData = response.data.list[0];
                this.main_fund = response.data.list2[0];
                this.responseData2 = response.data.list2;
                console.log(this.responseData2);
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
    };
  </script>
  