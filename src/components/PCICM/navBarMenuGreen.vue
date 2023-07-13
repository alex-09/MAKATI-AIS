<template>
  <div
    class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg"
  >
    <div class="flex items-center text-[#05C64B] p-2 h-64">
      <button @click.prevent="onBackClick()" class="flex-none w-30 h-30">
        <img src="../../../public/assets/Go_Back_Green.png" class="w-6 h-6" alt="Go Back"/>
      </button>
      <h1 class="flex text-2xl capetalize px-1">
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
