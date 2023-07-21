<template>
  <div class="container mt-[80px]">
    <div class="container grid place-content-center px-0">
      <p class="capitalize text-other-black text-2xl font-bold mb-4">
        create communications
      </p>
      <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
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
              >Addressee</span
            >
            <textarea
              v-model="addressee"
              class="w-450 min-h-32 max-h-32 overflow-auto border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
            ></textarea>
          </div>
        </div>
        <div class="grid grid-row-2">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >M/C No.</span
            >
            <div
              class="w-200 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500 flex items-center"
            >
              MC-{{ currentYear }}-{{ currentMonth }}-SSSSS
            </div>
            <span class="ml-2"> - </span>
            <input
              type="text"
              class="w-[50px] h-32 ml-4 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commMC"
            />
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Department/Office</span
            >

            <div>
              <Multiselect
                v-model="dept"
                track-by="department_code"
                label="department_name"
                :options="deptOptions"
                :multiple="true"
                :taggable="false"
                @tag="addTag"
                :disabled="
                  dept &&
                  dept.some((option) => option.department_name === 'Others')
                "
              ></Multiselect>

              <input
                v-if="
                  dept &&
                  dept.some((option) => option.department_name === 'Others')
                "
                type="text"
                placeholder="Others..."
                class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                v-model="othersDept"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-8 xxxxl:gap-80">
        <div class="grid grid-row-3 place-content-center">
          <div class="grid grid-cols">
            <div class="grid grid-row">
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
            </div>
          </div>
          <div class="grid grid-cols">
            <div class="grid grid-row">
              <div class="flex flex-row my-1 items-center">
                <span class="font-semibold text-sm text-other-black w-210"
                  >Particulars</span
                >
                <input
                  type="text"
                  v-model="particulars"
                  class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                />
              </div>
            </div>
          </div>
          <div class="flex flex-row my-1 items-center mb-28">
            <span class="font-semibold text-sm text-other-black w-210"
              >Reply To</span
            >
            <select
              class="w-450 h-[34px] border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commReply"
            >
              <option value="" disabled selected>Select Transaction No.</option>
              <option
                v-for="replyOption in replyOptions"
                :key="replyOption.id"
                :value="replyOption.transaction_id_num"
              >
                {{ replyOption.transaction_id_num }}
              </option>
            </select>
          </div>
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210 hidden"
              >Sender</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              hidden
            />
          </div>
        </div>
        <div class="grid grid-row-3">
          <div class="flex flex-row my-1 items-center">
            <span class="font-semibold text-sm text-other-black w-210"
              >Creator</span
            >
            <input
              type="text"
              class="w-450 h-32 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="commCreator"
            />
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
                @click="createComm"
              >
                save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UploadIcon from "../../../../icons/Document/UploadIcon.vue";
import CommAPI from "../../../../../api_request/documentManagement/communicationDrop";
import ReplyAPI from "../../../../../api_request/documentManagement/replyToDrop";
import DeptAPI from "../../../../../api_request/documentManagement/departmentDrop";

import axios from "axios";
import Swal from "sweetalert2";
import Multiselect from "vue-multiselect";
export default {
  components: {
    Multiselect,
    UploadIcon,
  },
  data() {
    return {
      commType: "",
      commOptions: [],
      commSubject: "",
      commSender: "William Dayrit",
      commReply: "",
      commMC: "00",
      commCreator: "",
      selectedFileName: null,
      selectedFile: null,

      currentYear: "",
      currentMonth: "",
      replyOptions: [],
      dept: [],
      addressee: [],
      othersDept: "",
      deptOptions: [{ department_code: "OTHERS", department_name: "Others" }],
      particulars: "",
    };
  },
  watch: {
    dept: {
      handler(newDept) {
        this.addressee = newDept
          .map((option) => option.department_head)
          .join(", ");
      },
      deep: true,
    },
  },
  computed: {
    //   getAddressee() {
    //     if (this.dept.length > 0) {
    //       const departmentHeads = this.dept.map(
    //         (option) => option.department_head
    //       );
    //       this.addressee = departmentHeads;
    //       return departmentHeads.join(", ");
    //     } else {
    //       return "";
    //     }
    //   },
    //   selectedDepartmentHeads() {
    //     if (!Array.isArray(this.dept)) {
    //       return [];
    //     }
    //     return this.dept
    //       .map((department) => department.department_head)
    //       .join(", ");
    //   },
  },
  mounted() {
    CommAPI().then((commOptions) => {
      this.commOptions = commOptions;
    });

    ReplyAPI().then((replyOptions) => {
      this.replyOptions = replyOptions;
    });

    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });

    console.log("here", this.deptOptions);
    setInterval(() => {
      const time = new Date();
      // IF NEED DIN YUNG SECOND DAGDAG LANG TO - second: 'numeric'
      this.currentTime = time.toLocaleString("en-US", {
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        hour12: true,
      });
    }, 1000);

    const date = new Date();
    const year = { year: "numeric" };
    const month = { month: "2-digit" };
    this.currentYear = date.toLocaleDateString("en-US", year);
    this.currentMonth = date.toLocaleDateString("en-US", month);
  },
  methods: {
    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
      };
      this.deptOptions.push(tag);
      this.dept.push(tag);
    },
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
      this.commReply = "";
      this.commSender = "";
      this.commMC = "00";
      this.commCreator = "";
      this.dept = [];
      this.othersDept = "";
      this.particulars = "";

      this.selectedFileName = "";
      this.selectedFile = null;
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
    async createComm() {
      console.log("deparment", this.deptOptions);
      try {
        const formData = new FormData(); // Create a FormData object
        const selectedDepartments = this.dept.map(
          (option) => option.department_name
        );

        if (this.dept.some((option) => option.department_name === "Others")) {
          selectedDepartments.push(this.othersDept);
        }
        const createComms = {
          receive_comm_type_id: this.commType,
          subject: this.commSubject,
          document: this.selectedFile,
          reply_to: this.commReply,
          sender: this.commSender,
          creator: this.commCreator,
          mc_no: this.commMC,
          user: this.user,
          department: selectedDepartments,
          particulars: this.particulars,
          addressee: this.addressee,
        };
        console.log("here", this.addressee);
        formData.append("file", this.selectedFile);

        for (const key in createComms) {
          formData.append(key, createComms[key]);
        }
        // API REQUEST FOR CREATE OF ACCOUNT
        const createResponse = await axios.post(
          "ReceiveCommunication/createComm",
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data", // Set the content type to multipart/form-data
            },
          }
        );
        console.log(createResponse.data);
        await Swal.fire({
          text: "Your entry has been successfully added. The account has been subject to Approval.",
          html: `<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">${createResponse.data.message}</span></div></div>`,
          showConfirmButton: true,
        });

        // TO CLEAR THE INPUT FIELDS
        this.dept = [];
        this.commType = "";
        this.commSubject = "";
        this.commReply = "";
        this.commSender = "William Dayrit";
        this.commMC = "00";

        this.othersDept = "";
        this.particulars = "";

        this.selectedFileName = "";
        this.selectedFile = null;
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
    this.commCreator = this.user;
    console.log(this.user);
  },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
