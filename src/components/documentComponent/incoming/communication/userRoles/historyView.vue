<script setup>
import { ref } from "vue";

const showPrint = ref(true);
</script>
<script>
import logo from "@/assets/images/makati.png";
import axios from "axios";
import { ref, onMounted } from "vue";

export default {
  props: {
    show: {
      type: Boolean,
      required: true,
    },
    id: {
      type: [String, Number], // Specify the type(s) of the prop
      required: true,
    },
    selectedData: {
      type: Object, // Replace "Object" with the correct data type
      required: true,
    },
  },
  data() {
    return {
      logo: logo,
      comm: [],
      comms: [],
      selectedItems: [],
      selectAll: false,
      showAddEntry: false,
      currentDate: "",
      currentTime: "",
      user: "",
      particulars: "",
      type: "Communication",
      userDetails: "",
      currentTime: "",
      currentDate: "",
    };
  },

  computed: {
    filteredComms() {
      if (this.selectedItems.length === 0) {
        // No items selected, return all action history entries
        return this.comms;
      } else {
        // Filter action history based on selected items
        return this.comms.filter((comm) => this.selectedItems.includes(comm));
      }
    },
  },

  methods: {
    printReceivingSelectAll() {
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
          left: 4%;
        " />


        <div style="margin-top: 10%; text-align: center; font-size: 24px;">
          Action History
        </div>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 5%;">
          <thead>
            <tr>
              <th style="border: 1px solid black">DATE</th>
              <th style="border: 1px solid black">TIME</th>
              <th style="border: 1px solid black">PARTICULAR</th>
              <th style="border: 1px solid black">USER</th>
            </tr>
          </thead>
          <tbody>
            ${selectedItems
              .map((comm) => {
                return `
                  <tr>
                    <td style="border: 1px solid black; text-align: center;">${comm?.date}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm?.time}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm?.particulars}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm?.user}</td>
                  </tr>
                `;
              })
              .join("")}
          </tbody>
        </table>
      </body>
    </html>
  `);
      printWindow.document.close();
      printWindow.onload = function () {
        printWindow.print();
        printWindow.close();
      };
    },

    toggleSelectAll() {
      this.selectAll = !this.selectAll;
      if (this.selectAll) {
        this.selectedItems = this.comms;
      } else {
        this.selectedItems = [];
      }
    },

    toggleItemSelection(item) {
      if (this.selectedItems.includes(item)) {
        // Item already selected, remove it
        this.selectedItems = this.selectedItems.filter((i) => i !== item);
      } else {
        // Item not selected, add it
        this.selectedItems.push(item);
      }
    },
    fetchComms() {
      axios
        .get(`ReceiveCommunication/actionHistory/${this.id}`)
        .then((response) => {
          this.rec = response.data.list;
          console.log(response.data.list);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    refreshTable() {
      axios
        .get(`ReceiveCommunication/actionHistory/${this.id}`)
        .then((response) => {
          this.comms = response.data.list;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // to show and hide the add entry fields
    showEntry() {
      this.showAddEntry = !this.showAddEntry;
    },
    addEntry() {
      const addHistory = {
        type_id: this.trans_id,
        particulars: this.particulars,
        user: this.user,
        type: this.type,
      };

      console.log(addHistory);

      axios
        .post("ReceiveCommunication/addActHistory", addHistory)
        .then((response) => {
          // Handle the response as needed
          console.log(response.data);
          this.refreshTable(); // Update the table data
          this.clearData();
        })
        .catch((error) => {
          // Handle any errors that occur during the request
          console.error(error);
        });
    },
    clearData() {
      this.particulars = "";
    },
  },
  created() {
    this.fetchComms();
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
    axios
      .get(`ReceiveCommunication/actionHistory/${this.id}`)
      .then((response) => {
        this.comms = response.data.list;
        this.trans_id = response.data.id;
      })
      .catch((error) => {
        console.log(error);
      });

    const date = new Date();
    this.currentDate = date.toISOString().split("T")[0];
    this.currentTime = date.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });
  },
  async created() {
    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userdesignation = response.data.user.userdesignation;
    this.userLastName = response.data.user.surname;
    this.user = this.userFirstName + " " + this.userLastName;
    console.log(this.user);
  },
};
</script>
<template>
  <div v-if="show">
    <div class="container py-4">
      <div class="float-right">
        <button @click="$emit('close')">
          <svg
            width="30"
            height="30"
            viewBox="0 0 30 30"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle cx="15" cy="15" r="15" fill="#F8274C" />
            <path
              d="M20.95 10.2485L19.7515 9.04999L15 13.8015L10.2485 9.04999L9.05005 10.2485L13.8015 15L9.05005 19.7515L10.2485 20.95L15 16.1985L19.7515 20.95L20.95 19.7515L16.1985 15L20.95 10.2485Z"
              fill="white"
              stroke="white"
            />
          </svg>
        </button>
      </div>
    </div>
    <div class="container mt-8">
      <div
        class="container grid grid-cols-3 place-content-center px-0 gap-34 xxxxl:gap-52"
      >
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-175 xxxxl:w-175"
            >Transaction Number</span
          >
          {{ selectedData.transaction_id_num }}
        </div>
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-175 xxxxl:w-175"
            >Name of Sender</span
          >
          {{ selectedData.sender }}
        </div>
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-175 xxxxl:w-175"
            >Department / Office</span
          >
          <div v-if="selectedData.department == null">N/A</div>
          <div v-else>
            {{ selectedData.department }}
          </div>
        </div>
      </div>
      <div class="container grid grid-cols-1 mt-4 p-0">
        <div class="flex flex-row my-1 items-center">
          <span
            class="font-semibold text-sm text-other-black w-[175px] xxxxl:w-175"
            >Subject</span
          >
          {{ selectedData.subject }}
        </div>
      </div>
    </div>
    <!-- TABLE -->
    <div v-if="showPrint | (showPrint === true)">
      <div class="container mt-8">
        <p class="capitalize text-other-black text-2xl font-bold mb-4">
          Action History
        </p>
      </div>
      <div class="container grid justify-items-center p-0 mt-4">
        <div class="overscroll-y-contain w-1850 1536:w-1458 xxxxl:w-1850">
          <table
            class="divide-y w-1850 1536:w-1458 xxxxl:w-1850 divide-gray-200 mr-8"
          >
            <thead>
              <tr>
                <th class="w-[100px]">
                  <input
                    id="checkbox-selectall"
                    type="checkbox"
                    class="text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    :checked="selectAll"
                    @change="toggleSelectAll"
                  />
                  <label for="checkbox-selectall" class="sr-only"
                    >checkbox</label
                  >
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
                >
                  date
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
                >
                  time
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-800"
                >
                  particular
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
                >
                  user
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr v-for="comm in comms" :key="comm.id">
                <td class="flex justify-center py-4">
                  <input
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    :checked="selectedItems.includes(comm)"
                    @change="toggleItemSelection(comm)"
                  />
                  <label for="checkbox-selectall" class="sr-only"
                    >checkbox</label
                  >
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.date }}
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.time }}
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                {{ comm.particulars == "" || null ? 'N/A' : comm.particulars }} 
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.user }}
                </td>
              </tr>
              <tr v-if="showAddEntry">
                <td
                  class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
                ></td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  <input
                    v-model="currentDate"
                    type="text"
                    class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                    readonly
                  />
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  <input
                    v-model="currentTime"
                    type="text"
                    class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                    readonly
                  />
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  <input
                    v-model="particulars"
                    type="text"
                    class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  />
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  <input
                    v-model="user"
                    type="text"
                    class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                    readonly
                  />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- BUTTONS -->
      <div class="container mt-4">
        <div class="container mx-8">
          <div class="flex flex-row justify-between">
            <div class="flex space-x-4">
              <button
                @click="showEntry()"
                class="uppercase font-medium text-sm w-142 h-42 bg-primary-color text-white rounded"
              >
                add entry
              </button>
              <button
                @click="addEntry()"
                class="uppercase font-medium text-sm w-100 h-42 bg-button-blue text-white rounded"
              >
                save
              </button>
              <button
                @click="clearData()"
                class="uppercase font-medium text-sm w-100 h-42 bg-danger-color text-white rounded"
              >
                clear
              </button>
            </div>
            <div class="flex space-x-4 mr-4">
              <button
                @click="showPrint = false"
                :disabled="selectedItems.length === 0"
                class="uppercase font-medium text-sm w-100 h-42 bg-save-color text-white rounded"
              >
                view
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="!showPrint | (showPrint === false)">
      <div class="container mt-8">
        <p class="capitalize text-other-black text-2xl font-bold mb-4">
          Action History (For Printing)
        </p>
      </div>
      <div class="container grid justify-items-center p-0 mt-4">
        <div class="overscroll-y-contain w-1850 1536:w-1458 xxxxl:w-1850">
          <table
            class="divide-y w-1850 1536:w-1458 xxxxl:w-1850 divide-gray-200 mr-8"
          >
            <thead>
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
                >
                  date
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
                >
                  time
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-800"
                >
                  particular
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-250"
                >
                  user
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr v-for="comm in selectedItems" :key="comm.id">
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.date }}
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.time }}
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.particulars }}
                </td>
                <td
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.user }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="container mx-30 mt-4">
        <div class="container mx-8">
          <div class="flex justify-end gap-4">
            <button
              @click="showPrint = true"
              class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded"
            >
              cancel
            </button>
            <button
              @click="printReceivingSelectAll()"
              class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
            >
              print
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
