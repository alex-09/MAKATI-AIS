<template>
  <div
    class="grid grid-cols-1 md:grid-cols-2 gap-y-[16px] px-[42px] mt-[25px] gap-x-[42px]"
  >
    <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
      <div class="font-semibold text-sm">Name of Company:</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" /> -->
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.nameOfCompany"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>
    <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
      <div class="font-semibold text-sm">Source Document:</div>
      <div class="h-32 relative">
        <input
          type="file"
          ref="fileInput"
          @change="onFileSelected"
          class="absolute w-full h-full opacity-0 cursor-pointer"
          accept=".pdf"
        />
        <div
          class="border border-gray-300 rounded-md py-1 px-2 w-full flex items-center justify-between text-sm"
        >
          <span>{{ selectedFileName }}</span>
          <button
            type="button"
            @click="openFilePicker"
            class="ml-2 w-[138px] h-[25px] bg-[#FFECB3] text-[#606060] text-[14px] font-semibold px-4 rounded cursor-pointer flex justify-center items-center gap-1"
          >
            <svg
              width="18"
              height="19"
              viewBox="0 0 18 19"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M6.6 13.4998V8.69983L5 10.2998"
                stroke="#606060"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M6.59998 8.69983L8.19998 10.2998"
                stroke="#606060"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M17 7.9V11.9C17 15.9 15.4 17.5 11.4 17.5H6.6C2.6 17.5 1 15.9 1 11.9V7.1C1 3.1 2.6 1.5 6.6 1.5H10.6"
                stroke="#606060"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M17 7.9H13.8C11.4 7.9 10.6 7.1 10.6 4.7V1.5L17 7.9Z"
                stroke="#606060"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            Choose File
          </button>
        </div>
      </div>
    </div>
    <!-- OLD SOURCE DOCUMENT INPUT -->
    <!-- <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
      <div class="font-semibold text-sm">Source Document:</div>
      <div class="h-32 relative">
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.sourceDocument"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div> -->
    <div class="grid md:grid-cols-[194px_auto] md:col-span-2 items-center">
      <div class="font-semibold text-sm">General Description:</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" /> -->
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.generalDescription"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>

    <div class="grid lg:grid-cols-[194px_auto] items-center">
      <div class="font-semibold text-sm">Official Receipt No.:</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" /> -->
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.officialReceiptNo"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>
    <div class="grid lg:grid-cols-[194px_auto] items-center">
      <div class="font-semibold text-sm">Official Receipt Date:</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" /> -->
        <!-- <input
          type="date"
          id="start"
          name="trip-start"
          min="2018-01-01"
          max=""
          v-model="trustReceipt.officialReceiptDate"
          :disabled="childData ? 1 : 0"
        /> -->
        <input
          type="date"
          id="start"
          name="trip-start"
          min="2018-01-01"
          max=""
          v-model="trustReceipt.officialReceiptDate"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>
    <div class="grid lg:grid-cols-[194px_auto] items-center md:col-start-2">
      <div class="font-semibold text-sm">Official Receipt Amount</div>
      <div class="h-32 relative">
        <!-- <Textbox :placeholder="'edit placeholder'" /> -->
        <input
          type="text"
          class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
          v-model="trustReceipt.officialReceiptAmount"
          :disabled="childData ? 1 : 0"
        />
      </div>
    </div>
  </div>
  <FundTitle
    :trustReceipt="trustReceipt"
    @data-to-parent="updateParentData"
  ></FundTitle>
</template>
<script setup>
import FundTitle from "./FundTitle.vue";
import Textbox from "../reusableComponents/Textbox.vue";
</script>

<script>
export default {
  components: {
    FundTitle,
  },
  data() {
    return {
      childData: "",

      trustReceipt: {
        nameOfCompany: "",
        sourceDocument: "",
        generalDescription: "",
        officialReceiptNo: "",
        officialReceiptDate: "",
        officialReceiptAmount: "",
        // file upload data
        selectedFile: null,
        selectedFileName: null,
      },
    };
  },
  methods: {
    updateParentData(res) {
      this.childData = res;
    },
    openFileInput() {
      this.$refs.fileInput.click();
    },
    onFileSelected(event) {
      const file = event.target.files[0];
      if (!file) return;
      if (!file.name.endsWith(".pdf")) {
        alert("Please select a valid PDF file");
        this.selectedFileName = null;
        this.selectedFile = null;
        return;
      }
      this.trustReceipt.selectedFileName = file.name;
      this.trustReceipt.selectedFile = file;
    },
  },
};
</script>
