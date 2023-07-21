<template>
  <HeaderMenu />
  <NavBar />
  <div v-if="userDetails === 'City Accountant'">
    <AccountantContent />
  </div>
  <div v-else-if="userDetails === 'Receiver'">
    <ReviewerContent />
  </div>
  <div v-else-if="userDetails === 'Approver'">
    <ApproverContent />
  </div>
  <!-- Reviewer -->
  <div v-else-if="userDetails === 'Receiving Clerk'">
    <ReceivingContent
      :TabItems="[
        'NEW TRANSACTIONS',
        'PREVIOUS TRANSACTIONS',
        'PRINT RECEIVING RECEIPT',
      ]"
    />
  </div>
</template>

<script>
import NavBar from "../../../components/navigationComponent/documentNav/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/documentNav/headerComponent.vue";
import ReceivingContent from "../../../components/documentComponent/incoming/budgetTransComponent/Tabs.vue";
import AccountantContent from "../../../components/documentComponent/incoming/communication/userRoles/accountantView.vue";
import ApproverContent from "../../../components/documentComponent/incoming/communication/userRoles/asstHeadView.vue";

import axios from "axios";

export default {
  components: {
    NavBar,
    HeaderMenu,
    ReceivingContent,
    AccountantContent,
    ApproverContent,
  },
  data() {
    return {
      userRole: "",
      userDetails: "",
    };
  },
  async created() {
    const response = await axios.get("me");

    this.userDetails = response.data.user.userdesignation;
  },
};
</script>
