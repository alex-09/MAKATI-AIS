<template>
    <div class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg">
        <div class="flex flex-row items-center text-secondBtn">
            <button @click.prevent="onBackClick()"><img src="../../../../public/assets/Go_Back.png" alt=""></button>
            <h1 class="text-2xl capetalize px-2">Incoming</h1>
        </div>

            <div class="duration-150 w-163 m-1 flex  hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        Budgetary Obligation Transactions
                    </MenuButton>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute left-0 z-10 mt-1 w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm ">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Enroll' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Enroll/New Appropriation</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Update' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Update Appropriation</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'List' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Appropriation</RouterLink>
                                </MenuItem>     
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
            </div>

            <div class="duration-150  m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn" :class="{'bg-none': !['/Document-Incoming-Contracts-Processor'].includes($route.path), 'bg-secondBtn text-black': ['/Document-Incoming-Contracts-Processor'].includes($route.path) }">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        <RouterLink :to="{ name: 'Document Incoming Contracts Processor' }"> Contracts / PO </RouterLink>
                    </MenuButton>
                </Menu>
            </div>

            <div class="duration-150  m-1 flex  hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        Pre-Audit Transactions
                    </MenuButton>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute left-0 z-10 mt-1 w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm ">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Enroll' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Enroll/New Appropriation</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Update' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Update Appropriation</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'List' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Appropriation</RouterLink>
                                </MenuItem>     
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
            </div>

            <div class="duration-150  m-1 flex  hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        Payment Transactions
                    </MenuButton>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute left-0 z-10 mt-1 w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm ">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Enroll' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Enroll/New Appropriation</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Update' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Update Appropriation</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'List' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Appropriation</RouterLink>
                                </MenuItem>     
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
            </div>

            <div class="duration-150  m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn">
                <Menu as="div" class="relative   text-left">
                    <MenuButton class="p-3">
                        Check Transactions
                    </MenuButton>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute left-0 z-10 mt-1 w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm ">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <router-link to="#" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Enroll/New Allotment</router-link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Allotment Update' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Update Allotment</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <router-link to="#" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Allotment</router-link>
                                </MenuItem>     
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
            </div>


            <div class="duration-150  m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn" :class="{'bg-none': !['/Document-Incoming-Communication-Approver'].includes($route.path), 'bg-secondBtn text-black': ['/Incoming','/Document-Incoming-Communication-Receiving', '/Document-Incoming-Communication-Create','/Document-Incoming-Communication-Approver'].includes($route.path) }">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        Communication
                    </MenuButton>
                </Menu>
            </div>

            <div class="duration-150  m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn" :class="{'bg-none': !['/Document-Incoming-More-Payroll','/Document-Incoming-Payroll-Processor'].includes($route.path), 'bg-secondBtn text-black': ['/Document-Incoming-More-Payroll', '/Document-Incoming-Payroll-Processor'].includes($route.path) }">
                <Menu as="div" class="relative text-left">
                    <MenuButton class="p-3">
                        More
                    </MenuButton>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute left-0 z-10 mt-1 w-175 xxxxl:w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm ">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'Document Incoming Payroll Processor' }"  :class="[active ? 'bg-secondBtn text-black' : 'text-gray-700', 'block px-4 py-2 ']">Payrolls / Appointment</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: '' }" :class="[active ? 'bg-secondBtn text-black' : 'text-gray-700', 'block px-4 py-2 ']">RCD / ORs / Income Related Docs</RouterLink>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <router-link to="#" :class="[active ? 'bg-secondBtn text-black' : 'text-gray-700', 'block px-4 py-2 ']">Others</router-link>
                                </MenuItem>        
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
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