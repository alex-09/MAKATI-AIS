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
    <div class="flex justify-between m-8">
      <span class="text-[22px] font-bold text-[#606060]">
        List of Completed Transactions
      </span>
      <label class="relative ml-8">
        <input
          type="text"
          name="search"
          placeholder="Search"
          v-model="searchQuery"
          class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
        />
        <SearchIcon
          class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
        />
      </label>
    </div>
    <div
      v-if="!showPrint | (showPrint === false)"
      class="flex justify-center m-8"
    >
      <div
        class="overflow-x-auto overscroll-x-contain max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]"
      >
        <table
          class="divide-y max-w-[2500px] min-w-[1800px] divide-gray-200 mr-8"
        >
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                date
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                time
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                transaction no.
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                sender
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                subject
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-if="filteredLists.length === 0">
              <td
                colspan="14"
                class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase"
              >
                communication not found
              </td>
            </tr>
            <tr v-for="comm in selectedItems" :key="comm.transaction_id_num">
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.date }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.time }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.transaction_id_num }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.sender }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.subject }}
              </td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-end m-8 gap-8">
          <button
            @click="
              showPrint = false;
              printReports();
            "
            class="uppercase font-medium text-sm w-100 h-42 bg-button-blue text-white rounded"
          >
            Print
          </button>

          <button
            @click="showPrint = true"
            class="uppercase font-medium text-sm w-100 h-42 bg-red-500 text-white rounded"
          >
            cancel
          </button>
        </div>
      </div>
    </div>
    <!-- -----------------view--------------------------- -->

    <div class="flex justify-center m-8" v-if="showPrint">
      <div
        class="overflow-x-auto overscroll-x-contain max-h-[500px] w-1850 1536:w-1458 xxxxl:w-1850 xxxxl:max-h-[500px]"
      >
        <table
          class="divide-y max-w-[2500px] min-w-[1800px] divide-gray-200 mr-8"
        >
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                <div class="flex items-center">
                  <input
                    type="checkbox"
                    id="selectAllCheckbox"
                    :checked="selectAllChecked"
                    @change="toggleSelectAll"
                  />

                  <label for="selectAllCheckbox"></label>
                </div>
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                date
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                time
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                transaction no.
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                sender
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                subject
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                status
              </th>
              <th
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
              >
                action
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-if="filteredLists.length === 0">
              <td
                colspan="14"
                class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase"
              >
                communication not found
              </td>
            </tr>
            <tr v-else v-for="comm in filteredLists" :key="comm.id">
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
              >
                <div class="flex items-center">
                  <input
                    type="checkbox"
                    :id="comm.transaction_id_num"
                    :checked="selectedItems.includes(comm)"
                    @change="toggleCheckbox(comm)"
                  />

                  <label for="checkbox" class="sr-only">checkbox</label>
                </div>
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.date }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.time }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.transaction_id_num }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.sender }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                {{ comm.subject }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-center capitalize"
              >
                <span v-if="!comm.editMode">{{ comm.status }}</span>
                <select
                  class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  @change="handleChange('comm.status')"
                  v-model="comm.status"
                  v-if="comm.editMode"
                >
                  <option
                    v-for="statusOption in statusOptions"
                    :key="statusOption.id"
                    :value="statusOption.status_type"
                  >
                    {{ statusOption.status_type }}
                  </option>
                </select>
              </td>
              <td class="px-2 py-4 whitespace-nowrap text-center w-207">
                <div class="flex flex-row gap-2 justify-center">
                  <button
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-[#16B1FF] hover:bg-[#16B1FF] hover:text-white"
                  >
                    R
                  </button>
                  <button
                    @click="editComm(comm)"
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-[#16B1FF] hover:bg-[#16B1FF] hover:text-white"
                  >
                    E
                  </button>
                  <button
                    @click="showChild(comm.transaction_id_num)"
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-[#16B1FF] hover:bg-[#16B1FF] hover:text-white"
                  >
                    A
                  </button>
                  <button
                    @click="openPdf(comm.document)"
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-[#16B1FF] hover:bg-[#16B1FF] hover:text-white"
                  >
                    D
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="flex justify-end m-8 gap-8">
      <button
        v-if="saveBtn"
        @click="editSelectedComm"
        class="w-[100px] h-[42px] rounded-[5px] bg-save-color shadow-xl text-[15px] font-medium uppercase text-white flex items-center justify-center"
      >
        save
      </button>
      <button
        v-if="showPrint"
        :disabled="selectedItems.length === 0"
        @click="showPrint = false"
        class="uppercase font-medium text-sm w-100 h-42 bg-button-blue text-white rounded"
      >
        view
      </button>
    </div>
  </div>
</template>

<script>
import SearchIcon from "../../../icons/Budgetary/searchIcon.vue";
import StatusAPI from "../../../../api_request/documentManagement/statusDrop";
import HistoryView from "./action.vue";

import axios from "axios";
import Swal from "sweetalert2";
import PdfEmbed from "vue-pdf-embed";
import logo from "@/assets/images/makati.png";
export default {
  components: {
    SearchIcon,
    HistoryView,
    PdfEmbed,
  },
  data() {
    return {
      logo: logo,
      selectedItems: [],
      showChildComponent: false,
      comm: [],
      comms: [],
      statusOptions: [],
      searchQuery: "",

      editMode: false,
      pdfFilePath: "",
      viewPdf: "",
      selectedIds: [],
      selectedTransmitalNos: [],
      selectedCommId: [],
      saveBtn: false,
    };
  },
  // toggleItemSelection(comm) {
  //   if (this.selectedItems.includes(comm)) {
  //     this.selectedItems = this.selectedItems.filter((item) => item !== comm);
  //     this.selectedIds = this.selectedIds.filter((id) => id !== comm.id);
  //     this.selectedTransmitalNos = this.selectedTransmitalNos.filter(
  //       (transmitalNo) => transmitalNo !== comm.transaction_id_num
  //     );
  //   } else {
  //     this.selectedItems.push(comm);
  //     this.selectedIds.push(comm.id);
  //     this.selectedTransmitalNos.push(comm.transaction_id_num);
  //   }
  // },
  // ogTransmitalNoSelected(transmitalNo) {
  //   this.selectedTransmitalNos = [transmitalNo];
  // },
  methods: {
    printReports() {
      const selectedItems = this.selectedItems;
      const printWindow = window.open(".", ".");
      printWindow.document.open();
      printWindow.document.write(`
    <html>
      <head>
        <h4 style="text-align:center; line-height: 0.2">REPUBLIC OF THE PHILIPPINES</h4>
        <h2 style="text-align:center; line-height: 0.2">CITY GOVERNMENT OF MAKATI</h2>
        <br>
        <p style="text-align:center; line-height: 0.2; font-weight: bold; font-size: 1.2rem">ACCOUNTING DEPARTMENT</p>
        <p style="text-align:center; line-height: 0.2">4th Floor, New Makati City Hall Building, J.P. Rizal Street</p>
        <p style="text-align:center; line-height: 0.2">Brgy. Poblacion, Makati City</p>
        <p style="text-align:center; line-height: 0.2">Tel. No. 02-8870-1307/02-8899-2029 E-mail: accounting@makati.gov.ph</p>
		


        <style>
          @media print {
            img {
              display: block;
              max-width: 100%;
              height: auto;
            }
          }
          /* Additional CSS styles for printing */
          @media print {
            body {
              /* Define any additional styling for the print layout */
            }
            @page {
              size: landscape;
            }
          }
        </style>
      </head>
      <body>
        <img src="${this.logo}" alt="logo" style="
          display: block;
          width: 140px;
          height: 140px;
          position: absolute;
          top: 4%;
          left: 13%;
        " />

        <div style="margin-top: 10%; text-align: center;">
          <h1>List of Completed Transactions</h1>
        </div>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 5%; margin-left: auto; margin-right: auto;">
          <thead>


            <tr>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">DATE.</th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TIME</th> 
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TRANSACTION NUMBER</th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">SENDER/th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">SUBJECT </th>
          


            </tr>
          </thead>
          <tbody>
            ${selectedItems
              .map((comm) => {
                return `
                  <tr>
                    <td style="border: 1px solid black; text-align: center;">${comm.date}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.time}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.transaction_id_num}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.sender}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.subject}</td>
        
                  </tr>
                `;
              })
              .join("")}
          </tbody>
        </table>
        <br></br>
        <br></br>
        <div>Received the foregoing document/s on ${this.currentDate}, at ${
        this.currentTime
      } by ${this.userFirstName} ${this.userLastName}, ${
        this.userdesignation
      } of the Accounting Department. If you have any question or clarification on this report, you may call the Receiving Clerk at 02-8870-1307.</div>
        <br></br>
        <div>This is a computer-generated report, signature is not required</div>
      </body>
    </html>
  `);
      printWindow.document.close();
      printWindow.onload = function () {
        printWindow.print();
        printWindow.close();
      };
    },
    toggleCheckbox(comm) {
      if (this.selectedItems.includes(comm)) {
        const index = this.selectedItems.indexOf(comm);
        if (index > -1) {
          this.selectedItems.splice(index, 1);
        }
      } else {
        this.selectedItems.push(comm);
      }
    },
    toggleSelectAll() {
      if (this.selectAllChecked) {
        // If all items are already selected, clear the selectedItems array
        this.selectedItems = [];
      } else {
        // If not all items are selected, assign all items to the selectedItems array
        this.selectedItems = [...this.comms];
      }
    },
    fetchComms() {
      axios
        .get("ReceiveCommunication/listReports")
        .then((response) => {
          this.comms = response.data.list;

          if (Array.isArray(response.data.list)) {
            this.comms = response.data.list.filter((comm) => {
              return comm.status === "Closed" || comm.status === "Cancelled";
            });
          }
          console.log(this.comms);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    refreshTable() {
      axios
        .get(`ReceiveCommunication/listReports`)
        .then((response) => {
          this.comms = response.data.list;

          if (Array.isArray(response.data.list)) {
            this.comms = response.data.list.filter((comm) => {
              return comm.status === "Closed" || comm.status === "Cancelled";
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });

      this.saveBtn = false;
    },
    editComm(comm) {
      this.toggleEditMode(comm);
    },
    toggleEditMode(comm) {
      comm.editMode = !comm.editMode;
      this.saveBtn = !this.saveBtn;
    },
    editSelectedComm() {
      const selectedComm = this.comms.find((comm) => comm.transaction_id_num);

      if (selectedComm) {
        const data = {
          transac_id: selectedComm.transaction_id_num,
          status: selectedComm.status,
          user: this.user,
        };

        Swal.fire({
          text: "Are you sure you want to enable this account?",
          html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M51.6265 36.5375L48.0715 40.1715C45.2275 43.0155 43.45 45.425 43.45 51.35H35.55V49.375C35.55 44.9905 37.3275 41.0405 40.1715 38.1965L45.0695 33.2195C46.531 31.7975 47.4 29.8225 47.4 27.65C47.4 23.2655 43.845 19.75 39.5 19.75C37.4048 19.75 35.3954 20.5823 33.9139 22.0639C32.4323 23.5454 31.6 25.5548 31.6 27.65H23.7C23.7 23.4596 25.3646 19.4408 28.3277 16.4777C31.2908 13.5146 35.3096 11.85 39.5 11.85C43.6904 11.85 47.7092 13.5146 50.6723 16.4777C53.6354 19.4408 55.3 23.4596 55.3 27.65C55.3 31.126 53.878 34.2465 51.6265 36.5375ZM43.45 67.15H35.55V59.25H43.45M39.5 0C34.3128 0 29.1764 1.0217 24.384 3.00676C19.5916 4.99182 15.2372 7.90137 11.5693 11.5693C4.16159 18.977 0 29.0239 0 39.5C0 49.9761 4.16159 60.023 11.5693 67.4307C15.2372 71.0986 19.5916 74.0082 24.384 75.9932C29.1764 77.9783 34.3128 79 39.5 79C49.9761 79 60.023 74.8384 67.4307 67.4307C74.8384 60.023 79 49.9761 79 39.5C79 17.6565 61.225 0 39.5 0Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Are you sure you want to save the assignment of transactions you made in the foregoing?</span></div></div>',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Save",
          cancelButtonText: "Cancel",
          customClass: {
            container: "flex flex-col-reverse sm:flex-row",
            confirmButton:
              "ml-auto mx-2 mb-2 sm:mb-0 sm:ml-2 text-white font-bold py-2 px-4 rounded uppercase bg-primary-color",
            cancelButton:
              "mb-2 mx-2 sm:mb-0 text-white font-bold py-2 px-4 rounded uppercase bg-danger-color",
          },
          buttonsStyling: false,
          reverseButtons: false,
        }).then((result) => {
          if (result.isConfirmed) {
            // Make the POST request using Axios
            axios
              .post("ReceiveCommunication/editCommReport", data)
              .then((response) => {
                // Handle the response as needed
                console.log("xxx", response.data);
                this.refreshTable();

                this.selectedCommId = [];
                Swal.fire({
                  icon: "success",
                  title: "Successful!",
                  text: "Operation completed successfully.",
                  timer: 1000,
                  timerProgressBar: true,
                  showConfirmButton: false,
                });
              })
              .catch((error) => {
                // Handle any errors that occur during the request
                console.error(error);
                Swal.fire(
                  "Error",
                  "An error occurred while editing the communication",
                  "error"
                );
              });
          }
        });
      }
    },
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
    getSelectedData(id) {
      // Find the data object associated with the selected ID
      const selectedComm = this.comms.find(
        (comm) => comm.transaction_id_num === id
      );
      // Return the data object
      return selectedComm;
    },
    // show the action history
    showChild(transaction_id_num) {
      this.showChildComponent = true;
      this.selectedId = transaction_id_num;
    },
    handleChildClick(transaction_id_num) {
      this.selectedId = transaction_id_num;
    },
    // hide the action history
    hideChild() {
      this.showChildComponent = false;
    },
    handleChange(fieldName) {
      switch (fieldName) {
        case "comm.status":
          // console.log(this.comm.status);
          break;
      }
    },
  },
  mounted() {
    this.fetchComms();

    StatusAPI().then((statusOptions) => {
      this.statusOptions = statusOptions;
    });
  },
  computed: {
    selectAllChecked() {
      return (
        this.comms.length > 0 && this.selectedItems.length === this.comms.length
      );
    },
    filteredLists() {
      const searchQuery = this.searchQuery.toLowerCase();
      const filtered = this.comms.filter((comm) => {
        return (
          comm.transaction_id_num.toLowerCase().includes(searchQuery) ||
          comm.status === "Closed" || comm.status === "Cancelled"
        );
      });

      if (filtered.length === 0) {
        return [{ message: "No matches found" }];
      }

      return filtered;
    },
  },
  async created() {
    this.fetchComms();

    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userLastName = response.data.user.surname;
    this.user = this.userFirstName + " " + this.userLastName;
  },
};
</script>
<script setup>
import { ref } from "vue";

const showPrint = ref(true);
</script>
