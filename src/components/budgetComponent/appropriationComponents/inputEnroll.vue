<script setup>
import EnrollBox from "../../../components/budgetComponent/Update/baseListbox.vue"
    import { ref } from 'vue'

    const year = [
        {value: 1, label: '2017' },
        {value: 2, label: '2018' },
        {value: 3, label: '2019' },
        {value: 4, label: '2020' },
        {value: 5, label: '2021' },
        {value: 6, label: '2022' },
    ];

    const adjustment = [
        {value: 1, label: 'SUPPLEMENTAL BUDGET' },
        {value: 2, label: 'REALIGNMENT' },
        {value: 3, label: 'REVERSION' },
    ];

    const fund = [
        {value: 1, label: 'GENERAL FUND' },
        {value: 2, label: 'SPECIAL EDUCATION FUND' },
    ];

    const form = ref({
        year_id: null,
        type_adjustment: null,
        fund_id: null,
    });
</script>

<template>
    <!-- NEW TRANSACTION -->
    <div v-if="isNewTrans | isNewTrans === 'true'">
        <div class="grid grid-cols-2 gap-4 mx-8 my-8" >
            <!-- FIRST COLUMN -->
            <div>
                <!-- BUDGET YEAR -->
                <div class="flex flex-row gap-4 my-1">
                    <div>
                        <span>Budget Year hello</span>
                    </div>
                    <div class="mr-8">
                        <EnrollBox 
                            placeholder="Select year"
                            v-model="form.year_id"
                            :options="year"/>   
                    </div>
                </div>
                <!-- TYPE OF ADJUSTMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Type of Adjustment</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select adjustment"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- SOURCE DOCUMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Source Document</span>
                    </div>
                    <div>
                        <input type="text" name="sourceDocument" placeholder="Enter Source Document" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm placeholder:text-gray-500">
                    </div>
                </div>
                <!-- DEPARTMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Department</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select adjustment"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- TITLE OF THE PROGRAM -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Title of the Program</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select program"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- TITLE OF THE PROJECT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Title of the Project</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select project"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- TITLE OF THE ACTIVITY -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Title of the Activity</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select activity"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
            </div>
            <!-- SECOND COLUMN -->
            <div>
                <!-- FUNDING SOURCE -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Funding Source</span>
                    </div>
                    <div class="mr-8">
                        <EnrollBox 
                            placeholder="Select Funding Source"
                            v-model="form.fund_id"
                            :options="fund"/>
                    </div>
                </div>
                <!-- SUPPLEMENTAL BUDGET NUMBER -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>Supplemental Budget Number</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="sourceDocument" placeholder="Enter Source Document" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
                <!-- DATE OF DOCUMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Date of Document</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="date" name="sourceDocument" placeholder="Enter Source Document" class="w-95 h-37 border rounded-lg bg-white py-2 pr-2 pl-3 focus:outline-none text-gray-500 text-sm placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
                <!-- OFFICE CODE -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>Office Code</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" readonly="readonly" class="w-95 h-37 border rounded-lg py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-text-gray placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
                <!-- AIP CODE (PROGRAM)-->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>AIP Code (Program)</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" placeholder="Enter AIP Code" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-other-black-100 placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
                <!-- AIP CODE (PROJECT) -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>AIP Code (Project)</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" placeholder="Enter AIP Code" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-other-black-100 placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
                <!-- AIP CODE (ACTIVITY) -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>AIP Code (Activity)</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" placeholder="Enter AIP Code" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-other-black-100 placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-4">
            <div class="flex justify-end gap-4">
                <div>
                    <button class="w-125 h-42 bg-button-blue text-white uppercase rounded-lg">process</button>
                </div>
                <div>
                    <button class="w-125 h-42 bg-danger-color text-white uppercase rounded-lg">close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- PREV TRANSACTION -->
    <div v-if="!isNewTrans | isNewTrans === 'false'">
        <div class="grid grid-cols-2 gap-4 mx-8 my-8" >
            <!-- FIRST COLUMN -->
            <div>
                <!-- BUDGET YEAR -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Budget Year</span>
                    </div>
                    <div class="mr-8">
                        <EnrollBox 
                            placeholder="Select year"
                            v-model="form.year_id"
                            :options="year"/>
                    </div>
                </div>
                <!-- TYPE OF ADJUSTMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Type of Adjustment</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select adjustment"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- SOURCE DOCUMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Source Document</span>
                    </div>
                    <div>
                        <input type="text" name="sourceDocument" placeholder="Enter Source Document" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-100 text-sm read-only:bg-other-black-100 placeholder:text-gray-500">
                    </div>
                </div>
                <!-- DEPARTMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Department</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select adjustment"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- TITLE OF THE PROGRAM -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Title of the Program</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select program"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- TITLE OF THE PROJECT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Title of the Project</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select project"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
                <!-- TITLE OF THE ACTIVITY -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Title of the Activity</span>
                    </div>
                    <div>
                        <EnrollBox 
                            placeholder="Select activity"
                            v-model="form.type_adjustment"
                            :options="adjustment"/>
                    </div>
                </div>
            </div>
            <!-- SECOND COLUMN -->
            <div>
                <!-- FUNDING SOURCE -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Funding Source</span>
                    </div>
                    <div class="mr-8">
                        <EnrollBox 
                            placeholder="Select Funding Source"
                            v-model="form.fund_id"
                            :options="fund"/>
                    </div>
                </div>
                <!-- SUPPLEMENTAL BUDGET NUMBER -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>Supplemental Budget Number</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="sourceDocument" placeholder="Enter Source Document" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm placeholder:text-gray-500">
                        </div>
                    </div>
                </div>
                <!-- DATE OF DOCUMENT -->
                <div class="grid grid-cols-2 gap-4 my-1">
                    <div>
                        <span>Date of Document</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="date" name="sourceDocument" placeholder="Enter Source Document" class="w-95 h-37 border rounded-lg bg-white py-2 pr-2 pl-3 focus:outline-none text-gray-500 text-sm">
                        </div>
                    </div>
                </div>
                <!-- OFFICE CODE -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>Office Code</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" readonly="readonly" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-text-gray">
                        </div>
                    </div>
                </div>
                <!-- AIP CODE (PROGRAM)-->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>AIP Code (Program)</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" readonly="readonly" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-text-gray">
                        </div>
                    </div>
                </div>
                <!-- AIP CODE (PROJECT) -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>AIP Code (Project)</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" readonly="readonly" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-text-gray">
                        </div>
                    </div>
                </div>
                <!-- AIP CODE (ACTIVITY) -->
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <span>AIP Code (Activity)</span>
                    </div>
                    <div class="mr-8">
                        <div>
                            <input type="text" name="" readonly="readonly" class="w-95 h-37 border rounded-lg bg-white py-2 pl-3 focus:outline-none text-gray-500 text-sm read-only:bg-text-gray">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container px-4">
            <div class="flex justify-end gap-4">
                <div>
                    <button class="w-125 h-42 bg-button-blue text-white uppercase rounded-lg">process</button>
                </div>
                <div>
                    <button class="w-125 h-42 bg-danger-color text-white uppercase rounded-lg">close</button>
                </div>
            </div>
        </div>
    </div>

</template>