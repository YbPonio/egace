<template>
  <div
    class="flex w-full flex-col gap-6 p-6 bg-[#f8fafc] min-h-screen rounded-xl"
  >
    <div class="flex flex-row gap-6 w-full items-start">
      <div
        class="flex flex-col bg-white shadow-[0_1px_3px_0_rgba(0,0,0,0.1),0_1px_2px_0_rgba(0,0,0,0.06)] border border-slate-200 rounded-xl p-5 w-72"
      >
        <div class="flex items-center justify-between mb-4">
          <span
            class="text-xs font-bold text-slate-500 uppercase tracking-widest"
            >Current Data</span
          >
          <div class="p-2 bg-indigo-50 rounded-lg">
            <i class="pi pi-database text-indigo-600 text-sm"></i>
          </div>
        </div>
        <div class="text-xs text-slate-400 font-medium mb-1">RTC-KPVTC</div>
        <div class="text-3xl font-extrabold text-slate-900 tracking-tight">
          {{ RtcData.toLocaleString() }}
        </div>
      </div>

      <div
        class="flex flex-col bg-white shadow-[0_1px_3px_0_rgba(0,0,0,0.1),0_1px_2px_0_rgba(0,0,0,0.06)] border border-slate-200 rounded-xl p-5 w-72"
      >
        <div class="flex items-center justify-between mb-4">
          <span
            class="text-xs font-bold text-slate-500 uppercase tracking-widest"
            >Targeting</span
          >
          <div class="p-2 bg-emerald-50 rounded-lg">
            <i class="pi pi-compass text-emerald-600 text-sm"></i>
          </div>
        </div>
        <div class="text-xs text-slate-400 font-medium mb-1">ANNUAL GOAL</div>
        <div class="text-3xl font-extrabold text-slate-900 tracking-tight">
          {{ target.toLocaleString() }}
        </div>
        <div class="mt-4 flex items-center gap-2">
          <div class="flex-1 bg-slate-100 h-2 rounded-full overflow-hidden">
            <div
              class="bg-emerald-500 h-full rounded-full transition-all duration-1000"
              :style="{ width: (RtcData / target) * 100 + '%' }"
            ></div>
          </div>
          <span class="text-[10px] font-bold text-slate-500"
            >{{ Math.round((RtcData / target) * 100) }}%</span
          >
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full">
      <div class="bg-white shadow-sm border border-slate-200 rounded-xl p-6">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wide">
            Data Distribution
          </h3>
          <i class="pi pi-ellipsis-h text-slate-400 cursor-pointer"></i>
        </div>
        <div class="flex justify-center h-[300px]">
          <dough-chart />
        </div>
      </div>

      <div class="bg-white shadow-sm border border-slate-200 rounded-xl p-6">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wide">
            Performance Overview
          </h3>
          <i class="pi pi-chart-bar text-slate-400"></i>
        </div>
        <div class="h-[300px]">
          <bar-chart />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
const target = ref(6946);
const RtcData = ref(634);
</script>

<!-- <template>
  <div class="flex w-full flex-col gap-4">
    <div class="flex flex-row gap-4 w-auto h-fit rounded-lg  items-center">
      <div class="flex flex-col items-center shadow border border-gray-300 rounded w-sm p-4">
        <div class="text-base font-semibold p-2">RTC-KPVTC DATA</div>
        <div class="text-lg font-bold">{{ RtcData }}</div>
      </div>
      <div class="flex flex-col items-center shadow border border-gray-300 rounded w-sm p-4">
        <div class="text-base font-semibold p-2">ANNUAL TARGET</div>
        <div class="text-lg font-bold">{{ target }}</div>
      </div>
    </div>

    <div class="flex gap-4 w-full flex-row">
      <div
        class="w-full shadow border border-gray-300 rounded justify-center items-center p-4"
      >
        <dough-chart />
      </div>

      <div
        class="w-full shadow border border-gray-300 rounded justify-center items-center p-4"
      >
        <bar-chart />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

let target = ref(6946);
let RtcData = ref(634);
</script>

<style lang="scss" scoped></style> -->
