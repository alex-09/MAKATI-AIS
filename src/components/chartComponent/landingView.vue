<script>
import SelectionView from './selectionView.vue';
import BackIcon from '../icons/Document/BackArrow.vue';
import showAPI from '../../api_request/chartAccounts/landing'


export default {
    components: {
        SelectionView,
        BackIcon,
    },
    data() {
        return {
            showPrevModal: false,
            showNewModal: false,
            options: [],
            selectedOption: '',
            
        }
    },
    mounted() {
        // API REQUEST TO GET THE PREVIOUS DATE_EFFECTIVITY
        showAPI().then(options => {
            this.options = options;
        });
    },
    watch: {
        selectedOption(newValue) {
            console.log(newValue);
        },
    },
    methods: {
        goToTargetComponent() {
            this.$router.push({
                name: 'Charts',
                props: {
                    selectedOption: this.selectedOption
                }
            });
        }
    },
    beforeRouteLeave(to, from, next) {
        // Check if there is no selected option
        if (!this.selectedOption) {
        // Prevent the route from changing
        next(false);

        // Show an error message to the user
        Swal.fire({
            icon: 'error',
            title: 'Please select an Effectivity Date.',
            showConfirmButton: false,
            timer: 1500
        })

        } else {
        // Allow the route to change
        next();
        }
    }
}
</script>

<template>
    <div class="min-h-screen bg-document-bg flex items-center justify-center">
        <div class="container mx-auto">
            <div class="container bg-white rounded-md py-10 max-w-6xl">
                <!-- BACK BUTTON -->
                <div class="flex">
                    <div class="flex flex-auto">
                        <RouterLink :to="{ name: 'MainMenu' }" class="flex flex-row">
                            <BackIcon />
                            <span class="uppercase ml-3 font-medium text-base text-other-black-100">Back</span>
                        </RouterLink>
                    </div>
                </div>
                <!-- HEADER TEXT -->
                <div class="flex justify-center">
                    <p class="text-5xl capitalize font-medium mt-8">chart of accounts</p>
                </div>
                <!-- SELECTIONS FOR DOCUMENT MANAGEMENT -->
                <div class="flex justify-center py-28 gap-4">
                    <div @click="showPrevModal = true" class="bg-firstBtn rounded-md w-200 h-200 flex justify-center items-center text-center cursor-pointer">
                        <div>
                            <img src="/assets/prev.png" alt="" class="ml-2">
                            <span class="text-2xl text-white font-medium">Previous</span>
                        </div>
                    </div>
                    <RouterLink :to="{ name: 'Charts' }" class="bg-secondBtn rounded-md w-200 h-200 flex justify-center items-center text-center cursor-pointer">
                        <div>
                            <img src="/assets/current.png" alt="" class="ml-2">
                            <span class="text-2xl text-white font-medium">Current</span>
                        </div>
                    </RouterLink>
                    <RouterLink :to="{ name: 'Charts-new' }" class="bg-thirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center cursor-pointer">
                        <div>
                            <img src="/assets/new.png" alt="" class="ml-2">
                            <span class="text-2xl text-white font-medium">New</span>
                        </div>
                    </RouterLink>
                </div>
            </div>
        </div>
    </div>

    <!-- PREVIOUS MODAL  -->
    <div class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-30" v-if="showPrevModal">
        <div class="flex items-center justify-center min-h-screen">
            <div class="relative bg-white w-[384px] rounded-lg border shadow-xl">
                <div class="float-right my-2 mx-4">
                    <button @click="showPrevModal = false">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#F8274C"/>
                            <path d="M20.95 10.2485L19.7515 9.04999L15 13.8015L10.2485 9.04999L9.05005 10.2485L13.8015 15L9.05005 19.7515L10.2485 20.95L15 16.1985L19.7515 20.95L20.95 19.7515L16.1985 15L20.95 10.2485Z" fill="white" stroke="white"/>
                        </svg>
                    </button>
                </div>
                <!-- Modal content here -->
                <div class="my-2 mx-4">
                    <h2 class="uppercase text-xl font-medium mb-4 text-firstBtn">Previous</h2>
                </div>
                <div class="container mt-8">
                    <div class="text-center m-4 text-other-black-100">
                        Please select an Effectivity Date.
                    </div>
                </div>
                <div class="flex justify-center my-4">
                    <select v-model="selectedOption">
                        <option value="" disabled>Select an effectivity date</option>
                        <option v-for="option in options" :key="option.id" :value="option">{{ option.date_effectivity }} {{ option.coa_title }}</option>
                    </select>
                </div>
                <div class="flex justify-end gap-4 my-4 mr-4">
                    <RouterLink v-if="selectedOption" :to="{ name: 'Charts-prev',  params: { date_effectivity: date_effectivity, coa_title: coa_title  }, query: { date: selectedOption.date_effectivity, coa_title: selectedOption.coa_title }}" class="uppercase font-medium text-primary-color text-sm cursor-pointer">Accept</RouterLink>
                    <span @click="showPrevModal = false" class="uppercase font-medium text-danger-color text-sm cursor-pointer">Close</span>
                </div>
            </div>
        </div>
    </div>
</template>