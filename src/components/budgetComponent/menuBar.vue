<script>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid';

export default {
    components:{
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        ChevronDownIcon,
    },
};
</script>
<template>
            <div class=" px-11 flex flex-1 flex-col sm:flex-row justify-between items-center  text-navGrey bg-navWhite font-Inter text-xs font-semibold ">
                
                <div class="duration-150  m-1 flex  hover:bg-navDarkBlue rounded-md hover:text-white focus:bg-navDarkBlue">
                        <Menu as="div" class="relative   text-left">
                            <MenuButton class="p-3">
                                APPROPRIATION
                            </MenuButton>
    
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute left-0 z-10 mt-1 w-56 origin-top-right rounded-md bg-white shadow-md font-normal text-base  ">
                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }">
                                            <router-link to="/about" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Enroll/New Appropriation</router-link>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <router-link to="/site1" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Update Appropriation</router-link>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <router-link to="" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Appropriation</router-link>
                                        </MenuItem>     
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>




                    <div class="duration-150  m-1 flex  hover:bg-navDarkBlue rounded-md hover:text-white focus:bg-navDarkBlue">
                        <Menu as="div" class="relative   text-left">
                            <MenuButton class="p-3">
                                ALLOTMENT
                            </MenuButton>
    
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute left-0 z-10 mt-1 w-56 origin-top-right rounded-md bg-white shadow-md font-normal text-base  ">
                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Enroll/New Allotment</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Update Allotment</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Allotment</a>
                                        </MenuItem>     
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>

                    <div class="duration-150  m-1 flex  hover:bg-navDarkBlue rounded-md hover:text-white focus:bg-navDarkBlue">
                        <Menu as="div" class="relative   text-left">
                            <MenuButton class="p-3">
                                OBLIGATION
                            </MenuButton>
    
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute left-0 z-10 mt-1 w-56 origin-top-right rounded-md bg-white shadow-md font-normal text-base  ">
                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">For Process</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">List of Obligations</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Adjustments of Obligations</a>
                                        </MenuItem>     
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                    <div class="duration-150  m-1 flex  hover:bg-navDarkBlue rounded-md hover:text-white focus:bg-navDarkBlue">
                        <Menu as="div" class="relative   text-left">
                            <MenuButton class="p-3">
                                REPORTS
                            </MenuButton>
    
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute left-0 z-10 mt-1 w-56 origin-top-right rounded-md bg-white shadow-md font-normal text-base  ">
                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Pre-Closing</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Statement of Appropriation</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Status of Budget Utilization</a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Status of Programs/Projects</a>
                                        </MenuItem>  
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Registries of Appropriation</a>
                                        </MenuItem>  
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-navLightBlue text-gray-900' : 'text-gray-700', 'block px-4 py-2 ']">Status of Budget Utilization</a>
                                        </MenuItem>       
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                    <RouterLink :to="{ name: 'MainMenu' }"><img src="assets/Go_Back.png" alt=""></RouterLink>
                
            </div>
</template>