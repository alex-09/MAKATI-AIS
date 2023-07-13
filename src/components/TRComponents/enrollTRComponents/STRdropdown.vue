<script setup>
import {
      Listbox,
      ListboxButton,
      ListboxOptions,
      ListboxOption,
    } from '@headlessui/vue'
import { ref } from 'vue';
    const props = defineProps({
            dataArray: Array,
        })
    const selectedData = ref(props.dataArray[0])

</script>
<template>
    <Listbox >
      <ListboxButton
      class=" relative whitespace-nowrap overflow-hidden font-normal text-sm  border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full text-left"      
      >{{ selectedData }}
        <div class="absolute right-0 p-2 bg-white z-1">
            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0L5 5L10 0H0Z" fill="#3A3541" fill-opacity="0.54"/>
            </svg>
        </div>
      </ListboxButton>
        <transition
            leave-active-class="transition duration-100 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
            >
            <ListboxOptions
            
                class=" z-10 px-[11px] py-[5px] text-sm mt-1 absolute  w-full overflow-auto rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none "
            >   
                <ListboxOption
                v-slot="{ selected }"
                v-for="option in dataArray"
                :key="option"
                :value="option"
                as="template"
                
                @click="selectedData = option"
                >
                <li
                    :class="[
                    
                    selected ? 'bg-dashboardBtn3 shadow-md z-20 absolute '  : ' hover:text-white hover:bg-gray-400',
                        'relative rounded-2xl px-[22px] py-1 select-none' , ]" >
                    <span class=" font-normal text-sm">{{ option }}</span>
                </li>
                </ListboxOption>
            </ListboxOptions>
        </transition>
    </Listbox>

</template>
