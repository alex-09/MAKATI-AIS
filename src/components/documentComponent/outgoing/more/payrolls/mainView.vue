<script setup>
import payrollsComponent from "./payrollsComponent.vue";

import { ref } from "vue";

const showReceive = ref(true);
</script>
<template>
  <payrollsComponent v-if="showReceive | (showReceive === true)" />
</template>
