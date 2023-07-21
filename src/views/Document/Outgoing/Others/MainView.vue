<script>
import NavBar from "../../../../components/navigationComponent/documentNav/navbarComponentOutgoing.vue";
import HeaderMenu from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
import OtherView from "../../../../components/documentComponent/outgoing/more/others/othersView.vue";

export default {
  components: {
    NavBar,
    HeaderMenu,
    OtherView,
  },
};
</script>
<template>
  <HeaderMenu />
  <NavBar />
  <OtherView />
</template>
