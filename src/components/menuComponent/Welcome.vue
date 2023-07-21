<template>
  <div class="flex flex-col mx-5">
    <div
      class="text-dark-blue-300 font-extrabold text-5xl xxxl:text-6xl mt-[50px]"
    >
      <!-- EDIT THE SPAN FOR THE NAME OF THE USER -->

      <p>
        Welcome
        <span>{{ userDetails.firstname }}</span
        >!
      </p>
    </div>
    <div class="capitalize text-2xl font-normal xxxl:text-3xl">
      <!-- SAMPLE DATE AND TIME -->
      <span>{{ currentDate }} | {{ currentTime }}</span>
      <!-- <span>{{ timestamp }}</span> -->
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      currentTime: "",
      currentDate: "",

      userDetails: "",
    };
  },
  mounted() {
    setInterval(() => {
      const time = new Date();
      // IF NEED DIN YUNG SECOND DAGDAG LANG TO - second: 'numeric'
      this.currentTime = time.toLocaleString("en-US", {
        hour: "numeric",
        minute: "numeric",
        hour12: true,
      });
    }, 1000);

    const date = new Date();
    const options = { year: "numeric", month: "long", day: "numeric" };
    this.currentDate = date.toLocaleDateString("en-US", options);

    // axios.get(`makati/getUser?email=${this.$route.params.userToken}`)
    //   .then(response => {
    //       const userName = response.data.user.firstname;
    //       const positon = response.data.user.position;

    //       this.userName = response.data.user.firstname;

    //         console.log(response.data.user.firstname);
    //     })
    //     .catch(error => {
    //         console.log(error);
    //     });
  },
  async created() {
    const response = await axios.get("me");

    this.userDetails = response.data.user;
  },
  // computed: {
  //   ...mapGetters(['userDetails'])
  // }
};
</script>
