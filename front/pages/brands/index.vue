<script setup>
const { data, pending, error, refresh } = await useFetch("/api/public/brands", {
  baseURL: "http://127.0.0.1:8000",
});

const page = ref(1);
const items = ref(Array(55));
</script>

<template>
  <span v-if="pending">Loading...</span>
  <span v-else-if="data">
    <div class="container my-12 mx-auto px-3 md:px-12">
      <div class="grid grid-cols-4 gap-4 lg:mx-4">
        <BrandCard v-for="brand in data" :data="brand" :key="brand.id" />
      </div>
    </div>
  </span>
  <span v-else-if="error">Error: {{ error }}</span>
  <button @click="refresh">Refresh</button>

  <UPagination v-model="page" :page-count="5" :total="items.length" />
</template>
