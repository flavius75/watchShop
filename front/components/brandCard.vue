<script setup>
const props = defineProps(["data"]);
</script>

<template>
  <UCard>
    <NuxtLink :to="`products/${props.data.id}`">
      <img src="/brands/casio.png" alt="" />
    </NuxtLink>
    <p>{{ props.data.brandName }}</p>
  </UCard>
</template>
