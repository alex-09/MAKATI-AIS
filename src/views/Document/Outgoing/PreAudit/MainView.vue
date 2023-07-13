<script>
import NavBar from "../../../../components/navigationComponent/documentNav/navbarComponentOutgoing.vue";
import HeaderMenu from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
import Tabs from "../../../../components/documentComponent/outgoing/preAudit/preAuditView.vue";

export default {
  components: {
    NavBar,
    HeaderMenu,
    Tabs,
  },
};
</script>
<template>
  <HeaderMenu />
  <NavBar />
  <Tabs />
</template>
