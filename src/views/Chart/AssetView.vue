<template>
    <HeaderMenu />
    <MainContent/>
</template>

<script>
import axios from 'axios';
import { ref, computed, watch } from 'vue';

import HeaderMenu from '../../components/navigationComponent/chartNav/headerComponent.vue'
import MainContent from '../../components/chartComponent/assetView.vue'

export default {
    components: {
        HeaderMenu,
        MainContent,
    },
}
</script>