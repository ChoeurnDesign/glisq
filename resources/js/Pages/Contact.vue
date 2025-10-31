<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
</script>

<template>
  <GuestLayout>
    <section
      class="min-h-[80vh] flex flex-col justify-center items-center bg-[#f9f5f0] text-gray-800 px-6 py-16"
    >
      <!-- Header -->
      <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-serif text-gray-900 mb-4">
          Contact Us
        </h1>
        <p class="text-gray-600 max-w-xl mx-auto text-base md:text-lg">
          Have questions about GLISQ or our skincare line? Fill out the form below — our team will get back to you soon.
        </p>
      </div>

      <!-- Contact Form -->
      <form
        class="w-full max-w-xl bg-white shadow-md rounded-2xl p-8"
      >
        <div class="space-y-5">
          <input
            type="text"
            placeholder="Your Name"
            class="w-full border rounded-lg px-4 py-2 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#c6a664] focus:outline-none"
          />

          <input
            type="email"
            placeholder="Your Email"
            class="w-full border rounded-lg px-4 py-2 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#c6a664] focus:outline-none"
          />

          <textarea
            placeholder="Your Message"
            rows="5"
            class="w-full border rounded-lg px-4 py-2 text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#c6a664] focus:outline-none resize-none"
          ></textarea>

          <button
            type="submit"
            class="w-full py-3 bg-[#191919] text-white font-medium rounded-lg hover:bg-[#333] transition-all duration-200"
          >
            Send Message
          </button>
        </div>
      </form>

      <!-- Contact Details -->
      <div class="text-center text-gray-600 mt-10 space-y-2">
        <p class="flex items-center justify-center gap-2 text-sm md:text-base">
          <svg
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
            />
          </svg>
          Phnom Penh, Cambodia
        </p>
        <p class="text-sm text-gray-500">
          We typically reply within 1–2 business days.
        </p>
        <p class="text-sm text-gray-500">
          Phone: +855 70 229 710 | Email: chunchoeurn99@gmail.com
        </p>
      </div>
    </section>
  </GuestLayout>
</template>
