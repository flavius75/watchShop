<script>
import { ref } from "vue";

// state
const state = ref("");
</script>

<template>
  <UCard>
    <UForm :state="state" class="space-y-4">
      <h1>Nous contacter</h1>

      <UFormGroup label="Nom" name="name">
        <UInput v-model="state" />
      </UFormGroup>

      <UFormGroup label="Email" name="email">
        <UInput v-model="state" type="password" />
      </UFormGroup>

      <UFormGroup label="Message" name="message">
        <UTextarea v-model="state" />
      </UFormGroup>

      <UButton type="submit"> Envoyer </UButton>
    </UForm>
  </UCard>
</template>
