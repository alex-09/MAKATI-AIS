<template>
    <div class="min-h-screen bg-document-bg flex items-center justify-center">
        <div class="container mx-auto">
            <SelectionView />
        </div>
    </div>
</template>

<script>
import SelectionView from './selectionView.vue';

export default {
    components: {
        SelectionView,
    }
}
</script>