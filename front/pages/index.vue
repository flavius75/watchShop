<script setup>

const { data, pending, error, refresh } = await useFetch('/api/public/products', {
  baseURL: "http://127.0.0.1:8000"
})

</script>

<template>


  <span v-if="pending">Loading...</span>
  <span v-else-if="data">
    <div class="container my-12 mx-auto px-3 md:px-12">
    <div class="grid grid-cols-5 gap-4 lg:mx-4">
    <ProductCard v-for="product in data" :data=product :key = "product.id"/>
    </div>
    </div>
  </span>
  <span v-else-if="error">Error: {{ error }}</span>
  <button @click="refresh">Refresh</button>
</template>