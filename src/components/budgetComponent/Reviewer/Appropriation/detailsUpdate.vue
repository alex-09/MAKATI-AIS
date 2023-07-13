<template>
    <div class="hidden">
        <p>Received data:</p>
        <p>id: {{ this.id }}</p>
        <p>AIPCode: {{ this.aipcode }}</p>
    </div>
    <div class="flex justify-center flex-col w-screen max-h border-[6px] border-[#FFECB3] m-8 p-8 rounded-[24px]">
        <div class="mb-2">
            <span class="text-[22px] text-[#1890FF] font-bold">Update Appropriation</span>
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Budget Year</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.budget_year_id }}</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Funding Source</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.fundSource_id }}</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Type of Adjustment</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.reference_document }}</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Supplemental Budget Number</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.approType_id }}</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Source Document</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.reference_document }}</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Date of Document</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.approType_id }}</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Department</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Office Code</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Title of the Program</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.program }}</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">AIP Code (Program)</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.program_code }}</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Title of the Project</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.project }}</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">AIP Code (Project)</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.project_code }}</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Title of the Activity</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.activity }}</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">AIP Code (Activity)</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">{{ responseData.activity_code }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center flex-col w-screen max-h border-[6px] border-[#FFECB3] m-8 p-8 rounded-[24px]">
        <div class="mb-2">
            <span class="text-[16px] text-[#606060] font-bold">Details of Adjustments</span>
        </div>
        <div class="p-4">
            <table class="w-100%">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">office code</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">type of appropriation</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">name of activity</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">aip code activity</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">account title</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">account code</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">addition</th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">deduction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="expense in responseData1" :key="expense.id">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">{{ expense.department_code_id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">{{ expense.appro_type }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">{{ expense.activity }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">{{ expense.AIPCode }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">{{ expense.account_name }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">{{ expense.account_code }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div v-if="this.userdesignation === 'Reviewer' && this.position == 'Assistant Division Head'">
        <div class="flex flex-col items-center justify-center my-[30px]">
            <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
            <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtn()">for approval - dh</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtn()">reject</button>
            <RouterLink :to="{ name: 'List of Trust Receipts on Process' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
    </div>
    <div v-if="this.userdesignation === 'Approver' && this.position == 'Division Head'">
        <div class="flex flex-col items-center justify-center my-[30px]">
            <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
            <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtnDH()">for approval - CA</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtnDH()">reject</button>
            <RouterLink :to="{ name: 'Update Dashboard - Approver&CA' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
    </div>
    <div v-if="this.userdesignation === 'City Accountant' && this.position == 'City Accountant' || this.userdesignation === 'Assistant Department Head froFRS'">
        <div class="flex flex-col items-center justify-center my-[30px]">
            <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
            <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtnCA()">approve</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtnCA()">reject</button>
            <RouterLink :to="{ name: 'Update Dashboard - Approver&CA' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
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
    aipcode: {
      type: String,
      required: true
    },
  },
  data() {
    return {
      remarks: '',
      userdesignation: '',
      position: '',
      responseData: '',
      responseData1: [],
    };
  },
  async created() {
    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userLastName = response.data.user.surname;
    this.userdesignation = response.data.user.userdesignation;
    this.position = response.data.user.position;
    this.user = this.userFirstName + " " + this.userLastName;
  },
  async mounted() {
    // Call the fetchData() method to make the initial API request
    this.fetchData();
  },
  watch: {
    aipcode(newValue, oldValue) {
      // Watch for changes to the aipcode prop
      console.log('aipcode changed:', newValue);
      // Perform any actions that rely on the updated aipcode value
      this.fetchData();
    },
  },
  methods: {
    // ASST. DIV HEAD
    async ApprovalBtn() {
        const ApprovalData = {
            reviewer: this.user,
            appro_id: this.id,
            aipcode: this.aipcode,
            remarks: this.remarks,
        }

        const approvalResponse = await axios.post("appropriation/updateApproForReview", ApprovalData)
        console.log(approvalResponse.data);
        await Swal.fire({
            text: "This entry has been successfully added. The account has been subject for Approval - DH.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">This entry has been successfully added. The account has been subject for Approval - DH.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
        this.$router.push({ name: 'Update Dashboard Reviewer' });
    },
    async RejectBtn() {
        const RejectData = {
            appro_id: this.id,
            aipcode: this.aipcode,
            remarks: this.remarks,
        }

        const rejectResponse = await axios.post("appropriation/rejectApproForReview", RejectData)
        console.log(rejectResponse.data)
        await Swal.fire({
            text: "The account has been Rejected.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="78" height="79" viewBox="0 0 78 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.1 51.35H42.9V59.25H35.1V51.35ZM35.1 19.75H42.9V43.45H35.1V19.75ZM38.961 0C17.433 0 0 17.696 0 39.5C0 61.304 17.433 79 38.961 79C60.528 79 78 61.304 78 39.5C78 17.696 60.528 0 38.961 0ZM39 71.1C21.762 71.1 7.8 56.959 7.8 39.5C7.8 22.041 21.762 7.9 39 7.9C56.238 7.9 70.2 22.041 70.2 39.5C70.2 56.959 56.238 71.1 39 71.1Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The account has been Rejected.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
        this.$router.push({ name: 'Update Dashboard - Approver&CA' });
    },
    // DIVISION HEAD BUTTONS
    async ApprovalBtnDH() {
        const ApprovalData = {
            appro_id: this.id,
            aipcode: this.aipcode,
            remarks: this.remarks,
        }

        const approvalResponse = await axios.post("appropriation/updateApproDH", ApprovalData)
        console.log(approvalResponse.data);
        await Swal.fire({
            text: "This entry has been successfully added. The account has been subject for Approval - DH.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">This entry has been successfully added. The account has been subject for Approval - DH.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
        this.$router.push({ name: 'List of Trust Receipts on Process' });
    },
    async RejectBtnDH() {
        const RejectData = {
            appro_id: this.id,
            aipcode: this.aipcode,
            remarks: this.remarks,
        }

        const rejectResponse = await axios.post("appropriation/rejectApproDH", RejectData)
        console.log(rejectResponse.data)
        await Swal.fire({
            text: "The account has been Rejected.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="78" height="79" viewBox="0 0 78 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.1 51.35H42.9V59.25H35.1V51.35ZM35.1 19.75H42.9V43.45H35.1V19.75ZM38.961 0C17.433 0 0 17.696 0 39.5C0 61.304 17.433 79 38.961 79C60.528 79 78 61.304 78 39.5C78 17.696 60.528 0 38.961 0ZM39 71.1C21.762 71.1 7.8 56.959 7.8 39.5C7.8 22.041 21.762 7.9 39 7.9C56.238 7.9 70.2 22.041 70.2 39.5C70.2 56.959 56.238 71.1 39 71.1Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The account has been Rejected.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
        this.$router.push({ name: 'List of Trust Receipts on Process' });
    },
    // ASST. HEAD AND CITY ACCOUNTANT BUTTONS
    async ApprovalBtnCA() {
        const ApprovalData = {
            appro_id: this.id,
            aipcode: this.aipcode,
            remarks: this.remarks,
        }

        const approvalResponse = await axios.post("appropriation/updateApproCA", ApprovalData)
        console.log(approvalResponse.data);
        await Swal.fire({
            text: "This entry has been successfully added. The account has been subject for Approval - DH.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">This entry has been successfully added. The account has been subject for Approval - DH.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
        this.$router.push({ name: 'List of Trust Receipts on Process' });
    },
    async RejectBtnCA() {
        const RejectData = {
            appro_id: this.id,
            aipcode: this.aipcode,
            remarks: this.remarks,
        }

        const rejectResponse = await axios.post("appropriation/rejectApproCA", RejectData)
        console.log(rejectResponse.data)
        await Swal.fire({
            text: "The account has been Rejected.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="78" height="79" viewBox="0 0 78 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.1 51.35H42.9V59.25H35.1V51.35ZM35.1 19.75H42.9V43.45H35.1V19.75ZM38.961 0C17.433 0 0 17.696 0 39.5C0 61.304 17.433 79 38.961 79C60.528 79 78 61.304 78 39.5C78 17.696 60.528 0 38.961 0ZM39 71.1C21.762 71.1 7.8 56.959 7.8 39.5C7.8 22.041 21.762 7.9 39 7.9C56.238 7.9 70.2 22.041 70.2 39.5C70.2 56.959 56.238 71.1 39 71.1Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The account has been Rejected.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
        this.$router.push({ name: 'List of Trust Receipts on Process' });
    },
    async fetchData() {
      try {
        const response = await axios.post('appropriation/viewApproForReview', {
          appro_id: this.id,
          aipcode: this.aipcode,
        });
        // Handle the response data
        this.responseData = response.data.main_info[0];
        this.responseData1 = response.data.expenses;
        console.log(this.responseData1);
      } catch (error) {
        // Handle errors
        console.log(error);
      }
    },
  },
  computed: {
    totalAmount() {
      return this.responseData1.reduce((total, expense) => {
        return total + parseFloat(expense.appro_amount);
      }, 0);
    },
  },
};
</script>
