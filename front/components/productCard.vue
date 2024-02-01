<script setup>
const props = defineProps(["data"])
</script>

<template>
  <UCard>
    <template>
      <!-- <p>{{ props.data.productImageUrl }}</p> -->
      
      <p>{{ props.data.productBrand }}</p>
      <h3>{{ props.data.productModel }}</h3>
      <span>{{ props.data.productPrice }}</span>
    </template>
  </UCard>
</template>