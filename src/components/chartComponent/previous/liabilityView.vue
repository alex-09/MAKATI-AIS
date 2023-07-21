<script>
import axios from 'axios';
import TableView from './table/tableLia.vue';

import showLiabilityAPI from '../../../api_request/chartAccounts/current/liability'

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
                    const response = await axios.get("coa/showLiabilities")
                    this.accounts = response.data.list;
                } catch (error) {
                    console.error(error);
                }
            },

            exportLiabilities() {
                const date = this.$route.query.date; // Get the date parameter from the URL query string
                const title = this.$route.query.coa_title;
                axios
                    .get(`coa/exportLiabilities?date=${this.$route.query.date}`, {
                    responseType: 'arraybuffer'
                    })
                    .then(response => {
                    const fileData = new Blob([response.data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    const fileURL = window.URL.createObjectURL(fileData);
                    const fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    fileLink.download = `Liabilities_${date}_${title}.xlsx`;
                    document.body.appendChild(fileLink);
                    fileLink.click();
                    console.log(response);
                    })
                    .catch(error => {
                    console.log(error);
                    });
            },

            async getAccount() {
                const api = showLiabilityAPI();
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

            axios.get(`coa/previousLiability?date=${this.$route.query.date}`)
            .then(response => {
                console.log(response.data.data);
                console.log('hello');
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
            @click="exportLiabilities">
                export
        </button>
    </div>
</template>



