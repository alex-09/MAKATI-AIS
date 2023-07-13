<template>
    <div class="px-2 grid gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg">
        <div class="flex flex-row items-center">
            <button @click.prevent="onBackClick()"><img src="../../../../public/assets/go_back_2.png" alt=""></button>
            <h1 class="text-2xl capetalize px-2 mb-5 mt-5 ml-2 text-other-gray-100">Payee Enrollment</h1>
        </div>            
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { RouterLink } from 'vue-router'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'


export default {
    methods: {
        onBackClick() {
            this.$router.go(-1);
        },
    },
    components: {
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        RouterLink,
    },
    data() {
        return {
        isOpen: false,
        }
    },
};
</script>