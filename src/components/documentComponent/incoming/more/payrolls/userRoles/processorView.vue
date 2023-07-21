<script setup>
    import Dropdown from './dropdown.vue'
    import TableDrop from './tableDrop.vue'
    import { ref } from 'vue' 

    const dept = [
        {value: 9, label: 'Accounting Department' },
        {value: 11, label: 'Assessment Department' },
        {value: 8, label: 'Budget Department' },
        {value: 4, label: 'Business Permits Office' },
        {value: 7, label: "City Administrator's Office" },
        {value: 10, label: 'Finance Department' },
        {value: 12, label: 'Information and Community Relations Department' },
        {value: 6, label: 'International Relations Department' },
        {value: 3, label: 'Liga ng mga Barangay' },
        {value: 1, label: 'Office of the Mayor' },
        {value: 5, label: 'Office of the Vice Mayor' },
        {value: 2, label: 'Public Safety Department' },
    ];

    const cluster = [
        {value: 1, label: 'Administrative and Internal Control Services' },
        {value: 2, label: 'Financial Reporting Services' },
    ];

    const restrict = [
        {value: 1, label: 'Restricted' },
        {value: 2, label: 'Not Resricted' },
    ];

    const division = [
        {value: 1, label: 'Administrative Division' },
        {value: 2, label: 'Barangay Accounts Divison' },
        {value: 3, label: 'Bookkeeping Division' },
        {value: 4, label: 'Financial Reporting Division' },
        {value: 5, label: 'Processing of Claims and Internal Control Services' },
        {value: 6, label: 'Payroll Processing and Remittances Division' },
    ];

    const typeCom = [
        {value: 1, label: 'Audit Observation Memorandum' },
        {value: 2, label: 'Circulars/Guidelines' },
        {value: 3, label: 'Clearance from Money and Property Accountability' },
        {value: 4, label: 'Letter' },
        {value: 5, label: 'Memorandum' },
        {value: 6, label: 'Others' },
        {value: 7, label: 'Subpoena' },
    ];

    const status = [
        {value: 1, label: 'Cancelled' },
        {value: 2, label: 'Closed' },
        {value: 3, label: 'For Outgoing' },
        {value: 4, label: 'Pending' },
    ];

    const actionTaken = [
        {value: 1, label: 'Attend' },
        {value: 2, label: 'Draft a Reply' },
        {value: 3, label: 'For Filing' },
        {value: 4, label: 'FYI' },
        {value: 5, label: 'Handle' },
        {value: 6, label: 'Others' },
        {value: 7, label: 'Please See Me' },
        {value: 8, label: 'Remind Me' },
    ];

    const assign = [
        {value: 1, label: 'Alcantara' },
        {value: 2, label: 'Bartolome' },
        {value: 3, label: 'Dalugdug' },
        {value: 4, label: 'Dela Cruz' },
        {value: 5, label: 'Majam' },
    ];

    const form = ref({
        dept_id: null,
        cluster_id: null,
        restrict_id: null,
        division_id: null,
        type_id: null,
        status_id: null,
        action_id: null,
        assign_id: null,
    });

</script>

<template>
    <div v-if="showChildComponent">
        <HistoryView :showHistory="true" @close="hideChild"/>
    </div>
    <div v-else>
        <div class="container mt-4">
            <div class="grid grid-cols-4 gap-9 xxxxl:gap-40">
                <div class="grid grid-row-3 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Department</span>
                        <Dropdown 
                            placeholder="Select Department"
                            v-model="form.dept_id"
                            :options="dept"
                        />
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">DRN</span>
                        <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Divison</span>
                        <Dropdown 
                            placeholder="Select Devision"
                            v-model="form.division_id"
                            :options="division"
                        />
                    </div>
                </div>
                <div class="grid grid-row-3 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Sender</span>
                        <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Reply to</span>
                        <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Cluster</span>
                        <Dropdown
                            placeholder="Select Cluster"
                            v-model="form.cluster_id"
                            :options="cluster"
                        />
                    </div>
                </div>
                <div class="grid grid-row-3 place-content-center">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Type</span>
                        <Dropdown
                            placeholder="Select Type"
                            v-model="form.type_id"
                            :options="typeCom"
                        />
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Transaction Number</span>
                        <input type="text" class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                    </div>
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-110">Restriction</span>
                        <Dropdown 
                            placeholder="Select Restriction"
                            v-model="form.restrict_id"
                            :options="restrict"
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
        <div class="container mt-4">
            <p class="uppercase text-other-black text-2xl font-bold mb-4">for assignment</p>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overflow-x-auto overscroll-x-contain h-320 w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-3300 divide-gray-200 mr-8">
                    <thead>
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-92">
                                    <div class="flex items-center justify-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-button-blue bg-gray-100 rounded border-gray-300 dark:focus:button-blue dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-133">
                                date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-133">
                                number
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                sender
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                type of transaction
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                cafoa/obr
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                caf
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                number of personnel
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                department/office
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                type of document
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                type of employment
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360">
                                period covered
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                subject
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                status
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                dv date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                dv no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                check date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                check no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                <div class="flex items-center justify-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-button-blue bg-gray-100 rounded border-gray-300 dark:focus:button-blue dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap w-133">
                                <TableDrop 
                                    placeholder="Select Status"
                                    v-model="form.status_id"
                                    :options="status"
                                />
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>

                            <td
                                class="px-2 py-4 whitespace-nowrap text-center w-207">
                                <div class="flex flex-row gap-2 justify-center">
                                    <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">P</button>
                                    <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">E</button>
                                    <button @click="showChild" class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">A</button>
                                    <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">D</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container mx-30 mt-4">
                <div class="container mx-8">
                    <div class="flex justify-start gap-4">
                        <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">save</button>
                        <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import HistoryView from './historyView.vue'

    export default {
        components: {
            HistoryView,
        },
        data() {
            return {
                showChildComponent: false,
            }
        },
        methods: {
            showChild() {
                this.showChildComponent = true
            },
            hideChild() {
                this.showChildComponent = false
            },
        },
    }
</script>