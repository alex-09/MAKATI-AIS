<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import SPPAIHead from "../../../components/budgetComponent/Reports/SPPAI/View.vue";
import SPPAIMain from "../../../components/budgetComponent/Reports/SPPAI/Main.vue";
</script>
<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <SPPAIHead @data-updated="handleDataFromChild" />
  <p>Received dataa: {{ search }}</p>
  <p>Received dataa: {{ year }}</p>

  <SPPAIMain />
</template>
<script>
export default {
  data() {
    return {
      search: "",
      year: "",
    };
  },
  methods: {
    handleDataFromChild(data, yr) {
      this.search = data;
      this.year = yr;
    },
  },
};
</script>
