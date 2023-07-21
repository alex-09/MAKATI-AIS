<template>
    <div v-if="loading" class="flex justify-center items-center h-[100vh]">
      <!-- Spinner component or loading animation -->
      <div class="animate-spin rounded-full h-[100px] w-[100px] border-[10px] border-t-[10px] border-primary-color border-t-white"></div>
    </div>
    <div v-else>
        <HeaderMenu />
        <MainContent/>
    </div>
</template>

<script>

import HeaderMenu from '../../../components/navigationComponent/chartNav/headerComponent.vue'
import MainContent from '../../../components/chartComponent/new/expenseView.vue'

export default {
    components: {
        HeaderMenu,
        MainContent,
    },
    data() {
        return {
            loading: true
        }
    },
    mounted() {
        // Simulate data fetching or time-consuming operation
        setTimeout(() => {
        this.loading = false; // Set loading to false when data is ready
        }, 2000);
    }
}
</script>