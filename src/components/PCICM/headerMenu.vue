<template>
  <header class="top-0 bg-secondBtn">
    <nav class="flex flex-col sm:flex-row items-center text-black">
      <div class="flex items-center sm:py-4 sm:px-4">
        <img
          src="/assets/Makati_City.png"
          alt=""
          class="logoImgMenu w-30 h-30"
        />
        <RouterLink
          :to="{ name: 'Document' }"
          class="font-bold font-Inter sm:px-5 text-base"
          >Processing Of Claims And Internal Control Management</RouterLink
        >
      </div>

      <div class="flex flex-1 sm:justify-end sm:px-9">
        <img src="/assets/Notifbell.svg" class="cursor-pointer sm:px-3" />

        <Menu as="div" class="relative inline-block text-left">
          <div class="">
            <MenuButton
              class="inline-flex flex-1 w-full items-center gap-x-1.5 rounded-md py-2 text-sm font-semibold text-black"
            >
              <img src="/assets/profile_2.svg" class="cursor-pointer" />
              <span>{{ userDetails.firstname }} {{ userDetails.surname }}</span>
            </MenuButton>
          </div>

          <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
          >
            <MenuItems
              class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <div
                    @click="logout(this.email)"
                    :class="[
                      active ? 'bg-secondBtn text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                  >
                    Logout
                  </div>
                </MenuItem>
              </div>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </nav>
  </header>
</template>

<script>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import axios from "axios";

export default {
  components: {
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
  },
  data() {
    return {
      userRole: "",
      userDetails: "",
      email: "",
    };
  },
  mounted() {
    this.userRole = this.$route.params.userRole;
  },
  methods: {
    async logout() {
      try {
        await axios.post("makati/logout", { email: this.email });

        // Remove the token from local storage
        localStorage.removeItem("token");

        this.$router.push("/");
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
        });
      }
    },
  },
  async created() {
    const response = await axios.get("me");

    this.userDetails = response.data.user;
    this.email = response.data.user.email;
    console.log(response.data.user);
  },
};
</script>
