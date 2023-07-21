<template>
    <div class="flex px-6 py-3 shadow-md bg-white gap-x-[22px]">
      <div class="flex items-center gap-x-4">
        <router-link
            class="flex flex-row gap-4 items-center"
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
            <div class="font-bold text-2xl">Trust Funds</div>
        </router-link>
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
      title: "List of Trust Receipts on Process",
      link: "/Budget-Management/Trust-Funds/List-TR-Process",
    },
    {
      title: "List of Approved Process",
      link: "/Budget-Management/Trust-Funds/List-Approved-Process",
    },
    {
      title: "Update Trust Receipts",
      link: "/Budget-Management/Trust-Funds/Update-Trust-Receipts",
    },
  ];
  const ObligOptions = [
    {
      title: "List of FURS on Process",
      link: "/Budget-Management/Trust-Funds/List-FURS-Process",
    },
    {
      title: "List of Approved FURS",
      link: "/Budget-Management/Trust-Funds/List-Approved-FURS",
    },
  ];
  const RepOptions = [
    {
      title: "Statement of Trust Receipts, Obligations and Balance",
      link: "/Budget-Management/Trust-Funds/Reports-STROB",
    },
    {
      title: "Registries of Trust Receipts and Obligation",
      link: "/Budget-Management/Trust-Funds/Reports-RTRO",
    },
  ];
  </script>
  