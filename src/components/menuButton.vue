<script>
import { defineComponent } from 'vue';

export default defineComponent ({
    data() {
        return {
            isShow: false
        };
    },
    methods: {
        showMenu() {
            this.isShow = !this.isShow;
        }
    },
})
</script>
<template>
    <div class="flex flex-row gap-8 float-left m-4">
        <div @click="showMenu" class="font-inter capitalize font-semibold cursor-pointer text-white">
            menu
        </div>
        <div class="font-inter capitalize font-semibold cursor-pointer text-white">
            back
        </div>
        <div v-if="isShow" class="z-20 top-2.5 absolute mt-10 max-h-90 w-[230px] text-center bg-white py-8 text-sm shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
            <div class="font-inter capitalize text-sm font-normal text-[#009933] py-4 hover:font-bold hover:bg-[#5bca93]">
                My Information
            </div>
            <div class="font-inter capitalize text-sm font-normal text-[#009933] py-4 hover:font-bold hover:bg-[#5bca93]">
                Record
            </div>
            <div class="font-inter capitalize text-sm font-normal text-[#009933] py-4 hover:font-bold hover:bg-[#5bca93]">
                My Time and Attendance
            </div>
            <div class="font-inter capitalize text-sm font-normal text-[#009933] py-4 hover:font-bold hover:bg-[#5bca93]">
                HR Bulletin
            </div>
            <div class="font-inter capitalize text-sm font-normal text-[#009933] py-4 hover:font-bold hover:bg-[#5bca93]">
                Filing & HR Form
            </div>
            <div class="font-inter capitalize text-sm font-normal text-[#009933] py-4 hover:font-bold hover:bg-[#5bca93]">
                Clearance
            </div>
        </div>
    </div>
</template>