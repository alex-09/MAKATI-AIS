<script setup>
import IncomingIcon from "../icons/Document/IncomingIcon.vue";
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
    <!-- HEADER TEXT -->
    <div class="flex justify-center mt-8">
      <p class="text-2xl capitalize font-medium">document management</p>
    </div>
    <!-- SELECTIONS FOR DOCUMENT MANAGEMENT -->
    <div class="flex justify-center py-28 gap-4">
      <!-- INCOMING BUTTON -->
      <div
        class="bg-firstBtn rounded-md w-200 h-200 flex justify-center items-center"
      >
        <RouterLink :to="{ name: 'Document Incoming' }">
          <IncomingIcon />
          <span class="text-2xl text-white font-medium">Incoming</span>
        </RouterLink>
      </div>
      <!-- INCOMING BUTTON -->
      <div
        class="bg-secondBtn rounded-md w-200 h-200 flex justify-center items-center"
      >
        <RouterLink :to="{ name: 'Document Outgoing Communications' }">
          <img src="/assets/outgoing.png" alt="" class="ml-2" />
          <span class="text-2xl text-white font-medium">Outgoing</span>
        </RouterLink>
      </div>
      <!-- PAYEE ENROLLMENT BUTTON -->
      <!-- <div class="bg-thirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center"> -->
      <div
        class="bg-thirdBtn rounded-md w-48 h-52 flex justify-center items-center text-center"
      >
        <RouterLink :to="{ name: 'Document PayeeEnrollment' }">
          <!---<PayeeEnrollmentIcon /> -->
          <div class="flex justify-center ml-3">
            <img src="/assets/payee.png" alt="" />
          </div>
          <span class="text-2xl text-white font-medium ml-3"
            >Payee Enrollment</span
          >
        </RouterLink>
      </div>
      <!-- INCOMING BUTTON -->
      <div
        class="bg-sixthBtn rounded-md w-200 h-200 flex justify-center items-center"
      >
        <RouterLink :to="{ name: 'Communication Dashboard Reports' }">
          <img src="/assets/report.png" alt="" class="ml-2" />
          <span class="text-2xl text-white font-medium">Reports</span>
        </RouterLink>
      </div>
    </div>
  </div>
</template>
