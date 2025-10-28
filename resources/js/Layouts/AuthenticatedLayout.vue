<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <div class="border-b bg-white">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <Link href="/" class="font-semibold">GLISQ</Link>
        <nav class="flex gap-4 text-sm">
          <Link href="/dashboard">Dashboard</Link>
          <Link href="/profile">Profile</Link>
          <Link href="/products">Products</Link>
          <form method="post" :action="route('logout')">
            <input type="hidden" name="_token" :value="(window).Laravel?.csrfToken ?? document.querySelector('meta[name=csrf-token]')?.content">
            <button class="text-red-600">Logout</button>
          </form>
        </nav>
      </div>
    </div>
    <div class="max-w-7xl mx-auto px-6 py-8">
      <slot />
    </div>
  </div>
</template>
