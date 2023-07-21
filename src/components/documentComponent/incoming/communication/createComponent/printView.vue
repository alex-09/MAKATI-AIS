<template>
  <div v-if="showDetails | (showDetails === true)">
    <div class="container mt-4">
      <div class="container grid grid-cols-2 place-content-center px-0">
        <p
          class="capitalize text-other-black text-2xl font-bold mb-4 float-center"
        >
          Receiving Receipt
        </p>
        <div class="flex flex-row items-center justify-end ml-12">
          <p>Select Bearer Name</p>
          <label class="relative ml-8">
            <input
              type="text"
              v-model="searchQuery"
              name="search"
              placeholder="Search"
              class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            />
            <SearchIcon
              class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
            />
          </label>
        </div>
      </div>
    </div>
    <div class="container grid justify-items-center p-0 mt-4">
      <div class="overscroll-y-contain w-1850 1536:w-[100%] xxxxl:w-1850">
        <table class="divide-y w-[100%] divide-gray-200 mr-8">
          <thead>
            <tr>
              <th class="w-[100px]">
                <input
                  type="checkbox"
                  class="text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  v-model="selectAll"
                  @click="toggleSelectAll()"
                />
                <label for="checkbox-selectall" class="sr-only">checkbox</label>
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-125"
              >
                date
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-140"
              >
                time
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200"
              >
                transaction no.
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-500"
              >
                subject
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
              >
                sender
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
              >
                bearer
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-if="filteredRec.length === 1 && filteredRec[0].message">
              <td
                colspan="7"
                class="px-6 py-4 text-sm font-medium text-gray-800 text-center"
              >
                {{ filteredRec[0].message }}
              </td>
            </tr>
            <tr v-else v-for="receipt in filteredRec" :key="receipt.id">
              <td class="flex justify-center py-4">
                <input
                  type="checkbox"
                  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  :value="receipt.id"
                  v-model="selected"
                  @change="toggleSelected()"
                />
                <label for="checkbox-selectall" class="sr-only">checkbox</label>
              </td>

              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ receipt.Date }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ receipt.time }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ receipt.transaction_id_num }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ receipt.subject }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ receipt.sender }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ receipt.bearer_name }}
              </td>
              <td>
                <div class="flex items-center justify-center">
                  <button>
                    <img
                      src="/assets/printer.png"
                      @click="printReceivingSelect(receipt)"
                      alt=""
                    />
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container mt-4">
      <div class="float-right">
        <button
          @click="showDetails = !showDetails"
          :disabled="selected.length === 0"
          class="w-92 h-42 bg-button-blue rounded text-white uppercase font-medium text-sm"
        >
          View
        </button>
      </div>
    </div>
  </div>
  <!-- <div v-if="!HideText">
    <p>{{ displayText }}</p>
  </div> -->
  <div class="p-5" v-if="!showDetails">
    <h1 class="text-center mt-5 text-[22px] font-bold">
      Transaction Receipt Details
    </h1>

    <div class="container grid justify-items-center p-0 mt-[50px]">
      <div class="overscroll-y-contain w-1850 1536:w-[100%] xxxxl:w-1850">
        <table class="divide-y w-[100%] divide-gray-200 mr-8">
          <thead>
            <tr>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200"
              >
                date
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200"
              >
                time
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200"
              >
                transaction no.
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-500"
              >
                subject
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
              >
                sender
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="(receiptId, index) in selected" :key="index">
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{
                  filteredRec.find((receipt) => receipt.id === receiptId)?.Date
                }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{
                  filteredRec.find((receipt) => receipt.id === receiptId)?.time
                }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{
                  filteredRec.find((receipt) => receipt.id === receiptId)
                    ?.transaction_id_num
                }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{
                  filteredRec.find((receipt) => receipt.id === receiptId)
                    ?.subject
                }}
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{
                  filteredRec.find((receipt) => receipt.id === receiptId)
                    ?.sender
                }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container mt-4 px-0">
      <div class="flex justify-end gap-8">
        <button
          @click="showDetails = !showDetails"
          class="w-92 h-42 bg-danger-color rounded text-white uppercase font-medium text-sm"
        >
          Cancel
        </button>
        <button
          @click="printReceivingSelectAll(receipt)"
          class="w-92 h-42 bg-button-blue rounded text-white uppercase font-medium text-sm"
        >
          Print
        </button>
      </div>
    </div>
  </div>
  <TransDetails v-if="selectedData !== null" :selectedData="selectedData" />
