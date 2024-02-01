<script setup>

const { data, pending, error, refresh } = await useFetch('/api/products', {
  baseURL: "http://127.0.0.1:8000"
})

</script>

<template>

  <span v-if="pending">Loading...</span>
  <span v-else-if="data"><ProductCard v-for="product in data" :data=product /></span>
  <span v-else-if="error">Error: {{ error }}</span>
  <button @click="refresh">Refresh</button>
</template>