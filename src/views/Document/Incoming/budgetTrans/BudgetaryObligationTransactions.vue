<template>
  <HeaderBar />
  <NavigationBar />
  <Tabs
    :TabItems="[
      'NEW TRANSACTIONS',
      'PREVIOUS TRANSACTIONS',
      'PRINT RECEIVING RECEIPT',
    ]"
  />
</template>
<script setup>
import HeaderBar from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
import NavigationBar from "../../../../components/navigationComponent/documentNav/navbarComponent.vue";
import Tabs from "../../../../components/documentComponent/incoming/budgetTransComponent/Tabs.vue";
</script>
