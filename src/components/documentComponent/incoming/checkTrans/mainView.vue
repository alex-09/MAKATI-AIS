<script>
    import ReceiveCheck from "./receiveCheck.vue";
    import PrintCheckView from "./printCheck.vue";

    export default {
        components: {
            ReceiveCheck,
            PrintCheckView,
        },
        data() {
            return {
                showTrans: true,
            }
        }
    }
</script>
<template>
    <div class="flex justify-center gap-32 mt-4">
        <!-- receive -->
        <div v-if="showTrans | showTrans === true" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = true" class="text-sm uppercase text-primary-color font-medium">receive checks</a>
        </div>
        <div v-if="!showTrans | showTrans === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = true" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">receive checks</a>
        </div>
        <div v-if="showTrans | showTrans === true" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = false" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">print receiving receipt</a>
        </div>
        <div v-if="!showTrans | showTrans === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = false" class="text-sm uppercase text-primary-color font-medium">print receiving receipt</a>
        </div>
    </div>
    <ReceiveCheck  v-if="showTrans | showTrans === true" />
    <PrintCheckView  v-if="!showTrans | showTrans === false" />
</template>