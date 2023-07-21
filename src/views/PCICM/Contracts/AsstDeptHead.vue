<script>
import { ref } from 'vue';
import InProcess from '../../../components/PCICM/Contracts/InProcess.vue'
import Processed from '../../../components/PCICM/Contracts/Processed.vue'
import HeaderMenu from '../../../components/PCICM/headerMenuGreen.vue'
import NavbarMenu from '../../../components/PCICM/navBarMenuGreen.vue'

export default {
    data() {
        return{
            selectedIndex: ref(0),
            tabMenus: ref(['IN PROCESS', 'PROCESSED'])
        }
    },

    components: {
        InProcess,
        Processed,
        HeaderMenu,
        NavbarMenu
    }
}
</script>
<template>

    <div class="sticky top-0 left-0 z-50 max-md:relative">
        <!--header and navbar here-->
        <HeaderMenu />
        <NavbarMenu />
    </div>
   
    <div>
        <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
            <li v-for="(item, i) in tabMenus" :key="item"
            :class="[i == selectedIndex ? 'border-b-4 border-[#05c46b] text-[#05c46b]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
            @click="selectedIndex = i">
            {{ item }}
            </li>
        </ul>
    </div>
    <section class="mx-[30px] mt-[14px]">
        <InProcess v-if="selectedIndex == 0"/>
        <Processed v-if="selectedIndex == 1"/>
    </section>
</template>