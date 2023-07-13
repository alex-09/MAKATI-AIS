<template>
    <HeaderBar />
    <MenuBar />

    <Content :id="id" />
    

</template>

<script>
import HeaderBar from '../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../components/TRComponents/navComponents/ReviewerNav.vue';
import Content from '../../../components/TRComponents/Reviewer&CA/FURS.vue';

import { useRoute } from 'vue-router';

    export default {
        components: {
            HeaderBar,
            MenuBar,
            Content,
        },
        data() {
            return {
                id: null,
            };
        },
        mounted() {
            this.id = this.$route.query.id;

            console.log('Received data:', this.id);
            // Do something with the received data
        }
    }
</script>