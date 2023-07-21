<script>
    import HeaderBar from '../../../components/TRComponents/headerComponent/HeaderComponent.vue';
    import MenuBar from '../../../components/budgetComponent/Approver&CA/menuBar.vue';
    import Content from '../../../components/budgetComponent/dashboardView.vue';

    export default {
        components: {
            HeaderBar,
            MenuBar,
            Content
        }
    }
</script>

<template>
    <HeaderBar />
    <MenuBar />
    <Content class="mt-[30px]"/>
</template>