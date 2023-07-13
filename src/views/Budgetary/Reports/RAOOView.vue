<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import RAOOHead from "../../../components/budgetComponent/Reports/RAOO/View.vue";
import RAOOMain from "../../../components/budgetComponent/Reports/RAOO/Main.vue";
</script>
<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <RAOOHead @data-updated="handleDataFromChild" />
  <RAOOMain :data-from-parent="balance" />
</template>
<script>
export default {
  data() {
    return {
      receivedbudYr: "",
      receivedDep: "",
      receivedAip: "",
      receivedAct: "",

      balance: [],
    };
  },
  methods: {
    handleDataFromChild(budYr, dep, aip, act) {
      this.receivedbudYr = budYr;
      this.receivedDep = dep;
      this.receivedAip = aip;
      this.receivedAct = act;
    },
  },
};
</script>
