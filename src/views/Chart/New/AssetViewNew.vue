<template>
    <div v-if="!loaded" class="flex justify-center items-center h-[100vh]">
      <!-- Spinner component or loading animation -->
      <div class="animate-spin rounded-full h-[100px] w-[100px] border-[10px] border-t-[10px] border-primary-color border-t-white"></div>
    </div>
    <div v-else>
        <HeaderMenu v-if="loaded"/>
        <MainContent v-if="loaded"/>
    </div>
</template>

<script>

import HeaderMenu from '../../../components/navigationComponent/chartNav/headerComponent.vue'
import MainContent from '../../../components/chartComponent/new/assetView.vue'

export default {
    components: {
        HeaderMenu,
        MainContent,
    },
    data() {
        return {
            loaded : false
        }
    },
    mounted() {
        // Simulate data fetching or time-consuming operation
        setTimeout(() => {
        this.loaded = true; // Set loading to false when data is ready
        }, 3000);
    }
}
</script>
