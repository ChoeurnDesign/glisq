<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ArrowUturnLeftIcon, ClipboardDocumentCheckIcon, ChatBubbleBottomCenterTextIcon } from '@heroicons/vue/24/outline'
</script>

<template>
  <GuestLayout>
    <Head title="Return Policy" />
    <section class="max-w-5xl mx-auto px-6 py-16 text-gray-800">
        <div class="text-center justify-center">
            <h1 class="text-3xl md:text-4xl font-serif mb-2 text-gray-900">
                Return & Refund Policy
            </h1>
            <p class="text-gray-600 mb-10">
                We want you to love your GLISQ products. If something isn’t right, we’re here to help.
            </p>
        </div>

      <!-- Policy Cards -->
      <div class="grid gap-6 md:grid-cols-3">
        <!-- Eligibility -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <ClipboardDocumentCheckIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Eligibility</h2>
          </div>
          <ul class="list-disc ml-6 space-y-1 text-gray-700">
            <li>Returns accepted within 14 days of delivery.</li>
            <li>Product must be unopened, unused, and in original packaging.</li>
            <li>Contact us within 48 hours for damaged or incorrect items.</li>
          </ul>
        </div>

        <!-- Process -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <ArrowUturnLeftIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Return Process</h2>
          </div>
          <ol class="list-decimal ml-6 space-y-1 text-gray-700">
            <li>Submit a return request via <a href="/contact" class="underline hover:text-[#b49755]">Contact</a>.</li>
            <li>We’ll provide the return address and instructions.</li>
            <li>Refunds are processed once items are inspected.</li>
          </ol>
        </div>

        <!-- Support -->
        <div class="bg-[#fdfcf8] rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3 mb-4">
            <ChatBubbleBottomCenterTextIcon class="h-7 w-7 text-[#c6a664]" />
            <h2 class="text-xl font-semibold text-gray-900">Need Help?</h2>
          </div>
          <p class="text-gray-700 leading-relaxed">
            Have an issue with your order? Our team is ready to assist and ensure your satisfaction.
          </p>
        </div>
      </div>

      <!-- Bottom note -->
      <div class="mt-10 rounded-xl border border-[#c6a664]/30 bg-[#fffaf2] p-5 text-[#5a4b2d] text-center">
        Questions about returns? <a href="/contact" class="underline font-medium hover:text-[#b49755]">Contact support</a>.
      </div>
    </section>
  </GuestLayout>
</template>
