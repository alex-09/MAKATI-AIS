<script setup>
import HeaderBar from '../../components/TRComponents/headerComponent/HeaderComponent.vue'
import NavBar from '../../components/TRComponents/navComponents/NavComponent.vue'
import Dropdown from '../../components/TRComponents/reusableComponents/Dropdown.vue'
import DataTable from '../../components/TRComponents/Statements/DataTable.vue'
</script>
<template>
    <div class="sticky top-0 left-0 z-50 ">
        <HeaderBar :pagetitle="'Budgetary Account Transaction'" />
        <NavBar :navbartitle="'Trust Funds'" />
    </div>
    <div class="container min-w-full px-0    ">
        <div class=" mx-[69px] mt-[21px] bg-white ">
            
            <div class=" mx-[42px]">
                <div class=" font-bold text-[24px] leading-[27px] ">Statement of Trust Receipts, Obligations and Balance</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] border-b  mx-[42px] mt-[25px] gap-x-[42px]">
                <div class="grid lg:grid-cols-[194px_auto] items-center">
                    <div class=" font-semibold text-sm">Source of Trust Receipt:</div>
                    <div class="h-32 relative"><Dropdown/></div>
                </div>
                <div class="grid lg:grid-cols-[194px_auto] items-center">
                    <div class=" font-semibold text-sm">Company / Agency Name:</div>
                    <div class="h-32 relative"><Dropdown/></div>
                </div>
                <div class="grid lg:grid-cols-[194px_auto] items-center">
                    <div class=" font-semibold text-sm">Main Fund Title:</div>
                    <div class="h-32 relative"><Dropdown/></div>
                </div>
                <div class="grid lg:grid-cols-[194px_auto] items-center">
                    <div class=" font-semibold text-sm">Sub-Fund Title:</div>
                    <div class="h-32 relative"><Dropdown/></div>
                </div>
                <div class=" md:col-span-2 flex justify-center mb-[34px]">
                    <button class=" font-medium text-[15px]  leading-[26px] px-[26px] h-42 bg-dashboardBtn3 rounded-[5px]">SEARCH</button>
                </div>
            </div>
            <div class="flex justify-center flex-col mt">
                <div class="font-bold flex flex-col text-center mt-[22px]">
                    <span class="text-[18px] leading-[22px]">Statement of Trust Receipts, Obligations and Balances</span>
                    <span class="text-[14px] leading-[19px] ">CALENDAR YEAR 2023</span>
                    <span class=" italic text-[14px] leading-[17px]">As of December 31, 20XX</span>
                </div>
            </div>
        </div>
        <div class="  mt-[34px] ml-[69px]">
            <DataTable />
        </div>
        
    </div>
</template>