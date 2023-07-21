<template>
  <HeaderMenu />
  <div v-if="userDetails === 'City Accountant'">
    <CAContent />
  </div>
  <div v-if="userDetails === 'Approver'">
    <ApproverContent />
  </div>
  <div v-if="userDetails === 'Receiving Clerk'">
    <SampleNav />
    <div class="container font-Inter mt-4">
      <div class="mx-4">
        <RouterLink :to="{ name: 'Document PayeeEnrollment' }"></RouterLink>

        <div class="container grid px-0 mt-5 mb-10 ml-5">
          <div class="grid grid-cols-2 gap-8 xxxxl:gap-80"></div>
          <div class="items-justify-end">
            <p class="font-bold text-2xl ml-20">
              New Client
            </p>
          </div>
        </div>

        <!--Checkboxes-->
        <div class="flex justify-center gap-32 mt-4">
          <label
            v-for="(option, index) in options"
            :key="index"
            class="inline-flex items-center"
          >
            <input
              type="radio"
              class="form-checkbox h-30 w-30 text-black-600"
              :value="option.value"
              v-model="selectedOption"
            />
            <span class="ml-2 text-gray-700">{{ option.label }} </span>
          </label>
        </div>

        <!--Details-->
        <div class="mt-4">
          <component
            v-if="selectedOption"
            :is="selectedOption"
            class="w-full h-screen"
          ></component>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import CAContent from  '../../../components/documentComponent/PayeeEnrollment/userRoles/accountantView.vue'
import ApproverContent from  '../../../components/documentComponent/PayeeEnrollment/userRoles/approverView.vue'

import HeaderMenu from "../../../components/navigationComponent/documentNav/headerComponent.vue";
import SampleNav from "../../../components/documentComponent/PayeeEnrollment/Index.vue";
import Textbox from "../../../components/documentComponent/PayeeEnrollment/textbox.vue";
import Dropdown from "../../../components/documentComponent/PayeeEnrollment/dropdown.vue";
import individual from "../PayeeEnrollment/individual.vue";
import gov from "../PayeeEnrollment/governmentagency.vue";
import check from "../../../assets/PayeeEnrollment/style.css";
import soleprop from "../PayeeEnrollment/soleproprietorship.vue";
import partner from "../PayeeEnrollment/partnership.vue";
import corp from "../PayeeEnrollment/corporation.vue";
import coop from "../PayeeEnrollment/cooperative.vue";
import SearchIcon from "../../../components/documentComponent/PayeeEnrollment/searchIcon.vue";

export default {
  components: {
    Textbox,
    Dropdown,
    HeaderMenu,
    SampleNav,
    individual,
    gov,
    check,
    soleprop,
    partner,
    corp,
    coop,
    SearchIcon,

    CAContent,
    ApproverContent
  },

  data() {
    return {
      //Business:[ 'Sole Propietorship',  'Partnership', 'Corporation',   'Cooperation' ],
      userDetails: '',

      selectedOption: "",
      //option1: 'individual',
      options: [
        {
          label: "Individual",
          value: "individual",
        },
        {
          label: "Sole Propietorship",
          value: "soleprop",
        },
        {
          label: "Partnership",
          value: "partner",
        },
        {
          label: "Corporation",
          value: "corp",
        },
        {
          label: "Cooperative",
          value: "coop",
        },
        {
          label: "Govenment Agency",
          value: "gov",
        },
      ],
      //option3: 'government-agency'
      //isVisible: false,
    };
  },
  async created() {
    const response = await axios.get('me');

    this.userDetails = response.data.user.userdesignation
  }
};
</script>
