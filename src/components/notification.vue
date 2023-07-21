<script></script>

<template>
    <div class="text-center py-8">
        <h1 class="font-inter text-5xl font-semibold text-white">Notifications</h1>
    </div>
    <div class="container h-550 w-[1350px] rounded-3xl shadow-lg p-0 divide-y divide-solid">
        <!-- SEARCH BAR DIV -->
        <div class="flex justify-end p-8">
            <label class="relative ml-8">
                <input type="text" name="search" placeholder="Search" class="w-[308px] h-[36px] border border-black rounded px-4 focus:outline-none focus-visible:ring-white focus:border-black  text-sm bg-white">
                <!-- PAPALITAN NALANG NG SEARCH ICON SINCE SVG SIYA KAYA GANYAN KULAY -->
                <svg 
                    class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
                    width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="20" height="20" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_38_8737" transform="scale(0.0111111)"/>
                        </pattern>
                        <image id="image0_38_8737" width="90" height="90" xlink:href="data:image/png;base64,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"/>
                    </defs>
                </svg>
            </label>
        </div>

        <!-- NOTIF DIV -->
        <div class="flex justify-between hover:bg-[#5bca93] p-8 divide-gray-200">
            <div>
                <h1 class="capitalize text-base font-extrabold text-[#009933]">wilkins villanueva</h1>
                <span class="text-sm font-semibold text-black">Salary is adjusted.</span>
            </div>
            <div>
                <h1 class="italic text-sm font-semibold text-black">March 14, 2022</h1>
                <div class="float-right">
                    <span class="italic capitalize text-sm font-semibold text-black">Today</span>
                </div>
            </div>
        </div>
        <div class="flex justify-between hover:bg-[#5bca93] p-8 divide-gray-200">
            <div>
                <h1 class="capitalize text-base font-extrabold text-[#009933]">wilkins villanueva</h1>
                <span class="text-sm font-semibold text-black">Salary is adjusted.</span>
            </div>
            <div>
                <h1 class="italic text-sm font-semibold text-black">March 14, 2022</h1>
                <div class="float-right">
                    <span class="italic capitalize text-sm font-semibold text-black">Today</span>
                </div>
            </div>
        </div>
        <div class="flex justify-between hover:bg-[#5bca93] p-8 divide-gray-200">
            <div>
                <h1 class="capitalize text-base font-extrabold text-[#009933]">wilkins villanueva</h1>
                <span class="text-sm font-semibold text-black">Salary is adjusted.</span>
            </div>
            <div>
                <h1 class="italic text-sm font-semibold text-black">March 14, 2022</h1>
                <div class="float-right">
                    <span class="italic capitalize text-sm font-semibold text-black">Today</span>
                </div>
            </div>
        </div>
        <!-- FOOTER PAGINATION PABAGO NALANG SINCE DI KO MAKUHA YUNG SVG -->
        <div class="flex justify-end p-8">
            <button class="border-2 border-[#009933] w-[32px] h-[32px] rounded-lg mx-2 hover:bg-[#009933] hover:text-white">N</button>
            <button class="border-y-2 border-l-2 border-[#009933] w-[32px] h-[32px] rounded-l-lg hover:bg-[#009933] hover:text-white">1</button>
            <button class="border-2 border-[#009933] w-[32px] h-[32px] hover:bg-[#009933] hover:text-white">2</button>
            <button class="border-y-2 border-r-2 border-[#009933] w-[32px] h-[32px] rounded-r-lg hover:bg-[#009933] hover:text-white">3</button>
            <button class="border-2 border-[#009933] w-[32px] h-[32px] rounded-lg mx-2 hover:bg-[#009933] hover:text-white">B</button>
        </div>
    </div>
</template>