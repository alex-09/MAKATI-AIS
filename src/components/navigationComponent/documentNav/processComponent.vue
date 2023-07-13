<template>
    <header class=" top-0 bg-secondBtn">
        <nav class=" flex flex-col sm:flex-row items-center  text-black  ">
            <div class=" flex items-center sm:py-4 sm:px-4">
                <img src="/assets/Makati_City.png" alt="" class="logoImgMenu w-30 h-30">
                <RouterLink :to="{ name: 'Document' }" class="font-bold font-Inter sm:px-5 text-base">Document Management</RouterLink>                
            </div>

            <div class="flex flex-1 sm:justify-end sm:px-9">
                <img src="/assets/Notifbell.svg" class=" cursor-pointer sm:px-3">
                

    <Menu as="div" class="relative inline-block text-left">
    <div class="">
      <MenuButton class=" inline-flex flex-1 w-full items-center gap-x-1.5 rounded-md py-2 text-sm font-semibold text-black">
        <img src="/assets/profile_2.svg" class=" cursor-pointer">
        Processor
        
      </MenuButton>
    </div>

    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
      <MenuItems class="absolute right-0  z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="py-1">
          <MenuItem v-slot="{ active }">
            <RouterLink :to="{ name: 'Document Incoming Communication Receive' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Receiving Clerk</RouterLink>
          </MenuItem>
          <MenuItem v-slot="{ active }">
            <RouterLink :to="{ name: 'Document Incoming Communication City Accountant' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">City Accountant</RouterLink>
          </MenuItem>
          <MenuItem v-slot="{ active }">
            <RouterLink :to="{ name: 'Document Incoming Communication Approver' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Approver</RouterLink>
          </MenuItem>
          <MenuItem v-slot="{ active }">
            <RouterLink :to="{ name: 'Document Incoming Communication Reviewer' }" :class="[active ? 'bg-secondBtn text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Reviewer</RouterLink>
          </MenuItem>
        </div>
      </MenuItems>
    </transition>
  </Menu>
                

                
            </div>
        </nav>
    </header>
</template>

<script>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'


export default {
    components:{
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
       
    },
};
</script>