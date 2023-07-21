<template>
  <!-- <div class="grid grid-rows-4 gap-4"> -->
  <div
    class="max-w-2xl max-h-full xxxl:max-w-3xl xxxxl:max-w-4xl xxxxl:mt-[50px]"
  >
    <div class="grid grid-cols-4 grid-rows-4 gap-2 text-center">
      <div
        class="rounded-md bg-[#0BE881] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#57EBA6] hover:text-[#FCFDFF] 1536:text-sm text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/home.png" class="mx-3 cursor-pointer" />
        <p class="text-center">Dashboard</p>
      </div>
      <RouterLink
        :to="{ name: 'Document' }"
        class="h-36 xxxxl:px-2 xxxxl:h-170 rounded-md bg-[#15B9E9] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#77D7F3] hover:text-[#FCFDFF] 1536:text-sm text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/document.png" class="mx-3 cursor-pointer" />
        <p class="text-center px-1">Document Management</p>
      </RouterLink>

      <RouterLink
        v-if="this.userDesignation == 'City Accountant'  || this.userDesignation == 'Assistant Department Head froFRS' || this.userDivision == 'Financial Reporting Division'"
        :to="{ name: 'Budget Management' }"
        class="row-span-2 rounded-md bg-[#FFD65C] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FAEFCD] hover:text-[#FCFDFF] 1536:text-sm text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/budgetary.png" class="mx-3 cursor-pointer" />
        <p>Budget Management</p>
      </RouterLink>

      <div v-else
        class="row-span-2 rounded-md bg-[#FFD65C] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FAEFCD] hover:text-[#FCFDFF] 1536:text-sm text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/budgetary.png" class="mx-3 cursor-pointer" />
        <p>Budget Management</p>
      </div>

      <RouterLink
        :to="{ name: 'Processing of Claims and Internal Control Management' }"
        class="row-span-2 rounded-md bg-[#05C46B] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#72EEB4] hover:text-[#FCFDFF] 1536:text-sm xxxxl:px-2 text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/process.png" class="mx-3 cursor-pointer" />
        <p>Processing of Claims and Internal Control Management</p>
      </RouterLink>

      <div
        class="h-36 xxxxl:px-2 xxxxl:h-170 rounded-md bg-[#FFC048] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FFD98F] hover:text-[#FCFDFF] 1536:text-sm text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/payroll.png" class="mx-3 cursor-pointer" />
        <p class="px-1">Payroll and Remittances Management</p>
      </div>
      <div
        class="h-36 xxxxl:h-170 rounded-md bg-[#EF5777] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FC90A6] hover:text-[#FCFDFF] text-black 1536:text-sm cursor-pointer"
      >
        <img src="/assets/menuIcon/supply.png" class="mx-3 cursor-pointer" />
        <p class="px-1">Supply and Property Management</p>
      </div>
      <div
        class="row-span-2 rounded-md bg-[#7C83E3] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#8F94D9] hover:text-[#FCFDFF] 1536:text-sm text-black cursor-pointer"
      >
        <img src="/assets/menuIcon/financial.png" class="mx-3 cursor-pointer" />
        <p>Financial Reporting Management</p>
      </div>
      <div
        class="row-span-2 rounded-md bg-[#FF5E57] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FF8A85] hover:text-[#FCFDFF] 1536:text-sm 1536:px-2 text-black cursor-pointer"
      >
        <img
          src="/assets/menuIcon/team-management.png"
          class="mx-3 cursor-pointer"
        />
        <p>Barangay Account Management</p>
      </div>

      <RouterLink
        :to="
          userDetails.userdesignation !== 'Encoder'
            ? { name: 'ChartsLanding' }
            : null
        "
        class="h-36 xxxxl:h-170 rounded-md bg-[#8EECF5] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#B9F5FB] hover:text-[#FCFDFF] text-black 1536:text-sm 1536:px-2 cursor-pointer"
        :style="{
          opacity: userDetails.userdesignation !== 'Encoder' ? 1 : 0.5,
        }"
      >
        <img src="/assets/menuIcon/chart.png" class="mx-3 cursor-pointer" />
        <p>Chart of Accounts</p>
      </RouterLink>
      <div
        class="h-36 xxxxl:h-170 rounded-md bg-[#CD84F1] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#E3C0F4] hover:text-[#FCFDFF] text-black 1536:text-sm cursor-pointer"
      >
        <img
          src="/assets/menuIcon/bookeeping.png"
          class="mx-3 cursor-pointer"
        />
        <p>Bookkeeping</p>
      </div>
      <div
        class="col-span-1 rounded-md bg-[#FA983A] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FFCA98] hover:text-[#FCFDFF] text-black 1536:text-sm cursor-pointer"
      >
        <img
          src="/assets/menuIcon/user-account.png"
          class="mx-3 cursor-pointer"
        />
        <p>Admin Setting Management</p>
      </div>
      <div
        class="col-span-1 rounded-md bg-[#FA983A] text-xl font-medium flex flex-col items-center justify-center hover:bg-[#FFCA98] hover:text-[#FCFDFF] text-black 1536:text-sm cursor-pointer"
      >
        <p>Bulletin</p>
      </div>
    </div>
  </div>
  <!-- </div> -->
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      userDetails: "",
      userDivision: "",
      userPosition: "",
    };
  },
  async created() {
    const response = await axios.get("me");

    this.userDetails = response.data.user;
    this.userDivision = response.data.user.division;
    this.userPosition = response.data.user.position;
    this.userDesignation = response.data.user.userdesignation;
    console.log(this.userDetails);
  },
};
</script>
