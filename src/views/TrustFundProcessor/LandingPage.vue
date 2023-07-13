<script setup>
import BackIcon from "../../components/icons/Document/BackArrow.vue";
</script>

<script>
import axios from "axios";
export default {
  data() {
    return {
      userDesignation: "",
    };
  },
  async created() {
    const response = await axios.get("me");

    this.userDesignation = response.data.user.userdesignation;
  },
};
</script>

<template>
  <div class="min-h-screen bg-document-bg flex items-center justify-center">
    <div class="container mx-auto">
      <div class="container bg-white rounded-md py-10 max-w-6xl">
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
          <p class="text-5xl capitalize font-medium mt-8">
            Budget Account Transactions
          </p>
        </div>
        <!-- for processor -->
        <div
          v-if="this.userDesignation == 'Processor'"
          class="flex justify-center py-28 gap-4"
        >
          <RouterLink
            :to="{ name: 'BudgetDashboard' }"
            class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/EBicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium"
                >Executive Budget</span
              >
            </div>
          </RouterLink>
          <RouterLink
            :to="{ name: 'Trust Fund Information' }"
            class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/TFicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium">Trust Funds</span>
            </div>
          </RouterLink>
        </div>

        <!-- for asst head -->
        <div
          v-if="this.userDesignation == 'Reviewer'"
          class="flex justify-center py-28 gap-4"
        >
          <RouterLink
            :to="{ name: 'Dashboard Executive Funds' }"
            class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/EBicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium"
                >Executive Budget</span
              >
            </div>
          </RouterLink>
          <RouterLink
            :to="{ name: 'List of Trust Receipts on Process' }"
            class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/TFicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium">Trust Funds</span>
            </div>
          </RouterLink>
        </div>

        <!-- for div head -->
        <div
          v-if="this.userDesignation == 'Approver'"
          class="flex justify-center py-28 gap-4"
        >
          <RouterLink
            :to="{ name: 'Dashboard Executive Funds - Approver&CA' }"
            class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/EBicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium"
                >Executive Budget</span
              >
            </div>
          </RouterLink>
          <RouterLink
            :to="{ name: 'List of Trust Receipts on Process' }"
            class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/TFicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium">Trust Funds</span>
            </div>
          </RouterLink>
        </div>

        <!-- for div head -->
        <div
          v-if="this.userDesignation == 'City Accountant' || this.userDesignation == 'Assistant Department Head froFRS'"
          class="flex justify-center py-28 gap-4"
        >
          <RouterLink
            :to="{ name: 'Dashboard Executive Funds - Approver&CA' }"
            class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/EBicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium"
                >Executive Budget</span
              >
            </div>
          </RouterLink>
          <RouterLink
            :to="{ name: 'List of Trust Receipts on Process' }"
            class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center"
          >
            <div>
              <img
                src="../../components/TRComponents/icons/TFicon.svg"
                class="mx-12"
              />
              <span class="text-2xl text-white font-medium">Trust Funds</span>
            </div>
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>
