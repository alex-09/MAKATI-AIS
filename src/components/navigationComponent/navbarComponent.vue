<template>
      <div class=" flex px-6 py-3 shadow-md bg-white gap-x-[22px]">

        <div class="flex items-center  gap-x-4">
            <router-link to="/budget-management">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 7.80559H3.83L9.42 2.22335L8 0.815308L0 8.8042L8 16.7931L9.41 15.385L3.83 9.80281H16V7.80559Z" fill="#3A3541" fill-opacity="0.87"/>
                </svg>
            </router-link>
            <div class=" font-bold text-2xl ">{{ navbartitle }}</div>
        </div>
                <Navbutton :label=" 'APPROPRIATION'" :options="appropriationOptions"/>
                <Navbutton :label=" 'ALLOTMENT'" :options="allotmentOptions"/>
                <Navbutton :label=" 'OBLIGATION'" :options="obligationOptions"/>


        <Menu as="div" class=" relative   text-other-gray-100 " :class="[reportOptions.map(obj =>{return obj.link}).includes($router.currentRoute.value.path) ? 'bg-dashboardBtn3  shadow-md' : 'hover:text-black hover:bg-dashboardBtn3']">

              <MenuButton class=" whitespace-nowrap py-2 px-4 font-Inter font-bold text-sm">
                <div>REPORTS</div>
              </MenuButton>
          <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div class="absolute w-[279px] left-0  z-10 ">
            <MenuItems class=" mt-2  rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <div class="py-[5px] text-other-black-100  ">
                <MenuItem>
                
                <div class=" bg-dashboardBtn3 px-[10px] py-[6px] font-normal text-sm">
                  Pre-Closing
                </div>
                </MenuItem>

                <MenuItem>
                <router-link to="/Pre-Closing-SAAOB-Reports">
                <div :class="['/Pre-Closing-SAAOB-Reports' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', '   px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Statement of Appropriation, Allotment, Obligation and Balances
                </div>
                </router-link>
                </MenuItem>

                <MenuItem>
                <router-link to="/Pre-Closing-SBU-Reports">
                <div :class="['/Pre-Closing-SBU-Reports' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', ' px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Status of Budget Utilization
                </div>
                </router-link>
                </MenuItem>

                <MenuItem>
                <router-link to="/Pre-Closing-SPPAI-Reports">
                <div :class="['/Pre-Closing-SPPAI-Reports' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', '  px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Status of Programs/Projects/Activities Implementations
                </div>
                </router-link>
                </MenuItem>
                <MenuItem>
                <router-link to="/Pre-Closing-RAOO-Reports">
                <div :class="['/Pre-Closing-RAOO-Reports' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', ' px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Registries of Application, Allotment and Obligations
                </div>
                </router-link>
                </MenuItem>
                <MenuItem>
                
                <div class=" bg-dashboardBtn3 px-[10px] py-[6px] font-normal text-sm">
                  Post-Closing
                </div>
                </MenuItem>

                <MenuItem>
                <router-link to="#">
                <div :class="['#' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', ' px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Statement of Appropriation, Allotment, Obligation and Balances
                </div>
                </router-link>
                </MenuItem>
                
                <MenuItem>
                <router-link to="#">
                <div :class="['#' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', '  px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Status of Budget Utilization
                </div>
                </router-link>
                </MenuItem>

                <MenuItem>
                <router-link to="#">
                <div :class="['#' == $router.currentRoute.value.path ? ' bg-dashboardBtn3 text-black shadow-lg' : ' hover:bg-dashboardBtn3 hover:text-black', '   px-[10px] py-[6px] font-normal text-sm']">
                  <!-- {{ option.title }} -->Status of Programs/Projects/Activities Implementations
                </div>
                </router-link>
                </MenuItem>
              </div>
            </MenuItems>
          </div>
          </transition>
        </Menu>

      </div>
            
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import Navbutton from '../navigationComponent/navbutton/navbutton.vue';
import { ref } from 'vue';
const props = defineProps({
    navbartitle: String,
})
const appropriationOptions = ref ([{title: 'Enroll/New Appropriation', link:'/Appropriation-Enroll' },
                                   {title: 'Update Appropriation', link:'/Appropriation-Update' },
                                   {title: 'List Appropriation', link: '/List-of-Appropriation'}])

const allotmentOptions = ref ([{title: 'Enroll/New Allotment', link: '/Allotment-Enroll'},
                              {title: 'Update Allotment', link: '/Allotment-Update'},
                              {title: 'List Allotment', link:'/List-of-Allotment' }])

const obligationOptions = ref ([{title: 'For Process', link: '/For-Process'},
                               {title: 'List of Obligations', link: '/List-of-Obligations'},
                               {title: 'Adjustment of Obligations', link:'/Adjustment-of-Obligations' }])
                                 
const reportOptions = ref ([{title: 'Statement of Appropriation, Allotment, Obligation and Balances', link: '/Pre-Closing-SAAOB-Reports'},
                               {title: 'Status of Budget Utilization', link: '/Pre-Closing-SBU-Reports'},
                               {title: 'Status of Programs/Projects/Activities Implementations', link:'/Pre-Closing-SPPAI-Reports' },
                               {title: 'Registries of Application, Allotment and Obligations', link: '/Pre-Closing-RAOO-Reports'},
                               {title: 'Statement of Appropriation, Allotment, Obligation and Balances', link:'#' },
                               {title: 'Status of Budget Utilization', link:'#' },
                               {title: 'Status of Programs/Projects/Activities Implementations', link:'#' }])

</script>