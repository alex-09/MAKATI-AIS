<script>
    // ICONS COMPONENTS
    import BackIcon from '../icons/Document/BackArrow.vue'
    import Assets from '../icons/Chart/assetIcon.vue'
    import Liabilities from '../icons/Chart/liabilitiesIcon.vue'
    import Equity from '../icons/Chart/equityIcon.vue'
    import Income from '../icons/Chart/incomeIcon.vue'
    import Expense from '../icons/Chart/expenseIcon.vue'

    export default {
        components: {
            BackIcon,
            Assets,
            Liabilities,
            Equity,
            Income,
            Expense,
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
        <!-- HEADER TEXT -->
        <div class="flex justify-center">
            <p class="text-5xl capitalize font-medium mt-8">chart of accounts</p>
        </div>
        <!-- SELECTIONS FOR DOCUMENT MANAGEMENT -->
        <div class="flex justify-center py-28 gap-4">
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'ChartsAssets' }"  class="bg-CfirstBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Assets />
                    <span class="text-2xl text-white font-medium">Assets</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts Liabilities' }"  class="bg-CsecondBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Liabilities />
                    <span class="text-2xl text-white font-medium">Liabilities</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts Equity' }" class="bg-CthirdBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Equity />
                    <span class="text-2xl text-white font-medium">Equity</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts Income' }" class="bg-CfourthBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Income />
                    <span class="text-2xl text-white font-medium">Income</span>
                </div>
            </RouterLink>
            <!-- INCOMING BUTTON -->
            <RouterLink :to="{ name: 'Charts Expenses' }" class="bg-CfifthBtn rounded-md w-200 h-200 flex justify-center items-center text-center">
                <div>
                    <Expense />
                    <span class="text-2xl text-white font-medium">Expenses</span>
                </div>
            </RouterLink>
        </div>
    </div>
</template>