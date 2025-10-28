<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/vue3'
import { LockClosedIcon, UserCircleIcon, EnvelopeIcon } from '@heroicons/vue/24/outline'
</script>

<template>
  <GuestLayout>
    <Head title="Privacy Policy" />
    <section class="max-w-5xl mx-auto px-6 py-16 text-gray-800">
        <div class="text-center justify-center">
            <h1 class="text-3xl md:text-4xl font-serif mb-2 text-gray-900">
                Privacy Policy
            </h1>
            <p class="text-gray-600 mb-10">
                Your privacy matters. This policy explains how we collect, use, and protect your data.
            </p>
        </div>

      <div class="grid gap-6 md:grid-cols-3">
        <!-- Data Collection -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <UserCircleIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">What We Collect</h2>
          </div>
          <ul class="list-disc ml-6 space-y-1 text-gray-700">
            <li>Name, email, and contact details</li>
            <li>Order and shipping information</li>
            <li>Site analytics to improve performance</li>
          </ul>
        </div>

        <!-- Use of Data -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <EnvelopeIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">How We Use Data</h2>
          </div>
          <ul class="list-disc ml-6 space-y-1 text-gray-700">
            <li>Process and fulfill orders</li>
            <li>Send updates and promotions</li>
            <li>Improve products and user experience</li>
          </ul>
        </div>

        <!-- Security -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <LockClosedIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Data Protection</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            We use secure technologies and never share your information with unauthorized third parties.
          </p>
        </div>
      </div>

      <p class="text-sm text-gray-500 mt-8">Last updated: {{ new Date().toLocaleDateString() }}</p>
    </section>
  </GuestLayout>
</template>
