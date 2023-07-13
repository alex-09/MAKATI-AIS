<script setup>
import TransDetails from './PrintTrans.vue'

import { ref } from 'vue'

const showDetails = ref(true)

</script>

<template>
    <div v-if="showDetails | showDetails === true">
        <div class="container mt-4">
            <p class="capitalize text-3xl font-bold text-other-black text-center mt-4">transaction receipt details</p>
        </div>
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overscroll-y-contain scrollbar w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-1850 1536:w-1458 xxxxl:w-1850 divide-gray-200 mr-8">
                    <thead>
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                transaction id no.
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                date
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-500">
                                particulars
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                                bearer
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
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

        <div class="container mx-30 mt-8">
            <div class="flex justify-end gap-4">
                <button @click="showDetails = false" class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">cancel</button>
                <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">print</button>
            </div>
        </div>
    </div>
    <TransDetails v-if="!showDetails| showDetails === false"/>
</template>