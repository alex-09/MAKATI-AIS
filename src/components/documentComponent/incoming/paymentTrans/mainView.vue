<script>
    import newView from "./newTrans.vue";
    import prevView from "./prevTrans.vue";
    import printView from "./printTrans.vue";

    export default {
        components: {
            newView,
            prevView,
            printView,
        },
        data() {
            return {
                showTrans: "a",
            }
        }
    }
</script>
<template>
    <div class="flex justify-center gap-32 mt-4">
        <!-- receive -->
        <div v-if="showTrans === 'b'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'a'" class="text-sm uppercase text-primary-color font-medium">New transactions</a>
        </div>
        <div v-if="showTrans === 'a'" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = 'a'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">New transactions</a>
        </div>
        <div v-if="showTrans === 'c'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'a'" class="text-sm uppercase text-primary-color font-medium">New transactions</a>
        </div>

        <div v-if="showTrans === 'a'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'b'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">previous transactions</a>
        </div>
        <div v-if="showTrans === 'b'" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = 'b'" class="text-sm uppercase text-primary-color font-medium">previous transactions</a>
        </div>
        <div v-if="showTrans === 'c'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'b'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">previous transactions</a>
        </div>

        <div v-if="showTrans === 'b'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'c'" class="text-sm uppercase text-primary-color font-medium">print receiving receipt</a>
        </div>
        <div v-if="showTrans === 'c'" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = 'c'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">print receiving receipt</a>
        </div>
        <div v-if="showTrans === 'a'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'c'" class="text-sm uppercase text-primary-color font-medium">print receiving receipt</a>
        </div>
    </div>
    <newView v-if="showTrans === 'a'" />
    <prevView v-if="showTrans === 'b'" />
    <printView v-if="showTrans === 'c'"/>
</template>