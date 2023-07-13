<script>
    // ICONS COMPONENTS
    import BackIcon from '../../icons/Document/BackArrow.vue'
    import Assets from '../../icons/Chart/assetIcon.vue'
    import Liabilities from '../../icons/Chart/liabilitiesIcon.vue'
    import Equity from '../../icons/Chart/equityIcon.vue'
    import Income from '../../icons/Chart/incomeIcon.vue'
    import Expense from '../../icons/Chart/expenseIcon.vue'

    import axios from 'axios';
    import Papa from 'papaparse';
    import Swal from 'sweetalert2';


    export default {
        components: {
            BackIcon,
            Assets,
            Liabilities,
            Equity,
            Income,
            Expense,
        },
        data() {
            return {
                selectedFileName: null,
                selectedFile: null
            }
        },
        methods: {
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

            const formData = new FormData();
            formData.append('file', this.selectedFile);

            axios.get('coa/showAssets')
                .then(response => {
                
                const existingAssets = Array.isArray(response.data.data) ? response.data.data : [];
                const existingDateEffectIndexes = existingAssets.map(asset => asset.date_effect_index);
                const fileReader = new FileReader();
                fileReader.onload = () => {
                    const fileData = fileReader.result;
                    const parsedData = Papa.parse(fileData, {header: true}).data;
                    const newDateEffectIndexes = parsedData.map(asset => asset.date_effect_index);
                    const duplicates = newDateEffectIndexes.filter(index => existingDateEffectIndexes.includes(index));
                    if (duplicates.length > 0) {
                    console.log('passed here');
                    alert(`The following date_effect_indexes already exist in the database: ${duplicates.join(', ')}`);
                    return;
                    }
                    const newAssets = parsedData.filter(asset => !existingDateEffectIndexes.includes(asset.date_effect_index));
                    if (newAssets.length === 0) {
                    console.log('passed here too')
                    alert('All assets in the file already exist in the database');
                    return;
                    }

                    const newFormData = new FormData();
                    newFormData.append('file', this.selectedFile);

                    axios.post('coa/importAsset', newFormData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                        }).then(response => {
                            console.log(response.data.data);
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
                    alert('Failed to retrieve existing assets');
                });
            }
        }
    }
</script>

<template>
    <div class="container bg-white rounded-md py-10 max-w-6xl">
        <!-- BACK BUTTON -->
        <div class="flex">
            <RouterLink :to="{ name: 'ChartsLanding' }" class="flex flex-auto cursor-pointer">
                <div class="flex flex-row">
                    <BackIcon />
                    <span class="uppercase ml-3 font-medium text-base text-other-black-100">Back</span>
                </div>
            </RouterLink>
        </div>
        <!-- HEADER TEXT -->
        <div class="flex justify-center">
            <p class="text-5xl capitalize font-medium mt-8">chart of accounts</p>
        </div>
        <!-- SELECTIONS FOR DOCUMENT MANAGEMENT -->
        <div class="flex justify-center py-28 gap-4">
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts-asset-approval' }" class="bg-CfirstBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Assets />
                    <span class="text-2xl text-white font-medium">Asset</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts-liability-approval' }"  class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Liabilities />
                    <span class="text-2xl text-white font-medium">Liabilities</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts-equity-approval' }" class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Equity />
                    <span class="text-2xl text-white font-medium">Equity</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts-income-approval' }" class="bg-CfourthBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Income />
                    <span class="text-2xl text-white font-medium">Income</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts-expense-approval' }" class="bg-CfifthBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Expense />
                    <span class="text-2xl text-white font-medium">Expenses</span>
                </div>
            </RouterLink>
        </div>
    </div>
</template>