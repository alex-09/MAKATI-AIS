<template>
  <div class="flex justify-center my-5">
    <div class="border flex items-center justify-center gap-x-10 py-4 px-6">
      <div class="sm:w-222 sm:h-222">
        <canvas id="donutchart"></canvas>
      </div>
      <div class="flex gap-x-3">
        <div class="flex items-center gap-x-1">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#33551E" />
          </svg>
          <p class="font-normal text-xs">Utilized</p>
        </div>
        <div class="flex items-center gap-x-1">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="16" height="16" rx="3" fill="#ff4c51" />
          </svg>
          <p class="font-normal text-xs">Unutilized</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Chart from "chart.js/auto";
import axios from "axios";
export default {
  data() {
    return {
      dataName: ["Utilized", "Unutilized"],
      dataValue: [39, 61],
      color: ["#33551e", "#ff4c51"],
    };
  },
  async mounted() {
    await axios.get("").then((res) => {
      this.dataName = res.data.dataName;
      this.dataValue = res.data.dataValue;
    });
    const xValues = this.dataName;
    const yValues = this.dataValue;
    const barColors = this.color;
    const ctx = document.getElementById("donutchart");
    new Chart(ctx, {
      type: "doughnut",
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
