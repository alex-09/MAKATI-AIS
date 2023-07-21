<script>
    import NavBar from '../../../../components/navigationComponent/documentNav/processorNav.vue'
    import HeaderMenu from '../../../../components/navigationComponent/documentNav/processComponent.vue'
    import ContractsView from '../../../../components/documentComponent/incoming/contracts/mainView.vue';

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