<script>
    import NavBar from '../../../../components/navigationComponent/documentNav/navbarComponent.vue'
    import HeaderMenu from '../../../../components/navigationComponent/documentNav/headerComponent.vue'
    import PreAuditView from '../../../../components/documentComponent/incoming/preAudit/mainView.vue';

    export default {
        components: {
            NavBar,
            HeaderMenu,
            PreAuditView
        }
    }
</script>
<template>
    <HeaderMenu />
    <NavBar />
    <PreAuditView />
</template>