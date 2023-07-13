<script setup>
import contractsComponent from "./contractComponent.vue";

import { ref } from "vue";

const showReceive = ref(true);
</script>
<template>
  <div class="flex justify-center gap-32 mt-4">
    <!-- cafoa -->
    <div
      v-if="showReceive | (showReceive === true)"
      class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 hover:border-b-4 border-primary-color"
    >
      <a
        @click="showReceive = true"
        class="text-sm uppercase text-primary-color font-medium"
        >contract</a
      >
    </div>
    <div
      v-if="!showReceive | (showReceive === false)"
      class="w-249 text-center px-4 py-2 cursor-pointer border-b-4 border-white hover:border-b-4 hover:border-primary-color"
    >
      <a
        @click="showReceive = true"
        class="text-sm uppercase text-other-gray-100 hover:text-primary-color font-medium"
        >contract</a
      >
    </div>
  </div>
  <contractsComponent v-if="showReceive | (showReceive === true)" />
</template>
