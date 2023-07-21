<template>
    <!-- NAVBAR -->
    <div class=" px-3 flex flex-1 flex-col sm:flex-row justify-between items-center text-other-black font-Inter text-xs font-semibold border shadow-md">
        <div class="flex flex-row items-center text-primary-color">
            <RouterLink :to="{ name: 'Charts-prev', query: { date: this.selectedOption, coa_title: this.coa_title } }"><img src="../../../../../public/assets/go_back_2.png" alt=""></RouterLink>
            <h1 class="text-2xl uppercase px-2">liabilities</h1>
            <span>Effectivity date: {{ selectedOption }} {{ coa_title }}</span>
        </div>
        <div class="mx-3 my-3">
            <label class="relative">
                <!-- v-model="searchAsset" -->
                    <input type="text" v-model="searchQuery" name="search" placeholder="Search" class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                    <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
            </label>
        </div>
    </div>
    <!-- TABLE VIEW -->
    <div class="container grid justify-items-center p-0 mt-4">
        <div class="overflow-y-auto overscroll-y-auto overflow-x-hidden w-1850 1536:w-1458 xxxxl:w-1850 max-h-[700px]">
            <table class="divide-y w-[1440px] xxxxl:w-1850 divide-gray-200 mr-8">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[150px]">
                            account code
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[550px]">
                            account title
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[100px]">
                            description
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-if="filteredLiabilities.length === 1 && filteredLiabilities[0].message">
                        <td colspan="3" class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase">{{ filteredLiabilities[0].message }}</td>
                    </tr>
                    <tr v-else v-for="liability in filteredLiabilities" :key="liability.id">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ liability.account_code }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-left">{{ liability.account_title}}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 text-center"><button type="button" @click="initView(liability)" :euser="liability"><ViewIcon /></button></td>
                    </tr>
                </tbody>
            </table>

            <!-- view modal description  -->
            <div v-if="showViewDesc" class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-30" :showViewDesc="showViewDesc" :euser="{currDesc}" @toFalse="(i) => this.showViewDesc = i">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="relative bg-white w-800 h-420 rounded-lg border shadow-xl p-4">
                        <div class="mx-4">
                            <h5 class="text-2xl font-semibold uppercase text-secondBtn">View Description</h5>
                        </div>
                        <div class="flex flex-col mt-4 mx-4">
                            <p class="text-other-black-100 my-1 font-bold">Account Code</p>
                            <span class="text-other-black-100 my-1">{{euser.currDesc.account_code}}</span>
                        </div>
                        <!-- VIEW DESCRIPTION -->
                        <div>
                            <div class="mx-4">
                                <p class="text-other-black-100 my-2 font-bold">Description</p>
                                <div v-if="euser.currDesc.description == null">
                                    <span class="text-other-black-100 my-2 text-base text-justify">No Description</span>
                                </div>
                                <div v-else>
                                    <span class="text-other-black-100 my-2 text-base text-justify">{{euser.currDesc.description}}</span>
                                </div>
                            </div>
                            <div>
                                <button class="text-white rounded text-base font-semibold mt-8 bg-danger-color py-2 px-6 mx-4 w-125 uppercase float-right" @click="closeModal()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import axios from 'axios';
import ViewIcon from '../../../icons/Budgetary/viewIcon.vue';
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue'

export default {
    name: 'tableView',
    components: {
        ViewIcon,
        SearchIcon
    },
    data() {
        return {
            liability: [],
            liabilities: [],
            euser: {},
            showViewDesc: false,
            isShowEdit: false,
            euser: {
                currDesc: { description: '' }
            },
            searchQuery: '',
            selectedOption: null,
            coa_title: null,
        }
    },
    methods: {
        closeModal() {
            this.isShowEdit = false;
            this.showViewDesc = false;
        },
        initView(liability) {
            this.euser = { currDesc: liability };
            this.showViewDesc = true;
        },
        fetchLiabilities() {
        axios.get(`coa/previousLiability?date=${this.$route.query.date}`)
        .then(response => {
            this.liabilities = response.data.data;
            console.log(this.liabilities)
        })
        .catch(error => {
            console.log(error);
        })
        },
    },
    created() {
        this.fetchLiabilities();
    },
    mounted() {
        axios.get(`coa/previousLiability?date=${this.$route.query.date}`)
        .then(response => {
            this.liabilities = response.data.data;
        })
        .catch(error => {
            console.log(error);
        })

        this.description = this.euser.currDesc.description;
            axios.get(`coa/previousLiability?date=${this.$route.query.date}`)
            .then(response => this.liabilities = response.data.data)

        this.selectedOption = this.$route.query.date;

        this.coa_title = this.$route.query.coa_title;
    },
    computed: {
        filteredLiabilities() {
            const searchQuery = this.searchQuery.toLowerCase();
            const filtered = this.liabilities.filter((liability) => {
                return (
                liability.account_code.toLowerCase().includes(searchQuery) ||
                liability.account_title.toLowerCase().includes(searchQuery)
                );
            });

            if (filtered.length === 0) {
                return [{ message: "No matches found" }];
            }

            return filtered;
        }
    }
}
</script>


