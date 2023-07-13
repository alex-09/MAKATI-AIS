<script setup>
    import SearchIcon from '../../../../icons/Budgetary/searchIcon.vue'
    import TransDetails from './details.vue'

    import { ref } from 'vue'

    const showDetails = ref(true)
</script>
<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <div class="container grid grid-cols-2 place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center">Receiving Receipt</p>
                <div class="flex flex-row items-center justify-end ml-12">
                    <p>Select Bearer Name</p>
                    <label class="relative ml-8">
                        <input type="text" name="search" placeholder="Search" class="w-308 h-144 border rounded px-4 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm bg-search-color">
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
                                class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase w-92">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
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
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-500">
                                particulars
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                            >
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                            >
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
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