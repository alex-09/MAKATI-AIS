<template>
    <div class="container p-0 font-Inter">
        <div class="mt-5 mx-40">
            <div class="container grid place-content-center px-0">
                <div class="grid grid-rows-7 grid-flow-row gap-2 mt-2">
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Complete Agency Name</span>
                        <input 
                            type="text" 
                            class="w-1140 xxxxl:w-1435 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500" 
                            v-model="agencyName">
                                
                    </div>
                            
                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Complete Address</span>
                        <div class="grid grid-cols-4 my-1 items-center">
                            <input 
                                type="text" 
                                class="ml-2 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Building / House No."
                                v-model="houseNo"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Block / Lot No."
                                v-model="blockNo"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Street"
                                v-model="street"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Barangay"
                                v-model="barangay"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 mt-4 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Municipality / City"
                                v-model="city"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 mt-4 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Province"
                                v-model="province"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 mt-4 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Country"
                                v-model="country"
                            >  
                            <input 
                                type="text" 
                                class="ml-2 mt-4 w-130 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500 " 
                                placeholder="Zip Code"
                                v-model="zipCode"
                            >  
                        </div>    
                    </div>

                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Tax Identification No.</span>
                        <input 
                            type="text" 
                            class="ml-2 w-420 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500" 
                            placeholder=""
                            v-model="taxNo"> 
                    </div>


                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Authorized Representative</span>
                        <input 
                        type="text" 
                        class="ml-2 w-420 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500"
                        placeholder=""
                        v-model="authorized"> 
                    </div>

                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Contact Number</span>
                        <input 
                        type="text" 
                        class="ml-2 w-420 xxxxl:w-12 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500"
                        placeholder=""
                        v-model="contactNo"> 
                        
                    </div>

                    <div class="flex flex-row my-1 items-center">
                        <span class="font-semibold text-sm text-other-black w-210">Email Address</span>
                        <input 
                        type="text" 
                        class="ml-2 w-420 xxxxl:w-1230 h-40 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white border-input-color text-sm text-gray-500"
                        placeholder=""
                        v-model="email"> 
                    </div>
                </div>
            </div>
            <div class="text-right fluid mr-40">
                <button 
                    class="bg-blue-500 hover:bg-blue-700 text-uppercase text-white font-bold py-2 px-4 rounded float-right"
                    @click="submitPayee"
                >
                    SUBMIT
                </button>
                <button 
                    class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right mr-2" 
                    @click="clearData"
                >
                    CLEAR
                </button>
            </div>
        </div>
    </div>                     
</template>
    
<script>
    import axios from 'axios';
    import Swal from "sweetalert2";

    export default {
        data() {
            return {
                agencyName: '',
                houseNo: '',
                blockNo: '',
                street: '',
                barangay: '',
                city: '',
                province: '',
                country: '',
                zipCode: '',
                taxNo: '',
                authorized:'',
                contactNo: '',
                email: '',
            }
        },
        methods: {
            // function na number then specific special characters pwede iinput
            validateNumber(event, field) {
            const regex = /^[0-9,-.+]+$/; // regex pattern to only allow numbers, - and , and .
                if (!regex.test(event.target.value)) {
                    event.target.value = event.target.value.replace(/[^\d]/g, ""); // remove any non-numeric characters
                    this[field] = event.target.value; // update the data property
                } else {
                    this[field] = event.target.value; // update the data property if input is valid
                }
            },
            // function para maclear lahat ng dapat na ininput
            clearData() {
                this.agencyName = '',
                this.houseNo = '';
                this.blockNo = '';
                this.street = '';
                this.barangay = '';
                this.city = '';
                this.province = '';
                this.country = '';
                this.zipCode = '';
                this.taxNo = '';
                this.authorized = '';
                this.contactNo = '';
                this.email = '';
            },
            async submitPayee() {
                try {
                    const createPayee = {
                        agency_name: this.agencyName,
                        building_no: this.houseNo,
                        lot_no: this.blockNo,
                        street: this.street,
                        barangay: this.barangay,
                        municipality_city: this.city,
                        province: this.province,
                        country: this.country,
                        zip_code: this.zipCode,
                        tax_id_no: this.taxNo,
                        authorized_rep: this.authorized,
                        contact_no: this.contactNo,
                        email: this.email,
                        receiver: this.userName,
                    };

                    const createResponse = await axios.post(
                        "Payee-Enroll/government-agency",
                        createPayee
                    );
                    console.log(createResponse.data);
                    await Swal.fire({
                        text: "Your entry has been successfully added. The account has been subject to Approval.",
                        html: `<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">${createResponse.data.message}</span></div></div>`,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // TO CLEAR THE INPUT FIELDS
                    this.agencyName = '',
                    this.houseNo = '';
                    this.blockNo = '';
                    this.street = '';
                    this.barangay = '';
                    this.city = '';
                    this.province = '';
                    this.country = '';
                    this.zipCode = '';
                    this.taxNo = '';
                    this.authorized = '';
                    this.contactNo = '';
                    this.email = '';
                } catch (error) {
                    console.error(error);
                }
            }
        },
        async created() {
            const response = await axios.get('me');
            this.userName = response.data.user.firstname + ' ' + response.data.user.surname
            console.log(this.userName);
        }
    }
</script>