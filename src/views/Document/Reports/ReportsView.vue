<template>
    <HeaderBar />
    <MenuBar />
    <Dashboard />
</template>

<script>
import HeaderBar from '../../../components/navigationComponent/documentNav/headerComponent.vue'
import MenuBar from '../../../components/navigationComponent/documentNav/menuBarReports.vue'
import Dashboard from "../../../components/documentComponent/reports/communication/dashboard.vue"

export default {
    components: {
        HeaderBar,
        MenuBar,
        Dashboard,
    }
}
</script>