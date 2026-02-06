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
import { ref, onMounted, watch } from "vue";

const props = defineProps({
  chartDataInput: {
    type: Object,
    required: true
  }
});

const chartData = ref();
const chartOptions = ref(null);

const setChartData = (data) => {
  return {
    labels: ["Enrolled", "Graduated", "Assessed", "Certified"],
    datasets: [
      {
        // Use the values directly from the prop
        data: [data.enrolled, data.graduated, data.assessed, data.certified],
        backgroundColor: ["#6366f1", "#14b8a6", "#f59e0b", "#94a3b8"],
        hoverBackgroundColor: ["#4f46e5", "#0d9488", "#d97706", "#64748b"],
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
          font: { family: "Inter, sans-serif", size: 12, weight: "600" },
        },
      },
    },
  };
};

watch(() => props.chartDataInput, (newData) => {
  chartData.value = setChartData(newData);
}, { deep: true });

onMounted(() => {
  chartData.value = setChartData(props.chartDataInput);
  chartOptions.value = setChartOptions();
});
</script>