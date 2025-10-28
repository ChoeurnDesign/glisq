<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
</script>

<template>
  <GuestLayout>
    <section class="min-h-[20vh] flex flex-col justify-center items-center bg-[#f9f5f0] text-gray-800 px-6">
      <div class="w-full max-w-3xl bg-white rounded-2xl shadow-md p-10">
        <h1 class="text-3xl md:text-4xl font-serif text-gray-900 mb-8 text-center">
          Contact Us
        </h1>

        <p class="text-center text-gray-600 mb-8 max-w-xl mx-auto">
          Have questions about GLISQ or our skincare line?  
          Fill out the form below — our team will get back to you soon.
        </p>

        <form class="max-w-xl mx-auto bg-gray-50 p-6 rounded-xl shadow-sm">
          <input
            type="text"
            placeholder="Your Name"
            class="w-full border rounded-lg px-4 py-2 mb-4 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-gray-900 focus:outline-none"
          />

          <input
            type="email"
            placeholder="Your Email"
            class="w-full border rounded-lg px-4 py-2 mb-4 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-gray-900 focus:outline-none"
          />

          <textarea
            placeholder="Your Message"
            rows="5"
            class="w-full border rounded-lg px-4 py-2 mb-4 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-gray-900 focus:outline-none resize-none"
          ></textarea>

          <button
            type="submit"
            class="w-full py-2 bg-black text-white font-medium rounded-lg hover:bg-gray-900 transition-all duration-200"
          >
            Send Message
          </button>
        </form>
      </div>

      <!-- Contact Details -->
      <div class="text-center text-gray-600 mt-10">
        <p class="mb-2 flex items-center justify-center gap-1">
          <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
          </svg>

          Phnom Penh, Cambodia
        </p>
        <p class="text-sm text-gray-500">
          We typically reply within 1–2 business days.
        </p>
      </div>
    </section>
  </GuestLayout>
</template>
