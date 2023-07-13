<script setup>
import IncomingIcon from "../icons/Document/IncomingIcon.vue";
import BackIcon from "../icons/Document/BackArrow.vue";
</script>

<template>
  <div class="container bg-white rounded-md py-10 max-w-4xl">
    <!-- BACK BUTTON -->
    <div class="flex">
      <div class="flex flex-auto">
        <RouterLink :to="{ name: 'MainMenu' }" class="flex flex-row">
          <BackIcon />
          <span
            class="uppercase ml-3 font-medium text-base text-other-black-100"
            >Back</span
          >
        </RouterLink>
      </div>
    </div>
    <!-- HEADER TEXT -->
    <div class="flex justify-center">
      <p class="text-2xl capitalize font-medium">
        budgetary account transaction
      </p>
    </div>
    <!-- SELECTIONS FOR DOCUMENT MANAGEMENT -->
    <div class="flex justify-center py-28 gap-4">
      <!-- INCOMING BUTTON -->
      <RouterLink
        :to="{ name: 'BudgetDashboard' }"
        class="bg-firstBtn rounded-md w-48 h-52 flex justify-center items-center"
      >
        <div>
          <IncomingIcon />
          <span class="text-2xl text-white font-medium ml-3"
            >Executive Budget</span
          >
        </div>
      </RouterLink>
      <!-- INCOMING BUTTON -->
      <div
        class="bg-secondBtn rounded-md w-48 h-52 flex justify-center items-center"
      >
        <div>
          <img src="/assets/outgoing.png" alt="" class="ml-2" />
          <span class="text-2xl text-white font-medium ml-5"
            >Trust Reciepts</span
          >
        </div>
      </div>
    </div>
  </div>
</template>
