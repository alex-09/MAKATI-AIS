<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <div class="container grid grid-cols-2 place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center">Receiving contract (Contract)</p>
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
                                time
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-340">
                                transaction no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-340">
                                department
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-340">
                                name of payee
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
                        <tr v-if="filteredContract.length === 1 && filteredContract[0].message">
                            <td colspan="8" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredContract[0].message }}</td>
                        </tr>
                        <tr v-else v-for="contract in filteredContract" :key="contract.id">
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                            >
                                <input type="checkbox" :value="contract.id" v-model="selected" @click="toggleSelected"/> 
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.time }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.transaction_id }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.department_name }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.payee_name }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.description }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ contract.amount }}
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
    import SearchIcon from '../../../../icons/Budgetary/searchIcon.vue'
    import TransDetails from './details.vue'

    import { ref } from 'vue'

    const showDetails = ref(true)
</script>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                contract: [],
                contracts: [],
                searchQuery: '',
                selectAll: false,
                selected: [],
                selectedData: null,
            }
        },
        props: {
            contracts: {
                type: Array,
                required: true
            }
        },
        methods: {
            fetchContracts() {
                axios.get('ContractPO/listTransac')
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
                    this.selected = this.filteredContract.map((contract, index) => ({ [`id[${index}]`]: contract.id })); // create array of objects with each object containing the id of the corresponding transaction
                    console.log(this.selected);
                } else {
                    this.selected = []; // deselect all transactions
                }
            },
            toggleSelected(contract) {
                if (this.isSelected(contract)) {
                    const index = this.selected.findIndex((selectedContract) => {
                        return selectedContract.id === contract.id;
                    });
                    this.selected.splice(index, 1);
                    if (this.selected.length === 0) {
                        this.selectedData = null; // Reset selectedData when no contracts are selected
                    }
                } else {
                    this.selected.push(contract.id);
                    this.selectedData = contract; // Set the selected contract as the selectedData
                }
                this.selectAll = this.selected.length === this.contracts.length;
            },
        },
        created() {
            this.fetchContracts();
        },
        watch: {
            selectAll(newVal) {
                if (newVal) {
                this.selected = this.filteredContract.map(contract => contract.id);
                } else {
                this.selected = [];
                }
            }
        },
        mounted() {
            axios.get('ContractPO/listTransac')
            .then(response => {
                this.contracts = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        computed: {
            filteredContract() {
                const searchQuery = this.searchQuery.toLowerCase();
                const filtered = this.contracts.filter((contract) => {
                    return (
                        contract.payee_name.toLowerCase().includes(searchQuery)
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