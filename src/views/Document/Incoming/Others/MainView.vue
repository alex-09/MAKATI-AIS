<script>
    import NavBar from '../../../../components/navigationComponent/documentNav/navbarComponent.vue'
    import HeaderMenu from '../../../../components/navigationComponent/documentNav/headerComponent.vue'
    import OtherView from '../../../../components/documentComponent/incoming/more/others/mainView.vue';

    export default {
        components: {
            NavBar,
            HeaderMenu,
            OtherView
        }
    }
</script>
<template>
    <HeaderMenu />
    <NavBar />
    <OtherView />
</template>