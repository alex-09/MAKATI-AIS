<template>
  <div
    class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg"
  >
    <div class="flex flex-row items-center text-secondBtn">
      <button @click.prevent="onBackClick()">
        <img src="../../../public/assets/Go_Back.png" alt="" />
      </button>
      <h1 class="text-2xl capetalize px-1">Contracts/P.O</h1>
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