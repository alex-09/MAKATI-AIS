<script setup>
import { ref } from 'vue';
import InProcess from '../../../components/PCICM/Contracts/InProcess.vue'
import Processed from '../../../components/PCICM/Contracts/Processed.vue'
import HeaderMenu from '../../../components/PCICM/headerMenu.vue'
import NavbarMenu from '../../../components/PCICM/navBarMenu.vue'
const selectedIndex = ref(0)
const tabMenus = ref(['IN PROCESS', 'PROCESSED'])
</script>
<template>

    <div class="sticky top-0 left-0 z-50">
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