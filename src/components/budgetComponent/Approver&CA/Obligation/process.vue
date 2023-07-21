<script>
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue';

export default {
    components: {
        SearchIcon,
    },
    data() {
        return {
            searchQuery: "",
        }
    },
}
</script>
<template>
    <div class="flex justify-between items-center m-8">
        <span class="text-[22px] font-bold text-[#0E4572]">For Process</span>
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
            <table class="divide-y w-[2500px] divide-gray-200">
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
                            transaction number
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
                            deparmtent 
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
                            processor
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            reviewer
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase sticky top-0">
                            status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                    <td
                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                        N/A
                    </td>
                </tbody>
            </table>
        </div>
    </div>
</template>