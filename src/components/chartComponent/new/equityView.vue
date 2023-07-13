<template>
    <div v-if="this.equities == 0">
        <!-- NAVBAR -->
        <div class=" px-3 flex flex-1 flex-col sm:flex-row justify-between items-center text-other-black font-Inter text-xs font-semibold border shadow-md">
            <div class="flex flex-row items-center text-primary-color my-2">
                <RouterLink :to="{ name: 'Charts-new' }"><img src="../../../../public/assets/go_back_2.png" alt=""></RouterLink>
                <h1 class="text-2xl uppercase px-2">equity</h1>
            </div>
        </div>

        <div class="container">
            <div class="flex justify-start gap-8 flex-col text-center mt-8 mx-8">
                <div class="flex flex-col-2 gap-8">
                    <div class="flex flex-row gap-4 items-center">
                        <span
                            class="text-sm font-semibold">
                            Chart Title
                        </span>
                        <input 
                            type="text" 
                            id="coaTitleInput" 
                            v-model="coaTitle"
                            class="h-[32px] w-[284px] rounded text-sm focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"
                            required>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <span
                            class="text-sm font-semibold">
                            Date Effectivity
                        </span>
                        <input 
                            type="date" 
                            id="dateEffectivityInput" 
                            v-model="dateEffectivity"
                            class="h-[32px] w-[174px] rounded text-sm focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"
                            required>
                    </div>
                </div>
                <div class="flex flex-row gap-8 items-center">
                    <button class="bg-CfirstBtn rounded-md w-[200px] h-42 1536:w-[120px] 1536:h-[42px] flex justify-center items-center text-center uppercase text-white text-sm font-medium hover:bg-[#B0960F]" @click="openFileInput">
                        File Upload
                    </button >
                    <div class="flex flex-col gap-4">
                        <input type="file" ref="fileInput" style="display: none" @change="onFileSelected" accept=".csv" />
                        <span v-if="selectedFileName" class="text-primary-color font-normal text-sm">{{ selectedFileName }}</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-end"> 
                <button class="bg-CfirstBtn rounded-md w-[200px] h-42 1536:w-[120px] 1536:h-[42px] flex justify-center items-center text-center uppercase text-white text-sm font-medium hover:bg-[#B0960F]" @click="uploadFile">
                    View Data
                </button>
            </div>
        </div>
    </div>
    <div v-else>
        <div v-if="this.userDetails === 'City Accountant' || this.userPosition === 'Assistant Department Head forFRS'" >
            <TableView/>
        </div>
        <div v-if="this.userPosition === 'Division Head' && this.userDivision === 'Financial Reporting Division' || this.userDetails === 'Processor' || this.userDivision === 'Financial Reporting Division'">
            <ForApprovalView />
        </div>
    </div>
</template>

<script>
import TableView from './table/equityTable.vue';
import ForApprovalView from './table/equityTableApproval.vue';

import axios from 'axios';
import Swal from 'sweetalert2';
import Papa from 'papaparse';

export default {
    components: {
        TableView,
        ForApprovalView,
    },
    data() {
        return {
            searchQuery: '',
            equities: [],
            selectedFileName: null,
            selectedFile: null,
            coaTitle: '',
            dateEffectivity: '',
        }
    },
    methods: {
        fetchEquities() {
            axios.get(`coa/listTempEquity`)
            .then(response => {
                this.equities = response.data.list;
                console.log(this.equities)
            })
            .catch(error => {
                console.log(error);
            })
        },
        openFileInput() {
            this.$refs.fileInput.click();
        },
        onFileSelected(event) {
            const file = event.target.files[0];
            if (!file) return;
            if (!file.name.endsWith('.csv')) {
                alert('Please select a valid CSV file');
                this.selectedFileName = null;
                this.selectedFile = null;
                return;
            }
            this.selectedFileName = file.name;
            this.selectedFile = file;
        },
        uploadFile() {
        if (!this.selectedFile) {
            alert('Please select a file to upload');
            return;
        }

        if (!this.coaTitle) {
            alert('Please enter a COA Title');
            return;
        }

        if (!this.dateEffectivity) {
            alert('Please enter a effectivity date');
            return;
        }

        const formData = new FormData();
        formData.append('file', this.selectedFile);

        axios.get('coa/showEquity')
            .then(response => {

                const existingEquity = Array.isArray(response.data.data) ? response.data.data : [];
                const existingDateEffectIndexes = existingEquity.map(equities => equities.date_effect_index);
                const fileReader = new FileReader();
                fileReader.onload = () => {
                    const fileData = fileReader.result;
                    const parsedData = Papa.parse(fileData, {header: true}).data;
                    const newDateEffectIndexes = parsedData.map(equities => equities.date_effect_index);
                    const duplicates = newDateEffectIndexes.filter(index => existingDateEffectIndexes.includes(index));
                    if (duplicates.length > 0) {
                        console.log('passed here');
                        alert(`The following date_effect_indexes already exist in the database: ${duplicates.join(', ')}`);
                        return;
                    }
                    const newEquities = parsedData.filter(equities => !existingDateEffectIndexes.includes(equities.date_effect_index));
                    if (newEquities.length === 0) {
                        console.log('passed here too')
                        alert('All equities in the file already exist in the database');
                        return;
                    }

                    const newFormData = new FormData();
                    newFormData.append('file', this.selectedFile);
                    newFormData.append('title', this.coaTitle);
                    newFormData.append('date', this.dateEffectivity);

                    axios.post('coa/importEquity', newFormData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(response => {
                        console.log(response.data.title);
                        console.log(response.data.date);
                        this.coaTitle = response.data.itle;
                        this.dateEffectivity = response.data.date;
                        Swal.fire({
                            text: 'Your file has been successfully imported.',
                            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Your file has been successfully imported.</span></div></div>',
                            showConfirmButton: false,
                            timer: 5000
                        });
                        // alert('File uploaded successfully');
                        window.location.reload();
                    }).catch(error => {
                        console.error(error);
                        alert('File upload failed');
                    });
                };
                fileReader.readAsText(this.selectedFile);
            })
            .catch(error => {
                console.error(error);
                alert('Failed to retrieve existing equities');
            });
        },
    },
    async created() {
        this.fetchEquities();

        this.newCOA = {
            date: '',
            title: '',
            // other properties here
        };
        
        const response = await axios.get('me');

        this.userDetails = response.data.user.userdesignation
        this.userPosition = response.data.user.position
        this.userDivision = response.data.user.division
        console.log(response.data.user.position);
    },
    mounted() {
        axios.get(`coa/listTempEquity`)
        .then(response => {
            this.equities = response.data.list;
            console.log(response.data);
        })
        .catch(error => {
            console.log(error);
        })
    },
    computed: {
        filteredEquity() {
            const filtered = this.equities.filter((equity) => {
                axios.get(`coa/listTempEquity`)
                .then(response => {
                    this.equities = response.data.list;
                })
            });

            if (filtered.length === 0) {
                return [{ message: "No matches found" }];
            }

            return filtered;
        }
    },
}
</script>