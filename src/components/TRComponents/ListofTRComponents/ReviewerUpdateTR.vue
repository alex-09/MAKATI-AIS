<script>
</script>

<template>
    <div class="flex justify-start m-8">
        <span class="text-[22px] font-bold text-[#3A3541]">Update Trust Receipts</span>
    </div>
    <div class="flex flex-row gap-[80px]">
        <div class="flex flex-row gap-4 mx-8 h-[32px] items-center">
            <span class="text-[14px] font-semibold text-[#3A3541]">Source of Trust Receipts:</span>
            <input type="text" class="w-[400px] h-[32px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm rounded-[6px]">
        </div>
        <div class="flex flex-row gap-4 mx-8 h-[32px] items-center">
            <span class="text-[14px] font-semibold text-[#3A3541]">Main Fund Title:</span>
            <input type="text" class="w-[400px] h-[32px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm rounded-[6px]">
        </div>
    </div>
    <div class="flex justify-center mt-[50px]">
        <span class="text-[22px] font-bold text-[#3A3541]">Details of Updates</span>
    </div>

    <div class="flex justify-center">
        <div class="overflow-x-auto overscroll-x-contain max-h max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850">
            <table class="divide-y w-[1800px] divide-gray-200 mr-8">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            sub-fund title
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            reference
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            reason for update
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            latest balance
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            addition
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            deduction
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase">
                            updated balance
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize">
                            sample
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center my-[30px]">
        <span class="text-[14px] text-[#3A3541] uppercase font-semibold my-1">remarks/comments</span>
        <textarea name="" id="" cols="100" rows="2" class="text-[12px] rounded-[5px] border-[1px] focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color"></textarea>
    </div>

    <div class="flex flex-row justify-center items-center gap-14 mb-[20px]">
        <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[209px] h-[42px] bg-[#16B1FF]">for approval - dh</button>
        <button class="uppercase text-[15px] font-medium text-white rounded-[5px] w-[115px] h-[42px] bg-danger-color">reject</button>
    </div>
</template>