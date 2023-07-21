<template>
    <div class="min-h-[400px] max-h-[400px] overflow-auto bg-white border-2 border-[#05C64B] border-solid">
        <!-- Sticky header applied in <table> and <thead> -->
        <table class="w-full min-w-max border-separate border-spacing-0">
            <thead class=" sticky top-0 left-0 right-0 bg-white z-50">
                <tr>
                    <th></th>
                    <th>
                        <div>
                            <span>DATE</span>
                        </div>
                    </th>
                    <th>TIME</th>
                    <th>PARTICULARS</th>
                    <th>USER</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="i in 1" :key="i">
                    <!-- CHECKBOX -->
                    <td class="w-[50px]">
                        <input type="checkbox" class="w-auto ml-[16px]">
                    </td>

                    <!-- DATE -->
                    <td class="w-[148px]">AUTOFILL</td>

                    <!-- TIME -->
                    <td>AUTOFILL</td>

                    <!-- PARTICULARS -->
                    <td class="w-[500px]">AUTOFILL</td>

                    <!-- USER -->
                    <td>AUTOFILL</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style scoped>
th{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    align-items: center;
    padding: 6px 4px;
}
td{
    font-weight: 600;
    font-size: 10px;
    line-height: 24px;
    text-align: center;
    padding: 6px 4px;
}
td, th{
    border-bottom: 1px solid #3a354147;
}

</style>