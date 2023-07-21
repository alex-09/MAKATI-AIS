<template>
  <div class="flex justify-between bg-dashboardBtn3 px-6 ">
    <div class="flex items-center gap-x-[8px]">
      <img src="/assets/Makati_City.png" alt="icon" style="height: 30px; width: 30px;">
      <RouterLink :to="{ name: 'Budget Management' }" class="font-bold font-Inter sm:px-5 text-base">Budgetary Account Transaction</RouterLink> 
    </div>
    <div class="flex items-center gap-x-4">
      <!--notif-->
      <div class="relative">
        <img src="../icons/Menu/notif.svg" alt="notif">
        <svg class="absolute top-[2px] right-0" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="5.97437" cy="5.98077" r="4.5" fill="#FF4C51" stroke="#F4F5FA" stroke-width="1.5" />
        </svg>
      </div>
     <!---->
      <Menu as="div" class="relative inline-block text-left">
          <MenuButton class=" inline-flex flex-1 w-full items-center gap-x-3 rounded-md py-2 text-sm font-semibold text-black">
            <img src="../icons/Menu/avatar.svg" class=" cursor-pointer">
            <span>{{ userDetails.firstname }} {{ userDetails.surname }}</span>
          </MenuButton>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
          <MenuItems class="absolute right-0  z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <div class="py-1">
              <MenuItem v-slot="{ active }">
                <div @click="logout(this.email)" :class="[active ? 'bg-dashboardBtn3 text-gray-900 cursor-pointer' : 'text-gray-700', 'block px-4 py-2 text-sm cursor-pointer']">Logout</div>
              </MenuItem>
            </div>
          </MenuItems>
        </transition>
      </Menu>

    </div>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
const props = defineProps({
pagetitle: String
})
</script>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      userRole: "",
      userDetails: "",
      email: "",
    }
  },
  mounted() {
    this.userRole = this.$route.params.userRole;
  },
  methods: {
    async logout() {
      try {
        await axios.post('makati/logout', { email: this.email });

        // Remove the token from local storage
        localStorage.removeItem("token");

        this.$router.push("/");
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
        });
      }
    }
  },
  async created() {
    const response = await axios.get('me');

    this.userDetails = response.data.user;
    this.email = response.data.user.email;
    console.log(response.data.user);
  }
}
</script>