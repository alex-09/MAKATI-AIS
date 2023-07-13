<script setup>
    import UploadIcon from '../../../../icons/Document/UploadIcon.vue'
    import PayrollDrop from "./dropdown.vue"
    import { ref } from 'vue' 

    const typeTrans = [
        {value: 1, label: 'Appointment' },
        {value: 2, label: 'Payroll' },
        {value: 3, label: 'Others' },
    ];

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

    const fund = [
        {value: 1, label: 'General Fund - Proper' },
        {value: 2, label: 'Ospital ng Makati' },
        {value: 3, label: 'University of Makati' },
        {value: 4, label: 'Economic Enterprises and Management Office' },
        {value: 5, label: 'Youth and Sports Development Department' },
        {value: 6, label: 'Trust Fund' },
        {value: 7, label: "Special Education Fund" },
        {value: 8, label: 'Bank Loan' },
        {value: 9, label: "City's Development Fund" },

    ];

    const docu = [
        {value: 1, label: 'Appointment' },
        {value: 2, label: 'Payroll for Salaries' },
        {value: 3, label: 'Payroll for Overtime' },
        {value: 4, label: 'Payroll for RATA' },
        {value: 5, label: 'Payroll for SALA & Hazard Pay' },
        {value: 6, label: 'Payroll for Mid-Year Bonus' },
        {value: 7, label: "Payroll for PEI" },
        {value: 8, label: 'Payroll for SRI' },
        {value: 9, label: 'Payroll for Anniversary Bonus' },
        {value: 10, label: 'Payroll for Loyalty Bonus' },
        {value: 11, label: 'Payroll for Monitized Leave' },
        {value: 12, label: 'Payroll for Honoraria' },
        {value: 13, label: 'Payroll for Student Stipend' },
        {value: 14, label: 'Payroll for NGA Allowances' },
        {value: 15, label: 'Payroll for Book Allowances' },
        {value: 16, label: 'Payroll for PHIC Professional Fees' },
        {value: 17, label: 'Others' },
    ];

    const emp = [
        {value: 1, label: 'Regular' },
        {value: 2, label: 'Casual' },
        {value: 3, label: 'Contractual' },
        {value: 4, label: 'Cosultant' },
        {value: 5, label: 'Letter' },
        {value: 6, label: 'Job Order' },
        {value: 7, label: "Others" },
    ];

    const Beardocu = [
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
        trans_id: null,
        fund_id: null,
        dept_id: null,
        docu_id: null,
        emp_id: null,
        beardocu_id: null,
    });
</script>
<template>
    <div class="container mt-4">
        <div class="container grid place-content-center px-0">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">Receive Payrolls and Appointment</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="grid grid-row-4 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Type of Transaction</span>
                        <PayrollDrop 
                            placeholder="Select Type of Transaction"
                            v-model="form.trans_id"
                            :options="typeTrans"
                        />
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Sender</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Department/Office</span>
                        <PayrollDrop 
                            placeholder="Select Department/Office"
                            v-model="form.dept_id"
                            :options="dept"
                        />
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Type of Document</span>
                        <PayrollDrop 
                            placeholder="Select Type of Document"
                            v-model="form.docu_id"
                            :options="docu"
                        />
                    </div>
                     <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Type of Employment</span>
                        <PayrollDrop 
                            placeholder="Select Type of Employment"
                            v-model="form.emp_id"
                            :options="emp"
                        />
                    </div>
                </div>
                <div class="grid grid-row-4">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">CAFOA/OBR</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center ">
                        <span class="font-semibold text-sm text-other-black w-210 ">CAF</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Number of Personnel</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Amount</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Period Covered:</span>
                        <span class="font-semibold text-sm text-other-black w-56 mr-4">From</span><input type="date" class="w-180 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                        <span class="font-semibold text-sm text-other-black w-56 mx-4">To</span><input type="date" class="w-180 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                </div>
            </div>
            <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-210">Subject</span>
                <input type="text" class="w-1140 xxxxl:w-1435 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
            </div>
        </div>
        <div class="container grid place-content-center px-0 mt-12">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">bearer's Information</p>
            <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
                <div class="grid grid-row-3 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Name of Bearer</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Address</span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Attached Document:</span>
                        <label for="doc" class="flex items-center h-32 p-4 gap-3 rounded border border-input-color border-dashed bg-upload-color cursor-pointer">
                            <UploadIcon />
                            <div class="space-y-2">
                                <h4 class="text-base font-semibold text-gray-500">Upload a file</h4>
                            </div>
                            <input type="file" id="doc" name="doc" hidden/>
                        </label>
                    </div>
                    <div class="flex flex-row mt-9 items-center"></div>
                </div>
                <div class="grid grid-row-3">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Contact No. </span>
                        <input type="text" class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Department/Office</span>
                        <PayrollDrop 
                            placeholder="Select Type of Department"
                            v-model="form.beardocu_id"
                            :options="Beardocu"
                        />
                    </div>
                    <div class="flex flex-row my-1 items-center"></div>
                    <div class="flex flex-row justify-end">
                        <div class="flex gap-4 justify-end mt-9">
                            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">clear</button>
                            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>