<script>
import NavBar from "../../../components/navigationComponent/navbarComponent.vue";
import HeaderMenu from "../../../components/navigationComponent/headerComponent.vue";
import Content from "../../../components/budgetComponent/obligationComponent/details.vue";
    export default {
        components: {
            NavBar,
            HeaderMenu,
            Content
        }
    }
</script>

<template>
    <HeaderMenu />
    <NavBar />
    <Content />
</template>
