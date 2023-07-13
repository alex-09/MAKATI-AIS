<script>
import HeaderBar from '../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../components/TRComponents/navComponents/ReviewerNav.vue';
import Content from '../../../components/TRComponents/ListofTRComponents/ReviewerApproveProcess.vue';

    export default {
        components: {
            HeaderBar,
            MenuBar,
            Content,
        }
    }
</script>

<template>
    <HeaderBar />
    <MenuBar />
    <Content />
</template>