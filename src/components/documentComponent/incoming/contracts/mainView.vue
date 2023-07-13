<template>
<!--OTHERS-->
<section v-if="currentView.showOthers">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in submenuTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <OtherView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--SERVICES-->
<section v-if="currentView.showServices">
    <ServicesView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--CONSULTANCY-->
<section v-if="currentView.showConsultancy">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in submenuTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <ConsultancyView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--INFRUSTRUCTURE-->
<section v-if="currentView.showInf">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in submenuTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <InfraView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--ORDERING AGREEMENT-->
<section v-if="currentView.showOrdering">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in submenuTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <OrderingView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--FRAMEWORK AGREEMENT-->
<section v-if="currentView.showFramework">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in submenuTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <FrameworkView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--GOODS-->
<section v-if="currentView.showGoods">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in submenuTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <GoodsView v-if="selectedIndex === 0" @returntomain-view="changeView"/>
</section>

<!--MAIN VIEW-->
<section v-if="currentView.showMain">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in MainViewTabs" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <newTrans v-if="selectedIndex === 0" @change-view="changeView"/>
    <prevTrans v-if="selectedIndex === 1"/>
</section>

</template>
<script setup>
import newTrans from './newTrans.vue';
import prevTrans from './prevTrans.vue'
import GoodsView from './newTransViews/GoodViews/GoodsView.vue';
import FrameworkView from './newTransViews/FrameworkViews/FrameworkView.vue';
import OrderingView from './newTransViews/OrderingViews/OrderingView.vue';
import InfraView from './newTransViews/InfViews/InfraView.vue'
import ConsultancyView from './newTransViews/ConsultancyViews/ConsultancyView.vue';
import ServicesView from './newTransViews/ServicesViews/ServicesView.vue'
import OtherView from './newTransViews/OthersView/OtherView.vue'
import { ref } from 'vue';
const currentView = ref({
    showMain: true,
    showGoods: false,
    showFramework: false,
    showConsultancy: false,
    showInf: false,
    showOrdering: false,
    showOthers: false,
    showServices: false
})
const MainViewTabs = ref(['NEW TRANSACTIONS', 'PREVIOUS TRANSACTION'])
const submenuTabs = ref(['TRANSACTIONS IN PROCESS', 'TRANSACTION PROCESSED'])
const selectedIndex = ref(0)

const changeView = (value) => {
    if(value == null){
        alert('Select Type of Contract')
    }
    else{
        switch(value.id){
            case 0:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showGoods = !currentView.value.showGoods
            break;

            case 1:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showServices = !currentView.value.showServices
            break;
            case 2:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showInf = !currentView.value.showInf
            break;
            case 3:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showConsultancy = !currentView.value.showConsultancy
            break;
            case 4:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showFramework = !currentView.value.showFramework
            break;
            case 5:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showOrdering = !currentView.value.showOrdering
            break;
            case 6:
            currentView.value.showMain = !currentView.value.showMain
            currentView.value.showOthers = !currentView.value.showOthers
            break;
        }
    }
}
</script>