</template>

<script setup>
import SearchIcon from "../../../../icons/Budgetary/searchIcon.vue";
import MakatiPng from "../../../../../assets/images/makati.png";
import TransDetails from "./details.vue";

import { ref } from "vue";

const showDetails = ref(true);
const HideText = ref(true);
</script>

<script>
import axios from "axios";
import logo from "@/assets/images/makati.png";
export default {
  data() {
    return {
      logo: logo,
      receipt: [],
      receipts: [],
      searchQuery: "",
      selectAll: false,
      selected: [],
      selectedData: null,
      hidePrintableContent: false,
      printedHTML: "",
      selectedReceipt: null,
      displayText: "",
      HideText: false,
      userDetails: "",
      currentTime: "",
      currentDate: "",
    };
  },
  async created() {
    this.fetchReceipts();
    const response = await axios.get("me");

    this.userDetails = response.data.user;
    console.log("this", this.userDetails);
  },
  props: {
    receipts: {
      type: Array,
      required: true,
    },
  },
  methods: {
    toggleSelected() {
      if (this.selected.length > 0) {
        this.displayText = ""; // Clear the displayText

        for (const receiptId of this.selected) {
          const selectedReceipt = this.filteredRec.find(
            (receipt) => receipt.id === receiptId
          );

          if (selectedReceipt) {
            const newReceiptDetails = `
          Date: ${selectedReceipt.Date}
          Time: ${selectedReceipt.time}
          Transaction No: ${selectedReceipt.transaction_id_num}
          Subject: ${selectedReceipt.subject}
        `;

            this.displayText +=
              newReceiptDetails + "\n----------------------\n";
          }
        }
      } else {
        this.displayText = ""; // Clear the displayText
      }

      this.showDetails = false; // Set the flag to false to hide the details
      // this.HideText = true; // Set the flag to true to show the text
    },

    printReceivingSelectAll(receipt) {
      this.selectedReceipt = receipt;

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
        }
      </style>
    </head>
    <body style="padding: 30px;">
      <img src="${this.logo}" alt="logo" style="
          display: block;
          width: 100px;
          height: 100px;
          position: absolute;
          top: 4%;
          left: 6%;
        " />


      <div style="margin-top: 20%; text-align: center;">
        Transaction Receipt Details

      </div>

      <table
      style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 5%; "
  >
      <thead>
      <tr>
          <th
          colspan="5"
          style="
              width: 100%;
              margin: 0;
              padding: 0;
              max-height: 10%;
              border-bottom: 1px solid black;
              text-align: center;
          "
          >
          
          </th>
      </tr>
      <tr>
          <th style="border: 1px solid black">Transaction Id No.</th>
          <th style="border: 1px solid black">Sender</th>
          <th style="border: 1px solid black">Subject</th>
          <th style="border: 1px solid black">Bearer</th>

      </tr>
      </thead>
        <tbody>
          ${this.selected
            .map((receiptId) => {
              const receipt = this.filteredRec.find(
                (receipt) => receipt.id === receiptId
              );
              return `
                  <tr>
                    <td style="border: 1px solid black; text-align: center;">${receipt?.transaction_id_num}</td>
                    <td style="border: 1px solid black; text-align: center;">${receipt?.sender}</td>
                    <td style="border: 1px solid black; text-align: center;">${receipt?.subject}</td>
                    <td style="border: 1px solid black; text-align: center;">${receipt?.bearer_name}</td>
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
      } by ${this.userDetails.firstname} ${this.userDetails.surname}, ${
        this.userDetails.userdesignation
      } of the
      Accounting Department. If you have any question or clarification on this report you may call the Receiving
      Clerk at 02-8870-1307
      </div>
      <br></br>



      <div>This is a computer generated report, signature is not required</div>





    </body>
  </html>
`);
      printWindow.document.close();
      printWindow.onload = function () {
        printWindow.print();
        printWindow.close();
      };
    },

    printReceivingSelect(receipt) {
      this.selectedReceipt = receipt;

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
              }
            </style>
          </head>
          <body style="padding: 30px;">
         	 <img src="${this.logo}" alt="logo" style="
            display: block;
            width: 100px;
            height: 100px;
            position: absolute;
            top: 4%;
            left: 7%;
          " />

            <div style="margin-top: 10%">
            <div style="text-align: center; text-transform: uppercase; font-weight: bold; margin-bottom: 5%;">Transaction Report for Incoming Communication </div>
            <div>Transaction No. ${receipt.transaction_id_num}</h3>
            <div>Date: ${receipt.Date}</div>
            <div>Sender:  ${receipt.sender}</div>
            <div>Subject: ${receipt.subject}</div>
            </div>
            <br></br>
            <div>Assigned To:</div>

            <div>
              <div style="display: flex; flex-direction: row; justify-content: normal;">

              <div style="display:flex; flex-direction: column; margin-right: 90px">
                <div>FRS</div>
                <div><input type="checkbox">Jenny</div>
                <div><input type="checkbox">Clarence</div>
                <div><input type="checkbox">Jemuel</div>
              </div>

              
              <div style="display:flex; flex-direction: column; ">
                  <div>AICS</div>
                  <div><input type="checkbox">Noemi</div>
                  <div><input type="checkbox">Joe</div>
                  <div><input type="checkbox">Rhynia</div>
                  <div><input type="checkbox">Bryan</div>
                  <div><input type="checkbox">Jessica</div>
              </div>  

            </div>          

            <div style="display: flex; flex-direction: row; justify-content: normal;">

                <div style="display:flex; flex-direction: column; margin-right: 60px"">
                  <div>Action</div>
                  <div><input type="checkbox">FYI</div>
                  <div><input type="checkbox">Handle</div>
                  <div><input type="checkbox">Draft a Reply</div>
                  <div><input type="checkbox">For Filling</div>
                </div>


                <div style="display:flex; flex-direction: column; ">
              
                    <div style="margin-top: 22px;"><input type="checkbox">Attend</div>
                    <div><input type="checkbox">Please See Me</div>
                    <div><input type="checkbox">Remind Me</div>
                    <div><input type="checkbox">Others</div>
                 
                </div>  

           </div>       
        
          </div>


            <br></br>
            <div>Note:</div>
            <div>___________________________________________________________________________________</div>
            <div>___________________________________________________________________________________</div>
            <div>___________________________________________________________________________________</div>
            <div>___________________________________________________________________________________</div>
            <div>___________________________________________________________________________________</div>
            <div>___________________________________________________________________________________</div>
            <div>___________________________________________________________________________________</div>
         



          </body>
        </html>
      `);
      printWindow.document.close();
      printWindow.onload = function () {
        printWindow.print();
        printWindow.close();
      };
    },
    fetchReceipts() {
      axios
        .get("ReceiveCommunication/showRecComm")
        .then((response) => {
          this.rec = response.data.list;
          console.log(this.rec);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    toggleSelectAll() {
      this.selectAll = !this.selectAll; // toggle the selectAll flag
      if (this.selectAll) {
        this.selected = this.filteredRec.map((receipt, index) => ({
          [`id[${index}]`]: receipt.id,
        })); // create array of objects with each object containing the id of the corresponding transaction
        console.log(this.selected);
      } else {
        this.selected = []; // deselect all transactions
      }
    },
  },
  watch: {
    selectAll(newVal) {
      if (newVal) {
        this.selected = this.filteredRec.map((receipt) => receipt.id);
      } else {
        this.selected = [];
      }
    },
  },
  mounted() {
    setInterval(() => {
      const time = new Date();
      // IF NEED DIN YUNG SECOND DAGDAG LANG TO - second: 'numeric'
      this.currentTime = time.toLocaleString("en-US", {
        hour: "numeric",
        minute: "numeric",
        hour12: true,
      });
    }, 1000);

    const date = new Date();
    const options = { year: "numeric", month: "long", day: "numeric" };
    this.currentDate = date.toLocaleDateString("en-US", options);

    axios
      .get(`ReceiveCommunication/showRecComm`)
      .then((response) => {
        this.receipts = response.data.list;
      })
      .catch((error) => {
        console.log(error);
      });
  },

  computed: {
    filteredRec() {
      const searchQuery = this.searchQuery.toLowerCase();
      const filtered = this.receipts.filter((receipt) => {
        return receipt.bearer_name.toLowerCase().includes(searchQuery);
      });

      if (filtered.length === 0) {
        return [{ message: "No matches found" }];
      }

      return filtered;
    },
  },
};
</script>
<style>
.hide-on-template {
  display: none;
}
</style>
