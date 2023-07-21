<template>
  <header>
    <nav
      class="container flex flex-col items-center gap-4 text-black py-4 lg:flex-row"
    >
      <div class="flex xxxl:ml-5">
        <img src="/assets/Makati_City.png" alt="" class="logoImgMenu" />
      </div>
      <div class="flex items-center gap-1 flex-1 pl-2">
        <p class="text-4xl font-extrabold capitalize">
          accounting information system
        </p>
      </div>
      <div class="flex justify-end xxxl:mr-5">
        <!-- NOTIFICATION SVG -->
        <NotificationIcon class="mx-3" />
        <!-- PROFILE PIC SVG -->
        <img src="/assets/profile_2.svg" class="mx-3 cursor-pointer">
        <!-- TEMPORARY DROPDOWN MENU FOR USER -->
        <div class="flex items-center mx-3 cursor-pointer" @click="showDrop = !showDrop">
          <span>{{ userDetails.firstname }} {{ userDetails.surname }}</span>
            <img src="/assets/drop.svg" class="mx-3 cursor-pointer">
        </div>
        <div 
            v-if="showDrop" 
            class="absolute w-[150px] h-[50px] shadow-lg rounded bg-white top-24 py-4 px-2">
            <div
                class="text-center text-base font-semibold text-primary-color hover:bg-primary-color hover:text-white rounded cursor-pointer"
                @click="logout(this.email)">
                Logout
            </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import NotificationIcon from "../icons/Menu/NotificationIcon.vue";
import axios from "axios";
import Swal from "sweetalert2";

import { mapGetters } from 'vuex';

export default {
    components: {
        NotificationIcon,
    },
    data() {
        return {
            showDrop: false,
            userDetails: '',
            email: ''
        };
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

};
</script>
