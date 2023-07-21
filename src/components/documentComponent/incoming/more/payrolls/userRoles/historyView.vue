<script setup>
import { ref } from 'vue' 

const showPrint = ref(true)
</script>
<script>
export default {
  props: {
    showHistory: {
      type: Boolean,
      required: true,
    },
  },
}
</script>
<template>
<div v-if="showHistory">
    <div class="container py-4 ">
        <div class="float-right">
            <button @click="$emit('close')">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="15" cy="15" r="15" fill="#F8274C"/>
                    <path d="M20.95 10.2485L19.7515 9.04999L15 13.8015L10.2485 9.04999L9.05005 10.2485L13.8015 15L9.05005 19.7515L10.2485 20.95L15 16.1985L19.7515 20.95L20.95 19.7515L16.1985 15L20.95 10.2485Z" fill="white" stroke="white"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="container mt-8">
        <div class="container grid grid-cols-3 place-content-center px-0 gap-34 xxxxl:gap-52">
            <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-175 xxxxl:w-175">Transaction Number</span>
                <input type="text" class="w-280 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
            </div>
            <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-175 xxxxl:w-175">Name of Sender</span>
                <input type="text" class="w-280 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
            </div>
            <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-175 xxxxl:w-175">Department / Office</span>
                <input type="text" class="w-280 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
            </div>
        </div>
        <div class="container grid grid-cols-1 mt-4 p-0">
            <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-[175px] xxxxl:w-175">Subject</span>
                <input type="text" class="w-[1260px] xxxxl:w-1600 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
            </div>
        </div>
    </div>
    <!-- TABLE -->
    <div v-if="showPrint | showPrint === true">
        <div class="container mt-8">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">Action History</p>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overscroll-y-contain w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-1850 1536:w-1458 xxxxl:w-1850 divide-gray-200 mr-8">
                    <thead>
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase w-92">

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
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-800">
                                    particular
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                    user
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                04/12/2023
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                3:54 PM
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-left">
                                SAMPLE PARTICULAR
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                Mr. City Accountant
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- BUTTONS -->
        <div class="container mt-4">
            <div class="container mx-8">
                <div class="flex flex-row justify-between">
                    <div class="flex space-x-4">
                        <button class="uppercase font-medium text-sm w-142 h-42 bg-primary-color text-white rounded">add entry</button>
                        <button class="uppercase font-medium text-sm w-100 h-42 bg-save-color text-white rounded">save</button>
                        <button class="uppercase font-medium text-sm w-100 h-42 bg-danger-color text-white rounded">clear</button>
                    </div>
                    <div class="flex space-x-4 mr-4">
                        <button @click="showPrint = false" class="uppercase font-medium text-sm w-100 h-42 bg-button-blue text-white rounded">view</button>
                        <button class="uppercase font-medium text-sm w-100 h-42 bg-danger-color text-white rounded">delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="!showPrint | showPrint === false">
        <div class="container mt-8">
            <p class="capitalize text-other-black text-2xl font-bold mb-4">Action History (For Printing)</p>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overscroll-y-contain w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-1850 1536:w-1458 xxxxl:w-1850 divide-gray-200 mr-8">
                    <thead>
                        <tr>
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
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-800">
                                    particular
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                    user
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                04/12/2023
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                3:54 PM
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-left">
                                SAMPLE PARTICULAR
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center">
                                Mr. City Accountant
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container mx-30 mt-4">
            <div class="container mx-8">
                <div class="flex justify-end gap-4">
                    <button @click="showPrint = true" class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">cancel</button>
                    <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">print</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>