<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/vue3'
import { TruckIcon, CurrencyDollarIcon, GlobeAltIcon } from '@heroicons/vue/24/outline'
</script>

<template>
  <GuestLayout>
    <Head title="Shipping & Delivery" />
    <section class="max-w-5xl mx-auto px-6 py-10 text-gray-800">
      <!-- Title -->
      <div class="text-center justify-center">
        <h1 class="text-3xl md:text-4xl font-serif mb-2 text-gray-900">
            Shipping & Delivery
        </h1>
        <p class="text-gray-600 mb-10">
            Simple, transparent, and reliable shipping for every order.
        </p>
      </div>

      <!-- Cards Section -->
      <div class="grid gap-6 md:grid-cols-3">
        <!-- Delivery Times -->
        <div
          class="bg-[#fdfcf8] rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition p-6"
        >
          <div class="flex items-center gap-3 mb-4">
            <TruckIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Delivery Times</h2>
          </div>
          <ul class="list-disc ml-6 space-y-1 text-gray-700">
            <li>Phnom Penh: 1–2 business days</li>
            <li>Provinces: 2–5 business days</li>
            <li>International (if available): 7–14 business days</li>
          </ul>
        </div>

        <!-- Shipping Fees -->
        <div
          class="bg-[#fdfcf8] rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition p-6"
        >
          <div class="flex items-center gap-3 mb-4">
            <CurrencyDollarIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Shipping Fees</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            Calculated at checkout. Free shipping promotions may apply to orders over a certain
            amount.
          </p>
        </div>

        <!-- Tracking -->
        <div
          class="bg-[#fdfcf8] rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition p-6"
        >
          <div class="flex items-center gap-3 mb-4">
            <GlobeAltIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Tracking</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            Once shipped, you’ll receive an email/SMS with tracking details (where supported by the
            carrier).
          </p>
        </div>
      </div>

      <!-- Bottom Note -->
      <div
        class="mt-10 rounded-xl border border-[#c6a664]/30 bg-[#fffaf2] p-5 text-[#5a4b2d] text-center"
      >
        Need help with delivery?
        <a href="/contact" class="underline font-medium hover:text-[#b49755]">Contact support</a>.
      </div>
    </section>
  </GuestLayout>
</template>
