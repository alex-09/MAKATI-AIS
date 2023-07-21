<template>
  <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
    <div
      class="font-normal text-sm col-span-2 flex items-center before:flex-grow before:mr-[10px] after:ml-[10px] before:border-b-[1px] italic after:flex-[1] after:border-b-[1px]"
    >
      Purpose No. {{ number }}
    </div>
  </div>

  <div class="grid lg:grid-cols-[194px_auto] items-center">
    <div class="font-semibold text-sm">Sub Fund Title:</div>
    <div class="h-32 relative">
      <Dropdown
        :dataArray="SubFundOptions"
        :placeholder="'Select Sub Fund Title'"
      />
    </div>
  </div>
  <div class="grid lg:grid-cols-[194px_auto] items-center">
    <div class="font-semibold text-sm">Amount Allocated:</div>
    <div class="h-32 relative">
      <Dropdown
        :dataArray="AmountAllocatedOptions"
        :placeholder="'Select Amount Allocated'"
      />
    </div>
  </div>
  <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
    <div class="font-semibold text-sm">Specific Purpose:</div>
    <div class="h-32 relative">
      <Dropdown
        :dataArray="SpecificPurposeOptions"
        :placeholder="'Select Specific Purpose'"
      />
    </div>
  </div>
  <div class="grid lg:grid-cols-[194px_auto] items-center">
    <div class="font-semibold text-sm">Implementing Office:</div>
    <div class="h-32 relative">
      <Dropdown
        :dataArray="ImplementingOfficeOptions"
        :placeholder="'Select Implementing Office'"
      />
    </div>
  </div>
  <div class="gap-x-[17px] flex items-center justify-end">
    <button
      class="font-medium text-[15px] leading-[24px] px-[26px] h-42 text-white bg-[#ff4c51] shadow-md rounded-[5px]"
    >
      CANCEL
    </button>
    <button
      class="font-medium text-[15px] leading-[24px] px-[26px] h-42 bg-[#ffecb3] shadow-md rounded-[5px]"
    >
      SAVE
    </button>
  </div>
</template>

<script setup>
import Dropdown from "../reusableComponents/Dropdown.vue";
const props = defineProps({
  number: Number,
  SubFundOptions: Array,
  AmountAllocatedOptions: Array,
  SpecificPurposeOptions: Array,
  ImplementingOfficeOptions: Array,
});
</script>
