<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <div class="container grid grid-cols-2 place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center"></p>
                <div class="flex flex-row items-center justify-end ml-12">
                    <p>Name of Bearer</p>
                    <label class="relative ml-8">
                        <input type="text" v-model="searchQuery" name="search" placeholder="Search" class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                        <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
                    </label>
                </div>
            </div>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overscroll-y-contain overflow-x-auto w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-1850 divide-gray-200 mr-8">
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
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                transaction no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-340">
                                deptartment
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                dv number
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                dv date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                check number
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                check date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-340">
                                payee
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-500">
                                particulars
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-340">
                                amount
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-if="filteredCheck.length === 1 && filteredCheck[0].message">
                            <td colspan="11" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredCheck[0].message }}</td>
                        </tr>
                        <tr v-else v-for="check in filteredCheck" :key="check.id">
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                            >
                                <input type="checkbox" :value="check.id" v-model="selected" @click="toggleSelected"/> 
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ check.date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mt-4">
            <div class="float-right">
                <button @click="showDetails = false" class="w-92 h-42 bg-button-blue rounded text-white uppercase font-medium text-sm">view</button>
            </div>
        </div>
    </div>
    <TransDetails v-if="!showDetails| showDetails === false"/>
</template>

<script setup>
    import SearchIcon from '../../../icons/Budgetary/searchIcon.vue'
    import TransDetails from './details.vue'

    import { ref } from 'vue'

    const showDetails = ref(true)
</script>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                check: [],
                checks: [],
                searchQuery: '',
                selectAll: false,
                selected: [],
                selectedData: null,
            }
        },
        props: {
            checks: {
                type: Array,
                required: true
            }
        },
        methods: {
            fetchChecks() {
                axios.get('Check-Transac/receiving-list')
                .then(response => {
                    this.rec = response.data.data;
                    console.log(this.rec);
                })
                .catch(error => {
                    console.log(error);
                })
            },
            toggleSelectAll() {
                this.selectAll = !this.selectAll; // toggle the selectAll flag
                if (this.selectAll) {
                    this.selected = this.filteredCheck.map((check, index) => ({ [`id[${index}]`]: check.id })); // create array of objects with each object containing the id of the corresponding transaction
                    console.log(this.selected);
                } else {
                    this.selected = []; // deselect all transactions
                }
            },
            toggleSelected(check) {
                if (this.isSelected(check)) {
                    const index = this.selected.findIndex((selectedCheck) => {
                        return selectedCheck.id === check.id;
                    });
                    this.selected.splice(index, 1);
                    if (this.selected.length === 0) {
                        this.selectedData = null; // Reset selectedData when no checks are selected
                    }
                } else {
                    this.selected.push(check.id);
                    this.selectedData = check; // Set the selected check as the selectedData
                }
                this.selectAll = this.selected.length === this.checks.length;
            },
        },
        created() {
            this.fetchChecks();
        },
        watch: {
            selectAll(newVal) {
                if (newVal) {
                this.selected = this.filteredCheck.map(check => check.id);
                } else {
                this.selected = [];
                }
            }
        },
        mounted() {
            axios.get('Check-Transac/receiving-list')
            .then(response => {
                this.checks = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        computed: {
            filteredCheck() {
                const searchQuery = this.searchQuery.toLowerCase();
                const filtered = this.checks.filter((check) => {
                    return (
                        check.payee_name.toLowerCase().includes(searchQuery)
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