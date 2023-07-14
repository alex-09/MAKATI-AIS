<script setup>
import { ref } from "vue";
import CityAcctCPO from "../../../components/PCICM/Contracts/ProcessorCPO/CityAcctCPO.vue";
import HeaderMenu from "../../../components/PCICM/headerMenuGreen.vue";
import navBarMenu from "../../../components/PCICM/navBarMenuGreen.vue";
const selectedIndex = ref(0);
const tabMenus = ref(["NEW TRANSACTIONS", "PREVIOUS TRANSACTIONS"]);
</script>

<template>
  
  <div class="sticky top-0 left-0 z-50">
    <!--header and navbar here-->
    <HeaderMenu />
    <navBarMenu />
  </div>

  <div>
    <ul
      class="gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]"
    >
      <li
        v-for="(item, i) in tabMenus"
        :key="item"
        :class="[
          i == selectedIndex
            ? 'border-b-4 border-[#05c46b] text-[#05c46b]'
            : '',
          'px-[20px] py-[12px] text-center cursor-pointer select-none',
        ]"
        @click="selectedIndex = i"
      >
        {{ item }}
      </li>
    </ul>
  </div>
  
  <section class="mx-[30px] mt-[14px]">
    <CityAcctCPO v-if="selectedIndex == 0" />
    <Processed v-if="selectedIndex == 1" />
  </section>
</template>
