<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <div class="container grid grid-cols-2 place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center">Receiving Receipt</p>
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
                        <tr v-if="filteredTransaction.length === 1 && filteredTransaction[0].message">
                            <td colspan="7" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredTransaction[0].message }}</td>
                        </tr>
                        <tr v-else v-for="transaction in filteredTransaction" :key="transaction.id">
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                            >
                                <input type="checkbox" :value="transaction.id" v-model="selected" @click="toggleSelected"/> 
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ transaction.date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ transaction.time }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ transaction.transaction_id }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ transaction.payee_name }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ transaction.description }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ transaction.amount }}
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
                transaction: [],
                transactions: [],
                searchQuery: '',
                selectAll: false,
                selected: [],
                selectedData: null,  
            }
        },
        props: {
            transactions: {
                type: Array,
                required: true
            }
        },
        methods: {
            fetchTransaction() {
                axios.get('Payment-Transaction/listPT')
                .then(response => {
                    this.rec = response.data.list;
                    console.log(this.rec);
                })
                .catch(error => {
                    console.log(error);
                })
            },
            toggleSelectAll() {
                this.selectAll = !this.selectAll; // toggle the selectAll flag
                if (this.selectAll) {
                    this.selected = this.filteredTransaction.map((transaction, index) => ({ [`id[${index}]`]: transaction.id })); // create array of objects with each object containing the id of the corresponding transaction
                    console.log(this.selected);
                } else {
                    this.selected = []; // deselect all transactions
                }
            },
            toggleSelected(transaction) {
                if (this.isSelected(transaction)) {
                    const index = this.selected.findIndex((selectedTransaction) => {
                        return selectedTransaction.id === transaction.id;
                    });
                    this.selected.splice(index, 1);
                    if (this.selected.length === 0) {
                        this.selectedData = null; // Reset selectedData when no transactions are selected
                    }
                } else {
                    this.selected.push(transaction.id);
                    this.selectedData = transaction; // Set the selected transaction as the selectedData
                }
                this.selectAll = this.selected.length === this.transactions.length;
            },
        },
        created() {
            this.fetchTransaction();
        },
        watch: {
            selectAll(newVal) {
                if (newVal) {
                this.selected = this.filteredTransaction.map(transaction => transaction.id);
                } else {
                this.selected = [];
                }
            }
        },
        mounted() {
            axios.get('Payment-Transaction/listPT')
            .then(response => {
                this.transactions = response.data.list;
            })
            .catch(error => {
                console.log(error);
            })
        },
        computed: {
            filteredTransaction() {
                const searchQuery = this.searchQuery.toLowerCase();
                const filtered = this.transactions.filter((transaction) => {
                    return (
                        transaction.payee_name.toLowerCase().includes(searchQuery)
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