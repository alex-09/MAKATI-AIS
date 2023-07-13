<script setup>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import InputFields from "../../../components/budgetComponent/Update/inputComponent2.vue";
import DetailsView from "../../../components/budgetComponent/Update/detailsView.vue";
</script>

<template>
  <div class="sticky top-0 left-0 z-50">
    <HeaderMenu :pagetitle="'Budgetary Account Transaction'" />
    <NavBar :navbartitle="'Executive Budget'" />
  </div>
  <div class="container float-left px-8 my-8">
    <span class="text-2xl font-bold text-other-blue">Update Allotment</span>
  </div>
  <InputFields />
  <!-- <DetailsView /> -->
</template>
