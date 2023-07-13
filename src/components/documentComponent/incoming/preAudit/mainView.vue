<script>
    import PrevAuditView from "./prevAudit.vue";
    import PrintAuditView from "./printAudit.vue";

    export default {
        components: {
            PrevAuditView,
            PrintAuditView,
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
            <a @click="showTrans = true" class="text-sm uppercase text-primary-color font-medium">previous transactions</a>
        </div>
        <div v-if="!showTrans | showTrans === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = true" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">previous transactions</a>
        </div>
        <div v-if="showTrans | showTrans === true" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = false" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">print receiving receipt</a>
        </div>
        <div v-if="!showTrans | showTrans === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = false" class="text-sm uppercase text-primary-color font-medium">print receiving receipt</a>
        </div>
    </div>
    <PrevAuditView  v-if="showTrans | showTrans === true" />
    <PrintAuditView  v-if="!showTrans | showTrans === false" />
</template>