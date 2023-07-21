<template>
<div class="mt-8">
    <ul class=" gap-x-[158px] flex text-[#3A354199] justify-center font-medium text-[14px] leading-[24px]">
        <li v-for="(item, i) in TabItems" :key="item"
        :class="[i == selectedIndex ? 'border-b-4 border-[#0e4572] text-[#0e4572]': '', 'px-[20px] py-[12px] text-center cursor-pointer select-none']"
        @click="selectedIndex = i">
        {{ item }}
        </li>
    </ul>
    <NTPage v-if="selectedIndex == 0" @showmodal1="showModal1()"/>
    <PTPage  v-if="selectedIndex == 1" @showmodal2="showModal2()" />
    <PRRPage v-if="selectedIndex == 2"/>

    <Modal1 v-if="isModalOneVisible" @closeModal="showModal1()"/>
    <Modal2 v-if="isModalTwoVisible"  @closeModal="showModal2()"/>    
</div>
</template>
<script setup>
import NTPage from './NTPage.vue';
import PTPage from './PTPage.vue';
import PRRPage from './PRRPage.vue';
import Modal1 from './Modal1.vue';
import Modal2 from './Modal2.vue';
import { ref } from 'vue';
var isModalOneVisible = ref(false)
const isModalTwoVisible = ref(false)
const selectedIndex = ref(0)
function showModal1(){
    isModalOneVisible.value = !isModalOneVisible.value
    
}
function showModal2(){
    isModalTwoVisible.value = !isModalTwoVisible.value
}
const props = defineProps({
    TabItems: Array,
})
window.onclick

</script>
