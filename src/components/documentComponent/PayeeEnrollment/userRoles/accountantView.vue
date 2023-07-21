<template>
    <Nav />
    <div v-if="!showViewPayee" class="container grid justify-items-center p-0 my-8">
        <div class="container mx-30 mt-4">
            <div class="container mx-8">
                <div class="flex justify-end gap-4">
                    <p>Search Name of Payee</p>
                    <label class="relative ml-8">
                        <input type="text" v-model="searchQuery" name="search" placeholder="Search" class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500" >
                        <SearchIcon class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3" />
                    </label>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto overscroll-x-contain h-320 w-1850 1536:w-1458 1536:h-[600px] xxxxl:w-1850 mt-8">
            <table class="divide-y w-[3300px] divide-gray-200 mr-8">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-133">
                            date
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            complete name
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[600px]">
                            complete address
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[100px]">
                            type
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            tin
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            dti
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            sec
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            cda
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            authorized <br> representative
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[200px]">
                            contact number
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[300px]">
                            email address
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250">
                            receiver
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232">
                            status
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-if="filteredPayee.length === 1 && filteredPayee[0].message">
                        <td colspan="13" class="px-6 py-4 text-sm font-medium text-gray-800 text-center">{{ filteredPayee[0].message }}</td>
                    </tr>
                    <tr v-else v-for="payee in filteredPayee" :key="payee.id">
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                        >
                            {{ payee.date }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.complete_name }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.complete_address }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.type_of_payee_id }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.tax }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.dti === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.dti }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.sec === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.sec }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            <div v-if="payee.cda === null" class="text-center">
                                N/A
                            </div>
                            <div v-else>
                                {{ payee.cda }}
                            </div>
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.authorized }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.contact }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.email }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.receiver }}
                        </td>
                        <td
                            class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-start"
                        >
                            {{ payee.status }}
                        </td>
                        <td
                            class="px-2 py-4 whitespace-nowrap text-center w-207">
                            <div class="flex flex-row gap-2 justify-center">
                                <button 
                                    class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white"
                                    type="button" @click="initView(payee)" :epayee="payee"
                                >
                                    R
                                </button>
                                <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">E</button>
                                <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">A</button>
                                <button class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white">D</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- review payee  -->
    <div v-if="showViewPayee" class="container grid justify-items-center content-center p-0 my-36 1536:my-[80px]" :showViewPayee="showViewPayee" :epayee="{currPayee}" @toFalse="(i) => this.showViewPayee = i">
        <div class="w-[1300px]">
            <div class="container-md p-8">
                <div class="grid grid-rows-1 mb-8">
                    <span class="text-[24px] font-bold text-[#3A3541]">Review Payee Information</span>
                </div>
                <div class="grid grid-rows-2 gap-4">
                    <div class="flex gap-8">
                        <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Complete Name</span>
                        <span class="text-[14px] font-regular ">{{epayee.currPayee.complete_name}}</span>
                    </div>
                    <div class="flex flex-row gap-8">
                        <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Complete Address</span>
                        <span class="text-[14px] font-regular ">{{epayee.currPayee.complete_address}}</span>
                    </div>
                </div>
                <div class="grid grid-rows-2 gap-4 mt-4">
                    <div class="flex justify-between gap-4">
                        <div class="flex flex-row gap-8">
                            <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Type</span>
                            <span class="text-[14px] font-regular ">{{epayee.currPayee.type_of_payee_id}}</span>
                        </div>
                        <div class="flex flex-row gap-8">
                            <span class="w-[250px] font-semibold text-[#606060] text-[14px] mr-[18px]">Contact No</span>
                            <span class="text-[14px] font-regular ">{{epayee.currPayee.contact}}</span>
                        </div>
                    </div>
                    <div class="flex justify-between gap-4">
                        <div class="flex flex-row gap-8">
                            <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Tax Identification No.</span>
                            <span v-if="epayee.currPayee.tax === null" class="text-[14px] font-regular ">N/A</span>
                            <span v-if="epayee.currPayee.tax !== null" class="text-[14px] font-regular ">{{epayee.currPayee.tax}}</span>
                        </div>
                        <div class="flex flex-row gap-8">
                            <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Email Address</span>
                            <span class="text-[14px] font-regular ">{{epayee.currPayee.email}}</span>
                        </div>
                    </div>
                    <div class="flex justify-between gap-4">
                        <div class="flex flex-row gap-8">
                            <span class="w-[250px] font-semibold text-[#606060] text-[14px]">DTI Registration No.</span>
                            <span v-if="epayee.currPayee.dti === null" class="text-[14px] font-regular ">N/A</span>
                            <span v-if="epayee.currPayee.dti !== null" class="text-[14px] font-regular ">{{epayee.currPayee.dti}}</span>
                        </div>
                        <div class="flex flex-row gap-8">
                            <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Receiver</span>
                            <span class="text-[14px] font-regular ">{{epayee.currPayee.receiver}}</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-rows-3 gap-4 mt-4">
                    <div class="flex gap-8">
                        <span class="w-[250px] font-semibold text-[#606060] text-[14px]">SEC No</span>
                        <span v-if="epayee.currPayee.sec === null" class="text-[14px] font-regular ">N/A</span>
                        <span v-if="epayee.currPayee.sec !== null" class="text-[14px] font-regular ">{{epayee.currPayee.sec}}</span>
                    </div>
                    <div class="flex flex-row gap-8">
                        <span class="w-[250px] font-semibold text-[#606060] text-[14px]">CDA</span>
                        <span v-if="epayee.currPayee.cda === null" class="text-[14px] font-regular ">N/A</span>
                        <span v-if="epayee.currPayee.cda !== null" class="text-[14px] font-regular ">{{epayee.currPayee.cda}}</span>
                    </div>
                    <div class="flex flex-row gap-8">
                        <span class="w-[250px] font-semibold text-[#606060] text-[14px]">Authorized Representative</span>
                        <span class="text-[14px] font-regular ">{{epayee.currPayee.authorized}}</span>
                    </div>
                </div>
                <div class="flex flex-row justify-center gap-[100px] mt-[50px]">
                    <button @click="approvePayee()" class="w-[209px] h-[42px] bg-[#11B2FC] text-white rounded-lg uppercase shadow-lg">for approval - ca</button>
                    <button @click="rejectedPayee()" class="w-[112px] h-[42px] bg-[#A80000] text-white rounded-lg uppercase shadow-lg">reject</button>
                    <button @click="closeModal()" class="w-[116px] h-[42px] bg-[#F24F47] text-white rounded-lg uppercase shadow-lg">cancel</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import SearchIcon from '../../../icons/Budgetary/searchIcon.vue'
