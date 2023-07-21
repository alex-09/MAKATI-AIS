<script setup>
import contractsPOIcon from "../icons/PCICM/contractpoIcon.vue";
import preauditIcon from "../icons/PCICM/preauditIcon.vue";
import paymentTransIcon from "../icons/PCICM/paymentTransIcon.vue";
import BackIcon from "../icons/Document/BackArrow.vue";
</script>

<template>
  <div class="container bg-white rounded-md py-10 max-w-6xl">
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

    <div class="flex justify-center mt-8">
      <p class="text-2xl capitalize font-medium">
        processing of claims and internal control management
      </p>
    </div>

    <div class="flex justify-center py-28 gap-4">
      <div
        class="bg-[#5BA2D2] rounded-md w-200 h-200 flex justify-center items-center text-center"
      >
        <RouterLink
          :to="{ name: 'City Accountant Contracts' }"
          class="flex justify-center flex-col items-center"
        >
          <contractsPOIcon />
          <span class="text-2xl text-white font-medium">Contracts/P.O</span>
        </RouterLink>
      </div>

      <div
        class="bg-[#31A8B5] rounded-md w-200 h-200 flex justify-center items-center text-center"
      >
        <RouterLink
          :to="{ name: 'Document Incoming' }"
          class="flex justify-center flex-col items-center"
        >
          <preauditIcon />
          <span class="text-2xl text-white font-medium"
            >Pre-Audit Transaction</span
          >
        </RouterLink>
      </div>

      <div
        class="bg-[#F6BF8C] rounded-md w-200 h-200 flex justify-center items-center text-center"
      >
        <RouterLink
          :to="{ name: 'Document Incoming' }"
          class="flex justify-center flex-col items-center"
        >
          <paymentTransIcon />
          <span class="text-2xl text-white font-medium"
            >Payment Transaction</span
          >
        </RouterLink>
      </div>
    </div>
  </div>
</template>
