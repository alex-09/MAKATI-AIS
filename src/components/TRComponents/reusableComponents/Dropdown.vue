<script setup>
import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from "@headlessui/vue";
import { ref } from "vue";
const props = defineProps({
  dataArray: Array,
  placeholder: String,
});
const selectedData = ref(null);
var noDataSelected = ref(true);
</script>
<template>
  <Listbox>
    <ListboxButton
      class="text-sm relative whitespace-nowrap overflow-hidden font-normal py-[auto] border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full text-left"
      >{{ selectedData }}
      <span v-if="noDataSelected" class="text-text-gray font-normal">
        {{ placeholder }}</span
      >
      <div class="absolute right-0 p-2 z-1">
        <svg
          width="10"
          height="5"
          viewBox="0 0 10 5"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M0 0L5 5L10 0H0Z" fill="#3A3541" fill-opacity="0.54" />
        </svg>
      </div>
    </ListboxButton>
    <transition
      leave-active-class="transition duration-100 ease-in"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <ListboxOptions
        class="text-sm z-10 py-[5px] mt-1 absolute w-full overflow-auto rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <ListboxOption
          v-slot="{ selected }"
          v-for="option in dataArray"
          :key="option"
          :value="option"
          as="template"
          @click="(selectedData = option), (noDataSelected = false)"
        >
          <li
            :class="[
              selected
                ? 'bg-dashboardBtn3 z-20 absolute '
                : ' hover:text-white hover:bg-gray-400',
              'relative  px-[22px] py-1 select-none',
            ]"
          >
            <span class="font-normal text-sm">{{ option }}</span>
          </li>
        </ListboxOption>
      </ListboxOptions>
    </transition>
  </Listbox>
</template>
