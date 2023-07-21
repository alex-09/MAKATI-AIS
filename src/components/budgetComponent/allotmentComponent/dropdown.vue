<script>
import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from "@headlessui/vue";
export default {
  components: {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
  },
  data() {
    return {
      selectedData: null,
      noDataSelected: true,
    };
  },
  props: {
    dataArray: Array,
    placeholder: String,
  },
};
</script>
<template>
  <Listbox v-model="selectedData">
    <ListboxButton
      class="font-medium placeholder- border border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full text-left"
      >{{ selectedData }}
      <span v-if="noDataSelected" class="text-text-gray font-normal"
        >Select {{ placeholder }}</span
      >
      <div class="absolute right-0 p-2">
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
        class="z-10 text-sm mt-1 absolute w-full overflow-auto rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <ListboxOption
          v-slot="{ active, selected }"
          v-for="option in dataArray"
          :key="option"
          :value="option"
          as="template"
          @click="(this.selectedData = option), (this.noDataSelected = false)"
        >
          <li
            :class="[
              active ? 'bg-other-blue text-white' : 'text-black',
              'relative cursor-default select-none py-1 pl-4 pr-4',
              selected ? ' bg-text-gray-100 text-white font-medium' : '',
              'block truncate',
            ]"
          >
            <span>{{ option }}</span>
          </li>
        </ListboxOption>
      </ListboxOptions>
    </transition>
  </Listbox>
</template>

<!-- <script setup>
    import { ref } from 'vue'
    import {
      Listbox,
      ListboxButton,
      ListboxOptions,
      ListboxOption,
    } from '@headlessui/vue'
    
    const people = [
      { id: 1, name: 'Durward Reynolds', unavailable: false },
      { id: 2, name: 'Kenton Towne', unavailable: false },
      { id: 3, name: 'Therese Wunsch', unavailable: false },
      { id: 4, name: 'Benedict Kessler', unavailable: true },
      { id: 5, name: 'Katelyn Rohan', unavailable: false },
    ]
    const selectedPerson = ref(people[0].name)
    
  </script> -->
