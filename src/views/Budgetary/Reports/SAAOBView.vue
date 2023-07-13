<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import SAAOBMain from "../../../components/budgetComponent/Reports/SAAOB/Main.vue";
import SAAOBHead from "../../../components/budgetComponent/Reports/SAAOB/View.vue";
</script>

<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <SAAOBHead @data-updated="handleDataFromChild" />
  <SAAOBMain :data-from-parent="filter" />
</template>
<script>
export default {
  data() {
    return {
      receivedbudYr: "",
      receivedDep: "",
      search: "",
      filter: [],
    };
  },
  methods: {
    handleDataFromChild(budYr, dep) {
      this.receivedbudYr = budYr;
      this.receivedDep = dep;
    },
    async getData() {
      await axios
        .post("obligation/", {
          by: receivedbudYr,
          dep: receivedDep,
        })
        .then((res) => {
          filter = res.data.filter;
        });
    },
  },
  created() {},
};
</script>
