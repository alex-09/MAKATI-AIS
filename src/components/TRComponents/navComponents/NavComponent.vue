<template>
  <div class="flex px-6 py-3 shadow-md bg-white gap-x-[22px]">
    <div class="flex items-center gap-x-4">
      <router-link
        :to="
          $router.currentRoute.value.path == '/budget-management/trust-fund'
            ? '/budget-management'
            : '/budget-management/trust-fund'
        "
      >
        <svg
          width="16"
          height="17"
          viewBox="0 0 16 17"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M16 7.80559H3.83L9.42 2.22335L8 0.815308L0 8.8042L8 16.7931L9.41 15.385L3.83 9.80281H16V7.80559Z"
            fill="#3A3541"
            fill-opacity="0.87"
          />
        </svg>
      </router-link>
      <div class="font-bold text-2xl">{{ navbartitle }}</div>
    </div>

    <div class="flex items-center gap-x-4">
      <NavDropdown :label="'Trust Receipts'" :options="TROptions" />
      <NavDropdown :label="'Obligations'" :options="ObligOptions" />
      <NavDropdown :label="'Reports'" :options="RepOptions" />
    </div>
  </div>
</template>
<script setup>
import NavDropdown from "./navDropdown.vue";
const props = defineProps({
  navbartitle: String,
});
const TROptions = [
  {
    title: "Enroll/New Trust Receipts",
    link: "/budget-management/trust-fund/new-tr",
  },
  {
    title: "Update Trust Receipts",
    link: "/budget-management/trust-fund/update-tr",
  },
  {
    title: "List of Trust Receipts on Process",
    link: "/budget-management/trust-fund/tr-onprocess",
  },
  {
    title: "List of Approved Process",
    link: "/budget-management/trust-fund/tr-approved",
  },
];
const ObligOptions = [
  {
    title: "List of FURS on Process",
    link: "/budget-management/trust-fund/furs-onprocess",
  },
  {
    title: "Adjustment of Obligation",
    link: "/budget-management/trust-fund/adjustment-obligation",
  },
  {
    title: "List of Approved FURS",
    link: "/budget-management/trust-fund/furs-approved",
  },
];
const RepOptions = [
  {
    title: "Statement of Trust Receipts, Obligations, and Balance",
    link: "/budget-management/trust-fund/statements",
  },
  {
    title: "Registries of Trust Receipts and Obligations",
    link: "/budget-management/trust-fund/registries",
  },
];
</script>
