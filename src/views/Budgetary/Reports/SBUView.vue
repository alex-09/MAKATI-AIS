<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import SBUHead from "../../../components/budgetComponent/Reports/SBU/View.vue";
import SBUMain from "../../../components/budgetComponent/Reports/SBU/Main.vue";
import axios from "axios";
</script>
<template>
  <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
  <NavBar :navbartitle="'Executive Budget'" />
  <SBUHead @data-search="handleDataFromChild" />
  <SBUMain :data-from-parent="balance" />
</template>
<script>
export default {
  data() {
    return {
      search: "",
      balance: [],
    };
  },
  methods: {
    handleDataFromChild(data) {
      this.search = data;
    },
    async search() {
      await axios.post("/", this.search).then((res) => {
        this.balance = res.data.balance;
      });
    },
  },
};
</script>
