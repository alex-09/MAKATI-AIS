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
      <div class="grid grid-cols-4">
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
              class="w-234 h-32 border rounded px-2 pl-3 py-1 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
              v-model="selectedDivision"
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
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-92 sticky top-0"
              ></th>
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
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-360 sticky top-0"
              >
                restriction
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase w-200 sticky top-0"
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
                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
              >
                <label class="inline-flex items-center">
                  <input
                    type="checkbox"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    :checked="isSelected(comm.transaction_id_num)"
                    @change="selectComm(comm.transaction_id_num)"
                  />
                </label>
              </td>
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
                <span>{{ comm.sender }}</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span>{{ comm.receive_comm_type_id }}</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span>{{ comm.subject }}</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span class="text-center">{{ comm.drn }}</span>
                <span class="text-center" v-if="comm.drn === null">N/A</span>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span>{{ comm.reply_to }}</span>
                <span
                  class="text-center"
                  v-if="(comm.reply_to === null) & !comm.editMode"
                  >N/A</span
                >
                <span
                  class="text-center"
                  v-if="(comm.reply_to === null) & comm.editMode"
                  >N/A</span
                >
              </td>
              <!-- assign to -->
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span
                  class="text-center"
                  v-if="comm.assign_to === null && !comm.editMode"
                  >N/A</span
                >
                <span v-else-if="!comm.editMode">
                  {{ comm.assign_to }}
                  <!-- {{
                    JSON.parse(comm.assign_to)
                      .map((obj) => obj.name)
                      .join(", ")
                  }} -->
                </span>

                <Multiselect
                  v-if="comm.editMode"
                  v-model="selectedAssignTo"
                  label="name"
                  track-by="id"
                  :options="divisionOptions"
                  :multiple="true"
                  :taggable="true"
                  @tag="addTag"
                ></Multiselect>
                <!-- <pre
                  class="language-json"
                ><code>{{ selectedAssignTo }}</code></pre> -->
              </td>

              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <div v-if="comm.cluster === null && !comm.editMode">N/A</div>
                <select
                  class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="comm.cluster"
                  @change="handleChange('comm.cluster')"
                  v-if="comm.editMode"
                >
                  <option
                    v-for="cluster in clusters"
                    :key="id"
                    :value="cluster.cluster"
                  >
                    {{ cluster.cluster }}
                  </option>
                </select>
                <div v-if="!comm.editMode">
                  <span>{{ comm.cluster }}</span>
                </div>

                <div v-else>
                  <span v-if="!comm.editMode && !showComm">N/A</span>
                </div>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span v-if="!comm.editMode">{{ comm.restriction }}</span>
                <span v-if="comm.restriction === null && !comm.editMode"
                  >N/A</span
                >
                <select
                  class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="comm.restriction"
                  @change="handleChange('comm.restriction')"
                  v-if="comm.editMode"
                >
                  <option
                    v-for="restrictOption in restrictOptions"
                    :key="restrictOption.id"
                    :value="restrictOption.restrict_type"
                  >
                    {{ restrictOption.restrict_type }}
                  </option>
                </select>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span v-if="!comm.editMode">{{ comm.action }}</span>
                <span v-if="comm.action === null && !comm.editMode">N/A</span>
                <select
                  class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="comm.action"
                  @change="handleChange('comm.action')"
                  v-if="comm.editMode"
                >
                  <option
                    v-for="actionOption in actionOptions"
                    :key="actionOption.id"
                    :value="actionOption.action_type"
                  >
                    {{ actionOption.action_type }}
                  </option>
                </select>
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span v-if="!comm.editMode && comm.status === 'Pending'">{{ comm.no_of_days }}</span>
                <span v-if="comm.no_of_days === null && !comm.editMode"
                  >N/A</span
                >
                <span v-if="comm.no_of_days !== null  && comm.status !== 'Pending' && !comm.editMode"
                  >N/A</span
                >
                <span v-if="comm.status !== 'Pending' && comm.editMode"
                  >N/A</span
                >
                <input
                  type="text"
                  class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="comm.no_of_days"
                  v-if="comm.editMode && comm.status === 'Pending'"
                />
              </td>
              <td
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center w-133"
              >
                <span v-if="!comm.editMode">{{ comm.status }}</span>
                <span v-if="comm.status === null && !comm.editMode">N/A</span>
                <select
                  class="h-42 w-100% border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
                  v-model="comm.status"
                  @change="handleChange('comm.status')"
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
                    class="w-30 h-32 border rounded-lg text-xl font-bold text-btnHover2 hover:bg-btnHover2 hover:text-white"
                  >
                    R
                  </button>
                  <button
                    @click="selectComm(comm.transaction_id_num)"
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
      <div class="container mx-30 mt-4">
        <div class="container mx-8">
          <div class="flex justify-start gap-4">
            <button
              class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
              @click="editSelectedComm"
            >
              save
            </button>
            <button
              class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded"
              @click="clearData()"
            >
              clear
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import DeptAPI from "../../../../../api_request/documentManagement/departmentDrop";
import CommAPI from "../../../../../api_request/documentManagement/communicationDrop";
import DivisionAPI from "../../../../../api_request/documentManagement/divisionDrop";
import ClusterAPI from "../../../../../api_request/documentManagement/clusterDrop";
import ActionAPI from "../../../../../api_request/documentManagement/actionDrop";
import RestrictAPI from "../../../../../api_request/documentManagement/restrictDrop";
import StatusAPI from "../../../../../api_request/documentManagement/statusDrop";
import PdfEmbed from "vue-pdf-embed";
import HistoryView from "./historyView.vue";
import Multiselect from "vue-multiselect";
export default {
  components: {
    HistoryView,
    PdfEmbed,
    Multiselect,
  },
  data() {
    return {
      selectedAssignTo: [],
      clusters: [
        {
          id: 1,
          cluster: "Administrative and Internal Control Services",
        },
        {
          id: 2,
          cluster: "Financial Reporting Services",
        },
        {
          id: 3,
          cluster: "All",
        },
      ],

      comm: {
        assign_to: [],
        restriction: "",
        action: "",
        no_of_days: "",
        status: "",
        cluster: "",
      },

      selected: null,
      options: [],
      isHovered: false,
      showChildComponent: false,
      // comm: [],
      comms: [],
      searchDRN: "",
      searchSender: "",
      searchReplyTo: "",
      searchTransactionNumber: "",

      selectedCluster: "",
      selectedType: "",
      selectedRestrict: "",
      selectedDivision: "",
      selectedDepartment: "",

      showComm: false,
      commOptions: [],
      deptOptions: [],
      searchOptions: [],
      divisionOptions: [],
      clusterOptions: [],
      actionOptions: [],
      restrictOptions: [],
      statusOptions: [],
      selectedCommId: [],

      selectedId: null,
      pdfFilePath: "",
      viewPdf: "",
    };
  },

  computed: {
    filteredList() {
      return this.comms.filter((comm) => {
        comm.status !== "Closed";

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
    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
      };
      this.divisionOptions.push(tag);
      this.selectedAssignTo.push(tag);
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
    resetFilters() {
      console.log("this", this.divisionOptions);
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
    // to be able to display the existing data in the dropdowns
    handleChange(fieldName) {
      switch (fieldName) {
        case "comm.assign_to":
          // console.log(this.comm.assign_to);
          break;

        case "comm.restriction":
          // console.log(this.comm.restriction);
          break;

        case "comm.restrict_type":
          // console.log(this.comm.restrict_type);
          break;

        case "comm.action":
          // console.log(this.comm.action);
          break;

        case "comm.status":
          // console.log(this.comm.status);
          break;
      }
    },
    // show the input fields that can be edited
    showComms() {
      this.showComm = !this.showComm;
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
    fetchComms() {
      axios
        .get("ReceiveCommunication/listCA")
        .then((response) => {
          this.rec = response.data.list;
          this.sample = response.data.division;
          console.log("xxx", response.data.list);

          if (Array.isArray(response.data.list)) {
                this.comms = response.data.list.filter((comm) => {
                return (
                comm.status !== "Closed" && comm.status !== "Cancelled"
                );
                });
            }

          // this.pdfFilePath = response.data.list
          // const documents = response.data.list.map(comm => comm.document);

          // console.log(documents);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    isSelected(commId) {
      return this.selectedCommId === commId;
    },
    selectComm(commId) {
      this.selectedCommId = commId;
      this.toggleEditMode(commId);
    },
    toggleEditMode(commId) {
      this.comms.forEach((comm) => {
        if (comm.transaction_id_num === commId) {
          comm.editMode = !comm.editMode;
          if (comm.editMode) {
            console.log(comm.id);
          }
        } else {
          comm.editMode = false;
        }
      });
    },
    refreshTable() {
      axios
        .get(`ReceiveCommunication/listCA`)
        .then((response) => {
          this.comms = response.data.list;

          if (Array.isArray(response.data.list)) {
          this.comms = response.data.list.filter((comm) => {
          return (
          comm.status !== "Closed" && comm.status !== "Cancelled"
          );
          });
        }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editSelectedComm() {
      console.log("here", this.comm.cluster);
      const selectedComm = this.comms.find(
        (comm) => comm.transaction_id_num === this.selectedCommId
      );
      if (selectedComm) {
        console.log("Editing comm with id:", selectedComm.transaction_id_num);
        // if comm.status contains closed, then delete the row

        // selectedComm.cluster = document.getElementById("getCluster").innerHTML;

        const selectedAssign = this.selectedAssignTo.map(
          (assign) => assign.name
        );
        const selectedAssign_to = [];
        for (const name in this.selectedAssignTo) {
          let nameitem = this.selectedAssignTo[name];
          console.log("nameitem", nameitem.name);
          selectedAssign_to.push(nameitem.name);
        }
        console.log("select", selectedAssign_to);
        // Prepare the data to send in the POST request
        // var arrayData = [];
        // arrayData = selectedComm.assign_to;
        const data = {
          id: selectedComm.id,
          assign_to: selectedAssign_to,
          restriction: selectedComm.restriction,
          action: selectedComm.action,
          cluster: selectedComm.cluster,
          no_of_days: selectedComm.no_of_days,
          status: selectedComm.status,
          user: this.user,
          transac_id: selectedComm.transaction_id_num,
          mc_no: selectedComm.mc_no,
        };
        // console.log("po", nameitem);
        console.log("cluster", selectedComm.cluster);

        // Make the POST request using Axios
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
              .post("ReceiveCommunication/updateCA", data)
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
    clearData() {
      const selectedComm = this.comms.find(
        (comm) => comm.id === this.selectedCommId
      );
      const selectedAssign = this.selectedAssignTo.map((assign) => assign.name);

      if (selectedComm) {
        this.selectedAssignTo = [];

        selectedComm.assign_to = [];
        selectedComm.restriction = "";
        selectedComm.action = "";
        selectedComm.cluster = "";
        selectedComm.no_of_days = "";
        selectedComm.status = "";
      }
    },
  },
  mounted() {
    axios
      .get("ReceiveCommunication/listCA")
      .then((response) => {
        this.comms = response.data.list;

        if (Array.isArray(response.data.list)) {
          this.comms = response.data.list.filter((comm) => {
          return (
            comm.status !== "Closed" && comm.status !== "Cancelled"
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

    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
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

    ActionAPI().then((actionOptions) => {
      this.actionOptions = actionOptions;
    });

    RestrictAPI().then((restrictOptions) => {
      this.restrictOptions = restrictOptions;
    });

    StatusAPI().then((statusOptions) => {
      this.statusOptions = statusOptions;
    });
  },
  async created() {
    this.fetchComms();

    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userLastName = response.data.user.surname;
    this.user = this.userFirstName + " " + this.userLastName;
    console.log(this.user);
  },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
