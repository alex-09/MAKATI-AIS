<script>
    import NavBar from '../../../../components/navigationComponent/documentNav/navbarComponent.vue'
    import HeaderMenu from '../../../../components/navigationComponent/documentNav/headerComponent.vue'
    import CheckView from '../../../../components/documentComponent/incoming/checkTrans/mainView.vue';

    export default {
        components: {
            NavBar,
            HeaderMenu,
            CheckView
        }
    }
</script>
<template>
    <HeaderMenu />
    <NavBar />
    <CheckView />
</template>