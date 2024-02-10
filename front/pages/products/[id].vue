<script setup>
const route = useRoute();

const { data, pending, error, refresh } = await useFetch(
  "/api/public/products/" + route.params.id,
  {
    baseURL: "http://127.0.0.1:8000",
  }
);
</script>

<template>
  <span v-if="pending">Loading...</span>
  <span v-else-if="data">
    <div class="container my-12 mx-auto px-3 md:px-12">
      <div class="flex">
        <div class="flex-auto w-64">
          <img src="/watches/casio.png" alt="" />
        </div>
        <div class="flex-auto w-32">
          <h2 class="text-lg font-bold">{{ data.brand.brandName }}</h2>
          <h1 class="text-3xl text-gray-500 mb-5">{{ data.productModel }}</h1>
          <div class="mb-5">
            <span>{{ data.productPrice }}€</span>
          </div>
          <!-- <p>{{ data.productDescription }}</p> -->
          <p class="mb-5">
            {{ data.productDescription }}
          </p>
          <UButton color="black" size="md" variant="solid" block
            >Ajouter au panier</UButton
          >
        </div>
      </div>
    </div>
  </span>
  <span v-else-if="error">Error: {{ error }}</span>
  <button @click="refresh">Refresh</button>
</template>
