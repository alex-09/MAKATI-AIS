<template>
            <Menu as="div" class=" relative  rounded-[16px] text-other-gray-100 " 
            :class="[props.options.map(obj => {return obj.link}).includes($router.currentRoute.value.path) ? 'bg-dashboardBtn3  shadow-md' : 'hover:text-white hover:bg-gray-400']">
            
            <MenuButton class=" whitespace-nowrap   py-2 px-4    font-normal text-sm">
              <div>{{label}}</div>
              
            </MenuButton>
          <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div class="absolute w-[279px] left-0  z-10 ">
            <MenuItems class="py-[5px] flex flex-col gap-1  px-[11px] text-other-black-100 mt-2    rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              
                <MenuItem v-for="option in options" :key="option">
                  <router-link :to="option.link">
                    <div :class="[option.link == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-gray-400 hover:text-white', '  rounded-[16px] px-[16px] py-1 font-normal text-sm']">
                      {{ option.title }}
                    </div>
                  </router-link>     
                </MenuItem>
              
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