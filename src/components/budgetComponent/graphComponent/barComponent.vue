<template>
  <div class="flex border flex-col px-3 py-3">
    <div class="flex gap-x-3">
      <button @click="backyear">
        <svg
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <rect
            x="32"
            y="32"
            width="32"
            height="32"
            rx="16"
            transform="rotate(-180 32 32)"
            fill="#1890FF"
          />
          <path
            d="M18.6669 24L20.5469 22.12L14.4402 16L20.5469 9.88L18.6669 8L10.6669 16L18.6669 24Z"
            fill="#3A3541"
          />
        </svg>
      </button>
      <input
        type="number"
        class="text-base font-semibold text-secondary-color border-none w-[100px]"
        v-for="yr in year"
        v-model="yr.yr"
      />
      <button @click="nextyear">
        <svg
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <rect width="32" height="32" rx="16" fill="#1890FF" />
          <path
            d="M13.3331 8L11.4531 9.88L17.5598 16L11.4531 22.12L13.3331 24L21.3331 16L13.3331 8Z"
            fill="#3A3541"
          />
        </svg>
      </button>
    </div>

    <div class="flex justify-center flex-col items-center">
      <p class="font-semibold text-xs p-3">{{ graphTitle }}</p>
      <div class="flex gap-x-3">
        <div class="flex items-center gap-x-1">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#ffa529" />
          </svg>
          <p class="font-normal text-xs">Appropriation</p>
        </div>
        <div class="flex items-center gap-x-1">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#0d99ff" />
          </svg>
          <p class="font-normal text-xs">Allotment</p>
        </div>
        <div class="flex items-center gap-x-1">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#14ae5c" />
          </svg>
          <p class="font-normal text-xs">Obligation</p>
        </div>
      </div>
    </div>
    <div class="flex justify-center">
      <div>
        <canvas :id="barID" style="width: 437px; height: 191px"></canvas>
      </div>
    </div>
    <p class="flex justify-center font-semibold text-sm text-other-black">
      MONTH
    </p>
  </div>
</template>
<script>
import Chart from "chart.js/auto";
import axios from "axios";
export default {
  data() {
    return {
      year: [
        {
          yr: new Date().getFullYear(),
        },
      ],
    };
  },
  async mounted() {
    // await axios.get("").then((res) => {
    //   this.dataLabel = res.data.value;
    //   this.dataAppropriation = res.data.dataAppropriation;
    //   this.dataAllotments = res.data.dataAllotments;
    //   this.dataObligations = res.data.dataObligations;
    // });
    const ctx = document.getElementById(this.barID);

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: this.dataValue.map((x) => x.month),
        datasets: [
          {
            backgroundColor: "#ffa629",
            data: this.dataValue.map((x) => x.approData),
          },
          {
            backgroundColor: "#0d99ff",
            data: this.dataValue.map((x) => x.allotData),
          },
          {
            backgroundColor: "#14ae5c",
            data: this.dataValue.map((x) => x.obligData),
          },
        ],
      },
      options: {
        plugins: {
          legend: {
            display: false,
          },
        },
        scales: {
          y: {
            ticks: {
              stepSize: 25,
            },
          },
        },
      },
    });
  },
  props: {
    barID: String,
    graphTitle: String,
    dataValue: Array,
  },
  methods: {
    backyear() {
      this.year.forEach((yr) => {
        yr.yr--;
      });
      this.$emit("data-updated", this.year);
    },
    nextyear() {
      this.year.forEach((yr) => {
        yr.yr++;
      });
      this.$emit("data-updated", this.year);
    },
    created() {},
  },
};
</script>
<style>
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button,
input[type="number"] {
  -webkit-appearance: none;
  margin: 0;
}
</style>
