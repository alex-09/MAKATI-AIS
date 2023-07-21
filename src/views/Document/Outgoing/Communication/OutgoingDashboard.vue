<template>
    <HeaderMenu />
    <NavBar />
    <MainContent />
</template>
<script>
    import NavBar from "../../../../components/navigationComponent/documentNav/navbarComponentOutgoing.vue";
    import HeaderMenu from "../../../../components/navigationComponent/documentNav/headerComponent.vue";
    import MainContent from '../../../../components/documentComponent/outgoing/communication/createComponent/cafoaView.vue'

    export default {
        components: {
            HeaderMenu,
            NavBar,
            MainContent,
        }
    }
</script>