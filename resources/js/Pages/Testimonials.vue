<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
const props = defineProps({ reviews: Array })
</script>

<template>
  <GuestLayout>
    <section class="max-w-7xl mx-auto px-6 py-20 text-gray-800 bg-[#fdfcf8]">
      <div class="text-center mb-14">
        <h1 class="text-4xl font-serif font-semibold text-gray-900 mb-4">
          What Our Customers Say
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Real voices. Real results. See what people are saying about
          <span class="font-semibold">GLISQ</span>.
        </p>
      </div>

      <!-- Reviews Grid -->
      <div v-if="reviews.length" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          v-for="r in reviews"
          :key="r.id"
          class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300"
        >
          <div class="flex items-center gap-4 mb-4">
            <!-- <img src="/images/user-avatar.png" alt="User" class="w-12 h-12 rounded-full object-cover" /> -->
            <div>
              <h3 class="font-semibold text-lg text-gray-900">{{ r.user?.name || 'Anonymous' }}</h3>
              <div class="text-[#c6a664] text-sm"><span>★★★★★</span></div>
            </div>
          </div>
          <p class="text-gray-700 italic leading-relaxed">"{{ r.comment }}"</p>
          <p class="text-sm text-gray-500 mt-3">
            — from <span class="font-medium">{{ r.product?.name }}</span>
          </p>
        </div>
      </div>

      <p v-else class="text-center text-gray-500 italic">No reviews yet.</p>

      <!-- CTA -->
      <div class="text-center mt-20">
        <h2 class="text-2xl font-serif text-gray-900 mb-4">Experience It Yourself</h2>
        <p class="text-gray-600 mb-8">
          Discover why people love GLISQ — radiant, silky skin powered by Sericin.
        </p>
        <a
          href="/products"
          class="inline-block px-8 py-3 bg-[#c6a664] text-white font-medium rounded-full shadow hover:bg-[#b49755] transition-all duration-300"
        >
          Explore Products
        </a>
      </div>
    </section>
  </GuestLayout>
</template>
