<template>
    <div v-if="showChildComponent">
        <HistoryView :showHistory="true" @close="hideChild"/>
    </div>
    <div v-else>
        <SearchView :show="true" />
        <div class="container mt-4">
            <p class="uppercase text-other-black text-2xl font-bold mb-4">for assignment(city accountant)</p>
        </div>
        <TableView :show="true" @open="showChild"/>
    </div>
</template>

<script>
    import HistoryView from './historyView.vue'
    import SearchView from './searchView.vue'
    import TableView from './tableView.vue'

    export default {
        components: {
            HistoryView,
            SearchView,
            TableView,
        },
        data() {
            return {
                showChildComponent: false,
            }
        },
        methods: {
            showChild() {
                this.showChildComponent = true
            },
            hideChild() {
                this.showChildComponent = false
            },
        },
    }
</script>