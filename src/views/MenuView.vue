<template>
    <div class="min-h-screen bg-main-background bg-cover bg-center">
        <div class="min-h-screen bg-third-background bg-45% bg-left-bottom bg-no-repeat lg:bg-none">
            <!-- HEADER COMPONENT -->
            <HeaderRow />
            <div class="container">
                <div class="flex justify-between">
                    <!-- USER DETAIL COMPONENT -->
                    <UserDetail />
                    <MenuButton />
                </div>
            </div>
            <div class="mx-8 1536:mt-0 xxxxl:mt-[50px]">
                <span class="text-base font-bold tracking-wider text-primary-color">2023-D-SRPM-FAAS</span>
            </div>
        </div>
    </div>
    <!-- <Loading v-if="isLoading" /> -->
</template>

<style>
    .spinner-container {
        position: absolute;
        z-index: 9999; /* Adjust the z-index value as needed */
    }
</style>

<script>

import HeaderRow from '../components/menuComponent/HeaderMenu.vue';
import UserDetail from '../components/menuComponent/Welcome.vue';
import MenuButton from '../components/menuComponent/MenuButton.vue';
import Loading from '../components/spinner.vue';

export default {
    components: {
        HeaderRow,
        UserDetail,
        MenuButton,
        Loading
    },
    data() {
        return {
            isLoading: false,
        }
    },
    mounted() {
        this.isLoading = true;

        setTimeout(() => {
            this.isLoading = false;
        }, 2000);
    }
}
</script>