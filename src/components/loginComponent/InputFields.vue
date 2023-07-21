<script>
import UserIcon from "../icons/Login/UserIcon.vue";
import LockIcon from "../icons/Login/PassIcon.vue";

import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    UserIcon,
    LockIcon,
  },
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await axios.post("makati/login", {
          email: this.email,
          password: this.password,
        });

        localStorage.setItem("token", response.data.token);
        axios.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${response.data.token}`;

        Swal.fire({
          icon: "success",
          title: "Login Successful!",
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
          this.$router.push("/MainMenu");
        });
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "Login Failed!",
          text: error.response.data.message,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
    // async submitForm() {
    //   try {
    //     const response = await axios.post("makati/login", {
    //         email: this.email,
    //         password: this.password,
    //       })
    //       .then(
    //         (response) => {
    //           Swal.fire({
    //             icon: "success",
    //             title: "Login Successful!",
    //             text: response.message,
    //             showConfirmButton: false,
    //             timer: 1500,
    //           }).then(() => {
    //             //adding differnt user roles
    //             const userToken = response.data.user.email;
    //             const email = response.data.user.email;

    //             this.$router.push({ name: "MainMenu", params: { userToken } });

    //             // const userAccount = response.data;
    //             // localStorage.setItem("isAdmin", response.isAdmin);
    //             // this.$router.push("/MainMenu");
    //             console.log(response.data.user.token);
    //           });
    //         },
    //         (error) => {
    //           Swal.fire({
    //             icon: "error",
    //             title: "Login Error",
    //             text: "Invalid Email or Password",
    //             showConfirmButton: false,
    //             timer: 1500,
    //           });
    //         }
    //       );
    //     console.log(response.data);
    //   } catch (error) {
    //     Swal.fire({
    //       icon: "error",
    //       title: "Login Failed!",
    //       text: error.response.data.message,
    //       showConfirmButton: false,
    //       timer: 1500,
    //     });
    //   }
    // },
  },
};
</script>

<template>
  <form @submit.prevent="submitForm">
    <div class="mx-40 mt-8">
      <label class="relative block InputFields my-5">
        <input
          type="email"
          class="form-input rounded-full border border-none py-3 px-4 bg-white appearance-none block p-8 focus:outline-none"
          placeholder="Email Address"
          v-model="email"
        />
        <UserIcon
          class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-5"
        />
      </label>
      <label class="relative block InputFields my-5">
        <input
          type="password"
          class="form-input rounded-full border border-none py-3 px-4 bg-white appearance-none block p-8 focus:outline-none"
          placeholder="Password"
          v-model="password"
        />
        <LockIcon
          class="w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-5"
        />
      </label>
    </div>
    <div class="mx-40 mt-10 w-98 flex justify-between items-end">
      <button
        type="submit"
        id="loginBtn"
        class="rounded-full bg-dark-blue text-2xl text-white font-bold capitalize px-3.5 py-2.5 w-48"
      >
        Login
      </button>
      <!-- WALA PANG UI UX ABOUT FORGOT PASSWORD -->
      <RouterLink :to="{ name: '404 Not Found' }">
        <span class="text-2xl text-light-blue capitalize underline"
          >Forgot password?</span
        >
      </RouterLink>
    </div>
  </form>
</template>
<style>
@import "sweetalert2/dist/sweetalert2.min.css";
</style>
