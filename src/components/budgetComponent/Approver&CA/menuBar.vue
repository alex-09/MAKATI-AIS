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
            <div class="font-bold text-2xl">Executive Funds</div>
        </router-link>
      </div>
  
      <div class="flex items-center gap-x-4">
        <!-- <RouterLink 
          :to="{ name: 'Dashboard Executive Funds - Approver&CA' }"
          class="text-[14px] text-[#3A3541] px-4 hover:text-white hover:bg-gray-400 rounded-[16px] py-2 cursor-pointer">
          Obligations
        </RouterLink> -->
        <NavDropdown :label="'Appropriation'" :options="ApproOptions" />
        <NavDropdown :label="'Allotment'" :options="AllotOptions" />
        <NavDropdown :label="'Obligation'" :options="ObligOptions" />
        <NavDropdown :label="'Reports'" :options="RepOptions" />
      </div>
    </div>
  </template>

  <script setup>
  import NavDropdown from "./navDropdown.vue";
  const props = defineProps({
    navbartitle: String,
  });
  const ApproOptions = [
    {
      title: "New & Update Appropritation",
      link: "/Budget-Management/Executive-Funds/Approver&CA-Enroll-Dashboard"
    },
    {
        title: "List of Appropriation",
        link: "/Budget-Management/Executive-Funds/List-Appropriation"
    }
  ];

  const AllotOptions = [
    {
        title: "New & Update Allotment",
        link: "/Budget-Management/Executive-Funds/Allotment-Enroll-Approval"
    },
    {
        title: "List of Allotment",
        link: "/Budget-Management/Executive-Funds/List-Allotment"
    }
  ];

  const ObligOptions = [
    {
        title: "For Assignment",
        link: "/Budget-Management/Executive-Funds/For-Assignment-Obligation"
    },
    {
        title: "For Review",
        link: "/Budget-Management/Executive-Funds/For-Review-Obligation"
    },
    {
        title: "For Process",
        link: "/Budget-Management/Executive-Funds/For-Process-Obligation"
    }
  ];

  const RepOptions = [
    {
        title: "Statement of Appropriation, ...",
        link: "#"
    },
    {
        title: "Status of Budget Utilization",
        link: "#"
    },
    {
        title: "Status of Programs/Projects ...",
        link: "#"
    },
    {
        title: "Registries of Appropriation ...",
        link: "#"
    },
  ];
  </script>