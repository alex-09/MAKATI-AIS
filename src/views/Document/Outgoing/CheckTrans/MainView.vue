<script>
import NavBar from "../../../../components/navigationComponent/documentNav/navbarComponentOutgoing.vue";
import HeaderMenu from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
import CheckView from "../../../../components/documentComponent/outgoing/checkTrans/checkTransView.vue";

export default {
  components: {
    NavBar,
    HeaderMenu,
    CheckView,
  },
};
</script>
<template>
  <HeaderMenu />
  <NavBar />
  <CheckView />
</template>
