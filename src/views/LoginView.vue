<template>
    <div class="min-h-screen bg-main-background bg-cover bg-center">
        <div class="min-h-screen bg-second-background bg-contain bg-right bg-no-repeat">
            <Loading v-if="isLoading" />
            <!-- HEADER COMPONENT -->
            <HeaderLog v-if="!isLoading" />
            <!-- LOGIN DETAILS -->
            <div class="mx-40 mt-4" v-if="!isLoading">
                <p class="font-extrabold text-2xl text-primary-color py-2">Welcome!</p>
                <p class="font-normal text-2xl text-primary-color">Please login your account</p>
            </div>
            <!-- LOGIN INPUT FIELDS -->
            <InputLogin v-if="!isLoading"/> 
            <div class="mx-8 mt-64 1536:mt-16 xxxxl:mt-72" v-if="!isLoading">
                <span class="text-base font-bold tracking-wider text-primary-color">2023-D-SRPM-FAAS</span>
            </div>
        </div>
    </div>
</template>

<script>

import InputLogin from '../components/loginComponent/InputFields.vue';
import HeaderLog from '../components/loginComponent/Header.vue';
import Loading from '../components/spinner.vue';

export default {
    components: {
        InputLogin,
        HeaderLog,
        Loading,
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