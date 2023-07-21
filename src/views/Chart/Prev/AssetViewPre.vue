<template>
    <HeaderMenu />
    <MainContent/>
</template>

<script>

import HeaderMenu from '../../../components/navigationComponent/chartNav/headerComponent.vue'
import MainContent from '../../../components/chartComponent/previous/assetView.vue'

export default {
    components: {
        HeaderMenu,
        MainContent,
    },
}
</script>