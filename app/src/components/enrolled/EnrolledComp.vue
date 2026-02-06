<template>
  <div class="p-6 bg-[#f8fafc] min-h-screen">
    <h1 class="text-2xl font-bold text-slate-800 mb-6">EGAC 2026 Summary</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      
      <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex justify-between items-start mb-2">
          <span class="text-xs font-bold text-slate-500 uppercase">Enrolled</span>
          <i class="pi pi-users text-blue-500"></i>
        </div>
        <div class="text-2xl font-black text-slate-900">{{ rtc.enrolled }}</div>
        <div class="text-xs text-slate-400 mt-1">Target: {{ targets.enrolled.toLocaleString() }}</div>
      </div>

      <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex justify-between items-start mb-2">
          <span class="text-xs font-bold text-slate-500 uppercase">Graduated</span>
          <i class="pi pi-graduation-cap text-emerald-500"></i>
        </div>
        <div class="text-2xl font-black text-slate-900">{{ rtc.graduated }}</div>
        <div class="flex items-center gap-2 mt-2">
          <div class="flex-1 bg-slate-100 h-1.5 rounded-full overflow-hidden">
            <div class="bg-emerald-500 h-full" style="width: 100%"></div>
          </div>
          <span class="text-[10px] font-bold text-emerald-600">109.5%</span>
        </div>
      </div>

      <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex justify-between items-start mb-2">
          <span class="text-xs font-bold text-slate-500 uppercase">Assessed</span>
          <i class="pi pi-check-square text-amber-500"></i>
        </div>
        <div class="text-2xl font-black text-slate-900">{{ rtc.assessed }}</div>
        <div class="text-xs text-rose-500 font-medium mt-1">0.17% of target</div>
      </div>

      <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex justify-between items-start mb-2">
          <span class="text-xs font-bold text-slate-500 uppercase">Certified</span>
          <i class="pi pi-verified text-slate-400"></i>
        </div>
        <div class="text-2xl font-black text-slate-900">{{ rtc.certified }}</div>
        <div class="text-xs text-slate-400 mt-1">Goal: {{ targets.certified.toLocaleString() }}</div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <h3 class="text-sm font-bold text-slate-700 mb-6">Target vs. Actuals</h3>
        <div class="h-[300px]">
          <bar-chart :data-values="[rtc.enrolled, rtc.graduated, rtc.assessed, rtc.certified]" />
        </div>
      </div>
      
      <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
        <h3 class="text-sm font-bold text-slate-700 mb-6">Accomplishment Compliance</h3>
        <div class="h-[300px]">
           <dough-chart :compliance="[121.67, 0.22, 0]" />
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