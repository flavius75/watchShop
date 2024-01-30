<script></script>

<template>
  <header class="relative z-10">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
      <nav class="h-16 flex items-center justify-between">
        <div class="flex">
          Logo
        </div>
        <div class="flex justify-center lg:flex-1 lg:gap-x-12">
          <NuxtLink to="/products">Montres</NuxtLink>
          <NuxtLink to="/products">Marques</NuxtLink>
          <NuxtLink to="/contact">Contact</NuxtLink>
        </div>
        <div class="flex justify-end">
          Panier
          <UButton>Mon compte</UButton>
        </div>
      </nav>
    </div>
  </header>
</template>
