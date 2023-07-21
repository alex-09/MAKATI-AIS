<template>
    <div v-if="!showThis" class="pt-[30px] px-[90px]">
        <PRRTable1 />
        <div class="flex justify-end py-1">
            <button class="px-[26px] py-[8px] rounded-md bg-[#16b1ff] text-white" @click="showThis = true">VIEW</button>
        </div>
    </div>

    <div v-if="showThis" class="pt-[30px] px-[90px]">
        <div class=" font-bold text-[22px] leading-[27px] flex justify-center">
            Transaction Receipt Details
        </div>
        <div class="mt-[36px]">
            <PRRTable2 />
        <div class="flex justify-end gap-x-[26px] my-1">
            <button class="px-[26px] py-[8px] text-white bg-danger-color rounded-md"  @click="showThis = false">CANCEL</button>
            <button class="px-[26px] py-[8px] text-white bg-[#16b1ff] rounded-md">PRINT</button>
        </div>
            
        </div>
        

    </div>

    
</template>
<script setup>
import Searchbox from '../../../TRComponents/reusableComponents/Searchbox.vue'
import PRRTable1 from './PRRTable1.vue'
import PRRTable2 from './PRRTable2.vue'
import { ref } from 'vue';
const showThis = ref(false)
</script>
