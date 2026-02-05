<template>
  <div class="p-4 shadow-lg rounded w-[20rem] h-[20rem]">
    <Chart
      type="doughnut"
      :data="chartData"
      :options="chartOptions"
      class="w-full h-full"
    ></Chart>
  </div>
  <div class="p-4 shadow-lg rounded w-[20rem] h-[20rem]">
    <Chart
      type="bar"
      :data="chartDataBar"
      :options="chartOptions"
      class="h-full"
    />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const chartData = ref();
const chartDataBar = ref();
const chartOptions = ref(null);

onMounted(() => {
  chartData.value = setChartData();
  chartDataBar.value = setChartDataBar();
  chartOptions.value = setChartOptions();
});

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
const setChartDataBar = () =>  {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                type: 'bar',
                label: 'Dataset 1',
                backgroundColor: documentStyle.getPropertyValue('--p-cyan-500'),
                data: [50, 25, 12, 48, 90, 76, 42]
            },
            {
                type: 'bar',
                label: 'Dataset 2',
                backgroundColor: documentStyle.getPropertyValue('--p-gray-500'),
                data: [21, 84, 24, 75, 37, 65, 34]
            },
            {
                type: 'bar',
                label: 'Dataset 3',
                backgroundColor: documentStyle.getPropertyValue('--p-orange-500'),
                data: [41, 52, 24, 74, 23, 21, 32]
            }
        ]
    };
};

const setChartOptions = () => {
  const documentStyle = getComputedStyle(document.documentElement);
  const textColor = documentStyle.getPropertyValue("--p-text-color");
  const textColorSecondary = documentStyle.getPropertyValue(
    "--p-text-muted-color"
  );
  const surfaceBorder = documentStyle.getPropertyValue(
    "--p-content-border-color"
  );

  return {
    plugins: {
      legend: {
        labels: {
          cutout: "60%",
          color: textColor,
        },
      },
    },
    maintainAspectRatio: false,
    aspectRatio: 0.8,
    plugins: {
      tooltips: {
        mode: "index",
        intersect: false,
      },
      legend: {
        labels: {
          color: textColor,
        },
      },
    },
    scales: {
      x: {
        stacked: true,
        ticks: {
          color: textColorSecondary,
        },
        grid: {
          color: surfaceBorder,
        },
      },
      y: {
        stacked: true,
        ticks: {
          color: textColorSecondary,
        },
        grid: {
          color: surfaceBorder,
        },
      },
    },
  };
};
</script>

<style lang="scss" scoped>
</style>