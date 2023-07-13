<script setup>
import checkTransComponent from "./checkTransComponent.vue";

import { ref } from "vue";

const showReceive = ref(true);
</script>
<template>
  <checkTransComponent v-if="showReceive | (showReceive === true)" />
</template>