import Nav from '../Index.vue'

export default {
    components: {
        SearchIcon,
        Nav
    },  
    data() {
        return {
            payee: [],
            payees: [],
            searchQuery: '',
            selected: [],
            selectedData: null,
            epayee: {},
            showViewPayee: false,
            epayee: {
                currPayee: { 
                    complete_name: '',
                    complete_address: '',
                    type_of_payee_id: '',	
                    tax: '',
                    dti: '',	
                    sec: '',
                    cda: '',
                    authorized: '',
                    contact: '',
                    email: '',
                    receiver: '',
                }
            },
        }
    },
    props: {
        payees: {
            type: Array,
            required: true
        }
    },
    methods: {
        closeModal() {
            this.showViewPayee = false;
        },
        initView(payee) {
            this.epayee = { currPayee: payee };
            this.showViewPayee = true;
        },
        fetchPayees() {
            axios.get('Payee-Enroll/caListPayee')
            .then(response => {
                this.pay = response.data.list;
                console.log(this.pay);
            })
            .catch(error => {
                console.log(error);
            })
        },
        toggleSelected(payee) {
            if (this.isSelected(payee)) {
                const index = this.selected.findIndex((selectedPayee) => {
                    return selectedPayee.id === payee.id;
                });
                this.selected.splice(index, 1);
                if (this.selected.length === 0) {
                    this.selectedData = null; // Reset selectedData when no payees are selected
                }
            } else {
                this.selected.push(payee.id);
                this.selectedData = payee; // Set the selected payee as the selectedData
            }
            this.selectAll = this.selected.length === this.payees.length;
        },
        async rejectedPayee() {
            try{
                const dataAppr = {
                    id: this.epayee.currPayee.id,
                    type: this.epayee.currPayee.type_of_payee_id,
                };

                console.log(this.epayee.currPayee.type_of_payee_id)
                console.log(dataAppr)

                const createResponse = await axios.post(`Payee-Enroll/caReject`, dataAppr
                );

                console.log(createResponse.data);

                await Swal.fire({
                    text: "Your entry has been successfully added. The account has been subject to Approval.",
                    html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The application has been successfully rejected!</span></div></div>',
                    showConfirmButton: false,
                    timer: 1500,
                });
            } catch (error) {
                console.log(error)
            }
        },
        async approvePayee() {
            try{
                const dataAppr = {
                    id: this.epayee.currPayee.id,
                    type: this.epayee.currPayee.type_of_payee_id,
                };

                console.log(this.epayee.currPayee.type_of_payee_id)
                console.log(dataAppr)

                const createResponse = await axios.post(`Payee-Enroll/caApproved`, dataAppr
                );

                console.log(createResponse.data);

                await Swal.fire({
                    text: "Your entry has been successfully added. The account has been subject to Approval.",
                    html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The application has been successfully rejected!</span></div></div>',
                    showConfirmButton: false,
                    timer: 1500,
                });
                window.location.reload();
            } catch (error) {
                console.log(error)
            }
        },
    },
    created() {
        this.fetchPayees();
    },
    watch: {
        selectAll(newVal) {
            if (newVal) {
            this.selected = this.filteredPayee.map(payee => payee.id);
            } else {
            this.selected = [];
            }
        }
    },
    mounted() {
        axios.get('Payee-Enroll/caListPayee')
        .then(response => {
            this.payees = response.data.list;
        })
        .catch(error => {
            console.log(error);
        })

        this.complete_name = this.epayee.currPayee.complete_name;
    },
    computed: {
        filteredPayee() {
            const searchQuery = this.searchQuery.toLowerCase();
            const filtered = this.payees.filter((payee) => {
                return (
                    payee.complete_name.toLowerCase().includes(searchQuery)
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