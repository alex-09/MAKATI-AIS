<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <div class="container grid grid-cols-2 place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center">Receiving payroll (Payroll / Appointment)</p>
                <div class="flex flex-row items-center justify-end ml-12">
                    <p>Select Bearer Name</p>
                    <label class="relative ml-8">
                        <input type="text" v-model="searchQuery" name="search" placeholder="Search" class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                        <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
                    </label>
                </div>
            </div>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overflow-x-auto overscroll-x-contain w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-3300 divide-gray-200 mr-8">
                    <thead>
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-92">
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="selectAll" 
                                        @click="toggleSelectAll()">
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
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360">
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
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                period covered
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360">
                                subject
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                bearer
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-if="filteredPayroll.length === 1 && filteredPayroll[0].message">
                            <td colspan="14" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredPayroll[0].message }}</td>
                        </tr>
                        <tr v-else v-for="payroll in filteredPayroll" :key="payroll.id">
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                            >
                                <input type="checkbox" :value="payroll.id" v-model="selected" @click="toggleSelected"/> 
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.covered_from }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.transaction_id_no }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.transaction_type }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.cafoa_obr }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.caf }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.personnel_number }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.department_name }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.payroll_type }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.employment_type }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.covered_from }} to {{ covered_to }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.subject }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ payroll.bearer_name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex gap-4 justify-end mt-9 mx-8">
            <button @click="showDetails = false" class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">view</button>
        </div>
    </div>
    <DetailsView v-if="!showDetails| showDetails === false"/>
</template>
<script setup>
    import SearchIcon from '../../../../icons/Budgetary/searchIcon.vue'
    import DetailsView from './TransDetails.vue'

    import { ref } from 'vue'

    const showDetails = ref(true)

</script>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                payroll: [],
                payrolls: [],
                searchQuery: '',
                selectAll: false,
                selected: [],
                selectedData: null,
            }
        },
        props: {
            payrolls: {
                type: Array,
                required: true
            }
        },
        methods: {
            fetchPayrolls() {
                axios.get('Payroll-Appointment/list')
                .then(response => {
                    this.pay = response.data.data;
                    console.log(response.data.data);
                })
                .catch(error => {
                    console.log(error);
                })
            },
            toggleSelectAll() {
                this.selectAll = !this.selectAll; // toggle the selectAll flag
                if (this.selectAll) {
                    this.selected = this.filteredPayroll.map((payroll, index) => ({ [`id[${index}]`]: payroll.id })); // create array of objects with each object containing the id of the corresponding transaction
                    console.log(this.selected);
                } else {
                    this.selected = []; // deselect all transactions
                }
            },
            toggleSelected(payroll) {
                if (this.isSelected(payroll)) {
                    const index = this.selected.findIndex((selectedPayroll) => {
                        return selectedPayroll.id === payroll.id;
                    });
                    this.selected.splice(index, 1);
                    if (this.selected.length === 0) {
                        this.selectedData = null; // Reset selectedData when no payrolls are selected
                    }
                } else {
                    this.selected.push(payroll.id);
                    this.selectedData = payroll; // Set the selected payroll as the selectedData
                }
                this.selectAll = this.selected.length === this.payrolls.length;
            },
        },
        created() {
            this.fetchPayrolls();
        },
        watch: {
            selectAll(newVal) {
                if (newVal) {
                this.selected = this.filteredPayroll.map(payroll => payroll.id);
                } else {
                this.selected = [];
                }
            }
        },
        mounted() {
            axios.get('Payroll-Appointment/list')
            .then(response => {
                this.payrolls = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        computed: {
            filteredPayroll() {
                const searchQuery = this.searchQuery.toLowerCase();
                const filtered = this.payrolls.filter((payroll) => {
                    return (
                        payroll.bearer_name.toLowerCase().includes(searchQuery)
                    );
                });

                if (filtered.length === 0) {
                    return [{ message: "No matches found" }];
                }

                return filtered;
            }
        },
    }
</script>