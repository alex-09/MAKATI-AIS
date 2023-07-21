<template>
    <div class="flex justify-between m-8">
        <span class="text-[22px] font-bold text-[#606060]">
            List of Completed Transactions
        </span>
        <label class="relative ml-8">
            <input
              type="text"
              name="search"
              placeholder="Search"
              class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            />
            <SearchIcon
              class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
            />
        </label>
    </div>
    <div class="flex justify-center m-8">
        <div class="overflow-x-auto overscroll-x-contain max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]">
            <table class="divide-y max-w-[1800px] min-w-[1800px] divide-gray-200 mr-8">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            <input type="checkbox">
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            date
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            time
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            transaction no.
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            sender
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            subject
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            <input type="checkbox">
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-end m-8 gap-8">
        <button class="w-[100px] h-[42px] rounded-[5px] bg-[#16B1FF] shadow-xl text-[15px] font-medium uppercase text-white">
            print
        </button>
        <RouterLink :to="{ name: 'Communication Dashboard Reports' }" class="w-[100px] h-[42px] rounded-[5px] bg-danger-color shadow-xl text-[15px] font-medium uppercase text-white flex items-center justify-center">
            close
        </RouterLink>
    </div>
</template>

<script>
import SearchIcon from "../../../icons/Budgetary/searchIcon.vue"


export default {
    components: {
        SearchIcon,
    },
}
</script>