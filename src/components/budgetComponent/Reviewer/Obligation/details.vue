<script>
import axios from 'axios';

export default {
    data() {
        return {
            remarks: '',
            userdesignation: '',
            position: '',
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
}
</script>

<template>
    <div class="flex justify-center flex-col w-screen max-h border-[6px] border-[#FFECB3] m-8 p-8 rounded-[24px]">
        <div class="mb-2">
            <span class="text-[22px] text-[#1890FF] font-bold">For Process</span>
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Budget Year</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Funding Source</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>

            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Reference Document</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Type of Appropriation</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
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
                <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Particiars</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Purchase Request No.</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Purchase Request Date</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">payee</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Requesting Official</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center flex-col w-screen max-h border-[6px] border-[#FFECB3] m-8 p-8 rounded-[24px]">
        <div class="flex flex-col gap-4">
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Title of the Program</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">AIP Code (Program)</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Title of the Project</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">AIP Code (Project)</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>
            <div class="flex justify-between flex-row gap-[100px]">
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">Title of the Activity</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
                <div class="flex flex-row gap-4 items-center">
                    <span class="h-[32px] w-[300px] text-[14px] font-semibold text-[#606060] flex items-center">AIP Code (Activity)</span>
                    <span class="h-[32px] w-[300px] text-sm text-gray-500 flex items-center">N/A</span>
                </div>
            </div>
            <div class="flex justify-normal flex-col gap-2 my-[10px]">
                <span class="text-[16px] font-bold text-[#606060]">Activity 1</span>
                <span class="text-[14px] font-semibold text-[#606060]">Details of Adjustments</span>
            </div>

            <div class="flex justify-center items-center mt-[10px]">
                <table class="divide-y w-[3000px] divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">account title</th>
                            <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">account code</th>
                            <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">appropriation</th>
                            <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">allotment</th>
                            <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">amount obligated</th>
                            <th class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">balance</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">N/A</td>
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
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtn()">for approval - dh</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtn()">reject</button>
            <RouterLink :to="{ name: 'Enroll/New Dashboard Reviewer' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
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
            <RouterLink :to="{ name: 'Enroll/New Dashboard - Approver&CA' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
    </div>
    <div v-if="this.userdesignation === 'City Accountant' || this.userdesignation === 'Assistant Department Head froFRS'">
        <div class="flex flex-col items-center justify-center my-[30px]">
            <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
            <textarea name="" id="" cols="100" rows="2" v-model="remarks" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
        </div>
        <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]" @click="ApprovalBtnCA()">approve</button>
            <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color" @click="RejectBtnCA()">reject</button>
            <RouterLink :to="{ name: 'Enroll/New Dashboard - Approver&CA' }" class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color cursor-pointer flex items-center justify-center">cancel</RouterLink>
        </div>
    </div>
</template>