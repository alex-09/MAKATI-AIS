<template>
    <div class="overflow-auto h-max">
        <div class="sticky top-0 left-0 mb-5">
            <label class="font-bold text-[22px] text-[#606060]">CONTRACT DETAILS</label>
        </div>
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Type of Contract</label>
                        </div>
                        <div class="input-container">
                            <select class="rounded-md w-full border-solid border border-[#3a354147] h-[32px] p-1" v-model="selectedItem">
                                <option v-for="i in options" :key="i.id" :value="i.id">
                                    {{i.name}}
                                </option>
                            </select>
                        </div>
                        <!-- Testing of selected value -->
                        <!-- {{selectedItem}} -->
                    </div>
                    <div class="grid-cell-container  max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contract Amount</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contract Date</label>
                        </div>
                        <div class="input-container">
                            <input type="date" class="rounded-md text-text-gray-100 border-solid border border-[#3a354147] w-full h-[32px]">
                        </div>
                    </div>
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contract Number</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container  max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Mode of Procurement</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    <div class="grid-cell-container  max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Purchase Request No.</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Summary of Cost Estimate Number (INFRA)</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container  max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Name of Project</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class=" flex justify-end pl-[24px] ">
                <button class="button-design-1 bg-[#05c46b]">SEARCH</button>
            </div> -->
        </div>


        <!-- Second part PAYEE DETAILS -->
        <div class="sticky top-0 left-0 mt-10 mb-5">
            <label class="font-bold text-[22px] text-[#606060] ">PAYEE DETAILS</label>
        </div>
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Name of Payee</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Address</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Name of Authorized</label>
                        </div>
                        
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Designation</label>
                        </div>
                        
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Contact Number</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Company's Tin</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3rd part Delivery Details and Payment terms -->
        <div class="sticky top-0 left-0 mt-10 mb-5">
            <label class="font-bold text-[22px] text-[#606060] ">DELIVERY DETAILS AND PAYMENT TERMS</label>
        </div>
        <div class="px-[24px] flex items-center sticky top-0 left-0">
            <div class="flex-grow flex-col flex gap-[14px]">
                <div class="grid grid-cols-2 gap-x-[45px] max-md:grid-cols-1">
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Place of Delivery</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                    <div class="grid-cell-container max-md:py-1">
                        <div class="py-1 leading-tight">
                            <label class="input-label-name">Payment Term</label>
                        </div>
                        <div class="input-container">
                            <TextBox />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sticky top-0 left-0 mt-10 mb-5">
            <label class="font-bold text-[22px] text-[#606060] ">DELIVERY TERM</label>
        </div>

        <div class="my-[11px] flex flex-col gap-2">
            <TableView />
        </div>
    </div>

    <div class="px-[24px] flex items-center mb-[40px]">
        <div class="flex-grow flex-col flex gap-[14px]">
            <div class="grid grid-cols-3 gap-x-[45px] max-md:grid-cols-1">
                <div class="grid-cell-container ">
                </div>
                <div class="grid-cell-container">
                </div>
                <div class="col-start-auto">
                    <label class="input-label-name">Contract Number</label>
                    <div class="input-container">
                        <TextBox />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-4/5 flex gap-[20px] mr-0 ml-auto justify-end mb-[10px] max-lg:flex-col max-lg:mr-auto">
        <RouterLink
            :to="{ name: 'AsstDeptHeadViewTransactions' }"
            class="w-full" >
            
            <button class="button-design-1 text-white bg-[#0E4572] w-full h-[3rem]">ENTER DETAILS</button>
        </RouterLink>
        
        <button class="button-design-1 text-white bg-[#0D99FF] w-full h-[3rem]">SAVE FOR APPROVAL</button>
        <button class="button-design-1 text-white bg-[#307191] w-full h-[3rem]">FOR BUDGETARY OBLIGATION</button>
        <button class="button-design-1 text-white bg-[#FF4C51] w-full h-[3rem]">CLEAR</button>
    </div>
    
    <div class="w-4/5 flex gap-[20px] mr-0 ml-auto justify-end mb-[10px] max-lg:flex-col max-lg:mr-auto">
        <button class="button-design-1 text-white bg-[#56CA00] w-full h-[3rem]">VIEW CONTRACT</button>
        <button class="button-design-1 text-white bg-[#872Afb] w-full h-[3rem]">1ST APPROVAL</button>
        <button class="button-design-1 text-white bg-[#4966a4] w-full h-[3rem]">SAVE FOR APPROVAL</button>
    </div>
</template>

<script>
import TableView from '../CATableViewDeliveryTerm.vue';
import Dropdown from '../../../TRComponents/reusableComponents/Dropdown.vue';
import SearchBox from '../../../TRComponents/reusableComponents/Searchbox.vue';
import TextBox from '../../../TRComponents/reusableComponents/Textbox.vue';

export default{
    data() {
        return{
            selectedItem: null,
            options: [
                {id: 1, name: "option 1"},
                {id: 2, name: "option 2"},
                {id: 3, name: "option 3"},
            ],
        }
    },
    components: {
        TableView,
        Dropdown,
        SearchBox,
        TextBox
    }
}
</script>


