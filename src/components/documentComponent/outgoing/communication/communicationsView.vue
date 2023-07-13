<script setup>
import communicationsComponent from "./communicationsComponent.vue";

import { ref } from "vue";

const showReceive = ref(true);
</script>
<template>
  <communicationsComponent v-if="showReceive | (showReceive === true)" />
</template>
