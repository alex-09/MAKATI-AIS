<template>
  <div
    class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg"
  >
    <div class="flex items-center text-gray p-2 h-64">
      <button @click.prevent="onBackClick()" class="flex-none w-30 h-30 pr-[4px]">
        <!-- <img src="../../../public/assets/Go_Back_Green.png" class="w-6 h-6 " alt="Go Back"/> -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="#A1A2A3" viewBox="0 0 24 24" stroke-width="2" stroke="#606060" class="w-6 h-6">
          <path stroke-linecap="square" stroke-linejoin="butt" d="M10.5 19.5L3 12m0 0l7.5-7.5M4 12h15" />
        </svg>
      </button>
      <h1 class="flex text-2xl capetalize px-2">
        Contracts/P.O
      </h1>
    </div>
    
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { RouterLink } from "vue-router";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import axios from "axios";

export default {
  methods: {
    onBackClick() {
      this.$router.go(-1);
    },
  },
  components: {},
  data() {
    return {
      isOpen: false,
      userRole: "",
      userDetails: "",
    };
  },
  mounted() {
    this.userRole = this.$route.params.userRole;
  },
  async created() {
    const response = await axios.get("me");

    this.userDetails = response.data.user.userdesignation;
  },
};
</script>
