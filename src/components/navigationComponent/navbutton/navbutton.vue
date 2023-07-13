<template>
            <Menu as="div" class=" relative  text-other-gray-100 " 
            :class="[props.options.map(obj => {return obj.link}).includes($router.currentRoute.value.path) ? 'bg-dashboardBtn3  shadow-md' : 'hover:text-black hover:bg-dashboardBtn3 ']">

            <MenuButton class=" whitespace-nowrap py-2 px-4 font-Inter font-bold text-sm ">
              <div>{{label}}</div>

            </MenuButton>
          <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div class="absolute w-[279px] left-0  z-10 ">
            <MenuItems class=" mt-2  rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <div class="py-[5px] px-[11px] text-other-black-100  ">
                <MenuItem 

                v-for="option in options"
                :key="option"
                >
                <router-link :to="option.link">
                <div :class="[option.link == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3  hover:text-black', '  px-[16px] py-[6px] font-normal text-sm']">
                  {{ option.title }}
                </div>
                </router-link>
                </MenuItem>
              </div>
            </MenuItems>
          </div>
          </transition>
        </Menu>
</template>
<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

const props = defineProps({
        pagetitle: String,
        options: Array,
        label: String
})


</script>