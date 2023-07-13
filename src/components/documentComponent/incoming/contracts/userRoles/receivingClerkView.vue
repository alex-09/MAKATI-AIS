<script>
    import ReceiveView from "./receive.vue";
    import PrevView from "./previous.vue";
    import PrintView from "./print.vue";

    export default {
        components: {
            ReceiveView ,
            PrevView,
            PrintView,
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
            <a @click="showTrans = 'a'" class="text-sm uppercase text-primary-color font-medium">Receive Contract</a>
        </div>
        <div v-if="showTrans === 'a'" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = 'a'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">Receive Contract</a>
        </div>
        <div v-if="showTrans === 'c'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'a'" class="text-sm uppercase text-primary-color font-medium">Receive Contract</a>
        </div>

        <div v-if="showTrans === 'a'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'b'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">previous contract</a>
        </div>
        <div v-if="showTrans === 'b'" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <a @click="showTrans = 'b'" class="text-sm uppercase text-primary-color font-medium">previous contract</a>
        </div>
        <div v-if="showTrans === 'c'" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <a @click="showTrans = 'b'" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">previous contract</a>
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
    <ReceiveView v-if="showTrans === 'a'" />
    <PrevView v-if="showTrans === 'b'" />
    <PrintView v-if="showTrans === 'c'"/>
</template>