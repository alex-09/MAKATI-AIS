<script setup>
import mainView from '../../components/budgetComponent/dashboardView.vue';
import subHeader from '../../components/budgetComponent/subHeader.vue';
import NavBar from '../../components/navigationComponent/navbarComponent.vue'
import HeaderMenu from '../../components/navigationComponent/headerComponent.vue';

</script>
<template>
    <div class="min-h-screen">
            <HeaderMenu :pagetitle="'Budgetary Account Transaction'"/>
            <NavBar :navbartitle="'Executive Budget'" />
        <div class="flex flex-row">
            <subHeader />
        </div>
        <div class="mt-10">
            <mainView />
        </div>
    </div>
</template>