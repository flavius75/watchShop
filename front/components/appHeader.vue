<script></script>

<template>
  <header class="relative z-10">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
      <nav class="h-16 flex items-center justify-between">
        <div class="flex">
          <NuxtLink to="/">Logo</NuxtLink>
        </div>
        <div class="flex justify-center lg:flex-1 lg:gap-x-12">
          <NuxtLink to="/products">Montres</NuxtLink>
          <NuxtLink to="/brands">Marques</NuxtLink>
          <NuxtLink to="/contact">Contact</NuxtLink>
        </div>
        <div class="flex gap-x-3 text-2xl">
          <UIcon name="i-heroicons-shopping-bag" />
          <NuxtLink to="/login"><UIcon name="i-heroicons-user" /></NuxtLink>
        </div>
      </nav>
    </div>
  </header>
</template>
