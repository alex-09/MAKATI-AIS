<script>
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue';

import { useRouter } from 'vue-router';
import axios from 'axios';

export default {
    components: {
        SearchIcon,
    },
    data() {
        return {
            lists: [],
            searchQuery: "",
        }
    },
    methods: {
        fetchLists() {
            axios.get("allotment/listApproForReview")
                .then((response) => {
                    this.lists = response.data.list;
                    console.log(this.lists);
                    if (Array.isArray(response.data.list)) {
                        this.lists = response.data.list.filter((list) => {
                            return list.status === 'For Review'
                        });
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        pushToListView(listId, AIPcode) {
            console.log('List to be pushed:', listId, AIPcode);

            const router = useRouter();
            router.push({
                name: 'Allotment Details Approval', // Replace with the actual name of the target route
                query: {
                id: listId,
                aipcode: AIPcode,
                }
            });
        }
    },
    created() {
        this.fetchLists();
    },
    mounted() {
        this.fetchLists();
    },
    computed: {
        filteredLists() {
            const searchQuery = this.searchQuery.toLowerCase();
            const filtered = this.lists.filter((list) => {
                return (
                    list.status.toLowerCase().includes(searchQuery) &&
                    list.status === 'For Review'
                );
            });

            if (filtered.length === 0) {
                return [{ message: "No matches found" }];
            }

            return filtered;
        }
    },
    setup() {
        const router = useRouter();

        const pushToListView = (listId, AIPcode) => {
            console.log('List to be pushed:', listId, AIPcode);
            router.push({ 
                name: 'Allotment Details Approval', 
                query: {
                id: listId,
                aipcode: AIPcode,
                }
            });
        };

        return {
            pushToListView
        };
    }
}
</script>

<template>
    <div class="flex justify-center items-center m-8 relative">
        <span class="absolute left-0 text-[22px] font-bold text-[#0E4572] uppercase">approval of allotment CA</span>
        <div class="flex gap-[80px]">
            <RouterLink
            :to="{ name: 'Enroll/New Dashboard - Approver&CA' }" 
            class="text-[14px] font-medium text-primary-color uppercase w-[100px] h-[24px] hover:border-b-4 hover:border-primary-color cursor-pointer flex justify-center"
            :class="{'border-b-4 border-primary-color': ['/Budget-Management/Executive-Funds/Allotment-Enroll-Approval'].includes($route.path) }">
                new
            </RouterLink>

            <RouterLink
            :to="{ name: 'Update Dashboard - Approver&CA' }"
            class="text-[14px] font-medium text-primary-color uppercase w-[100px] h-[24px] hover:border-b-4 hover:border-primary-color cursor-pointer flex justify-center"
            :class="{'border-b-4 border-primary-color': ['/Budget-Management/Executive-Funds/Allotment-Update-Approval'].includes($route.path) }">
                update
            </RouterLink>
        </div>
    </div>

    <!-- TABLE START HERE -->
    <div class="flex justify-center">
        <div class="overflow-x-auto overscroll-x-contain max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]">
            <table class="divide-y w-[3000px] divide-gray-200 mr-8">
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
                            budget year
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            type of adjustment
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            funding source
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            type of appropriation
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            deparment/office
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            office code
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            name of program
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            name of project
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            name of activity
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            aip reference code - activity
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            amount
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-if="filteredLists.length === 0 && filteredLists[0].message">
                        <td colspan="11" class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase">{{ filteredLists[0].message }}</td>
                    </tr>
                    <tr v-else v-for="list in filteredLists" :key="list.id">
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            {{ list.Data }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center w-207">
                            <div class="flex flex-row gap-2 justify-center">
                                <button
                                    @click="pushToListView(list.appro_id, list.AIPCode)"
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