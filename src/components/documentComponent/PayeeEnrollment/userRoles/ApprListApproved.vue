<template>
    <Nav />
    <div class="container grid justify-items-center p-0 my-8">
        <div class="container mx-30 mt-4">
            <div class="container flex justify-end">
                <div class="flex gap-4">
                    <p>Search Name of Payee</p>
                    <label class="relative ml-8">
                        <input type="text" v-model="searchQuery" name="search" placeholder="Search" class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                        <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
                    </label>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto overscroll-x-contain h-320 w-1850 1536:w-1458 1536:h-[600px] xxxxl:w-1850 mt-8">
            <table class="divide-y w-[3300px] divide-gray-200 mr-8">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-133">
                            date
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            ID No
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            complete name
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[600px]">
                            complete address
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[100px]">
                            type
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            tin
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            dti
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            sec
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            cda
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            authorized <br> representative
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            contact number
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[300px]">
                            email address
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            receiver
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232">
                            status
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-if="filteredPayee.length === 1 && filteredPayee[0].message">
                        <td colspan="13" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredPayee[0].message }}</td>
                    </tr>
                    <tr v-else v-for="payee in filteredPayee" :key="payee.id">
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                        >
                            {{ payee.date }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.complete_name === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.complete_name }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.complete_name }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.complete_address }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.type_of_payee_id }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.tax }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.dti === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.dti }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.sec === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.sec }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.cda === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.cda }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.authorized }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.contact }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.email }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.receiver }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.status === 'Approved'" class="text-[#0E4572]">
                                {{ payee.status }}
                            </div>
                            <div v-if="payee.status === 'For Approval'" class="text-[#11B2FC]">
                                {{ payee.status }}
                            </div>
                            <div v-if="payee.status === 'Rejected'" class="text-[#A80000]">
                                {{ payee.status }}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import Nav from '../Index.vue'
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue'

export default {
    components: {
        Nav,
        SearchIcon,
    },
    data() {
        return {
            payee: [],
            payees: [],
            searchQuery: '',
        }
    },
    props: {
        payees: {
            type: Array,
            required: true
        }
    },
    methods: {
        fetchPayees() {
            axios.get('Payee-Enroll/dhListPayee')
            .then(response => {
                this.pay = response.data.list;
                console.log(this.pay);
                if (Array.isArray(response.data.list)) {
                    this.payees = response.data.list.filter(payee => {
                        return payee.status === 'Approved';
                    });
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
    },
    created() {
        this.fetchPayees();
    },
    mounted() {
        axios.get('Payee-Enroll/dhListPayee')
        .then(response => {
                this.pay = response.data.list;
                console.log(this.pay);
                if (Array.isArray(response.data.list)) {
                    this.payees = response.data.list.filter(payee => {
                        return payee.status === 'Approved';
                    });
                }
            })
        .catch(error => {
            console.log(error);
        })
    },
    computed: {
        filteredPayee() {
            const searchQuery = this.searchQuery.toLowerCase();
            const filtered = this.payees.filter((payee) => {
                return (
                    payee.complete_name.toLowerCase().includes(searchQuery)
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