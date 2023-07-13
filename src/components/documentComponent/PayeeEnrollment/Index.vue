<template>
    <!-- Recieving Clerk Menu -->
    <div v-if="userDetails === 'Approver' && 'City Accountant'">
        <div class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg h-[64px]">
            <div class="flex flex-row items-center text-secondBtn w-[500px]">
                <button @click.prevent="onBackClick()"><img src="../../../../public/assets/go_back_2.png" alt=""></button>
                <h1 class="text-2xl capetalize px-2">Payee Enrollment</h1>
            </div>

            <div class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black ml-8" :class="{'bg-none': !['/Document-PayeeEnrollment'].includes($route.path), 'bg-secondBtn text-black': ['/Document-PayeeEnrollment'].includes($route.path) }">
                <Menu as="div" class="relative text-left" >
                    <MenuButton class="p-3">
                        <RouterLink :to="{ name: 'Document PayeeEnrollment' }"> List of Payee</RouterLink>
                    </MenuButton>
                </Menu>
            </div>
            

            <div class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black" :class="{'bg-none': !['/Document-PayeeEnrollment-Approved'].includes($route.path), 'bg-secondBtn text-black': ['/Document-PayeeEnrollment-Approved'].includes($route.path) }">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        <RouterLink :to="{ name: 'Document PayeeEnrollment List Approved' }"> List of Approved </RouterLink>
                    </MenuButton>
                </Menu>
            </div>
        </div>
    </div>
    <div v-if="userDetails === 'Receiving Clerk'">
        <div class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg h-[64px]">
            <div class="flex flex-row items-center text-secondBtn w-[500px]">
                <button @click.prevent="onBackClick()"><img src="../../../../public/assets/go_back_2.png" alt=""></button>
                <h1 class="text-2xl capetalize px-2">Payee Enrollment</h1>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { RouterLink } from 'vue-router'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import axios from "axios";

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
            userRole: "",
            userDetails: '',

        }
    },
    mounted() {
        this.userRole = this.$route.params.userRole;
    },
    async created() {
      const response = await axios.get('me');

      this.userDetails = response.data.user.userdesignation
    }
};
</script>