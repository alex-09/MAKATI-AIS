<template>
    <!-- NAVBAR -->
    <div class=" px-3 flex flex-1 flex-col sm:flex-row justify-between items-center text-other-black font-Inter text-xs font-semibold border shadow-md">
        <div class="flex flex-row items-center text-primary-color">
            <RouterLink :to="{ name: 'Charts-new', query: { date: this.selectedOption, coa_title: this.coa_title } }"><img src="../../../../../public/assets/go_back_2.png" alt=""></RouterLink>
            <h1 class="text-2xl uppercase px-2">expenses</h1>
            <span>Effectivity date: {{ selectedOption }} {{ coa_title }}</span>
        </div>
        <div class="mx-3 my-3">
            <label class="relative">
                <!-- v-model="searchliability" -->
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
                    <tr v-if="this.userPosition === 'Division Head' && this.userDivision === 'Financial Reporting Division'">
                        <th 
                            scope="col" 
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[15px]">
                            <input type="checkbox" v-model="selectAll" @click="toggleSelectAll()"/>
                        </th>
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
                    <tr v-if="this.userDetails === 'Processor' && this.userDivision === 'Financial Reporting Division' || this.userDetails === 'Reviewer' && this.userDivision === 'Financial Reporting Division'" >
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[165px]">
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
                <tbody 
                class="divide-y divide-gray-200"
                v-if="this.userPosition === 'Division Head' && this.userDivision === 'Financial Reporting Division'">
                    <tr v-if="filteredExpenses.length === 1 && filteredExpenses[0].message">
                        <td colspan="4" class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase">{{ filteredExpenses[0].message }}</td>
                    </tr>
                    <tr v-else v-for="expense in filteredExpenses" :key="expense.id">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-center">
                            <input type="checkbox" :value="expense.id" v-model="selected" @click="toggleSelected"/>   
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ expense.account_code }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-left">{{ expense.account_title}}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 text-center"><button type="button" @click="initView(expense)" :euser="expense"><ViewIcon /></button></td>
                    </tr>
                </tbody>
                <tbody 
                class="divide-y divide-gray-200"
                v-if="this.userDetails === 'Processor' && this.userDivision === 'Financial Reporting Division' || this.userDetails === 'Reviewer' && this.userDivision === 'Financial Reporting Division'" >
                    <tr v-if="filteredExpenses.length === 1 && filteredExpenses[0].message">
                        <td colspan="4" class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase">{{ filteredExpenses[0].message }}</td>
                    </tr>
                    <tr v-else v-for="expense in filteredExpenses" :key="expense.id">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ expense.account_code }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 text-left">{{ expense.account_title}}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 text-center"><button type="button" @click="initView(expense)" :euser="expense"><ViewIcon /></button></td>
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
    <div 
        class="flex justify-end gap-4 mx-14 mt-8"
        v-if="this.userDetails === 'Processor' && this.userDivision === 'Financial Reporting Division' || this.userDetails === 'Reviewer' && this.userDivision === 'Financial Reporting Division'" >
        
    </div>
    <div 
        class="flex justify-end gap-4 mx-14 mt-8"
        v-if="this.userPosition === 'Division Head' && this.userDivision === 'Financial Reporting Division'">
        
        <button
            class="w-[127px] h-30 rounded uppercase text-base font-medium text-white bg-save-color"
            @click="approveAcc">
                approve
        </button>

        <button
            class="w-[127px] h-30 rounded uppercase text-base font-medium text-white bg-danger-color"
            @click="disapproveAcc">
                disapprove
        </button>
    </div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import ViewIcon from '../../../icons/Budgetary/viewIcon.vue';
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue'

