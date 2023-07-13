<script>
    // ICONS COMPONENTS
    import BackIcon from '../../icons/Document/BackArrow.vue'
    import Assets from '../../icons/Chart/assetIcon.vue'
    import Liabilities from '../../icons/Chart/liabilitiesIcon.vue'
    import Equity from '../../icons/Chart/equityIcon.vue'
    import Income from '../../icons/Chart/incomeIcon.vue'
    import Expense from '../../icons/Chart/expenseIcon.vue'

    import axios from 'axios';

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
                selectedOption: null,
                coa_title: null
            }
        },
        mounted() {
            this.selectedOption = this.$route.query.date;
            this.coa_title = this.$route.query.coa_title;
            console.log('Selected date:', this.selectedOption);
            axios.get(`coa/previousAsset?date=${this.$route.query.date}`)
                .then(response => {
                    console.log(response.data.data);
                })
                .catch(error => {
                    console.log(error);
                });
            
                console.log(this.$route.query.coa_title);
        },
        watch: {
            // '$route.query.selectedOption'(newVal) {
            //     this.selectedOption = newVal;
            // },
            selectedOption(newDate) {
                localStorage.setItem('selectedOption', newDate);
            },
            coa_title(newTitle) {
                localStorage.setItem('coa_title', newTitle);
            },
        },
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
        
        <p class="pt-4">Effectivity dates: {{ selectedOption }} {{ coa_title }}</p>
        <!-- <p>The selected option is: {{ $route.params.selectedOption }}</p> -->
        <!-- HEADER TEXT -->
        <div class="flex justify-center">
            <p class="text-5xl capitalize font-medium mt-8">chart of accounts</p>
        </div>
        <!-- SELECTIONS FOR DOCUMENT MANAGEMENT -->
        <div class="flex justify-center py-28 gap-4">
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'AssetsPrev', query: { date: this.selectedOption, coa_title: this.coa_title } }"  class="bg-CfirstBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
            <!-- <div @click="goToAssets"> -->
                <div>
                    <Assets />
                    <span class="text-2xl text-white font-medium">Assets</span>
                </div>
            <!-- </div> -->
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'LiabilitiesPrev', query: { date: this.selectedOption, coa_title: this.coa_title } }"  class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Liabilities />
                    <span class="text-2xl text-white font-medium">Liabilities</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'EquityPrev', query: { date: this.selectedOption, coa_title: this.coa_title } }" class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Equity />
                    <span class="text-2xl text-white font-medium">Equity</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'IncomePrev', query: { date: this.selectedOption, coa_title: this.coa_title } }" class="bg-CfourthBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Income />
                    <span class="text-2xl text-white font-medium">Income</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'ExpensePrev', query: { date: this.selectedOption, coa_title: this.coa_title } }" class="bg-CfifthBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Expense />
                    <span class="text-2xl text-white font-medium">Expenses</span>
                </div>
            </RouterLink>
        </div>
    </div>
</template>