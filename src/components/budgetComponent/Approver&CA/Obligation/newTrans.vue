<script>
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue';
import ProcessorAPI from '../../../../api_request/budgetMangement/processor';
import axios from 'axios';

export default {
    components: {
        SearchIcon,
    },
    data() {
        return {
            searchQuery: "",
            lists: [],
            processorOptions: [],

            selectedTransactionType: '',
            selectedProcessor: '',
            selectedReviewer: '',
        }
    },
    methods: {
        fetchLists() {
            axios.get("obligation/listBotProcessor")
                .then((response) => {
                    this.lists = response.data.list;
                    console.log(this.lists);
                    if (Array.isArray(response.data.list)) {
                        this.lists = response.data.list.filter((list) => {
                            return list.transaction_type === null && list.processer === null && list.reviewer === null;
                        });
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        async saveSelectedData() {
            for (const list of this.lists) {
                const assignAuto = {
                    transac_id: list.transaction_id,
                    transaction_type: list.selectedTransactionType,
                    processer: list.selectedProcessor,
                    reviewer: list.selectedReviewer,
                };
                try {
                    const assignedAuto = await axios.post("obligation/assignProcessor", assignAuto);
                    console.log(assignedAuto.data); // Log the response data
                } catch (error) {
                    console.error(error);
                }
            }

            // this.fetchLists();
        }
    },
    created() {
        this.fetchLists();
    },
    mounted() {
        this.fetchLists();

        ProcessorAPI().then((processorOptions) => {
            this.processorOptions = processorOptions;
        });
    },
}
</script>
<template>
    <div class="flex justify-between items-center m-8">
        <span class="text-[22px] font-bold text-[#0E4572]">For Assignment</span>
        <div class="mx-3 my-3">
            <label class="relative">
                <input type="text" name="search" placeholder="Search" class="w-[400px] h-[32px] border rounded-[6px] px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                <div class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z" fill="#3A3541" fill-opacity="0.54"/>
                    </svg>
                </div>
            </label>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="overflow-x-auto overscroll-x-contain max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]">
            <table class="divide-y w-[2800px] divide-gray-200">
                <thead class="bg-gray-200 sticky top-0">
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            date
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            time
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            number
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            type of documents
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            processing slip no.
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            department
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            particulars
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            amount
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            type of transaction
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            assign processor
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            assign reviewer
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <tr v-for="list in lists" :key="list.id">
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.date }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.time }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.transaction_id }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.docu_type_id }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.processing_slip_number }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.department_id }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.description }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.amount }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            <select 
                                v-model="list.selectedTransactionType" @change="saveSelectedData"
                                class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                                    <option value="">Select a Type of Transaction</option>
                                    <option value="Procurement Transaction">Procurement Transaction</option>
                                    <option value="Payroll Transaction">Payroll Transaction</option>
                                    <option value="Payment Transaction">Payment Transaction</option>
                            </select>
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            <select
                                v-model="list.selectedProcessor" @change="saveSelectedData"
                                class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                                >
                                <option value="" disabled selected>Select a Processor</option>
                                <option
                                    v-for="processorOptions in processorOptions"
                                    :key="processorOptions.Name"
                                    :value="processorOptions.Name"
                                >
                                    {{ processorOptions.Name }}
                                </option>
                            </select>
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            <select
                                v-model="list.selectedReviewer" @change="saveSelectedData"
                                class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                                >
                                <option value="">Select a Reviewer</option>
                                <option value="Jeramie Ann Basiano">Jeramie Ann Basiano</option>
                                <option value="Jelo Umbo">Jelo Umbo</option>
                            </select>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center w-207">
                            <div class="flex flex-row gap-2 justify-center">
                                <button
                                    class="w-30 h-32 border rounded-lg text-xl font-bold text-dashboardBtn3 hover:bg-dashboardBtn3 hover:text-white"
                                >
                                    R
                                </button>
                                <button
                                    class="w-30 h-32 border rounded-lg text-xl font-bold text-dashboardBtn3 hover:bg-dashboardBtn3 hover:text-white"
                                >
                                    E
                                </button>
                                <button
                                    class="w-30 h-32 border rounded-lg text-xl font-bold text-dashboardBtn3 hover:bg-dashboardBtn3 hover:text-white"
                                >
                                    A
                                </button>
                                <button
                                    class="w-30 h-32 border rounded-lg text-xl font-bold text-dashboardBtn3 hover:bg-dashboardBtn3 hover:text-white"
                                >
                                    D
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>