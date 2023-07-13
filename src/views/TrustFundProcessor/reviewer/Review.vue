<template>
    <HeaderBar />
    <MenuBar />

    <Donation :tft="tft" :tf="tf" :str="str" v-if="str === 'Donation from Private Sector'" />
    <Transfer :tft="tft" :tf="tf" :str="str" v-if="str === 'Transfer from Other Government Agencies'" />
    <Unexpended :tft="tft" :tf="tf" :str="str" v-if="str === 'Unexpended Balance of LDRRMF'" />
    <LGU :tft="tft" :tf="tf" :str="str" v-if="str === 'LGU Counterpart Contribution for Specific Projects'" />
    

</template>

<script>
import HeaderBar from '../../../components/TRComponents/headerComponent/HeaderComponent.vue';
import MenuBar from '../../../components/TRComponents/navComponents/ReviewerNav.vue';
import Donation from '../../../components/TRComponents/Reviewer&CA/donation.vue';
import Transfer from '../../../components/TRComponents/Reviewer&CA/transfer.vue';
import Unexpended from '../../../components/TRComponents/Reviewer&CA/unexpended.vue';
import LGU from '../../../components/TRComponents/Reviewer&CA/LGU.vue';

import { useRoute } from 'vue-router';

    export default {
        components: {
            HeaderBar,
            MenuBar,
            Donation,
            Transfer,
            Unexpended,
            LGU
        },
        data() {
            return {
                tft: null,
                tf: null,
                str: null
            };
        },
        mounted() {
            this.tft = this.$route.query.tft;
            this.tf = this.$route.query.tf;
            this.str = this.$route.query.str;

            console.log('Received data:', this.tft, this.tf, this.str);
            // Do something with the received data
        }
    }
</script>