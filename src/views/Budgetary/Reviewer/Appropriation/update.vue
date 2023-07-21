<template>
    <div>
        <HeaderBar />
        <MenuBar />
        <Content :id="id" :aipcode="aipcode" />
    </div>
</template>
  
<script>
    import HeaderBar from '../../../../components/TRComponents/headerComponent/HeaderComponent.vue';
    import MenuBar from '../../../../components/budgetComponent/Reviewer/menuBar.vue';
    import Content from '../../../../components/budgetComponent/Reviewer/Appropriation/detailsUpdate.vue';

    import axios from 'axios';
    
    export default {
        components: {
            HeaderBar,
            MenuBar,
            Content
        },
        data() {
            return {
                id: '',
                aipcode: '',
            };
        },
        async mounted() {
            this.id = this.$route.query.id;
            this.aipcode = this.$route.query.aipcode;
        
            console.log('Received data:', this.id, this.aipcode);
            // Do something with the received data
        }
    }
</script>
  