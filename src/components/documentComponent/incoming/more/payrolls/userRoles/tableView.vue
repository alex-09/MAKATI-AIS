<script setup>
    import dropDown from './tableDrop.vue'
    import { ref } from 'vue' 

    const status = [
        {value: 1, label: 'Pending' },
        {value: 2, label: 'Closed' },
        {value: 3, label: 'Cancelled' },
        {value: 4, label: 'For Outgoing' },
    ];

    const assign = [
        {value: 1, label: 'Dela Cruz' },
        {value: 2, label: 'Majam' },
        {value: 3, label: 'Bartolome' },
        {value: 4, label: 'Dalugdug' },
        {value: 5, label: 'Alcantara' },
    ];

    const form = ref({
        status_id: null,
        assign_id: null,
    });
</script>
<script>
export default {
  props: {
    show: {
      type: Boolean,
      required: true,
    },
  },
}
</script>
<template>
    <div v-if="show">
        <div class="container grid justify-items-center p-0 mt-4">
            <div class="overflow-x-auto overscroll-x-contain h-320 w-1850 1536:w-1458 xxxxl:w-1850">
                <table class="divide-y w-3300 divide-gray-200 mr-8">
                    <thead>
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-92">
                                    <div class="flex items-center justify-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-button-blue bg-gray-100 rounded border-gray-300 dark:focus:button-blue dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
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
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232">
                                assign to
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232">
                                status
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                                <div class="flex items-center justify-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-button-blue bg-gray-100 rounded border-gray-300 dark:focus:button-blue dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
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
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133">
                                <input type="text" class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500">
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap w-232">
                                <dropDown 
                                    placeholder="Assign to"
                                    v-model="form.assign_id"
                                    :options="assign"
                                />
                            </td>
                            <td
                                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap w-232">
                                <dropDown 
                                    placeholder="Status"
                                    v-model="form.status_id"
                                    :options="status"
                                />
                            </td>
                            <td
                                class="px-2 py-4 whitespace-nowrap text-center w-207">
                                <div class="flex flex-row gap-2 justify-center">
                                    <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">R</button>
                                    <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">E</button>
                                    <button @click="$emit('open')" class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">A</button>
                                    <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">D</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container mx-30 mt-4">
                <div class="container mx-8">
                    <div class="flex justify-start gap-4">
                        <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded">save</button>
                        <button class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded">clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>