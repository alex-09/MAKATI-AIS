<script setup>
import ViewIcon from "../../../icons/Budgetary/viewIcon.vue";
</script>
<template>
  <!-- TABLE -->
  <div class="container min-w-full px-6">
    <div class="flex flex-col">
      <div class="p-1.5 inline-block align-middle">
        <div class="overflow-y-scroll h-474">
          <table class="w-1470 divide-y divide-gray-200">
            <thead>
              <tr>
                <th colspan="5"></th>
                <th
                  colspan="2"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  balance of
                </th>
                <th colspan="2"></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                >
                  Program/Projects/Activities
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  Air reference code
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  allotment
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  obligation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  appropriation
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  allotment
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  utilization rate
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                >
                  action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  current appropriation
                </td>
              </tr>
              <!-- SAMPLE PROGRAM -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  (name of program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  A. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  B. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE SUB-TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left"
                >
                  Sub-Total of (Name of Program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- SECOND SAMPLE -->
              <!-- SAMPLE PROGRAM -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  (name of program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  A. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  B. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE SUB-TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-other-black-100 whitespace-nowrap text-left"
                >
                  Sub-Total of (Name of Program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>

              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold whitespace-nowrap text-left uppercase"
                >
                  EXECUTIVE GOVERNANCE PROGRAM
                </td>
              </tr>
              <!-- SAMPLE PROGRAM -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-other-black-100 whitespace-nowrap text-left capitalize"
                >
                  A. Consultancy Services
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. Management of City Investment
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-other-black-100 whitespace-nowrap text-left capitalize"
                >
                  B. Makati City Investment Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. Management of City Investment
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE SUB-TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-other-black-100 whitespace-nowrap text-left"
                >
                  Sub-Total of (Name of Program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- SAMPLE TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-other-black-100 whitespace-nowrap text-left uppercase"
                >
                  total current appropriation
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  continuing appropriation
                </td>
              </tr>
              <!-- SAMPLE PROGRAM -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left uppercase"
                >
                  (name of program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  A. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE PROJECT -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-bold text-gray-800 whitespace-nowrap text-left"
                >
                  B. Name of Project
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
              </tr>
              <!-- SAMPLE ACTIVITY -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  1. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <tr>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-left"
                >
                  2. (Name of Acticity)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  1000-000-2-1-01-002-002-000
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                >
                  <ViewIcon />
                </td>
              </tr>
              <!-- SAMPLE SUB-TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-primary-color whitespace-nowrap text-left"
                >
                  Sub-Total of (Name of Program)
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
              <!-- BLANK SPACE -->
              <tr>
                <td
                  class="px-10 py-2 text-xs font-bold text-white whitespace-nowrap text-left"
                >
                  blank space
                </td>
              </tr>
              <!-- SAMPLE TOTAL -->
              <tr>
                <td
                  class="px-6 py-2 text-xs font-semibold text-other-black-100 whitespace-nowrap text-left uppercase"
                >
                  total CONTINUING appropriation
                </td>
                <td
                  class="px-6 py-2 text-xs font-normal text-gray-800 whitespace-nowrap text-center"
                ></td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italic text-gray-800 whitespace-nowrap text-center"
                >
                  999,999.99
                </td>
                <td
                  class="px-6 py-2 text-xs font-semibold italicl text-gray-800 whitespace-nowrap text-center"
                >
                  99.99%
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
