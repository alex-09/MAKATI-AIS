<template>
  <div v-if="showChildComponent">
    <HistoryView
      :show="true"
      @close="hideChild"
      @child-click="handleChildClick"
      :id="selectedId"
      :selectedData="getSelectedData(selectedId)"
    />
  </div>
  <div v-else>
    <div class="container mt-4">
      <div class="grid grid-cols-4 gap-9 xxxxl:gap-40">
        <div class="grid grid-row-3 place-content-center">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Department</span
            >
            <select
              class="w-234 h-32 border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="selectedDepartment"
            >
              <option
                v-for="deptOption in deptOptions"
                :key="deptOption.id"
                :value="deptOption.department_name"
              >
                {{ deptOption.department_name }}
              </option>
            </select>
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >DRN</span
            >
            <input
              v-model="searchDRN"
              type="text"
              class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Divison</span
            >
            <select
              v-model="selectedDivision"
              class="w-234 h-32 border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            >
              <option
                v-for="searchOption in searchOptions"
                :key="searchOption.id"
                :value="searchOption.name"
              >
                {{ searchOption.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid grid-row-3 place-content-center">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Sender</span
            >
            <input
              v-model="searchSender"
              type="text"
              class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Reply to</span
            >
            <input
              v-model="searchReplyTo"
              type="text"
              class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Cluster</span
            >
            <select
              class="w-234 h-32 border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="selectedCluster"
            >
              <option
                v-for="clusterOption in clusterOptions"
                :key="clusterOption.id"
                :value="clusterOption.cluster_type"
              >
                {{ clusterOption.cluster_type }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid grid-row-3 place-content-center">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Type</span
            >
            <select
              class="w-234 h-32 border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="selectedType"
            >
              <option
                v-for="commOption in commOptions"
                :key="commOption.id"
                :value="commOption.rc_type"
              >
                {{ commOption.rc_type }}
              </option>
            </select>
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Transaction Number</span
            >
            <input
              v-model="searchTransactionNumber"
              type="text"
              class="w-234 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-110"
              >Restriction</span
            >
            <select
              class="w-234 h-32 border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="selectedRestrict"
            >
              <option
                v-for="restrictOption in restrictOptions"
                :key="restrictOption.id"
                :value="restrictOption.restrict_type"
              >
                {{ restrictOption.restrict_type }}
              </option>
            </select>
          </div>
        </div>
        <div class="grid grid-row-3 place-content-center">
          <button
            class="w-12 h-12 transform transition-transform hover:scale-110"
            @mouseover="isHovered = true"
            @mouseleave="isHovered = false"
            @click="resetFilters"
          >
            <svg
              v-if="!isHovered"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              width="50"
              height="50"
              viewBox="0 0 50 50"
              fill="#000000"
            >
              <rect width="50" height="50" fill="url(#pattern0)" />
              <defs>
                <pattern
                  id="pattern0"
                  patternContentUnits="objectBoundingBox"
                  width="1"
                  height="1"
                >
                  <use xlink:href="#image0_177_6009" transform="scale(0.02)" />
                </pattern>
                <image
                  id="image0_177_6009"
                  width="50"
                  height="50"
                  xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACfUlEQVR4nO2YPWgUURDHf2dURNJcs3cKCVpE0EJBGwWNRQyIjTZaxUY7LSRWEhtLO620MkWIVSorsVAEEROI30IiWigKioL4/YGaJ4tTPMJl973dfbtzsH+4IpeZ/8x/Z+7tzAO4AZgu+dwiAabLPksi1UAJjKuQJnrRdBFyWwzuAL3oQ6/kFud4N8kwAubF8DqwCj1YCVyV3J4Ba9Ic+oAX4nAFWEH16AGmJKdXwDpXxwHgjThOAsuoDg1gXHJ5B2z0JdgMfBCCcSEsGw3gouTwEdialWg78EWIzlM+zkrsb8CuvGRDwA8hHKM8nJaYv4C9RZHuB34L8UnC47jE+gMcLJp8BPgLLABHCYfDVpwjoYIcs57UoQD8B6zKjxIYY1bv7iuQdw/wU7hPUfJp8h0YLIBvh3U6nqPk8/2CBP4EbMvBtcV6X8WcpaMBXJIE3gObMnBsAN5qmCB6rBnoNbDew7cfeGnNdMtRNJU+B9Y6+KidslfLDu27qk5r3HuaGYSo3USN486v/m7A1EKUwdQVUQZTV0QZTF0RZTB1Rf7jHvAIaOOP2GdW7oYrr8hD+X7OU0xbfIw8jMqFxOP9E/nfU8eVoGX5zDv6ZE7Qx85HTCuEiLQEfexcxAQT4ZKgj12UICaoCDvBnY52Pj/iOfm703eF46YEiK87JxKC+CxW7UWJBxeB3ISckLuuONhX4IxcUOTZECOrlYK1Uye0pSILVuDhHEJai4S4Hs2FYTfw2Gq3y5KA+tZaqt1GrXb73A0/dp92SxPSSjhis0wAQdotHu6uJdi4PPXKK5MGn5ddpKEynZDljR1pFFPEGP8gYH7OmAHu51isYhHT/wACNZL+Su2gNQAAAABJRU5ErkJggg=="
                />
              </defs>
            </svg>
            <svg
              v-else
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              width="50"
              height="50"
              viewBox="0 0 50 50"
              fill="none"
            >
              <rect width="50" height="50" fill="url(#pattern0)" />
              <defs>
                <pattern
                  id="pattern0"
                  patternContentUnits="objectBoundingBox"
                  width="1"
                  height="1"
                >
                  <use xlink:href="#image0_179_6009" transform="scale(0.02)" />
                </pattern>
                <image
                  id="image0_179_6009"
                  width="50"
                  height="50"
                  xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACsElEQVR4nO2YO4xNURSGv2GIyDTTuEgIBQkFCQ2JR4FENDRUNHQUMioZjVJHNSqKCZVKJQoiEUHCGI9kRigICSER70c8fjmZJdnzuOfsfe7ed7bkruQU9561/vX/Z6+zz1obwVWB/pPrOs0sA3JBF1VCyNzkK0TQS6Ym6PURcsOcbgp6yMwEPcat4Hi3zHGeYNQcrwjmkIkJZgsuGbcnggVVAYsEzyzgomBW29g25zRTcME4vRAs8Q1cJnhlgecEM5Kzbc6lS3DWuLwRrAgFWCV4ZwAFUFcytuUiThuH94I1dYHWCT4Z0KnoTKvzn7DcXwQbWwXbIvhmgP3RWFbnPWY5fwi2xwLdKfhpwEeigJbnO2S5fgl2xwbfK/gt+CM4EBV8fJ59Tp79qZIcdJ7UngT4u5yV74uNPzFZv1O7OyLibhV8N+yjsXB9d5Ovgk0R8NY7u+PJOCz99/cBS/xBsLYFrNXO92qAdpvGxJwxAm8FK2tgLBe8nvYOQuN7oJeCpQGxiwXPnZ6uOy3bsK70qWChR0yeXbZgbjFD1xhXb2U398iZ3AKuPCdRec782Z8NqCMkM1NnRTIzdVYkM1NnRTIzdVZkzARDggeC+QRaESO4U5wNh8ZGb1EE9+3eSIgYEzFisUN1uHsR9PWz9v6R3X/sORI0nJhRn5i2vCMhYpRCRBXBED8fMUolwodgiJ9KxCQV4RIUbPDxC3yJR+z3pP+iirDE1yxBcdw52CxJyGClycTTirCk3YLDdtZVJPssOF4cUNQVMkWZpSmnkqc4aCvzL/G2FoQ0Jgjx2pqjmWCz4KFTbucLAtmXVkm59Tnl9jH7lz2w3Kq230azLbZOB5Cq3Irm7nKJT+VTn/aVqbKQj51yWJmprM4XWzmKidTGD6dl6UfotuBeC4PVcHEw/hcM66/9/I6nVAAAAABJRU5ErkJggg=="
                />
              </defs>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="container mt-4">
      <p class="uppercase text-other-black text-2xl font-bold mb-4">
        for assignment
      </p>
    </div>
    <div class="container grid justify-items-center p-0 mt-4">
      <div
        class="overflow-x-auto overscroll-x-contain max-h-[320px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]"
      >
        <table class="divide-y w-[3800px] divide-gray-200 mr-8">
          <thead class="bg-gray-200 sticky top-0">
            <tr>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-133 sticky top-0"
              >
                date
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200 sticky top-0"
              >
                number
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[230px] sticky top-0"
              >
                sender
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250 sticky top-0"
              >
                type
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[400px] sticky top-0"
              >
                subject
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200 sticky top-0"
              >
                drn
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[240px] sticky top-0"
              >
                reply to
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-[240px] sticky top-0"
              >
                assign to
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200 sticky top-0"
              >
                cluster
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200 sticky top-0"
              >
                restriction
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360 sticky top-0"
              >
                action to be taken
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200 sticky top-0"
              >
                no. of days
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250 sticky top-0"
              >
                status
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-232 sticky top-0"
              >
                action
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-if="filteredList.length === 0">
              <td
                colspan="14"
                class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase"
              >
                communication not found
              </td>
            </tr>
            <tr v-for="comm in filteredList" :key="comm.id">
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                {{ comm.date }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                {{ comm.transaction_id_num }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                {{ comm.sender }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                {{ comm.receive_comm_type_id }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                {{ comm.subject }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span class="text-center" v-if="comm.drn === null">N/A</span>
                {{ comm.drn }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span class="text-center" v-if="comm.reply_to === null"
                  >N/A</span
                >
                {{ comm.reply_to }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span class="text-center" v-if="comm.assign_to === null"
                  >N/A</span
                >
                <span>{{ comm.assign_to }}</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <div v-if="comm.assign_to === null">N/A</div>
                <div
                  v-else-if="
                    [
                      'Jenny Rose Santiago',
                      'Christina Morit',
                      'Clarence Regala',
                      'Jemuel Palles',
                    ].includes(comm.assign_to)
                  "
                >
                  <span v-if="!showComm">{{
                    comm.cluster || "Financial Reporting Services"
                  }}</span>
                </div>
                <div
                  v-else-if="
                    [
                      'Noemi Fernandez',
                      'Jose Ariones',
                      'Ma. Rhynia Arias',
                      'Byran Salva',
                    ].includes(comm.assign_to)
                  "
                >
                  <span v-if="!showComm">{{
                    comm.cluster ||
                    "Administrative and Internal Control Services"
                  }}</span>
                </div>
                <div v-else><span>{{ "All" }}</span></div>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap w-133 text-center"
              >
                <span>{{ comm.restriction }}</span>
                <span v-if="comm.restriction === null">N/A</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap w-133 text-center"
              >
                <span>{{ comm.action }}</span>
                <span v-if="comm.action === null">N/A</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
              <span v-if="comm.status === 'Pending'">{{ comm.no_of_days }}</span>
                <span v-if="comm.no_of_days === null"
                  >N/A</span
                >
                <span v-if="comm.no_of_days !== null  && comm.status !== 'Pending'"
                  >N/A</span
                >
                <span v-if="comm.status !== 'Pending' && comm.editMode"
                  >N/A</span
                >
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap w-133 text-center"
              >
                <span>{{ comm.status }}</span>
                <span v-if="comm.status === null">N/A</span>
              </td>
              <td class="px-2 py-4 whitespace-nowrap text-center w-207">
                <div class="flex flex-row gap-2 justify-center">
                  <button
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white"
                  >
                    R
                  </button>
                  <button
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white"
                  >
                    E
                  </button>
                  <button
                    @click="showChild(comm.transaction_id_num)"
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white"
                  >
                    A
                  </button>
                  <div
                    @click="openPdf(comm.document)"
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white cursor-pointer flex items-center justify-center"
                  >
                    <span>D</span>

                    <PdfEmbed :source="viewPdf" :width="600" :height="800">
                    </PdfEmbed>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CommAPI from "../../../../../api_request/documentManagement/communicationDrop";
import DivisionAPI from "../../../../../api_request/documentManagement/divisionDrop";
import ClusterAPI from "../../../../../api_request/documentManagement/clusterDrop";
import RestrictAPI from "../../../../../api_request/documentManagement/restrictDrop";
import PdfEmbed from "vue-pdf-embed";
import HistoryView from "./historyView.vue";

export default {
  components: {
    HistoryView,
    PdfEmbed,
  },
  data() {
    return {
      showChildComponent: false,
      comm: [],
      comms: [],
      commOptions: [],
      searchOptions: [],
      divisionOptions: [],
      clusterOptions: [],
      restrictOptions: [],

      searchDRN: "",
      searchSender: "",
      searchReplyTo: "",
      searchTransactionNumber: "",

      selectedCluster: "",
      selectedType: "",
      selectedRestrict: "",
      selectedDivision: "",
      selectedDepartment: "",
      pdfFilePath: "",
      viewPdf: "",
      isHovered: false,
    };
  },
  computed: {
    filteredList() {
      return this.comms.filter((comm) => {
        const senderMatch =
          !this.searchSender ||
          comm.sender.toLowerCase().includes(this.searchSender.toLowerCase());

        const replyToMatch =
          !this.searchReplyTo ||
          comm.reply_to
            .toLowerCase()
            .includes(this.searchReplyTo.toLowerCase());

        const transactionMatch =
          !this.searchTransactionNumber ||
          comm.transaction_id_num
            .toLowerCase()
            .includes(this.searchTransactionNumber.toLowerCase());

        const DRNMatch =
          !this.searchDRN ||
          comm.drn.toLowerCase().includes(this.searchDRN.toLowerCase());

        const clusterMatch =
          !this.selectedCluster || comm.cluster === this.selectedCluster;

        const typeMatch =
          !this.selectedType || comm.receive_comm_type_id === this.selectedType;

        const restrictMatch =
          !this.selectedRestrict || comm.restriction === this.selectedRestrict;

        const divisionMatch =
          !this.selectedDivision || comm.assign_to === this.selectedDivision;

        const departmentMatch =
          !this.selectedDepartment ||
          comm.department_name === this.selectedDepartment;

        return (
          senderMatch &&
          replyToMatch &&
          transactionMatch &&
          DRNMatch &&
          clusterMatch &&
          typeMatch &&
          restrictMatch &&
          divisionMatch &&
          departmentMatch
        );
      });
    },
  },
  methods: {
    viewPdf(document) {
      axios
        .get(`ReceiveCommunication/viewDocument/${document}`)
        .then((response) => {
          const { url } = response.data;
          this.viewPdf = url; // Assign the URL to the correct variable (assuming it's `this.viewPdf`)
        })
        .catch((error) => {
          console.log(error);
        });
    },
    openPdf(document) {
      axios
        .get(`ReceiveCommunication/viewDocument/${document}`)
        .then((response) => {
          const { url } = response.data;
          this.viewPdf = url; // Assign the URL to the viewPdf variable
          console.log(this.viewPdf);
          window.open(url, "_blank");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    resetFilters() {
      ``;
      this.searchSender = "";
      this.searchReplyTo = "";
      this.searchTransactionNumber = "";
      this.searchDRN = "";
      this.selectedCluster = null;
      this.selectedType = null;
      this.selectedRestrict = null;
      this.selectedDivision = null;
      this.selectedDepartment = null;
    },
    getSelectedData(id) {
      // Find the data object associated with the selected ID
      const selectedComm = this.comms.find(
        (comm) => comm.transaction_id_num === id
      );
      // Return the data object
      return selectedComm;
    },
    showChild(transaction_id_num) {
      this.showChildComponent = true;
      this.selectedId = transaction_id_num;
    },
    hideChild() {
      this.showChildComponent = false;
    },
    fetchComms() {
      axios
        .get("ReceiveCommunication/listCA")
        .then((response) => {
          this.rec = response.data.list;
          this.sample = response.data.division;
          console.log(this.trans_id);
          console.log(response.data.list);

          if (Array.isArray(response.data.list)) {
            this.comms = response.data.list.filter((comm) => {
              return (
              (comm.cluster ===
                "Financial Reporting Services" &&
                comm.assign_to.includes("Jenny Rose Santiago")) && comm.status !== "Closed" && comm.status !== "Cancelled" ||
              (comm.cluster === "All" &&
                comm.assign_to.includes("Jenny Rose Santiago")) && comm.status !== "Closed" && comm.status !== "Cancelled" 
              );
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    axios
      .get(`ReceiveCommunication/listCA`)
      .then((response) => {
        this.comms = response.data.list;
        if (Array.isArray(response.data.list)) {
          this.comms = response.data.list.filter((comm) => {
            return (
              (comm.cluster ===
                "Financial Reporting Services" &&
                comm.assign_to.includes("Jenny Rose Santiago")) && comm.status !== "Closed" && comm.status !== "Cancelled" ||
              (comm.cluster === "All" &&
                comm.assign_to.includes("Jenny Rose Santiago")) && comm.status !== "Closed" && comm.status !== "Cancelled" 
            );
          });
        }
      })
      .catch((error) => {
        console.log(error);
      });

    CommAPI().then((commOptions) => {
      this.commOptions = commOptions;
    });

    DivisionAPI().then((searchOptions) => {
      this.searchOptions = searchOptions;
    });

    DivisionAPI().then((divisionOptions) => {
      this.divisionOptions = divisionOptions;
    });

    ClusterAPI().then((clusterOptions) => {
      this.clusterOptions = clusterOptions;
    });

    RestrictAPI().then((restrictOptions) => {
      this.restrictOptions = restrictOptions;
    });
  },
  async created() {
    this.fetchComms();

    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userLastName = response.data.user.surname;
    this.user = this.userFirstName + " " + this.userLastName;
    console.log(this.user);
    console.log(response.data.user.position);
  },
};
</script>
