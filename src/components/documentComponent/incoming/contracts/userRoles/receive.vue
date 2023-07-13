<template>
  <div class="container my-4 mt-8">
    <div class="container grid place-content-center px-0">
      <p class="capitalize text-other-black text-2xl font-bold mb-4">
        details of contracts
      </p>
      <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Name of Payee</span
          >
          <label class="relative">
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="namePayee"
              @input="fetchContract"
            />
            <SearchIcon
              class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
            />
          </label>
          <!-- <div v-if=""></div> -->
        </div>
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Amount</span
          >
          <input
            type="text"
            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="amount"
          />
        </div>
      </div>
      <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Department/Office</span
          >
          <select
            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="selectedDept"
          >
            <option value="" disabled selected>
              Select a Department/Office
            </option>
            <option
              v-for="deptOption in deptOptions"
              :key="deptOption.department_code"
              :value="deptOption.department_code"
            >
              {{ deptOption.department_name }}
            </option>
          </select>
        </div>
      </div>
      <div class="grid grid-row-1 place-content-center">
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Particulars</span
          >
          <input
            type="text"
            class="w-[1150px] xxxxl:w-[1435px] h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="particular"
          />
        </div>
      </div>
    </div>

    <div class="container grid place-content-center px-0 mt-12">
      <p class="capitalize text-other-black text-2xl font-bold mb-4">
        Bearer’s Information
      </p>
      <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Name of Bearer</span
          >
          <input
            type="text"
            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="bearerName"
          />
        </div>
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Contact No.</span
          >
          <input
            type="text"
            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            id="bearerContact"
            v-model="bearerContact"
            @input="validateNumber($event, 'bearerContact')"
          />
        </div>
      </div>
      <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Department/Office</span
          >
          <select
            class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="selectedBearerDept"
          >
            <option value="" disabled selected>
              Select a Department/Office
            </option>
            <option
              v-for="bearerDeptOption in bearerDeptOptions"
              :key="bearerDeptOption.department_code"
              :value="bearerDeptOption.department_code"
            >
              {{ bearerDeptOption.department_name }}
            </option>
          </select>
        </div>
        <div class="flex flex-row my-1 items-center">
          <span class="font-semibold text-sm text-other-black w-210"
            >Email</span
          >
          <input
            type="email"
            class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            v-model="bearerEmail"
          />
        </div>
      </div>
      <div class="grid grid-rows-1 gap-8 xxxxl:gap-80">
        <div class="flex flex-row justify-end">
          <div class="flex gap-4 justify-end mt-9">
            <button
              class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded"
              @click="clearData"
            >
              clear
            </button>
            <button
              class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
              @click="sendContract"
            >
              save
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div
    id="pdf-content"
    class="flex flex-col justify-center items-center text-center"
    :class="{ 'hide-on-template': !printMode }"
  >
    <div class="absolute top-68 left-32">
      <img :src="logo" alt="Logo" class="w-16 h-16" />
    </div>

    <div class="p-10">
      <h1 class="text-5xl mt-5 text-center">City Government of Makati</h1>
      <h1 class="text-lg m-5 text-center">Accounting Information System</h1>
      <h1 class="mt-10 text-center">Transaction Receipt Details</h1>
    </div>

    <table style="border-collapse: collapse; width: 100%">
      <thead>
        <tr>
          <th style="border: 1px solid black; padding: 8px">Name of Payee</th>
          <th style="border: 1px solid black; padding: 8px">
            Name of Department/Office
          </th>
          <th style="border: 1px solid black; padding: 8px">Particulars</th>
          <th style="border: 1px solid black; padding: 8px">Amount</th>
          <th style="border: 1px solid black; padding: 8px">Name of Bearer</th>
          <th style="border: 1px solid black; padding: 8px">
            Department/Office
          </th>
          <th style="border: 1px solid black; padding: 8px">Contact No.</th>

          <th style="border: 1px solid black; padding: 8px">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: 1px solid black; padding: 8px">
            {{ namePayee }}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            {{ selectedDept }}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            {{ particular }}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            {{ amount }}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            {{ bearerName }}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            {{ selectedBearerDept }}
          </td>

          <td style="border: 1px solid black; padding: 8px">
            {{ bearerContact }}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            {{ bearerEmail }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import axios from "axios";
import Swal from "sweetalert2";

import DeptAPI from "../../../../../api_request/documentManagement/departmentDrop";
import SearchIcon from "../../../../icons/Budgetary/searchIcon.vue";
import logo from "@/assets/images/makati.png";
export default {
  components: {
    SearchIcon,
  },
  data() {
    return {
      logo: logo,
      printMode: false,
      namePayee: "",
      amount: "",
      selectedDept: "",
      deptOptions: [],
      particular: "",
      bearerName: "",
      bearerContact: "",
      selectedBearerDept: "",
      bearerDeptOptions: [],
      bearerEmail: "",
      userDetails: "",
    };
  },
  async created() {
    this.fetchReceipts();
    const response = await axios.get("me");

    this.userDetails = response.data.user;
    console.log("this", this.userDetails);
  },
  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });

    DeptAPI().then((bearerDeptOptions) => {
      this.bearerDeptOptions = bearerDeptOptions;
    });
  },
  methods: {
    // function na number then specific special characters pwede iinput
    validateNumber(event, field) {
      const regex = /^[0-9,-.+]+$/; // regex pattern to only allow numbers, - and , and .
      if (!regex.test(event.target.value)) {
        event.target.value = event.target.value.replace(/[^\d]/g, ""); // remove any non-numeric characters
        this[field] = event.target.value; // update the data property
      } else {
        this[field] = event.target.value; // update the data property if input is valid
      }
    },
    // function para maclear lahat ng dapat na ininput
    clearData() {
      this.namePayee = "";
      this.selectedDept = "";
      this.particular = "";
      this.amount = "";
      this.bearerName = "";
      this.selectedBearerDept = "";
      this.bearerContact = "";
      this.bearerEmail = "";
    },
    async sendContract() {
      try {
        const createContract = {
          payee_name: this.namePayee,
          department_id: this.selectedDept,
          description: this.particular,
          amount: this.amount,
          current_bearer: this.bearerName,
          current_bearer_dept: this.selectedBearerDept,
          current_bearer_contact_number: this.bearerContact,
          current_bearer_email: this.bearerEmail,
        };

        // API REQUEST FOR CREATE OF ACCOUNT
        const createResponse = await axios.post(
          "ContractPO/insertRec",
          createContract
        );
        console.log(createResponse.data);
        await Swal.fire({
          text: "Your entry has been successfully added. The account has been subject to Approval.",
          html: `<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">${createResponse.data.message}</span></div></div>`,
          showConfirmButton: true,
          showCancelButton: true,

          confirmButtonText: "Print",
          cancelButtonText: "Ok",
        }).then((result) => {
          if (result.value) {
            const printWindow = window.open(".", ".");
            printWindow.document.open();
            printWindow.document.write(`
        <html>
          <head>
            <h1 style="text-align: center">City Government of Makati</h1>
            <h2 style="text-align: center">Accounting Department</h2>
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
            <img src="${this.logo}" alt="logo"  style="
                display: block;
                width: 100px;
                height: 100px;
                position: absolute;
                top: 4%;
                left: 6%;
            " />

            <div style="margin-top: 20%">
       
            </div>

            <table style="border-collapse: collapse; width: 100%">
            <thead>
            <tr>
              <th style="border: 1px solid black; padding: 8px">Name of Payee</th>
              <th style="border: 1px solid black; padding: 8px">
                Name of Department/Office
              </th>
              <th style="border: 1px solid black; padding: 8px">Particulars</th>
              <th style="border: 1px solid black; padding: 8px">Amount</th>
              <th style="border: 1px solid black; padding: 8px">Name of Bearer</th>
              <th style="border: 1px solid black; padding: 8px">
                Department/Office
              </th>
              <th style="border: 1px solid black; padding: 8px">Contact No.</th>

              <th style="border: 1px solid black; padding: 8px">Email</th>
            </tr>
          </thead>
          <tbody>
        <tr>
          <td style="border: 1px solid black; padding: 8px">
            ${this.namePayee}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            ${this.selectedDept}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            ${this.particular}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            ${this.amount}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            ${this.bearerName}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            ${this.selectedBearerDept}
          </td>

          <td style="border: 1px solid black; padding: 8px">
            ${this.bearerContact}
          </td>
          <td style="border: 1px solid black; padding: 8px">
            ${this.bearerEmail}
          </td>
        </tr>

          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
          
          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
    
          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
        
          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
    
          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
  
          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>

          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>

          </tr>
          <tr>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
            <td style="border: 1px solid black; text-align: center; height: 20px;"> </td>
         
          </tr>
          </tbody>
        </table>
            <br></br>
            <div>Received the foregoing document/s on ${this.currentDate}, at ${this.currentTime} by ${this.userDetails.firstname} ${this.userDetails.surname}, ${this.userDetails.userdesignation} of the
      Accounting Department. If you have any question or clarification on this report you may call the Receiving
      Clerk at 02-8870-1307
      </div>


            <br></br>
            <br></br>

            <div>This is a computer generated report, signature is not required.</div>

   



          </body>
        </html>
      `);
            printWindow.document.close();
            printWindow.onload = function () {
              printWindow.print();
              printWindow.close();
            };
          }
        });

        // TO CLEAR THE INPUT FIELDS
        this.namePayee = "";
        this.selectedDept = "";
        this.particular = "";
        this.amount = "";
        this.bearerName = "";
        this.selectedBearerDept = "";
        this.bearerContact = "";
        this.bearerEmail = "";
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>
<style>
.hide-on-template {
  display: none;
}
</style>
