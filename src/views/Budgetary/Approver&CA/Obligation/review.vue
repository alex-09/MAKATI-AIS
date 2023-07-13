<script>
import HeaderBar from '../../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../../components/budgetComponent/Approver&CA/menuBar.vue';
import ContentNew from '../../../../components/budgetComponent/Approver&CA/Obligation/new.vue';
import ContentUpdate from '../../../../components/budgetComponent/Approver&CA/Obligation/update.vue';

import { ref } from 'vue';

export default {
    components: {
        HeaderBar,
        MenuBar,
        ContentNew,
        ContentUpdate
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
        <div v-if="Comp || Comp === true" class="w-[150px] text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <span @click="Comp = true" class="text-sm uppercase text-primary-color font-medium">new</span>
        </div>
        <div v-if="!Comp || Comp === false" class="w-[150px] text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color">
            <span @click="Comp = true" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">new</span>
        </div>

        <div v-if="Comp || Comp === true" class="w-[150px] text-center px-4 py-2 cursor-pointer hover:border-b-4 hover:border-primary-color">
            <span @click="Comp = false" class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium">update</span>
        </div>
        <div v-if="!Comp || Comp === false" class="w-[150px] text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color">
            <span @click="Comp = false" class="text-sm uppercase text-primary-color font-medium">update</span>
        </div>
    </div>

    <ContentNew v-if="Comp || Comp === true"/>
    <ContentUpdate v-if="!Comp || Comp === false" />
</template>