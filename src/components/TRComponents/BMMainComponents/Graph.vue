<template>
  <div class="w-full gap-x-4 flex items-center justify-center">
    <div
      class="min-w-[222px] max-w-[222px] max-h-[222px] min-h-[222px] justify-center flex"
    >
      <canvas id="donutchart"></canvas>
    </div>
    <div class="flex gap-y-3 flex-col max-w-[240px]">
      <div class="flex items-center gap-x-1">
        <div>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#0D99FF" />
          </svg>
        </div>
        <p class="font-normal text-xs">A. Donation from Private Sector</p>
      </div>
      <div class="flex items-center gap-x-1">
        <div>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#FFA629" />
          </svg>
        </div>
        <p class="font-normal text-xs">
          B. Transfers from Other Government Agencies
        </p>
      </div>
      <div class="flex items-center gap-x-1">
        <div>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#14AE5C" />
          </svg>
        </div>
        <p class="font-normal text-xs">
          C. Unexpended Balanace of Local Disaster Risk Reduction and Management
          Fund
        </p>
      </div>
      <div class="flex items-center gap-x-1">
        <div>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#FF4C51" />
          </svg>
        </div>
        <p class="font-normal text-xs">
          D. LGU Counterpart Contribution for Specific Projects
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Chart from "chart.js/auto";
export default {
  data() {
    return {
      dataName: ["A", "B", "C", "D"],
      dataValue: [5, 44, 29, 22],
      color: ["#0D99FF", "#FFA629", "#14AE5C", "#FF4C51"],
    };
  },
  async created() {
    await axios.get("/").then((res) => {
      this.dataValue = res.data.dataValue;
      this.dataName = res.data.dataName;
    });
  },
  async mounted() {
    // await axios.get("/").then((res) => {
    //   this.dataName = res.data;
    //   this.dataValue = res.data;
    // });
    const xValues = this.dataName;
    const yValues = this.dataValue;
    const barColors = this.color;
    const ctx = document.getElementById("donutchart");
    new Chart(ctx, {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [
          {
            backgroundColor: barColors,
            data: yValues,
          },
        ],
      },
      options: {
        plugins: {
          legend: {
            maxHeight: 21,
            maxWidth: 136,
            display: false,
            position: "right",

            labels: {
              useBorderRadius: true,
              borderRadius: 35,
              boxWidth: 16,
              boxHeight: 16,
            },
          },
        },
      },
    });
  },
};
</script>
