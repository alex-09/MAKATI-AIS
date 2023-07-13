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
        <NavDropdown :label="'Appropriation'" :options="ApOptions" />
        <NavDropdown :label="'Allotment'" :options="AllOptions" />
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
  const ApOptions = [
    {
        title: "Enroll/New Appropriation",
        link: "/Budget-Management/Executive-Funds/Enroll-Dashboard"
    },
    {
        title: "Update Appropriation",
        link: "/Budget-Management/Executive-Funds/Update-Dashboard"
    },
    {
        title: "List of Appropriation",
        link: "/Budget-Management/Executive-Funds/List-Appropriation"
    }
  ];

  const AllOptions = [
    {
        title: "Enroll/New Allotment",
        link: "/Budget-Management/Executive-Funds/Allotment-Enroll-Dashboard"
    },
    {
        title: "Update Allotment",
        link: "/Budget-Management/Executive-Funds/Allotment-Update-Dashboard"
    },
    {
        title: "List of Allotment",
        link: "/Budget-Management/Executive-Funds/List-Allotment"
    }
  ];

  const ObligOptions = [
    {
        title: "For Review",
        link: "/Budget-Management/Executive-Funds/For-Review-Obligation-New"
    },
    {
        title: "List of Obligation",
        link: "/Budget-Management/Executive-Funds/List-Obligation"
    },
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
  