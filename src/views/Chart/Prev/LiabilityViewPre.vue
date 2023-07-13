<template>
    <HeaderMenu />
    <MainContent/>
</template>

<script>

import HeaderMenu from '../../../components/navigationComponent/chartNav/headerComponent.vue'
import MainContent from '../../../components/chartComponent/previous/liabilityView.vue'

export default {
    components: {
        HeaderMenu,
        MainContent,
    },
}
</script>