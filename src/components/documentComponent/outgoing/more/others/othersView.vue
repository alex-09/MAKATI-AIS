<script setup></script>
<template>
  <div class="w-full h-full">
    <p class="capitalize text-other-black text-2xl font-bold mt-10 ml-10">
      Others
    </p>

    <div class="flex justify-center px-10 py-5">
      <div
        class="border-8 border-blue-400 w-full p-10 rounded-lg flex flex-row justify-evenly"
      >
        <div>
          <div class="px-5 py-5">Type of Document</div>
          <div class="px-5 py-5"></div>
          <div class="px-5 py-5"></div>
          <div class="px-5 py-5">Particulars</div>
          <div class="px-5 py-5">Deparment/Office/Agency</div>
        </div>

        <div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
        </div>

        <div>
          <div class="px-5 py-5">Document Number</div>
          <div class="px-5 py-5"></div>
          <div class="px-5 py-5"></div>
          <div class="px-5 py-5">Date</div>
        </div>

        <div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
          <div class="py-3">
            <input class="w-full rounded-lg" type="text" />
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-end gap-4 px-10">
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
</template>
<style scoped></style>
