<script setup>
const props = defineProps(["data"])
</script>

<template>
  <UCard>
    <NuxtLink :to="`products/${props.data.id}`">
      <img src="/watches/casio.png" alt="">
    </NuxtLink>
    <p>{{ props.data.productImageUrl }}</p>
    <p>{{ props.data.productBrand }}</p>
    <h3>{{ props.data.productModel }}</h3>
    <span>{{ props.data.productPrice }}</span>
  </UCard>
</template>