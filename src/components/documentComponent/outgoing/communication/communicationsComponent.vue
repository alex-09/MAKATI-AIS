<template>
  <div class="w-full h-full">
    <p class="capitalize text-other-black text-2xl font-bold mt-10 ml-10">
      Outgoing Communication
    </p>

    <div class="flex justify-center px-10 py-5">
      <div class="border-8 border-blue-400 w-full p-10 rounded-lg">
        <div class="flex flex-row justify-evenly">
          <div>
            <div class="pr-5 py-5 font-semibold">
              Type of Communication Document
            </div>
            <div class="pr-5 py-5 font-semibold">Subject</div>
            <div class="pr-5 py-5 font-semibold">Receiver</div>
          </div>

          <div>
            <div class="py-5 w-[262px]">
              <span class="w-[262px]">{{
                searchComm?.receive_comm_type_id
              }}</span>
            </div>
            <div class="py-5 w-[262px]">
              <span class="w-[262px]">{{ searchComm?.subject }}</span>
            </div>
            <div class="py-5 w-[262px]">
              <span class="w-[262px]">{{ searchComm?.sender }}</span>
            </div>
          </div>

          <div>
            <div class="px-5 py-5 font-semibold">M/C No.</div>
            <div class="px-5 py-5 font-semibold">Creator</div>
            <div class="px-5 py-5 font-semibold">Deparment Office</div>
          </div>

          <div>
            <div class="py-3">
              <label class="relative">
                <input
                  type="text"
                  v-model="transac_id"
                  @input="fetchComm"
                  name="search"
                  class="w-full rounded-lg focus:outline-none focus-visible:ring-white focus:border-black"
                />
                <SearchIcon
                  class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 right-3"
                />
              </label>
            </div>
            <div class="py-5">
              <span class="">{{ searchComm?.creator }}</span>
            </div>
            <div class="py-3">
              <select
                class="w-full rounded-lg focus:outline-none focus-visible:ring-white focus:border-black"
                v-model="dept"
              >
                <option
                  v-for="deptList in deptLists"
                  :key="deptList.department_code"
                  :value="deptList.department_name"
                >
                  {{ deptList.department_name }}
                </option>
              </select>
            </div>
          </div>
        </div>
        <div class="flex flex-row justify-evenly">
          <div>
            <div class="pr-5 py-5 font-semibold w-[241px] xxxxl:w-[300px]">
              Particular
            </div>
          </div>
          <div>
            <div class="py-3">
              <input
                class="w-[1000px] xxxxl:w-[1100px] rounded-lg focus:outline-none focus-visible:ring-white focus:border-black"
                type="text"
                v-model="particular"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-end gap-4 px-10">
      <button
        class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
        @click="updateComm()"
      >
        save
      </button>
      <RouterLink
        :to="{ name: 'Document Outgoing Communications Dashboard' }"
        class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded flex items-center justify-center"
      >
        close
      </RouterLink>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import DeptAPI from "../../../../api_request/documentManagement/departmentDrop";
import SearchIcon from "../../../icons/Budgetary/searchIcon.vue";

export default {
  components: {
    SearchIcon,
  },
  data() {
    return {
      comm: [],
      comms: [],
      transac_id: "MC-",
      typeComm: "",
      subject: "",
      receiver: "",
      creator: "",
      dept: "",
      deptLists: [],
      particular: "",
    };
  },
  methods: {
    fetchComms() {
      axios
        .get("ReceiveCommunication/searchMc")
        .then((response) => {
          this.communications = response.data.data;
          console.log(this.communications);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    fetchComm() {
      const transac_id = this.transac_id.toLowerCase();
      const comm = this.comms.find(
        (comm) => comm.transac_id.toLowerCase() === transac_id
      );
    },
    async updateComm() {
      try {
        const updateComm = {
          mc_no: this.transac_id,
          department: this.dept,
          particulars: this.particular,
        };

        const updateResponse = await axios.post(
          "ReceiveCommunication/updateMc",
          updateComm
        );
        console.log(updateResponse.data);
        this.$router.push({
          name: "Document Outgoing Communications Dashboard",
        });
      } catch (error) {
        console.error(error);
      }
    },
  },
  mounted() {
    axios
      .get("ReceiveCommunication/searchMc")
      .then((response) => {
        this.comms = response.data.data;
        console.log(response.data.data);
      })
      .catch((error) => {
        console.log(error);
      }),
      DeptAPI().then((deptLists) => {
        this.deptLists = deptLists;
      });

    this.fetchComms();
  },
  computed: {
    searchComm() {
      return (
        this.comms.find(
          (comm) =>
            comm.transac_id.toLowerCase() === this.transac_id.toLowerCase()
        ) || null
      );
    },
  },
};
</script>
