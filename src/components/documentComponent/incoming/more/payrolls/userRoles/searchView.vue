<script setup>
    import dropDown from './dropdown.vue'
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

    const trans = [
        {value: 1, label: 'Appointment' },
        {value: 2, label: 'Payroll' },
        {value: 3, label: 'Others' },
    ];

    const assign = [
        {value: 1, label: 'Dela Cruz' },
        {value: 2, label: 'Majam' },
        {value: 3, label: 'Bartolome' },
        {value: 4, label: 'Dalugdug' },
        {value: 5, label: 'Alcantara' },
    ];

    const form = ref({
        dept_id: null,
        docu_id: null, 
        emp_id: null,
        trans_id: null,
        assign_id: null,
    });
    
</script>

<template>
    <div class="container mt-4">
        <div class="grid grid-cols-4 gap-9 xxxxl:gap-40">
            <div class="grid grid-row-3 place-content-center">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Department</span>
                    <dropDown 
                        placeholder="Select Department"
                        v-model="form.dept_id"
                        :options="dept"
                    />
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Type of Document</span>
                    <dropDown 
                        placeholder="Select Document"
                        v-model="form.docu_id"
                        :options="docu"
                    />
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Type of Employment</span>
                    <dropDown 
                        placeholder="Select Employment"
                        v-model="form.emp_id"
                        :options="emp"
                    />
                </div>
            </div>
            <div class="grid grid-row-3 place-content-center">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Sender</span>
                    <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Number</span>
                    <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Type of Transaction</span>
                    <dropDown 
                        placeholder="Select Transaction"
                        v-model="form.trans_id"
                        :options="trans"
                    />
                </div>
            </div>
            <div class="grid grid-row-3 place-content-center">
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">CAFOA</span>
                    <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">CAF</span>
                    <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                </div>
                <div class="flex flex-row my-1 items-center">
                    <span class="font-semibold text-sm text-other-black w-110">Assign to</span>
                    <dropDown 
                        placeholder="Select Assign"
                        v-model="form.assign_id"
                        :options="assign"
                    />
                </div>
            </div>
            <div class="grid grid-row place-content-center justify-end">
                <div class="flex flex-row my-1 items-center">
                    <button class="w-116 h-42 rounded uppercase font-medium bg-btnHover2">search</button>
                </div>
            </div>
        </div>
    </div>
</template>