<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    methods: {
        pushToListView(listId, AIPcode) {
            console.log('List to be pushed:', listId, AIPcode);

            const router = useRouter();
            router.push({
                name: 'Obligation Details Approval', // Replace with the actual name of the target route
                // query: {
                // id: listId,
                // aipcode: AIPcode,
                // }
            });
        }
    },
    setup() {
        const router = useRouter();

        const pushToListView = () => {
            // console.log('List to be pushed:', listId, AIPcode);
            router.push({ 
                name: 'Obligation Details Approval', 
                // query: {
                // id: listId,
                // aipcode: AIPcode,
                // }
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
        <span class="absolute left-0 text-[22px] font-bold text-[#0E4572] uppercase">For Review</span>
        <div class="flex gap-[80px]">
            <RouterLink
            :to="{ name: 'For Review Obligation New' }" 
            class="text-[14px] font-medium text-primary-color uppercase w-[100px] h-[24px] hover:border-b-4 hover:border-primary-color cursor-pointer flex justify-center"
            :class="{'border-b-4 border-primary-color': ['/Budget-Management/Executive-Funds/For-Review-Obligation-New'].includes($route.path) }">
                new
            </RouterLink>

            <RouterLink
            :to="{ name: 'For Review Obligation Update' }"
            class="text-[14px] font-medium text-primary-color uppercase w-[100px] h-[24px] hover:border-b-4 hover:border-primary-color cursor-pointer flex justify-center"
            :class="{'border-b-4 border-primary-color': ['/Budget-Management/Executive-Funds/For-Review-Obligation-Update'].includes($route.path) }">
                update
            </RouterLink>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="overflow-x-auto overscroll-x-contain max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]">
            <table class="divide-y w-[2300px] divide-gray-200">
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
                            processed by
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            n/a
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center w-207">
                            <div class="flex flex-row gap-2 justify-center">
                                <button
                                    @click="pushToListView()"
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