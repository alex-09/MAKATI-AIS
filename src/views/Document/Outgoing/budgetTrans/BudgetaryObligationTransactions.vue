<script>
import NavBar from "../../../../components/navigationComponent/documentNav/navbarComponentOutgoing.vue";
import HeaderMenu from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
import tabs from "../../../../components/documentComponent/outgoing/communication/createComponent/mainView.vue";

export default {
  components: {
    NavBar,
    HeaderMenu,
    tabs,
  },
};
</script>
<template>
  <HeaderMenu />
  <NavBar />
  <tabs />
</template>
