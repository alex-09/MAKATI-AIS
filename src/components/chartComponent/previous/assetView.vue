<script>
import axios from 'axios';
import TableView from './table/tableView.vue';

import showAssetAPI from '../../../api_request/chartAccounts/current/asset'

export default {
        name: "App",
        components: {
            TableView
        },
        data() {
            return {
                date_effectivity: '',
                selectedOption: null,
                coa_title: null,
            };
        },
        methods: {
            // API REQUEST TO ABLE TO VIEW THE PENDING ACCOUNTS
            async getAccount() {
                try {
                    const response = await axios.get("coa/showAssets")
                    this.accounts = response.data.list;
                } catch (error) {
                    console.error(error);
                }
            },

            exportAsset() {
                const date = this.$route.query.date; // Get the date parameter from the URL query string
                const title = this.$route.query.coa_title;
                axios
                    .get(`coa/exportAsset?date=${this.$route.query.date}`, {
                    responseType: 'arraybuffer'
                    })
                    .then(response => {
                    const fileData = new Blob([response.data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    const fileURL = window.URL.createObjectURL(fileData);
                    const fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    fileLink.download = `Assets_${date}_${title}.xlsx`;
                    document.body.appendChild(fileLink);
                    fileLink.click();
                    console.log(response);
                    })
                    .catch(error => {
                    console.log(error);
                    });
            },


            async getAccount() {
                const api = showAssetAPI();
                await api.getAccount();
            }
        },
        computed: {
            account_code() {
                return `${this.account_group}-${this.major_account_group}-${this.sub_major_account_group}-${this.general_ledger_accounts}-${this.sub_ledger_accounts}-${this.sub_sub_ledger_accounts}`;
            }
        },
        mounted() {
            this.getAccount();

            console.log('query.date:', this.$route.query.date);
            this.selectedOption = this.$route.query.date;

            this.coa_title = this.$route.query.coa_title;

            axios.get(`coa/previousAsset?date=${this.$route.query.date}`)
            .then(response => {
                console.log(response.data.data);
            })
            .catch(error => {
                console.log(error);
            })
        }
    };
</script>

<template>
    <TableView />
    <div 
        class="flex justify-end mx-14 mt-8">
        
        <button
            class="uppercase font-bold text-white bg-secondBtn h-42 w-[150px] rounded"
            @click="exportAsset">
                export
        </button>
    </div>
</template>



