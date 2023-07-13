<script>
import axios from "axios";
import { useRouter } from "vue-router";
import router from "../../../router";
export default {
  data() {
    return {
      appropriation: [],
      supplemental: [],
      realignment: [],
      reversion: [],
      final: [],

      message: [],
    };
  },
  methods: {},
  async created() {
    this.message = this.$route.query.res;
    this.message = JSON.parse(this.message);
  },
};
</script>
<template>
  <div class="flex justify-start mt-[50px] m-8">
    <span class="text-[16px] font-bold uppercase text-[#606060]">
      details of allotment for activity number
    </span>
  </div>
  <div class="flex flex-row justify-between mt-[20px] mx-8">
    <div class="flex flex-col gap-4 items-center">
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Budget Year
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Budget Year Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Reference Document
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Reference Document Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Title of the Program
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Title of the Program Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Title of the Project
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Title of the Project Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Title of the Activity
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Title of the Activity Input
        </span>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Funding Source
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Funding Source Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          Type of Appropriation
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          Type of Appropriation Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          AIP Code (Program)
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          AIP Code (Program) Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          AIP Code (Project)
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          AIP Code (Project) Input
        </span>
      </div>
      <div class="flex flex-row gap-4 items-center">
        <span
          class="text-[14px] font-semibold text-[#606060] w-[250px] h-[32px] flex items-center"
        >
          AIP Code (Activity)
        </span>
        <span
          class="text-[14px] font-semibold text-[#606060] w-[360px] h-[32px] flex items-center"
        >
          AIP Code (Activity) Input
        </span>
      </div>
    </div>
  </div>
  <div class="flex flex-row mx-8 items-center gap-4">
    <span
      class="text-[14px] font-semibold text-[#606060] w-[250px] h-[55px] flex items-center"
    >
      Activity Description
    </span>
    <span
      class="text-[14px] font-semibold text-[#606060] max-w-[975px] max-h-[55px] flex items-center"
    >
      Activity Description Input
    </span>
  </div>
  <div class="flex flex-row mx-8 gap-4">
    <span
      class="text-[14px] font-semibold text-[#606060] w-[250px] h-[55px] flex items-center"
    >
      Registry of Allotment
    </span>
    <span
      class="text-[14px] font-semibold text-[#606060] w-100% max-h-[55px] flex items-center justify-center uppercase"
    >
      updated registry of obligations
    </span>
  </div>
  <div class="m-auto mx-6">
    <div
      class="flex justify-between p-4 grid-flow-row uppercase bg-button-blue"
    >
      <div>personal services</div>
      <div>maintenance and other operating expenses</div>
      <div>financial expenses</div>
      <div>capital outplay</div>
      <div>remarks</div>
    </div>
    <div class="flex justify-center uppercase my-4">
      amount per expense classification
    </div>
    <div>{{ message.supplemental }}</div>

    <div class="grid grid-cols-12 grid-flow-row capitalize bg-button-blue">
      <div class="bg-white"></div>
      <div class="bg-white">total amount</div>
      <div
        v-for="app in message.supplemental"
        class="flex justify-center self-center"
      >
        <div class="p-4">
          {{ app.account_name }}
        </div>
      </div>
    </div>
    <!-- original appro -->
    <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
      <div class="grid grid-rows p-4">original appropriation</div>
      <!-- <div class="grid grid-rows p-4">
        <div v-for="app in message.supplemental">
          {{ app.balance == null ? 0 : app.balance }}
        </div>
        <div>999</div>
        <div>999</div>
        <div>999</div>
        <div>999</div>
      </div> -->
      <div class="flex justify-center self-center">Total</div>
      <div
        class="flex justify-center self-center"
        v-for="app in message.supplemental"
      >
        {{ app.balance == null ? 0 : app.balance }}
      </div>

      <div
        class="grid grid-rows p-4 col-end-13"
        v-for="app in message.supplemental"
      >
        {{ app.status == null ? "For Review" : app.status }}
      </div>
    </div>
    <div>ADD/(LESS):</div>
    <!-- supplemental vbudget -->
    <div
      class="grid grid-cols-12 p-4 uppercase grid-flow-row"
      v-for="app in message.supplemental"
    >
      supplemental budget (SB) ||
      {{ app.adjustment_no == null ? "adjustment_no" : app.adjustment_no }}

      <div class="flex justify-center self-center"><DIV>TOTAL</DIV></div>
      <!-- balance -->
      <div
        class="flex justify-center self-center"
        v-for="app in message.supplemental"
      >
        <DIV> {{ app.balance == null ? 0 : app.balance }}</DIV>
      </div>

      <div class="grid grid-rows p-4 col-end-13">
        {{ app.status == null ? "For Review" : app.status }}
      </div>
    </div>
    <!-- realignment -->
    <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
      <div class="grid grid-rows p-4">realignment</div>
      <div class="grid grid-rows p-4">
        <div><DIV>999</DIV></div>
      </div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>

      <div class="grid grid-rows p-4">Approved</div>
    </div>
    <!-- reversion -->
    <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
      <div class="grid grid-rows p-4">reversion</div>
      <div class="grid grid-rows p-4">
        <div><DIV>999</DIV></div>
      </div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>

      <div class="grid grid-rows p-4">Approved</div>
    </div>
    <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
      <div><hr /></div>
    </div>
    <!-- final appro -->
    <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
      <div class="grid grid-rows p-4">final appropriation</div>
      <div class="grid grid-rows p-4">
        <div><DIV>999</DIV></div>
      </div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>
      <div class="grid grid-rows p-4"><DIV>999</DIV></div>

      <div class="grid grid-rows p-4">Approved</div>
    </div>
  </div>
  <div
    class="justify-between sm:justify-end flex px-5 text-white sm:gap-x-11 mt-4 gap-4"
  >
    <button
      class="bg-button-blue py-2 w-125 rounded-md"
      @click="this.$router.push('/Appropriation-Update')"
    >
      EDIT
    </button>
    <button
      class="bg-button-green-dark py-2 w-125 rounded-md"
      @click="forReview"
    >
      FOR REVIEW
    </button>
    <button class="bg-danger-color py-2 w-125 rounded-md" @click="cancel">
      CANCEL
    </button>
  </div>
</template>

<script></script>
