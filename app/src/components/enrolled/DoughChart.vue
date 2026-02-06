<template>
  <div class="w-full flex justify-center">
    <Chart
      type="doughnut"
      :data="chartData"
      :options="chartOptions"
      class="w-full max-w-[280px] h-[280px]"
    />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

onMounted(() => {
  chartData.value = setChartData();
  chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref(null);

const setChartData = () => {
  return {
    labels: ["Enrolled", "Graduated", "Assessed"],
    datasets: [
      {
        data: [540, 325, 702],
        backgroundColor: ["#6366f1", "#14b8a6", "#f43f5e"],
        hoverBackgroundColor: ["#4f46e5", "#0d9488", "#e11d48"],
        borderWidth: 2,
        borderColor: "#ffffff",
        hoverOffset: 10,
      },
    ],
  };
};

const setChartOptions = () => {
  return {
    maintainAspectRatio: false,
    cutout: "75%",
    plugins: {
      legend: {
        position: "bottom",
        labels: {
          usePointStyle: true,
          pointStyle: "circle",
          padding: 20,
          color: "#64748b",
          font: {
            family: "Inter, sans-serif",
            size: 12,
            weight: "600",
          },
        },
      },
      tooltip: {
        backgroundColor: "#1e293b",
        padding: 12,
        cornerRadius: 8,
        usePointStyle: true,
      },
    },
    animation: {
      animateRotate: true,
      animateScale: true,
    },
  };
};
</script>

<!-- <template>
  <div class="card flex justify-center">
    <Chart
      type="doughnut"
      :data="chartData"
      :options="chartOptions"
      class="w-full md:w-[20rem]"
    />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

onMounted(() => {
  chartData.value = setChartData();
  chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref(null);

const setChartData = () => {
  const documentStyle = getComputedStyle(document.body);

  return {
    labels: ["A", "B", "C"],
    datasets: [
      {
        data: [540, 325, 702],
        backgroundColor: [
          documentStyle.getPropertyValue("--p-cyan-500"),
          documentStyle.getPropertyValue("--p-orange-500"),
          documentStyle.getPropertyValue("--p-gray-500"),
        ],
        hoverBackgroundColor: [
          documentStyle.getPropertyValue("--p-cyan-400"),
          documentStyle.getPropertyValue("--p-orange-400"),
          documentStyle.getPropertyValue("--p-gray-400"),
        ],
      },
    ],
  };
};

const setChartOptions = () => {
  const documentStyle = getComputedStyle(document.documentElement);
  const textColor = documentStyle.getPropertyValue("--p-text-color");

  return {
    plugins: {
      legend: {
        labels: {
          cutout: "60%",
          color: textColor,
        },
      },
    },
  };
};
</script> -->
