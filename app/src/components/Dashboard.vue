<template>
  <div>
    <Tabs value="0">
      <TabList>
        <Tab value="0">Enrolled</Tab>
        <Tab value="1">Graduated</Tab>
        <Tab value="2">Assessed</Tab>
        <Tab value="3">Certified</Tab>
        <Tab value="4">Cert</Tab>
      </TabList>
      <TabPanels>
        <TabPanel value="0" class="flex flex-col md:flex-row gap-4">
          <enrolled-comp />
        </TabPanel>
      </TabPanels>
    </Tabs>
  </div>
</template>

<script setup>
</script>

<style lang="scss" scoped>
:deep(.p-tablist-tab-list) {
  // display: flex;
  justify-content: center;
  gap: 3.5rem;
}
</style>