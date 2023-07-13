<script>
import HeaderBar from '../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../components/TRComponents/navComponents/ReviewerNav.vue';
import Content from '../../../components/TRComponents/ListofTRComponents/ReviewerListTRProcess.vue';
import ContentDH from '../../../components/TRComponents/ListofTRComponents/ApproverListTRProcess.vue';
import ContentCA from '../../../components/TRComponents/ListofTRComponents/CAListTRProcess.vue';

import axios from "axios";

    export default {
        components: {
            HeaderBar,
            MenuBar,
            Content,
            ContentDH,
            ContentCA
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
    <MenuBar />

    <Content v-if="this.userDesignation == 'Reviewer'"/>
    <ContentDH v-if="this.userDesignation == 'Approver'"/>
    <ContentCA v-if="this.userDesignation == 'City Accountant' || this.userDesignation == 'Assistant Department Head froFRS'"/>
</template>