export default {
    components: {
        ViewIcon,
        SearchIcon,
    },
    props: {
        expenses: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            expense: [],
            expenses: [],
            euser: {},
            showViewDesc: false,
            euser: {
                currDesc: { description: '' }
            },
            // search data
            searchQuery: '',
            selectedOption: null,
            coa_title: null,
            selectAll: false,
            selected: [],
            userDetails: '',
            userPosition: '',
            userDivision: '',	
        }
    },
    methods: {
        closeModal() {
            this.isShowEdit = false;
            this.showViewDesc = false;
        },
        initView(expense) {
            this.euser = { currDesc: expense };
            this.showViewDesc = true;
        },
        fetchExpense() {
            axios.get(`coa/listTempExpenses`)
            .then(response => {
                this.expenses = response.data.data;
                console.log(this.expenses)
                if (Array.isArray(response.data.list)) {
                this.expenses = response.data.list.filter(expense => {
                    return expense.approval_status === 'For Approval - DH'
                });
            }
            })
            .catch(error => {
                console.log(error);
            })
        },
        // Method to approve selected liabilitys
        approveAcc() {
            Swal.fire({
                text: 'Are you sure you want to approve this account?',
                html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M51.6265 36.5375L48.0715 40.1715C45.2275 43.0155 43.45 45.425 43.45 51.35H35.55V49.375C35.55 44.9905 37.3275 41.0405 40.1715 38.1965L45.0695 33.2195C46.531 31.7975 47.4 29.8225 47.4 27.65C47.4 23.2655 43.845 19.75 39.5 19.75C37.4048 19.75 35.3954 20.5823 33.9139 22.0639C32.4323 23.5454 31.6 25.5548 31.6 27.65H23.7C23.7 23.4596 25.3646 19.4408 28.3277 16.4777C31.2908 13.5146 35.3096 11.85 39.5 11.85C43.6904 11.85 47.7092 13.5146 50.6723 16.4777C53.6354 19.4408 55.3 23.4596 55.3 27.65C55.3 31.126 53.878 34.2465 51.6265 36.5375ZM43.45 67.15H35.55V59.25H43.45M39.5 0C34.3128 0 29.1764 1.0217 24.384 3.00676C19.5916 4.99182 15.2372 7.90137 11.5693 11.5693C4.16159 18.977 0 29.0239 0 39.5C0 49.9761 4.16159 60.023 11.5693 67.4307C15.2372 71.0986 19.5916 74.0082 24.384 75.9932C29.1764 77.9783 34.3128 79 39.5 79C49.9761 79 60.023 74.8384 67.4307 67.4307C74.8384 60.023 79 49.9761 79 39.5C79 17.6565 61.225 0 39.5 0Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Are you sure you want to approve this records?</span></div></div>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    container: 'flex flex-col-reverse sm:flex-row',
                    confirmButton: 'ml-auto mx-2 mb-2 sm:mb-0 sm:ml-2 text-white font-bold py-2 px-4 rounded uppercase bg-primary-color',
                    cancelButton: 'mb-2 mx-2 sm:mb-0 text-white font-bold py-2 px-4 rounded uppercase bg-danger-color'
                },
                buttonsStyling: false,
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get selected Liabilities
                    const selectedExpenses = this.selected;

                    // Check if any Liabilities is selected
                    if (selectedExpenses.length === 0) {
                        alert("Please select at least one expense to approve.");
                        return;
                    }

                    // Send approval request for each selected Liabilities
                    axios.post(`coa/expensesforApprovalCa`, { id: this.selected })
                    .then((response) => {
                        console.log(`expenses ${response.data.id} has been approved.`);
                        window.location.reload();
                    })
                    .catch((error) => {
                        console.error(`Error approving expense ${error.message}`);
                    });

                    // Clear selected Liabilities
                    this.selected = [];
                    this.selectAll = false;

                    Swal.fire({
                        html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The record has been approved.</span></div></div>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } 
            })
        },
        disapproveAcc() {
            Swal.fire({
                text: 'Are you sure you want to approve this account?',
                html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M51.6265 36.5375L48.0715 40.1715C45.2275 43.0155 43.45 45.425 43.45 51.35H35.55V49.375C35.55 44.9905 37.3275 41.0405 40.1715 38.1965L45.0695 33.2195C46.531 31.7975 47.4 29.8225 47.4 27.65C47.4 23.2655 43.845 19.75 39.5 19.75C37.4048 19.75 35.3954 20.5823 33.9139 22.0639C32.4323 23.5454 31.6 25.5548 31.6 27.65H23.7C23.7 23.4596 25.3646 19.4408 28.3277 16.4777C31.2908 13.5146 35.3096 11.85 39.5 11.85C43.6904 11.85 47.7092 13.5146 50.6723 16.4777C53.6354 19.4408 55.3 23.4596 55.3 27.65C55.3 31.126 53.878 34.2465 51.6265 36.5375ZM43.45 67.15H35.55V59.25H43.45M39.5 0C34.3128 0 29.1764 1.0217 24.384 3.00676C19.5916 4.99182 15.2372 7.90137 11.5693 11.5693C4.16159 18.977 0 29.0239 0 39.5C0 49.9761 4.16159 60.023 11.5693 67.4307C15.2372 71.0986 19.5916 74.0082 24.384 75.9932C29.1764 77.9783 34.3128 79 39.5 79C49.9761 79 60.023 74.8384 67.4307 67.4307C74.8384 60.023 79 49.9761 79 39.5C79 17.6565 61.225 0 39.5 0Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Are you sure you want to disapprove this records?</span></div></div>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    container: 'flex flex-col-reverse sm:flex-row',
                    confirmButton: 'ml-auto mx-2 mb-2 sm:mb-0 sm:ml-2 text-white font-bold py-2 px-4 rounded uppercase bg-primary-color',
                    cancelButton: 'mb-2 mx-2 sm:mb-0 text-white font-bold py-2 px-4 rounded uppercase bg-danger-color'
                },
                buttonsStyling: false,
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get selected liability
                    const selectedExpenses = this.selected;

                    // Check if any liability is selected
                    if (selectedExpenses.length === 0) {
                        alert("Please select at least one expense to approve.");
                        return;
                    }
                    // Send approval request for each selected liability
                    axios.post(`coa/disapproveExpenses`, { id: this.selected })
                    .then((response) => {
                        console.log(`expense ${response.data.id} has been disapproved.`);
                        window.location.reload();
                    })
                    .catch((error) => {
                        console.error(`Error approving expense ${error.message}`);
                    });

                    // Clear selected liability
                    this.selected = [];
                    this.selectAll = false;

                    Swal.fire({
                        html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The record has been disapproved.</span></div></div>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } 
            })
        },
        // Method to toggle the select all checkbox
        toggleSelectAll() {
            this.selectAll = !this.selectAll; // toggle the selectAll flag
            if (this.selectAll) {
                this.selected = this.filteredExpenses.map((expense, index) => ({ [`id[${index}]`]: expense.id })); // create array of objects with each object containing the id of the corresponding liability
                console.log(this.selected);
            } else {
                this.selected = []; // deselect all liabilitys
            }
        },
        // Method to toggle selection of individual liability
        toggleSelected(expense) {
            console.log(expense)
            if (this.isSelected(expense)) {
                const index = this.selected.findIndex((selectedexpense) => {
                    console.log(selectedexpense);
                    return selectedexpense.id === expense.id;
                });
                this.selected.splice(index, 1);
            } else {
                this.selected.push(expense.id);
            }
                this.selectAll = this.selected.length === this.expenses.length;
        },
    },
    watch: {
        selectAll(newVal) {
            if (newVal) {
            this.selected = this.filteredExpenses.map(expense => expense.id);
            } else {
            this.selected = [];
            }
        }
    },
    created() {
        this.fetchExpense();
    },
    mounted() {
        axios.get(`coa/listTempExpenses`)
        .then(response => {
            this.expenses = response.data.list;
            console.log(response.data.list);
            this.selectedOption = response.data.list[0]['date_effectivity'];
            this.coa_title = response.data.list[0]['coa_title'];
            if (Array.isArray(response.data.list)) {
                this.expenses = response.data.list.filter(expense => {
                    return expense.approval_status === 'For Approval - DH'
                });
            }
        })
        .catch(error => {
            console.log(error);
        })

        this.description = this.euser.currDesc.description;
            axios.get('coa/listTempExpenses')
            .then(response => this.expenses = response.data.list)

            axios.get('coa/listTempExpenses').then(response => this.selectedOption = response.data.list[0]['date_effectivity'])
            axios.get('coa/listTempExpenses').then(response => this.coa_title = response.data.list[0]['coa_title'])

    },
    computed: {
        filteredExpenses() {
            const searchQuery = this.searchQuery.toLowerCase();
            const filtered = this.expenses.filter((expense) => {
                return (
                    expense.account_code.toLowerCase().includes(searchQuery) ||
                    expense.account_title.toLowerCase().includes(searchQuery)
                ) && expense.approval_status !== 'For Approval - CA';
            });

            if (filtered.length === 0) {
                return [{ message: "No matches found" }];
            }

            return filtered;
        }
    },
    async created() {
      const response = await axios.get('me');

      this.userDetails = response.data.user.userdesignation
      this.userPosition = response.data.user.position
      this.userDivision = response.data.user.division
      console.log(response.data.user.position);
    }
}
</script>