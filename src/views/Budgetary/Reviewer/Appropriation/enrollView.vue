<script>
import HeaderBar from "../../../../components/TRComponents/headerComponent/HeaderComponent.vue";
import MenuBar from "../../../../components/budgetComponent/Reviewer/menuBar.vue";
import Content from "../../../../components/budgetComponent/Reviewer/Appropriation/enrollDashboard.vue";
import ContentDH from "../../../../components/budgetComponent/Approver&CA/Appropriation/enrollDashboard.vue";
import ContentCA from "../../../../components/budgetComponent/Approver&CA/Appropriation/enrollDashboardCA.vue";

import axios from "axios";

export default {
  components: {
    HeaderBar,
    MenuBar,
    Content,
    ContentDH,
    ContentCA,
  },
  data() {
    return {
      userDesignation: "",
    };
  },
  async created() {
    const response = await axios.get("me");

    this.userDesignation = response.data.user.userdesignation;
  },
};
</script>

<template>
  <HeaderBar />
  <MenuBar />
  <Content v-if="this.userDesignation == 'Reviewer'" />
  <ContentDH v-if="this.userDesignation == 'Approver'" />
  <ContentCA
    v-if="
      this.userDesignation == 'City Accountant' ||
      this.userDesignation == 'Assistant Department Head froFRS'
    "
  />
</template>
