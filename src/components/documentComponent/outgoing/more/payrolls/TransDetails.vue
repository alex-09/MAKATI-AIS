<script setup>
    import DetailsView from './receiptView.vue'
    import { ref } from 'vue'

    const showDetails = ref(true)
</script>

<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container grid place-content-center mt-4">
            <div class="container grid place-content-center px-0">
                <p class="capitalize text-other-black text-2xl font-bold mb-4 float-center">Transaction Receipt Details</p>
            </div>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overflow-x-auto overscroll-x-contain scrollbar w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-3300 divide-gray-200 mr-8">
                    <thead>
                        <tr>
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
                                cafoa/obr
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                caf
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                number of personnel
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                department/office
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                type of document
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                type of employment
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200">
                                period covered
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360">
                                subject
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex gap-4 justify-end mt-9 mx-8">
            <button @click="showDetails = false" class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">cancel</button>
            <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">print</button>
        </div>
    </div>
    <DetailsView v-if="!showDetails| showDetails === false"/>
</template>