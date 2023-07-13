<script setup>
import preAuditComponent from "./preAuditComponent.vue";

import { ref } from "vue";

const showReceive = ref(true);
</script>
<template>
  <preAuditComponent v-if="showReceive | (showReceive === true)" />
</template>
