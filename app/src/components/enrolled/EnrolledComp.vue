<template>
  <div class="p-8 bg-[#f8fafc] min-h-screen font-sans">
    <div class="flex justify-between items-center mb-8">
      <div>
        <h1 class="text-2xl font-black text-slate-800 tracking-tight">EGAC Performance</h1>
        <p class="text-slate-500 text-sm">Monitoring RTC-KPVTC Data</p>
      </div>
      
      <div class="flex flex-col gap-1">
        <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Reporting Year</label>
        <Select 
          v-model="selectedYear" 
          :options="years" 
          placeholder="Select Year" 
          class="w-40 shadow-sm border-slate-200"
        />
      </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div v-for="(val, key) in rtc" :key="key" 
           class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm transition-all hover:shadow-md">
        
        <div class="flex justify-between items-start mb-4">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">{{ key }}</span>
          <div :class="getComplianceColor(key)" class="p-2 rounded-lg bg-opacity-10">
            <i :class="getIcon(key)" class="text-sm"></i>
          </div>
        </div>

        <div class="flex items-baseline gap-2">
          <span class="text-3xl font-black text-slate-900">{{ val.toLocaleString() }}</span>
          <span class="text-slate-400 font-bold text-sm">/ {{ targets[key].toLocaleString() }}</span>
        </div>
        
        <div class="mt-4">
          <div class="flex justify-between text-[10px] font-bold mb-1">
            <span class="text-slate-400">PROGRESS</span>
            <span :class="getComplianceTextColor(key)">{{ calculatePercent(val, targets[key]) }}%</span>
          </div>
          <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
            <div 
              class="h-full rounded-full transition-all duration-1000"
              :class="getBarColor(key)"
              :style="{ width: calculatePercent(val, targets[key]) + '%' }"
            ></div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-sm font-bold text-slate-700 uppercase">Target Achievement</h3>
          <span class="text-[10px] bg-slate-100 px-2 py-1 rounded text-slate-500 font-bold">BY METRIC</span>
        </div>
        <div class="h-[300px]">
          <bar-chart :year="selectedYear" :data-values="Object.values(rtc)" :target-values="Object.values(targets)" />
        </div>
      </div>
      
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h3 class="text-sm font-bold text-slate-700 mb-6 uppercase">Efficiency Compliance</h3>
        <div class="h-[300px]">
           <!-- <dough-chart :compliance="[121.67, 0.22, 0]" /> -->
            <dough-chart :chart-data-input="rtc" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue';

const rtc = reactive({
  enrolled: 634,
  graduated: 579,
  assessed: 1,
  certified: 0
});

const targets = reactive({
  enrolled: 6946,
  graduated: 6251,
  assessed: 5001,
  certified: 4651
});
</script>