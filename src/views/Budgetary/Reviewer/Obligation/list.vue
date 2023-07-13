<script>
import HeaderBar from '../../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../../components/budgetComponent/Reviewer/menuBar.vue';
import Content from '../../../../components/budgetComponent/Reviewer/Obligation/list.vue';

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
    <Content />
</template>