<template>
  <div class="container mt-8" v-if="showPrint">
    <div
      class="flex items-center justify-center relative h-42 max-w-1184 p-2 gap-12"
    >
      <!-- transmittal no. -->
      <div class="flex items-center relative h-34 w-full">
        <div class="text-xs">Transmittal No.</div>
        <label class="relative ml-8">
          <input
            type="text"
            v-model="searchTransmittal"
            placeholder="Search"
            class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          />

          <svg
            class="pointer-events-none absolute top-1/2 transform -translate-y-1/2 right-3"
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="18"
            viewBox="0 0 18 18"
            fill="none"
          >
            <path
              d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z"
              fill="#3A3541"
              fill-opacity="0.54"
            />
          </svg>
        </label>
      </div>
      <!-- transaction no. -->
      <div class="flex items-center relative h-34 w-full">
        <div class="text-xs">Transaction No.</div>
        <label class="relative ml-8">
          <input
            type="text"
            v-model="searchTransact"
            placeholder="Search"
            class="w-308 h-144 border rounded px-2 pl-3 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          />
          <svg
            class="pointer-events-none absolute top-1/2 transform -translate-y-1/2 right-3"
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="18"
            viewBox="0 0 18 18"
            fill="none"
          >
            <path
              d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z"
              fill="#3A3541"
              fill-opacity="0.54"
            />
          </svg>
        </label>
      </div>
      <!-- department -->
      <div class="flex items-center relative h-34 w-full">
        <div class="text-xs">Department</div>
        <select
          class="w-308 h-144 border rounded px-2 pl-3 ml-8 focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          v-model="selectedDepartment"
        >
          <option value="" disabled selected>Select a Department/Office</option>
          <option
            v-for="deptOption in deptOptions"
            :key="deptOption.department_code"
            :value="deptOption.department_name"
          >
            {{ deptOption.department_name }}
          </option>
        </select>
      </div>

      <!-- button -->

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

    <div class="mt-16 mx-4">
      <p class="capitalize text-other-black text-2xl font-bold mb-4">
        Outgoing Receipt
      </p>
    </div>
    <!-- table head -->
    <div
      class="relative overflow-x-auto overscroll-x-contain w-1850 1536:w-1458 1536:h-[360px] xxxxl:w-1850 max-h-[500px] xxxxl:h-[550px]"
    >
      <table class="text-sm text-center w-[3300px] divide-y divide-gray-200">
        <thead class="bg-gray-200 sticky top-0">
          <tr>
            <th class="sticky top-0">
              <input
                id="checkbox-selectall"
                type="checkbox"
                class="text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                :checked="selectAll"
                @change="toggleSelectAll"
              />
              <label for="checkbox-selectall" class="sr-only">checkbox</label>
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[200px] sticky top-0"
            >
              date
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[280px] sticky top-0"
            >
              transmittal no
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[280px] sticky top-0"
            >
              transaction no
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[280px] sticky top-0"
            >
              Memo/letter no.
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px] sticky top-0"
            >
              Department/Agency
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px] sticky top-0"
            >
              Addressee
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[250px] sticky top-0"
            >
              type of communcation
            </th>
            <!-- <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
            >
              receiver
            </th> -->
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px] sticky top-0"
            >
              subject
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[800px] sticky top-0"
            >
              particulars
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px] sticky top-0"
            >
              creator
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px] sticky top-0"
            >
              sender
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px] sticky top-0"
            >
              received by
            </th>
            <th
              scope="col"
              class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[200px] sticky top-0"
            >
              date/time
            </th>
            <th class="sticky top-0">

            </th>
          </tr>
        </thead>
        <!-- table body -->
        <tbody class="divide-y divide-gray-200">
          <tr v-if="filteredList.length === 0">
            <td
              colspan="14"
              class="px-6 py-4 text-sm font-medium text-gray-800 text-center uppercase"
            >
              communication not found
            </td>
          </tr>
          <!-- generated cells -->
          <tr v-for="comm in filteredList" :key="comm.transaction_id_num">
            <td
              class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap text-left capitalize"
            >
              <div class="flex items-center">
                <input
                  type="checkbox"
                  :id="comm.og_memo_no"
                  :checked="selectedItems.includes(comm)"
                  @change="
                    toggleItemSelection(comm);
                    ogTransmitalNoSelected(comm.og_transmital_no);
                  "
                />

                <label for="checkbox" class="sr-only">checkbox</label>
              </div>
            </td>
            <!-- generated cells -->
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                {{ comm.date }}
              </div>
            </td>

            <td class="px-3 py-4">
              <span v-if="comm.og_transmital_no === null"></span>
              <span
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                v-else
              >
                {{ comm.og_transmital_no }}
              </span>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span
                  class="text-center"
                  v-if="comm.transaction_id_num === null"
                  >N/A</span
                >
                {{ comm.transaction_id_num }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.og_memo_no === null"
                  >N/A</span
                >
                {{ comm.og_memo_no }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.department === null"
                  >N/A</span
                >
                {{ comm.department }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.addressee === null"
                  >N/A</span
                >
                {{ comm.addressee }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span
                  class="text-center"
                  v-if="comm.receive_comm_type_id === null"
                  >N/A</span
                >
                {{ comm.receive_comm_type_id }}
              </div>
            </td>
            <!-- <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.receiver === null"
                  >N/A</span
                >
                {{ comm.receiver }}
              </div>
            </td> -->
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.subject === null"
                  >N/A</span
                >
                {{ comm.subject }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.particulars === null"
                  >N/A</span
                >
                {{ comm.particulars }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.creator === null"
                  >N/A</span
                >
                {{ comm.creator }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.og_sender === null"
                  >N/A</span
                >
                {{ comm.og_sender }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.og_received_by === null"
                  >N/A</span
                >
                {{ comm.og_received_by }}
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                <span class="text-center" v-if="comm.og_date === null"
                  >N/A</span
                >
                {{ comm.og_date }}
              </div>
            </td>
            <td class="px-3 py-4 text-[20px]">
              <button type="button" @click="initView(comm)" :uploadFile="comm">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 576 512"
                >
                  <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <path
                    d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"
                  />
                </svg>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="flex flex-row my-4 gap-[56px] xxxxl:gap-[48px] justify-end">
      <div class="flex flex-row justify-center items-center gap-8">
        <span class="text-[12px] text-[#3A3541] uppercase font-semibold"
          >sender:</span
        >
        <input
          class="h-42 w-[280px] xxxxl:w-[380px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          type="text"
          v-model="sender"
        />
      </div>
      <div class="flex flex-row justify-center items-center gap-8">
        <span class="text-[12px] text-[#3A3541] uppercase font-semibold"
          >receiver:</span
        >
        <input
          class="h-42 w-[280px] xxxxl:w-[380px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          type="text"
          v-model="receiver"
        />
      </div>
      <div class="flex flex-row justify-center items-center gap-8">
        <span class="text-[12px] text-[#3A3541] uppercase font-semibold"
          >date and time:</span
        >
        <input
          class="h-42 w-[280px] xxxxl:w-[380px] border rounded focus:outline-none focus-visible:ring-white focus:border-input-color border-input-color text-sm text-gray-500"
          type="datetime-local"
          v-model="dateTime"
        />
      </div>
      <div class="flex flex-row justify-center items-center">
        <button
          class="w-[136px] h-[42px] xxxxl:w-[250px] bg-primary-color uppercase text-white rounded-[5px] text-[13px] font-medium"
          @click="applyToAll"
        >
          apply to all
        </button>
      </div>
    </div>
    <div class="flex flex-row justify-end m-3">
      <div class="flex justify-end gap-4">
        <!-- <RouterLink
          :to="{ name: 'Document Outgoing Communications' }"
          class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded flex justify-center items-center"
        >
          close
        </RouterLink> -->
        <button
          class="w-108 h-42 text-sm font-medium text-white uppercase bg-save-color rounded"
          :disabled="selectedItems.length === 0"
          @click="getTransmittal"
        >
          save
        </button>
        <button
          @click="showPrint = false"
          :disabled="selectedItems.length === 0"
          class="uppercase font-medium text-sm w-100 h-42 bg-button-blue text-white rounded"
        >
          view
        </button>
      </div>
    </div>
  </div>
  <!-- view data -->
  <div v-if="!showPrint | (showPrint === false)">
    <div class="mt-14 mb-8 mx-4 flex justify-center">
      <p class="capitalize text-other-black text-[22px] font-bold mb-4">
        transmittal list
      </p>
    </div>
    <div class="container grid justify-items-center p-0 mt-4">
      <div
        class="relative overflow-x-auto overscroll-x-contain w-1850 1536:w-1458 1536:h-[400px] xxxxl:w-1850 max-h-[500px] xxxxl:h-[550px]"
      >
        <table class="text-sm text-center w-[3300px] divide-y divide-gray-200">
          <thead>
            <tr>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[280px]"
              >
                transmittal no
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[280px]"
              >
                transaction no
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[280px]"
              >
                Memo/letter no.
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
              >
                Department/Agency
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
              >
                Addressee
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[250px]"
              >
                type of communcation
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
              >
                receiver
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
              >
                subject
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[800px]"
              >
                particulars
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
              >
                creator
              </th>
              <th
                scope="col"
                class="px-6 py-3 uppercase font-semibold text-[12px] text-[#3A3541] w-[350px]"
              >
                sender
              </th>
            </tr>
          </thead>
          <!-- table body -->
          <tbody class="divide-y divide-gray-200">
            <!-- generated cells -->
            <tr v-for="comm in selectedItems" :key="comm.transaction_id_num">
              <td class="px-3 py-4">
                <span v-if="comm.og_transmital_no === 'null'"> </span>
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                  v-else
                >
                  {{ comm.og_transmital_no }}
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.transaction_id_num }}
                  <span v-if="comm.transaction_id_num === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.og_memo_no }}
                  <span v-if="comm.og_memo_no === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.department }}
                  <span v-if="comm.department === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.addressee }}
                  <span v-if="comm.addressee === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.receive_comm_type_id }}
                  <span v-if="comm.receive_comm_type_id === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.receiver }}
                  <span v-if="comm.receiver === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.subject }}
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.particulars }}
                  <span v-if="comm.particulars === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.creator }}
                  <span v-if="comm.creator === null">N/A</span>
                </div>
              </td>
              <td class="px-3 py-4">
                <div
                  class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
                >
                  {{ comm.og_sender }}
                </div>
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

  <div
    v-if="showUpload"
    class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-30"
    :showUpload="showUpload"
    :uploadFile="{ existData }"
    @toFalse="(i) => (this.showUpload = i)"
  >
    <div class="flex items-center justify-center min-h-screen">
      <div
        class="relative bg-white w-800 h-420 rounded-lg border shadow-xl p-4"
      >
        <div class="mx-4 flex justify-between">
          <h5 class="text-2xl font-semibold uppercase text-secondBtn">
            Upload File For Outgoing
          </h5>
          <button @click="closeModal()">
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
        <div class="mx-4 my-4">
          <span class="hidden">{{ uploadFile.existData.id }}</span>
          <span>Please attach the outgoing document</span>
          <div class="flex flex-row gap-8 items-end mt-4">
            <button
              class="bg-primary-color rounded-md w-[200px] h-42 1536:w-[180px] 1536:h-[42px] flex justify-center items-center text-center uppercase text-white text-sm font-medium hover:bg-primary-color gap-2"
              @click="openFileInput"
            >
              <svg
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M6.6 13.4997V8.69971L5 10.2997"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M6.6001 8.69971L8.2001 10.2997"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M17 7.9V11.9C17 15.9 15.4 17.5 11.4 17.5H6.6C2.6 17.5 1 15.9 1 11.9V7.1C1 3.1 2.6 1.5 6.6 1.5H10.6"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M17.0001 7.9H13.8001C11.4001 7.9 10.6001 7.1 10.6001 4.7V1.5L17.0001 7.9Z"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              File Upload
            </button>
            <div class="flex flex-row gap-[200px]">
              <input
                type="file"
                ref="fileInput"
                style="display: none"
                @change="onFileSelected"
                accept=".pdf"
              />
              <span
                v-if="selectedFileName"
                class="text-primary-color font-normal text-[16px]"
                >{{ selectedFileName }}</span
              >
            </div>
          </div>

          <!-- button -->
          <div class="flex justify-end">
            <button
              class="bg-[#05C46B] rounded-md w-[200px] h-42 1536:w-[180px] 1536:h-[42px] flex justify-center items-center text-center uppercase text-white text-sm font-medium hover:bg-[#64ecad] gap-2"
              @click="uploadFiles()"
            >
              submit
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";

const showPrint = ref(true);
</script>
<script>
import Swal from "sweetalert2";
import logo from "@/assets/images/makati.png";
import axios from "axios";
import DeptAPI from "../../../../../api_request/documentManagement/departmentDrop";
import UploadIcon from "../../../../icons/Document/UploadIcon.vue";

export default {
  components: {
    UploadIcon,
  },
  data() {
    return {
      logo: logo,
      comm: [],
      comms: [],
      isHovered: false,
      searchTransact: "",
      searchTransmittal: "",
      selectedDepartment: "",
      selectedItems: [],

      selectAll: false,
      selectedDept: "",
      deptOptions: [],
      transmittalNO: "COM-",
      sender: "",
      receiver: "",
      dateTime: "",

      searchQuery: "",
      selectedOption: null,

      selected: [],
      isSelected: "",

      // edit now
      selectedIds: [],
      selectedTransmitalNos: [],
      currentTime: "",
      currentDate: "",
      showUpload: false,
      uploadFile: {
        existData: {
          selectedFilename: null,
          selectedFile: null,
        },
      },
    };
  },
  computed: {
    filteredList() {
      return this.comms.filter((comm) => {
        const transactMatch =
          !this.searchTransact ||
          (comm.transaction_id_num &&
            comm.transaction_id_num
              .toLowerCase()
              .includes(this.searchTransact.toLowerCase()));

        const transmittalMatch =
          !this.searchTransmittal ||
          (comm.og_transmital_no &&
            comm.og_transmital_no
              .toLowerCase()
              .includes(this.searchTransmittal.toLowerCase()));

        const departmentMatch =
          !this.selectedDepartment ||
          comm.department === this.selectedDepartment;

        return transactMatch && departmentMatch && transmittalMatch;
      });
    },
  },

  mounted() {
    DeptAPI().then((deptOptions) => {
      this.deptOptions = deptOptions;
    });

    axios
      .get("ReceiveCommunication/listOutgoing")
      .then((response) => {
        this.comms = response.data.list;
      })
      .catch((error) => {
        console.log(error);
      });

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
  },
  methods: {
    closeModal() {
      this.showUpload = false;
    },
    initView(comm) {
      this.uploadFile = { existData: comm };
      this.showUpload = true;
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
    uploadFiles() {
      if (!this.selectedFile) {
        alert("Please select a file to upload");
        return;
      }

      const formData = new FormData();
      formData.append("document", this.selectedFile);
      formData.append("transac_id", this.uploadFile.existData.id);

      axios
        .post("ReceiveCommunication/uploadDocument", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          console.log(response.data);
          Swal.fire({
            text: "Your file has been successfully imported.",
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Your file has been successfully imported.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
          });
          this.refreshTable();
          this.showUpload = false;
          this.selectedFile = null;
        })
        .catch((error) => {
          console.error(error);
          alert("File upload failed");
        });
    },
    resetFilters() {
      // console.log("comm", this.comm)
      this.searchTransact = "";
      this.searchTransmittal = "";

      this.selectedDepartment = null;
    },
    // PRINT RECEIVING ALL
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
          <h1>Transmittal List</h1>
        </div>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 5%; margin-left: auto; margin-right: auto;">
          <thead>


            <tr>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TRANSACTION ID NO.</th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TRANSMITTAL NO.</th> 
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">MEMO/LETTER NO. </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">DEPARTMENT / AGENCY </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">ADDRESSEE </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TYPE OF COMMUNICATION	</th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">RECEIVER </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">SUBJECT </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">PARTICULARS </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">CREATOR </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">SENDER </th>


            </tr>
          </thead>
          <tbody>
            ${selectedItems
              .map((comm) => {
                return `
                  <tr>
                    <td style="border: 1px solid black; text-align: center;">${comm.transaction_id_num}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.og_transmital_no}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.og_memo_no}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.department}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.addressee}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.receive_comm_type_id}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.receiver}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.subject}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.particulars}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.creator}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.og_sender}</td>
                  </tr>
                `;
              })
              .join("")}
          </tbody>
        </table>
        <br></br>
        <br></br>
        <div style="display: flex; justify-content: space-between;">
          <div>Send by:
          <br></br><hr><span>Signature over Printed Name</span>
          </div>
          <div>Received by:
          <br></br><hr><span>Signature over Printed Name</span>
          </div>
        </div>
        <br></br>
        <div style="display: flex; justify-content: end;">
          <div>Date & Time: ___________________
          </div>
        </div>
      </body>
    </html>
  `);
      printWindow.document.close();
      printWindow.onload = function () {
        printWindow.print();
        printWindow.close();
      };
    },

    fetchOutgoing() {
      axios
        .get("ReceiveCommunication/listOutgoing")
        .then((response) => {
          this.comm = response.data.list;
          console.log(this.comm);
          console.log("fetchOutgoing here");
        })
        .catch((error) => {
          console.log(error);
        });
    },

    refreshTable() {
      axios
        .get(`ReceiveCommunication/listOutgoing`)
        .then((response) => {
          this.comms = response.data.list;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    toggleSelectAll() {
      this.selectAll = !this.selectAll;
      if (this.selectAll) {
        this.selectedItems = this.comms;
        this.selectedIds = this.comms.map((comm) => comm.transaction_id_num);
        this.selectedTransmitalNos = this.comms.map(
          (comm) => comm.og_transmital_no
        );
      } else {
        // this.selectedItems = [];
        // this.selectedIds = [];
        // this.selectedTransmitalNos = [];
      }
    },
    toggleItemSelection(comm) {
      if (this.selectedItems.includes(comm)) {
        this.selectedItems = this.selectedItems.filter((item) => item !== comm);
        this.selectedIds = this.selectedIds.filter(
          (id) => id !== comm.transaction_id_num
        );
        this.selectedTransmitalNos = this.selectedTransmitalNos.filter(
          (transmitalNo) => transmitalNo !== comm.og_transmital_no
        );
      } else {
        this.selectedItems.push(comm);
        this.selectedIds.push(comm.id);
        this.selectedTransmitalNos.push(comm.og_transmital_no);
      }
      console.log('comm:', comm);
      console.log('comm.og_transmital_no:', comm.og_transmital_no);
    },
    ogTransmitalNoSelected(transmitalNo) {
      this.selectedTransmitalNos = [transmitalNo];
    },
    getTransmittal() {
      console.log(this.selectedIds);
      if (this.selectedIds.length !== 0) {
        axios
          .post("ReceiveCommunication/transmital", {
            transac_id: this.selectedIds,
          })
          .then((response) => {
            // Handle the response as needed
            console.log(response.data);
            const transmittal = response.data.transmittal;
            const message = response.data.message;

            this.messageRes = message;
            this.transmittalRes = transmittal;

            console.log("here", this.transmittalRes);

            this.refreshTable();
            this.applyToAll(); // Call applyToAll() after getting transmittal
            Swal.fire({
              text: "Your entry has been successfully added. The account has been subject to Approval.",
              html: `<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">${this.messageRes}</span></div></div>`,
              showConfirmButton: true,
              showCancelButton: true,

              confirmButtonText: "Print",
              cancelButtonText: "Ok",
            }).then((result) => {
              if (result.value) {
                const selectedItems = this.selectedItems;
                const printWindow = window.open(".", ".");
                printWindow.document.open();
                printWindow.document.write(`
    <html>
      <head>
        <span style="margin-left: 78%;">Transmittal No.: ${
          this.transmittalRes
        }</span>
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
          top: 6%;
          left: 8%;
        " />


        <div style="margin-top: 10%; text-align: center;">
          <h1>Transmittal List</h1>
        </div>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 5%; margin-left: auto; margin-right: auto;">
          <thead>


            <tr>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TRANSACTION ID NO.</th>

              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">MEMO/LETTER NO. </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">TYPE OF COMMUNICATION	</th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">RECEIVER </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">DEPARTMENT / OFFICE </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">SUBJECT </th>
              <th style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">PARTICULARS </th>


            </tr>
          </thead>
          <tbody>
            ${selectedItems
              .map((comm) => {
                return `
                  <tr>
                    <td style="border: 1px solid black; text-align: center;">${comm.transaction_id_num}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.og_memo_no}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.receive_comm_type_id}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.receiver}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.department}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.subject}</td>
                    <td style="border: 1px solid black; text-align: center;">${comm.particulars}</td>
                  </tr>
                `;
              })
              .join("")}
          </tbody>
        </table>
        <br></br>
        <br></br>
        <div style="display: flex; justify-content: space-between;">
          <div>Send by:
          <br></br><hr><span>Signature over Printed Name</span>
          </div>
          <div>Received by:
          <br></br><hr><span>Signature over Printed Name</span>
          </div>
        </div>
        <br></br>
        <div style="display: flex; justify-content: end;">
          <div>Date: ___________________
          </div>
        </div>
      </body>
    </html>
  `);
                printWindow.document.close();
                printWindow.onload = function () {
                  printWindow.print();
                  printWindow.close();
                };
              }
              this.selectedIds = [];
              this.selectAll = false;
              this.selectedItems = [];
            });
          })
          .catch((error) => {
            // Handle any errors that occur during the request
            console.error(error);
          });
      } else {
        alert("Please select at least one asset to approve.");
        return;
      }
    },
    applyToAll() {
  if (this.selectedIds.length === 0) {
    alert("Please select at least one asset to approve.");
    return;
  }

  const transac = [{
    transmital_no: this.selectedTransmitalNos[0],
    og_sender: this.sender,
    og_received_by: this.receiver,
    og_date: this.dateTime,
    transac_id: this.selectedIds.map((id) => ({ transac_id: id }))
  }];

  const data = { transac };

  axios
    .post("ReceiveCommunication/updateOutgoing", data)
    .then((response) => {
      // Handle the response as needed
      console.log(response);
      this.refreshTable();

      // this.selectedIds = [];
      // this.selectAll = false;
      // this.selectedItems = [];
      this.sender = "";
      this.receiver = "";
      this.dateTime = "";
    })
    .catch((error) => {
      // Handle any errors that occur during the request
      console.error(error);
    });
}

  },
  async created() {
    this.fetchOutgoing();

    const response = await axios.get("me");

    this.userFirstName = response.data.user.firstname;
    this.userLastName = response.data.user.surname;
    this.user = this.userFirstName + " " + this.userLastName;
    this.userdesignation = response.data.user.userdesignation;
    console.log(this.user);
  },
};
</script>
