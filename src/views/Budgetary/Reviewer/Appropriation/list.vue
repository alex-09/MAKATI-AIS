<script>
import HeaderBar from '../../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../../components/budgetComponent/Reviewer/menuBar.vue';
import MenuBarDHCA from '../../../../components/budgetComponent/Approver&CA/menuBar.vue';
import Content from '../../../../components/budgetComponent/Reviewer/Appropriation/list.vue';

import axios from 'axios';

export default {
    components: {
        HeaderBar,
        MenuBar,
        MenuBarDHCA,
        Content,
    },
    data() {
        return {
            userDesignation: "",
        };
    },
    async created() {
        const response = await axios.get("me");

        this.userDesignation = response.data.user.userdesignation;
    },
}
</script>
<template>
    <HeaderBar />
    <MenuBar v-if="this.userDesignation == 'Reviewer'" />
    <MenuBarDHCA v-if="this.userDesignation == 'Approver' || this.userDesignation == 'City Accountant' || this.userDesignation == 'Assistant Department Head froFRS'"/>
    <Content />
</template>