<template>
  <div class="container mt-4">
    <div class="mt-5 mx-4">
      <p class="capitalize text-other-black text-2xl font-bold mb-4">
        receive communication
      </p>
      <div
        class="my-4 grid grid-flow-row sm:grid-cols-2 items-center lg:grid-cols-[auto_360px_auto_360px] gap-y-3"
      >
        <div class="grid grid-row-2 place-content-center">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Type</span
            >
            <select
              class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commType"
            >
              <option value="" disabled selected>
                Select a Communication Type
              </option>
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
            <span class="font-semibold text-sm text-other-black w-210"
              >Subject</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commSubject"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Department/Office</span
            >
            <div v-if="this.dept === 'Others'" class="flex gap-2 flex-col">
              <select
                class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="dept"
              >
                <option value="" disabled selected>
                  Select a Department/Office
                </option>
                <option
                  v-for="deptOption in deptOptions"
                  :key="deptOption.department_code"
                  :value="deptOption.department_name"
                >
                  {{ deptOption.department_name }}
                </option>
              </select>
              <input
                type="text"
                class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="othersDept"
              />
            </div>
            <div v-else>
              <select
                class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="dept"
              >
                <option value="" disabled selected>
                  Select a Department/Office
                </option>
                <option
                  v-for="deptOption in deptOptions"
                  :key="deptOption.department_code"
                  :value="deptOption.department_name"
                >
                  {{ deptOption.department_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Email</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="email"
            />
          </div>
        </div>
        <div class="grid grid-row-4">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >DRN</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commDRN"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Reply To</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commReply"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Sender</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commSender"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Contact No.</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              id="commContact"
              v-model="commContact"
              @input="validateNumber($event, 'commContact')"
            />
          </div>
        </div>
      </div>

      <div class="container grid place-content-center px-0 mt-12">
        <p class="capitalize text-other-black text-2xl font-bold mb-4">
          bearer's Information
        </p>
        <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
          <div class="grid grid-row-3 place-content-center">
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
                >Email Address</span
              >
              <input
                type="email"
                class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="bearerEmailAddress"
              />
            </div>
            <div class="flex flex-row my-1 items-center">
              <span class="font-semibold text-sm text-other-black w-210"
                >Attached Document</span
              >
              <label
                @click="openFileInput"
                class="flex items-center h-32 p-4 gap-3 rounded border border-input-color border-dashed bg-upload-color cursor-pointer"
              >
                <UploadIcon />
                <div class="space-y-2">
                  <h4 class="text-base font-semibold text-gray-500">
                    Upload a file
                  </h4>
                </div>
              </label>
              <input
                type="file"
                ref="fileInput"
                style="display: none"
                @change="onFileSelected"
                accept=".pdf"
              />
              <span
                v-if="selectedFileName"
                class="text-primary-color font-normal text-sm px-8"
                >{{ selectedFileName }}</span
              >
            </div>
          </div>
          <div class="grid grid-row-3">
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
            <div class="flex flex-row my-1 items-center">
              <span class="font-semibold text-sm text-other-black w-210"
                >Department/Office</span
              >
              <div
                v-if="this.bearerDept === 'Others'"
                class="flex gap-2 flex-col"
              >
                <select
                  class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="bearerDept"
                >
                  <option value="" disabled selected>
                    Select a Department/Office
                  </option>
                  <option
                    v-for="bearerDeptOption in bearerDeptOptions"
                    :key="bearerDeptOption.department_code"
                    :value="bearerDeptOption.department_name"
                  >
                    {{ bearerDeptOption.department_name }}
                  </option>
                </select>
                <input
                  type="text"
                  class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="othersBearerDept"
                />
              </div>
              <div v-else>
                <select
                  class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="bearerDept"
                >
                  <option value="" disabled selected>
                    Select a Department/Office
                  </option>
                  <option
                    v-for="bearerDeptOption in bearerDeptOptions"
                    :key="bearerDeptOption.department_code"
                    :value="bearerDeptOption.department_name"
                  >
                    {{ bearerDeptOption.department_name }}
                  </option>
                </select>
              </div>
            </div>
            <div class="flex flex-row justify-end">
              <div class="flex justify-end gap-4 mt-9">
                <button
                  class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded"
                  @click="clearData"
                >
                  clear
                </button>
                <button
                  class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
                  @click="sendComm"
                >
                  save
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

import UploadIcon from "../../../../icons/Document/UploadIcon.vue";
import DeptAPI from "../../../../../api_request/documentManagement/departmentDrop";
import CommAPI from "../../../../../api_request/documentManagement/communicationDrop";
import logo from "@/assets/images/makati.png";
export default {
  components: {
    UploadIcon,
  },
  data() {
    return {
      currentDate: "",
      logo: logo,
      commType: "",
      commOptions: [],
      commSubject: "",
      dept: "",
      othersDept: "",
      deptOptions: [],
      email: "",
      commDRN: "",
      commReply: "",
      commSender: "",
      commContact: "",
      bearerName: "",
      bearerEmailAddress: "",
      bearerContact: "",
      bearerDept: "",
      othersBearerDept: "",
      bearerDeptOptions: [],
      selectedFileName: null,
      selectedFile: null,
    };
  },
  watch: {
    dept: {
      handler(newDept) {
        const department = this.deptOptions.find(
          (deptOption) => deptOption.department_name === newDept
        );
        this.commSender = department ? department.department_head : '';
      },
      deep: true,
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
    CommAPI().then((commOptions) => {
      this.commOptions = commOptions;
    });

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
      this.commType = "";
      this.commSubject = "";
      this.dept = "";
      this.email = "";
      this.commDRN = "";
      this.commReply = "";
      this.commSender = "";
      this.commContact = "";
      this.bearerName = "";
      this.bearerEmailAddress = "";
      this.bearerContact = "";
      this.bearerDept = "";

      // Clear the file upload data
      const fileInput = document.getElementById("doc");
      fileInput.value = ""; // Reset the file input value

      this.fileName = ""; // Reset the selected file name
      this.documentFile = null; // Reset the selected file
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
      this.selectedFileName = file.name;
      this.selectedFile = file;
    },
    // function para sa pagstore ng new transaction
    async sendComm() {
      // if (!this.selectedFile) {
      //   alert("Please select a file to upload");
      //   return;
      // }

      try {
        const formData = new FormData(); // Create a FormData object

        const createComms = {
          receive_comm_type_id: this.commType,
          subject: this.commSubject,
          department: this.dept === "Others" ? this.othersDept : this.dept,
          document: this.selectedFile,
          email: this.email,
          DRN: this.commDRN,
          reply_to: this.commReply,
          sender: this.commSender,
          contact_no: this.commContact,
          bearer_name: this.bearerName,
          bearer_address: this.bearerEmailAddress,
          bearer_contact_no: this.bearerContact,
          bearer_department:
            this.bearerDept === "Others"
              ? this.othersBearerDept
              : this.bearerDept,
          user: this.user,
        };

        // Append other data properties to the form data
        formData.append("file", this.selectedFile);

        for (const key in createComms) {
          formData.append(key, createComms[key]);
        }

        // API REQUEST FOR CREATE OF ACCOUNT
        const createResponse = await axios.post(
          "ReceiveCommunication/insert",
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data", // Set the content type to multipart/form-data
            },
          }
        );
        // console.log(createResponse.data.transact_id);

        await Swal.fire({
          // text: "Your entry has been successfully added. The account has been subject to Approval.",
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

            <div style="margin-top: 10%">
            <div style="text-align: center; text-transform: uppercase; font-weight: bold; margin-bottom: 5%;">Transaction Report for Receiving Communication </div>
            <div>Transaction No. ${createResponse.data.transact_id}</h3>
            <div>Date: ${this.currentDate}</div>
            <div>Sender: ${this.commSender}</div>
            <div>Subject: ${this.commSubject} </div>
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
          }
        });

        // TO CLEAR THE INPUT FIELDS
        this.commType = "";
        this.commSubject = "";
        this.dept = "";
        this.email = "";
        this.commDRN = "";
        this.commReply = "";
        this.commSender = "";
        this.commContact = "";
        this.bearerName = "";
        this.bearerEmailAddress = "";
        this.bearerContact = "";
        this.bearerDept = "";

        this.fileName = ""; // Reset the selected file name
        this.documentFile = null; // Reset the selected file
        this.selectedFileName = null; // Reset the selected file
      } catch (error) {
        console.error(error);
      }
    },
  },
  async created() {
    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userLastName = response.data.user.surname;
    this.user = this.userFirstName + " " + this.userLastName;
    console.log("here", response);
  },
};
</script>
