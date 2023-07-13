<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <div class="container grid grid-cols-2 place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center">Receiving receipt (Collection and Deposit)</p>
                <div class="flex flex-row items-center justify-end ml-12">
                    <p>Select Sender Name</p>
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
                            <th colspan="9"></th>
                            <th colspan="4"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                                amount of collection
                            </th>
                            <th colspan="1"></th>
                        </tr>
                    </thead>
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
                                fund
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                rcd date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-133">
                                report no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360">
                                cash book ref no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                cash
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                check
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                online
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                total
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360">
                                subject
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-if="filteredCollects.length === 1 && filteredCollects[0].message">
                            <td colspan="14" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredCollects[0].message }}</td>
                        </tr>
                        <tr v-else v-for="collection in filteredCollects" :key="collection.id">
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                            >
                                <input type="checkbox" :value="collection.id" v-model="selected" @click="toggleSelected"/> 
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.Date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.incom_transaction_id_no }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.sender }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.transaction_type }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.fund_source }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.rcd_date }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.report_no }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.cashbook_ref_no }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.cash }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.check }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.online }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.cash }}
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                {{ collection.subject }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex gap-4 justify-end mt-9 mx-8">
            <button @click="showDetails = false" class="w-108 h-42 text-sm font-medium text-white uppercase bg-light-green rounded">view</button>
            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">cancel</button>
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
                collection: [],
                collections: [],
                searchQuery: '',
                selectAll: false,
                selected: [],
                selectedData: null,
            }
        },
        props: {
            collections: {
                type: Array,
                required: true
            }
        },
        methods: {
            fetchCollections() {
                axios.get('Collection-Deposit/list')
                .then(response => {
                    this.collect = response.data.data;
                    console.log(response.data.data);
                })
                .catch(error => {
                    console.log(error);
                })
            },
            toggleSelectAll() {
                this.selectAll = !this.selectAll; // toggle the selectAll flag
                if (this.selectAll) {
                    this.selected = this.filteredCollects.map((collection, index) => ({ [`id[${index}]`]: collection.id })); // create array of objects with each object containing the id of the corresponding transaction
                    console.log(this.selected);
                } else {
                    this.selected = []; // deselect all transactions
                }
            },
            toggleSelected(collection) {
                if (this.isSelected(collection)) {
                    const index = this.selected.findIndex((selectedCollect) => {
                        return selectedCollect.id === collection.id;
                    });
                    this.selected.splice(index, 1);
                    if (this.selected.length === 0) {
                        this.selectedData = null; // Reset selectedData when no collections are selected
                    }
                } else {
                    this.selected.push(collection.id);
                    this.selectedData = collection; // Set the selected collection as the selectedData
                }
                this.selectAll = this.selected.length === this.collections.length;
            },
        },
        created() {
            this.fetchCollections();
        },
        watch: {
            selectAll(newVal) {
                if (newVal) {
                this.selected = this.filteredCollects.map(collection => collection.id);
                } else {
                this.selected = [];
                }
            }
        },
        mounted() {
            axios.get('Collection-Deposit/list')
            .then(response => {
                this.collections = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        computed: {
            filteredCollects() {
                const searchQuery = this.searchQuery.toLowerCase();
                const filtered = this.collections.filter((collection) => {
                    return (
                        collection.sender.toLowerCase().includes(searchQuery)
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