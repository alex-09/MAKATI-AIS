<script>
    import NavBar from '../../../../components/navigationComponent/documentNav/navbarComponent.vue'
    import HeaderMenu from '../../../../components/navigationComponent/documentNav/headerComponent.vue'
    import ContractsView from '../../../../components/documentComponent/incoming/contracts/userRoles/receivingClerkView.vue';

    export default {
        components: {
            NavBar,
            HeaderMenu,
            ContractsView
        }
    }
</script>
<template>
    <HeaderMenu />
    <NavBar />
    <ContractsView />
</template>