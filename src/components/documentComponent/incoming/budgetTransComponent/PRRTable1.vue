<template>
    <div class="border-none flex justify-between mb-[30px]">
        <div class="border-none font-bold text-[22px] leading-[27px] ">Receiving Receipt</div>
        <div class="border-none flex gap-x-[24px] items-center"  >
            <span class="border-none font-semibold text-[14px] leading-[17px]">Transaction No. </span>
            <label class="relative ml-8">
                <input type="text" v-model="searchQuery" name="search" placeholder="Search" class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
            </label>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th 
                    scope="col">
                    <input type="checkbox" v-model="selectAll" @click="toggleSelectAll()"/>
                </th>
                <th>date</th>
                <th>time</th>
                <th>transaction no.</th>
                <th>processing slip no.</th>
                <th>department / office</th>
                <th>particulars</th>
                <th>amount</th>
            </tr>
            
        </thead>
        <tbody>
            <tr v-if="filteredTrans.length === 1 && filteredTrans[0].message">
                <td colspan="8" class="px-6 py-4 text-base font-medium text-gray-800 text-center">{{ filteredTrans[0].message }}</td>
            </tr>
            <tr v-else v-for="transaction in filteredTrans" :key="transaction.id">
                <td class="text-center">
                    <input type="checkbox" :value="transaction.id" v-model="selected" @click="toggleSelected"/> 
                </td>
                <td class="text-center">{{ transaction.date }}</td>
                <td class="text-center">{{ transaction.time }}</td>
                <td class="text-center">{{ transaction.transaction_id }}</td>
                <td class="text-center">{{ transaction.processing_slip_number }}</td>
                <td class="text-center">{{ transaction.department_name }}</td>
                <td class="text-center">{{ transaction.description }}</td>
                <td class="text-center">{{ transaction.amount }}</td>
            </tr>
        </tbody>
    </table>
</template>
<script>
    import axios from 'axios';
    import SearchIcon from '../../../../components/icons/Budgetary/searchIcon.vue'

    export default {
        components: {
            SearchIcon
        },
        data() {
            return {
                transaction: [],
                transactions: [],
                searchQuery: '',
                selectAll: false,
                selected: [],
            }
        },
        props: {
            transactions: {
                type: Array,
                required: true
            }
        },
        methods: {
        fetchTrans() {
            axios.get(`BOT/listReceiver`)
            .then(response => {
                this.trans = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        // Method to toggle the select all checkbox
        toggleSelectAll() {
            this.selectAll = !this.selectAll; // toggle the selectAll flag
            if (this.selectAll) {
                this.selected = this.filteredTrans.map((transaction, index) => ({ [`id[${index}]`]: transaction.id })); // create array of objects with each object containing the id of the corresponding transaction
                console.log(this.selected);
            } else {
                this.selected = []; // deselect all transactions
            }
        },
        // Method to toggle selection of individual transaction
        toggleSelected(transaction) {
            console.log(transaction)
            if (this.isSelected(transaction)) {
                const index = this.selected.findIndex((selectedTransaction) => {
                    console.log(selectedTransaction);
                    return selectedTransaction.id === transaction.id;
                });
                this.selected.splice(index, 1);
            } else {
                this.selected.push(transaction.id);
            }
                this.selectAll = this.selected.length === this.transactions.length;
        },
    },
    created() {
        this.fetchTrans();
    },
    watch: {
        selectAll(newVal) {
            if (newVal) {
            this.selected = this.filteredTrans.map(transaction => transaction.id);
            } else {
            this.selected = [];
            }
        }
    },
    mounted() {
        axios.get(`BOT/listReceiver`)
        .then(response => {
            this.transactions = response.data.data;
            console.log(response.data.data)
        })
        .catch(error => {
            console.log(error);
        })
    },
    computed: {
        filteredTrans() {
            const searchQuery = this.searchQuery.toLowerCase();
            const filtered = this.transactions.filter((transaction) => {
                return (
                    transaction.transaction_id.toLowerCase().includes(searchQuery)
                );
            });

            if (filtered.length === 0) {
                return [{ message: "No matches found" }];
            }

            return filtered;
        }
    },


    }
</script>
<style scoped>
table{
    width: 100%;
    table-layout: auto;
}
th{

    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    align-items: center;
    text-transform: uppercase;
}
tr{
    border-bottom: 1px solid;
    
}
td, th{
    padding: 6px 3px;
    align-items: center;
    justify-content: center;
    text-align: center;
}
</style>