<template>
    <div class="w-full">
        <Chart type="bar" :data="chartData" :options="chartOptions" class="h-[300px]"  />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    return {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
            {
                label: 'RTC-KPVTC',
                backgroundColor: '#6366f1', 
                hoverBackgroundColor: '#4f46e5',
                borderRadius: 6, 
                borderSkipped: false,
                data: [65, 59, 80, 81, 56, 55, 40],
                barPercentage: 0.6, 
                categoryPercentage: 0.5
            },
            {
                label: 'Target',
                backgroundColor: '#e2e8f0', 
                hoverBackgroundColor: '#cbd5e1',
                borderRadius: 6,
                borderSkipped: false,
                data: [75, 75, 75, 75, 75, 75, 75], 
                barPercentage: 0.6,
                categoryPercentage: 0.5
            }
        ]
    };
};

const setChartOptions = () => {
    return {
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                align: 'end',
                labels: {
                    usePointStyle: true, 
                    pointStyle: 'circle',
                    padding: 20,
                    color: '#64748b',
                    font: { size: 12, weight: '600' }
                }
            },
            tooltip: {
                backgroundColor: '#1e293b',
                padding: 12,
                bodyFont: { size: 14 },
                cornerRadius: 8
            }
        },
        scales: {
            x: {
                ticks: {
                    color: '#94a3b8', 
                    font: { size: 11, weight: '500' }
                },
                grid: {
                    display: false, 
                    drawBorder: false
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#94a3b8',
                    font: { size: 11 },
                    maxTicksLimit: 5
                },
                grid: {
                    color: '#f1f5f9',
                    drawBorder: false
                }
            }
        }
    };
}
</script>

<!-- <template>
    <div class="justify-center">
        <Chart type="bar" :data="chartData" :options="chartOptions" class="w-full h-[20rem]"  />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'My First dataset',
                backgroundColor: documentStyle.getPropertyValue('--p-cyan-500'),
                borderColor: documentStyle.getPropertyValue('--p-cyan-500'),
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: 'My Second dataset',
                backgroundColor: documentStyle.getPropertyValue('--p-gray-500'),
                borderColor: documentStyle.getPropertyValue('--p-gray-500'),
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--p-text-muted-color');
    const surfaceBorder = documentStyle.getPropertyValue('--p-content-border-color');

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.8,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary,
                    font: {
                        weight: 500
                    }
                },
                grid: {
                    display: false,
                    drawBorder: false
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder,
                    drawBorder: false
                }
            }
        }
    };
}
</script> -->
