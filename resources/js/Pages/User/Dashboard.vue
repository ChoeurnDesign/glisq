<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
</script>

<template>
  <AuthLayout>
    <h1 class="text-2xl font-semibold">Welcome to your dashboard</h1>
    <p class="mt-2 text-gray-700">You are logged in as a <span class="font-semibold">user</span>.</p>
    <div class="mt-6 grid sm:grid-cols-2 gap-4">
      <div class="p-5 bg-white border rounded-xl">Orders (coming soon)</div>
      <div class="p-5 bg-white border rounded-xl">Wishlist (optional)</div>
    </div>
  </AuthLayout>
</template>
