<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/vue3'
import { DocumentTextIcon, ShoppingBagIcon, ShieldCheckIcon } from '@heroicons/vue/24/outline'
</script>

<template>
  <GuestLayout>
    <Head title="Terms of Service" />
    <section class="max-w-5xl mx-auto px-6 py-16 text-gray-800">
        <div class="text-center justify-center">
          <h1 class="text-3xl md:text-4xl font-serif mb-2 text-gray-900">
            Terms of Service
          </h1>
          <p class="text-gray-600 mb-10">
            Please review these terms carefully before using GLISQ’s website or making a purchase.
          </p>
        </div>

      <div class="grid gap-6 md:grid-cols-3">
        <!-- Website Use -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <DocumentTextIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Website Use</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            Our website content is for informational purposes only. You agree not to misuse or harm the website or its users.
          </p>
        </div>

        <!-- Orders -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <ShoppingBagIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Orders & Payments</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            All orders are subject to product availability and confirmation. You agree to provide accurate billing details.
          </p>
        </div>

        <!-- Liability -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <ShieldCheckIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Liability & Updates</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            GLISQ is not liable for indirect damages. We may update terms anytime, and continued use means acceptance.
          </p>
        </div>
      </div>

      <p class="text-sm text-gray-500 mt-8">Last updated: {{ new Date().toLocaleDateString() }}</p>
    </section>
  </GuestLayout>
</template>
