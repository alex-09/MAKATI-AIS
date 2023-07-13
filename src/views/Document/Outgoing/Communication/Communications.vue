<script>
import NavBar from "../../../../components/navigationComponent/documentNav/navbarComponentOutgoing.vue";
import HeaderMenu from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
import MainContent from '../../../../components/documentComponent/outgoing/communication/createComponent/cafoaView.vue'

export default {
  components: {
    NavBar,
    HeaderMenu,
    MainContent,
  },
};
</script>
<template>
  <HeaderMenu />
  <NavBar />
  <MainContent />
</template>
