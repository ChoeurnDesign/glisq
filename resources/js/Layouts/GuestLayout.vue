<script setup>
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
</script>

<template>
  <div class="min-h-screen flex flex-col bg-[#fdfcf8] text-gray-900">
    <Header />

    <main class="flex-grow max-w-full mx-auto w-full">
      <slot />
    </main>

    <Footer />
  </div>
</template>
