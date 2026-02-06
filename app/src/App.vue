<template>
  <Suspense>
    <div class="flex h-screen overflow-hidden">
      <aside
        class="w-64 bg-surface-900 text-white flex flex-col border-r border-surface-700"
      >
        <div class="p-6 text-xl font-bold">EGACE</div>
        <nav class="flex-1 px-4 space-y-2">
          <router-link
            :to="{ name: 'dashboard' }"
            class="block p-3 rounded hover:bg-surface-800"
            >Dashboard</router-link
          >
        </nav>
      </aside>

      <main class="flex-1 overflow-y-auto">
        <router-view></router-view>
      </main>
    </div>
  </Suspense>
</template>

<script setup>
import { Suspense } from "vue";
</script>

<style lang="scss" scoped>
</style>