<script setup>
    import payrollView from "./payrollView.vue"
    import receiptView from "./receiptView.vue"

    import { ref } from 'vue'

    const showPayroll = ref(true)
</script>

<template>
    <div class="flex justify-center gap-32 mt-4">
        <!-- receive -->
        <div v-if="showPayroll | showPayroll === true" class="w-300 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showPayroll = true" class="text-sm uppercase text-primary-color font-medium">receive payrolls / appointment</a>
        </div>
        <div v-if="!showPayroll | showPayroll === false" class="w-300 text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color">
            <a @click="showPayroll = true" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">receive payrolls / appointment</a>
        </div>
        <!-- <div class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color">
            <a @click="showPayroll = true" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">receive communications</a>
        </div> -->
        <!-- printing receive -->
        <div v-if="showPayroll | showPayroll === true" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showPayroll = false" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">receiving receipt</a>
        </div>
        <div v-if="!showPayroll | showPayroll === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showPayroll = false" class="text-sm uppercase text-primary-color font-medium">receiving receipt</a>
        </div>
    </div>

    <payrollView v-if="showPayroll | showPayroll === true" />
    <receiptView v-if="!showPayroll | showPayroll === false" />
</template>