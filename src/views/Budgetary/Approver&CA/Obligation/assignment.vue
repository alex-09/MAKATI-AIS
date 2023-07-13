<script>
import HeaderBar from '../../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../../components/budgetComponent/Approver&CA/menuBar.vue';
import ContentNew from '../../../../components/budgetComponent/Approver&CA/Obligation/newTrans.vue';
import ContentPrev from '../../../../components/budgetComponent/Approver&CA/Obligation/prevTrans.vue';

import { ref } from 'vue';

export default {
    components: {
        HeaderBar,
        MenuBar,
        ContentNew,
        ContentPrev
    },
    setup() {
        const Comp = ref(true);

        const toggleShowReceive = () => {
            Comp.value = !Comp.value;
        };

        return {
            Comp,
            toggleShowReceive
        };
    }
}
</script>

<template>
    <HeaderBar />
    <MenuBar />
    <div class="flex gap-[80px] mt-8 justify-center">
        <div v-if="Comp || Comp === true" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <span @click="Comp = true" class="text-sm uppercase text-primary-color font-medium">new transaction</span>
        </div>
        <div v-if="!Comp || Comp === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color">
            <span @click="Comp = true" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">new transaction</span>
        </div>

        <div v-if="Comp || Comp === true" class="w-249 text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <span @click="Comp = false" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">previous transaction</span>
        </div>
        <div v-if="!Comp || Comp === false" class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <span @click="Comp = false" class="text-sm uppercase text-primary-color font-medium">previous transaction</span>
        </div>
    </div>

    <ContentNew v-if="Comp || Comp === true"/>
    <ContentPrev v-if="!Comp || Comp === false" />
</template>