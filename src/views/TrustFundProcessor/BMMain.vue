<template>
  <!--header and navigation-->
  <div class="sticky top-0 left-0 z-50 w-full">
    <HeaderBar :pagetitle="'Budgetary Account Transaction'" />
    <NavBar :navbartitle="'Trust Funds'" />
  </div>

  <!--body-->
  <div class="container min-w-full px-0">
    <div
      class="mt-[22px] font-bold text-[40px] justify-center flex text-secondary-color"
    >
      TRUST FUND INFORMATION
    </div>

    <div class="mt-[59px] flex flex-col lg:flex-row p-2 gap-x-[10px]">
      <!--table1-->
      <Table1 class="h-[383px] lg:w-[60%]" />

      <!--piegraph-->
      <div class="flex-grow justify-center flex-col flex">
        <div class="border py-[34px] justify-center flex-col">
          <div class="mb-[23px] justify-center flex font-semibold text-xl">
            TRUST RECEIPTS
          </div>
          <PieGraph />
        </div>
      </div>
    </div>
    <!--table2-->
    <div class="justify-center px-2 mt-6 flex mx-[71px]">
      <Table2 />
    </div>
  </div>
</template>
<script setup>
import Table2 from "../../components/TRComponents/BMMainComponents/Table2.vue";
import PieGraph from "../../components/TRComponents/BMMainComponents/Graph.vue";
import Table1 from "../../components/TRComponents/BMMainComponents/Table1.vue";
import HeaderBar from "../../components/TRComponents/headerComponent/HeaderComponent.vue";
import NavBar from "../../components/TRComponents/navComponents/NavComponent.vue";
</script>
