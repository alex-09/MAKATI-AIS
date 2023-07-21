<div v-if="isNewTrans | (isNewTrans === 'true')">
    <div class="flex flex-row justify-between gap-[100px] mx-auto my-8">
      <!-- FIRST COLUMN -->
      <div class="flex flex-col gap-2">
        <!-- BUDGET YEAR -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">
            <span>Budget Year</span>
          </div>
          <div>
            <select
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            >
              <option value="" disabled selected>Select Budget Year</option>
              <option v-for="by in budgetYear" :value="by.year">
                {{ by.year }}
              </option>
            </select>
          </div>
        </div>
        <!-- TYPE OF ADJUSTMENT -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">
            <span>Type of Adjustment</span>
          </div>
          <div>
            <select
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="typeOfAdjustment"
            >
              <option value="" disabled selected>
                Select Type of Adjustment
              </option>
              <!-- <option v-for="by in budgetYear" :value="by.id">
                {{ by.year }}
              </option> -->
            </select>
          </div>
        </div>
        <!-- SOURCE DOCUMENT -->

        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">Source Document:</div>
          <div class="w-[350px]">
            <input
              type="file"
              ref="fileInput"
              @change="onFileSelected"
              class="absolute opacity-0 cursor-pointer bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center rounded-md w-[350px] px-3 h-[32px] focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              accept=".pdf"
            />
            <div
              class="border border-gray-300 rounded-md py-1 px-3 w-full flex items-center justify-between text-sm"
            >
              <span>{{ selectedFileName }}</span>
              <button
                type="button"
                @click="openFilePicker"
                class="ml-2 w-[34px] h-[26px] pl-[2px] bg-[#FFECB3] text-[#606060] text-[14px] font-semibold rounded cursor-pointer flex justify-center items-center"
              >
                <svg
                  width="18"
                  height="19"
                  viewBox="0 0 18 19"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.6 13.4998V8.69983L5 10.2998"
                    stroke="#606060"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M6.59998 8.69983L8.19998 10.2998"
                    stroke="#606060"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M17 7.9V11.9C17 15.9 15.4 17.5 11.4 17.5H6.6C2.6 17.5 1 15.9 1 11.9V7.1C1 3.1 2.6 1.5 6.6 1.5H10.6"
                    stroke="#606060"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M17 7.9H13.8C11.4 7.9 10.6 7.1 10.6 4.7V1.5L17 7.9Z"
                    stroke="#606060"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <!-- DEPARTMENT -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">
            <span>Department</span>
          </div>
          <div class="w-[350px]">
            <select
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="selectedDprtmnt"
            >
              <option value="" disabled selected>
                Select a Department/Office
              </option>
              <option v-for="d in department" :value="d.department_code">
                {{ d.department_name }}
              </option>
            </select>
          </div>
        </div>
        <!-- TITLE OF THE PROGRAM -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">
            <span>Title of the Program</span>
          </div>
          <div class="w-[350px]">
            <input
              v-model="programTitle"
              type="text"
              name="sourceDocument"
              placeholder="Enter Department"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            />
          </div>
        </div>
        <!-- TITLE OF THE PROJECT -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">
            <span>Title of the Project</span>
          </div>
          <div class="w-[350px]">
            <input
              v-model="projectTitle"
              type="text"
              name="sourceDocument"
              placeholder="Enter Department"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            />
          </div>
        </div>
        <!-- TITLE OF THE ACTIVITY -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[210px]">
            <span>Title of the Activity</span>
          </div>
          <div class="w-[350px]">
            <input
              v-model="activityTitle"
              type="text"
              name="sourceDocument"
              placeholder="Enter Department"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            />
          </div>
        </div>
      </div>
      <!-- SECOND COLUMN -->
      <div class="flex flex-col gap-2">
        <!-- FUNDING SOURCE -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span> Funding Source</span>
          </div>
          <div class="w-[350px]">
            <select
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            >
              <option value="" disabled selected>
                Select Funding Source
              </option>
              <option v-for="fs in fundingSource" :value="fs.fundSource_id">
                {{ fs.fund_Source }}
              </option>
            </select>
            <!-- <input
              v-model="activityTitle"
              type="text"
              name="sourceDocument"
              placeholder="Enter Department"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
            /> -->
          </div>
        </div>
        <!-- SUPPLEMENTAL BUDGET NUMBER -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span>Supplemental Budget Number</span>
          </div>
          <div class="w-[350px] h-[32px]">
            <input
              type="text"
              placeholder="Enter Source Document"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="sourceDocument"
            />
          </div>
        </div>
        <!-- DATE OF DOCUMENT -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span>Date of Document</span>
          </div>
          <div class="w-[350px] h-[32px]">
            <input
              type="date"
              placeholder="Enter Source Document"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              v-model="dateOfDocument"
            />
          </div>
        </div>
        <!-- OFFICE CODE -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span>Office Code</span>
          </div>
          <div class="w-[350px] h-[32px]">
            <input
              type="text"
              name=""
              readonly="readonly"
              class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1 read-only:bg-text-gray"
            />
          </div>
        </div>
        <!-- AIP CODE (PROGRAM)-->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span>AIP Code (Program)</span>
          </div>
          <div>
            <div class="w-[350px] h-[32px]">
              <input
                type="text"
                name=""
                placeholder="Enter AIP Code"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              />
            </div>
          </div>
        </div>
        <!-- AIP CODE (PROJECT) -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span>AIP Code (Project)</span>
          </div>
          <div>
            <div class="w-[350px] h-[32px]">
              <input
                type="text"
                name=""
                placeholder="Enter AIP Code"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              />
            </div>
          </div>
        </div>
        <!-- AIP CODE (ACTIVITY) -->
        <div class="flex flex-row gap-8 items-center">
          <div class="w-[250px]">
            <span>AIP Code (Activity)</span>
          </div>
          <div>
            <div class="w-[350px] h-[32px]">
              <input
                type="text"
                name=""
                placeholder="Enter AIP Code"
                class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-1"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-end gap-4 my-4">
      <div>
        <button
          class="w-125 h-42 bg-button-blue text-white uppercase rounded-lg"
        >
          process
        </button>
      </div>
      <!-- <div>
        <button
          class="w-125 h-42 bg-danger-color text-white uppercase rounded-lg"
        >
          close
        </button>
      </div> -->
    </div>
  </div>

  
<div class="flex items-center gap-36">
  <div class="flex items-center">
    <input
      type="radio"
      name="newTrans"
      id=""
      v-model="isNewTrans"
      value="true"
    />
    <label
      for="newTrans"
      class="text-sm font-semibold text-other-black ml-3"
      >New Transactions</label
    >
  </div>

  <div class="flex items-center">
    <input
      type="radio"
      name="newTrans"
      id=""
      v-model="isNewTrans"
      value="false"
    />
    <label
      for="newTrans"
      class="text-sm font-semibold text-other-black ml-3"
      >Previous Transactions</label
    >
  </div>
</div>