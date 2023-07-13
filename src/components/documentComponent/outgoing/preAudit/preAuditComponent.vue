<script setup></script>
<template>
  <div class="container mt-4">
    <div
      class="flex items-center justify-center relative h-42 max-w-1184 p-2 gap-12"
    >
      <!-- transmittal no. -->
      <div class="flex items-center relative h-34 w-full">
        <div class="text-xs">Transmittal <br />No.</div>
        <div
          class="border border-gray-400 rounded-md w-full h-32 ml-5 flex justify-end"
        >
          <div class="ml-3 p-2">
            <svg
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
          </div>
        </div>
      </div>
      <!-- transaction no. -->
      <div class="flex items-center relative h-34 w-full">
        <div class="text-xs">Transaction <br />No.</div>
        <div
          class="border border-gray-400 rounded-md w-full h-32 ml-5 flex justify-end"
        >
          <div class="ml-3 p-2">
            <svg
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
          </div>
        </div>
      </div>
      <!-- department -->
      <div class="flex items-center relative h-34 w-full">
        <div class="text-xs">Department <br />No.</div>
        <div
          class="border border-gray-400 rounded-md w-full h-32 ml-5 flex justify-end"
        >
          <div class="ml-3 p-3">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="10"
              height="5"
              viewBox="0 0 10 5"
              fill="none"
            >
              <path d="M0 0L5 5L10 0H0Z" fill="#3A3541" fill-opacity="0.54" />
            </svg>
          </div>
        </div>
      </div>

      <!-- button -->

      <button class="bg-blue-400 p-4 rounded-lg">Search</button>
    </div>

    <div class="mt-5 mx-4">
      <p class="capitalize text-other-black text-2xl font-bold mb-4">
        Outgoing Receipt
      </p>
    </div>
    <!-- table head -->

    <div class="relative overflow-x-auto p-2">
      <table class="w-full text-sm text-center">
        <thead class="text-xs uppercase">
          <tr>
            <th scope="col" class="px-6 py-3">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
              >
                <path
                  d="M13.8333 2.16667V13.8333H2.16667V2.16667H13.8333ZM13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5Z"
                  fill="#3A3541"
                  fill-opacity="0.6"
                />
              </svg>
            </th>
            <th scope="col" class="px-6 py-3">date</th>
            <th scope="col" class="px-6 py-3">transmittal no</th>
            <th scope="col" class="px-6 py-3">transaction no</th>
            <th scope="col" class="px-6 py-3">name of payee</th>

            <th scope="col" class="px-6 py-3">particulars</th>
            <th scope="col" class="px-6 py-3">amount</th>
            <th scope="col" class="px-6 py-3">sender</th>
            <th scope="col" class="px-6 py-3">receiver</th>
            <th scope="col" class="px-6 py-3">date/time</th>
          </tr>
        </thead>
        <!-- table body -->
        <tbody>
          <!-- generated cells -->
          <tr class="bg-white">
            <td class="px-6 py-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
              >
                <path
                  d="M13.8333 2.16667V13.8333H2.16667V2.16667H13.8333ZM13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5Z"
                  fill="#3A3541"
                  fill-opacity="0.6"
                />
              </svg>
            </td>
            <!-- generated cells -->
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                04/24/2023
              </div>
            </td>

            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                12221
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                342312
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                6775
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                none
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                50,000
              </div>
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
          </tr>
          <!-- generated cells -->
          <tr class="bg-white">
            <td class="px-6 py-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
              >
                <path
                  d="M13.8333 2.16667V13.8333H2.16667V2.16667H13.8333ZM13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5Z"
                  fill="#3A3541"
                  fill-opacity="0.6"
                />
              </svg>
            </td>

            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                04/24/2023
              </div>
            </td>

            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                12221
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                342312
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                6775
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                none
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                50,000
              </div>
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
          </tr>
          <!-- generated cells -->
          <tr class="bg-white">
            <td class="px-6 py-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
              >
                <path
                  d="M13.8333 2.16667V13.8333H2.16667V2.16667H13.8333ZM13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5Z"
                  fill="#3A3541"
                  fill-opacity="0.6"
                />
              </svg>
            </td>

            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                04/24/2023
              </div>
            </td>

            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                12221
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                342312
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                6775
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                none
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                50,000
              </div>
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
          </tr>
          <!-- generated cells -->
          <tr class="bg-white">
            <td class="px-6 py-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
              >
                <path
                  d="M13.8333 2.16667V13.8333H2.16667V2.16667H13.8333ZM13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5Z"
                  fill="#3A3541"
                  fill-opacity="0.6"
                />
              </svg>
            </td>

            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                04/24/2023
              </div>
            </td>

            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                12221
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                342312
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                6775
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                none
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                50,000
              </div>
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
          </tr>
          <!-- generated cells -->
          <tr class="bg-white">
            <td class="px-6 py-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
              >
                <path
                  d="M13.8333 2.16667V13.8333H2.16667V2.16667H13.8333ZM13.8333 0.5H2.16667C1.25 0.5 0.5 1.25 0.5 2.16667V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V2.16667C15.5 1.25 14.75 0.5 13.8333 0.5Z"
                  fill="#3A3541"
                  fill-opacity="0.6"
                />
              </svg>
            </td>

            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                04/24/2023
              </div>
            </td>

            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                12221
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                342312
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                6775
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                none
              </div>
            </td>
            <td class="px-3 py-4">
              <div
                class="px-2 py-4 text-sm text-gray-800 whitespace-nowrap text-center"
              >
                50,000
              </div>
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
            <td class="px-3 py-4">
              <input class="w-full rounded-lg" type="text" />
            </td>
          </tr>
        </tbody>
      </table>
      <div class="flex flex-row justify-end m-3">
        <div class="px-1">Rows per page:</div>
        <div class="px-1">7</div>
        <div class="px-1 mt-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="10"
            height="5"
            viewBox="0 0 10 5"
            fill="none"
          >
            <path d="M0 0L5 5L10 0H0Z" fill="#3A3541" fill-opacity="0.54" />
          </svg>
        </div>
        <div class="px-4">1-10-13</div>
        <div class="px-4 mt-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="8"
            height="12"
            viewBox="0 0 8 12"
            fill="none"
          >
            <path
              d="M7.41 1.41L6 0L0 6L6 12L7.41 10.59L2.83 6L7.41 1.41Z"
              fill="#3A3541"
              fill-opacity="0.54"
            />
          </svg>
        </div>
        <div class="px-4 mt-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="8"
            height="12"
            viewBox="0 0 8 12"
            fill="none"
          >
            <path
              d="M1.99984 0L0.589844 1.41L5.16984 6L0.589844 10.59L1.99984 12L7.99984 6L1.99984 0Z"
              fill="#3A3541"
              fill-opacity="0.87"
            />
          </svg>
        </div>

        <div class="flex justify-end gap-4">
          <button
            class="w-108 h-42 text-sm font-medium text-white uppercase bg-danger-color rounded"
          >
            close
          </button>
          <button
            class="w-108 h-42 text-sm font-medium text-white uppercase bg-button-blue rounded"
          >
            save
          </button>
          <button
            class="w-108 h-42 text-sm font-medium text-white uppercase bg-green-500 rounded"
          >
            view
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped></style>
