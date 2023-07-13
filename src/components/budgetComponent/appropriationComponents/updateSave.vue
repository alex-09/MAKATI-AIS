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
      details of appropriation for activity number
    </span>
  </div>

  <div
    class="flex flex-row justify-between mt-[20px] mx-8"
    v-for="(mes, mesIndex) in message.mainInfo"
    :key="mesIndex"
  >
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
          {{ mes.budget_year_id }}
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
          {{ mes.reference_document }}
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
          {{ mes.program }}
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
          {{ mes.project }}
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
          {{ mes.activity }}
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
          {{ mes.fundSource_id }}
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
          {{ mes.approType_id }}
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
          {{ mes.program_code }}
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
          {{ mes.project_code }}
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
          {{ mes.activity_code }}
        </span>
      </div>
    </div>
  </div>
  <div
    class="flex flex-row mx-8 items-center gap-4"
    v-for="(mes, mesKey) in message.mainInfo"
    :key="mesKey"
  >
    <span
      class="text-[14px] font-semibold text-[#606060] w-[250px] h-[55px] flex items-center"
    >
      Activity Description
    </span>
    <span
      class="text-[14px] font-semibold text-[#606060] max-w-[975px] max-h-[55px] flex items-center"
    >
      {{ mes.activity_description }}
    </span>
  </div>
  {{ message.original }}
  <div v-for="(num, numIndex) in message.original" :key="numIndex">
    <div class="flex flex-row mx-8 gap-4">
      <span
        class="text-[14px] font-semibold text-[#606060] w-[250px] h-[55px] flex items-center"
      >
        Registry of Appropriation
      </span>
      <span
        class="text-[14px] font-semibold text-[#606060] w-100% max-h-[55px] flex items-center justify-center uppercase"
      >
        details of appropriation for activity number # {{ numIndex + 1 }}
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

      <div class="grid grid-cols-12 grid-flow-row capitalize bg-button-blue">
        <div class="bg-white"></div>
        <div class="bg-white">total amount</div>
        <div
          v-for="(og, ogIndex) in message.original"
          :key="ogIndex"
          class="flex justify-center self-center"
        >
          <div class="p-4">
            {{ og.account_name }}
          </div>
        </div>
      </div>
      <!-- original appro -->
      <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
        <div class="grid grid-rows p-4">original appropriation</div>
        <div
          class="flex justify-center self-center"
          v-for="og in message.original_total"
        >
          {{ og.Original_Total }}
        </div>
        <div
          class="flex justify-center self-center"
          v-for="og in message.original"
        >
          {{ og.appro_amount == null ? 0 : og.appro_amount }}
        </div>
        <div class="grid grid-rows p-4 col-end-13">
          {{ message.original[0].status }}
        </div>
        <!-- <div
        class="grid grid-rows p-4 col-end-13"
        v-for="(og, ogIndex) in message.original"
        :key="ogIndex"
      >
        {{ ogIndex == 0 ? (og.status == null ? "For Review" : og.status) : 0 }}
      </div> -->
      </div>
      <div>ADD/(LESS):</div>
      <!-- supplemental vbudget -->
      <div>supplemental budget (SB)</div>
      <div class="grid grid-cols-12 p-4 grid-flow-row">
        - {{ message.supplemental[0].adjustment_no }}
        <div
          class="flex justify-center self-center"
          v-for="supptotal in message.supplemental_total"
        >
          {{ supptotal.Original_Total }}
        </div>
        <!-- balance -->
        <div
          class="flex justify-center self-center"
          v-for="supp in message.supplemental"
        >
          <div>{{ supp.balance == null ? 0 : supp.balance }}</div>
        </div>

        <div class="grid grid-rows p-4 col-end-13">
          {{ message.supplemental[0].status }}
        </div>
      </div>
      <!-- realignment -->
      <div class="grid grid-rows p-4">realignment</div>
      <div
        class="grid grid-cols-12 p-4 uppercase grid-flow-row"
        v-for="raf in message.realignment"
      >
        - {{ raf.account_name }}
        <div v-for="raftotal in message.realignment">
          {{ raftotal.realignment_total }}
        </div>
        <div class="grid grid-rows p-4" v-for="raf in message.realignment">
          {{ raf.balance }}
        </div>

        <div class="grid grid-rows p-4 col-end-13">
          {{ message.realignment[0].status }}
        </div>
      </div>
      <!-- reversion -->
      <div class="grid grid-rows p-4">Reversion</div>
      <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
        - {{}}
        <div v-for="total in message.reversion_total">
          {{ total.Original_Total }}
        </div>
        <div class="grid grid-rows p-4" v-for="rev in message.reversion">
          {{ rev.balance }}
        </div>

        <div class="grid grid-rows p-4 col-end-13">{{}}</div>
      </div>
      <!-- final appro -->
      <div class="grid grid-cols-12 p-4 uppercase grid-flow-row">
        <div class="grid grid-rows p-4">final appropriation</div>
        <div class="grid grid-rows p-4"></div>
        <div class="grid grid-rows p-4" v-for="fin in message.final_appro">
          {{ fin.total }}
        </div>
      </div>
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
  <!-- <table>
    <thead>
      <tr class="bg-button-blue">
        <th>total amounts</th>
        <th>personal services</th>
        <th>maintenance and other operating expenses</th>
        <th>financial expenses</th>
        <th>capital outplay</th>
        <th>remarks</th>
      </tr>
    </thead>
  </table> -->
</template>
