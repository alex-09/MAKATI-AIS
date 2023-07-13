<script>
    import NavBar from '../../../../components/navigationComponent/documentNav/navbarComponent.vue'
    import HeaderMenu from '../../../../components/navigationComponent/documentNav/headerComponent.vue'
    import PaymentView from '../../../../components/documentComponent/incoming/paymentTrans/mainView.vue';

    export default {
        components: {
            NavBar,
            HeaderMenu,
            PaymentView
        }
    }
</script>
<template>
    <HeaderMenu />
    <NavBar />
    <PaymentView />
</template>