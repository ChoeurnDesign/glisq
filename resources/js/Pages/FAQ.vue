<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'

const items = ref([
  {
    q: 'What is silk sericin and why is it good for skin?',
    a: 'Sericin is a natural protein from silkworm cocoons. It helps retain moisture, supports elasticity, and leaves skin soft and smooth.'
  },
  {
    q: 'Is GLISQ suitable for all skin types?',
    a: 'Yes — our formulas are gentle and effective for dry, oily, combination, and sensitive skin.'
  },
  {
    q: 'How often should I use the serum & moisturizer?',
    a: 'Use twice daily — morning and night — on clean skin. Follow with SPF during the day.'
  },
  {
    q: 'Is your product fragrance-free and non-sticky?',
    a: 'Yes, our texture is lightweight, fast-absorbing, and non-sticky with a clean finish.'
  },
])

const openIndex = ref(0)
const toggle = (i) => (openIndex.value = openIndex.value === i ? -1 : i)
</script>

<template>
  <GuestLayout>
    <Head title="FAQ" />
    <section class="max-w-4xl mx-auto px-6 py-16 text-gray-800">
        <div class="text-center justify-center">
            <h1 class="text-3xl md:text-4xl font-serif mb-2 text-gray-900">
                Frequently Asked Questions
            </h1>
            <p class="text-gray-600 mb-10">
                Answers to the most common questions about GLISQ skincare.
            </p>
        </div>

      <!-- Accordion -->
      <div class="space-y-4">
        <div
          v-for="(it, i) in items"
          :key="i"
          class="rounded-2xl border border-gray-200 bg-white/90 overflow-hidden shadow-sm hover:shadow transition-all duration-300"
        >
          <!-- Question -->
          <button
            class="w-full flex items-center justify-between px-5 py-5 text-left font-medium text-gray-900 hover:text-[#c6a664]"
            @click="toggle(i)"
          >
            <span>{{ it.q }}</span>
            <span
              class="ml-4 inline-flex h-7 w-7 items-center justify-center rounded-full border"
              :class="openIndex === i
                ? 'bg-[#c6a664] text-white border-[#c6a664]'
                : 'text-gray-400 border-gray-300'"
            >
              <svg
                v-if="openIndex !== i"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="h-4 w-4"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
              </svg>
              <svg
                v-else
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="h-4 w-4"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
              </svg>
            </span>
          </button>

          <!-- Answer -->
          <transition name="fade">
            <div
              v-show="openIndex === i"
              class="px-6 pb-5 text-gray-700 leading-relaxed bg-[#fdfcf8] border-t border-gray-100"
            >
              <div class="pl-2 border-l-2 border-[#c6a664]/40 italic">
                {{ it.a }}
              </div>
            </div>
          </transition>
        </div>
      </div>

      <div
        class="mt-10 rounded-xl border border-amber-200 bg-amber-50 p-4 text-amber-900 text-center"
      >
        Still have questions?
        <a href="/contact" class="underline hover:text-[#b49755] font-medium">Contact us</a>.
      </div>
    </section>
  </GuestLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(-4px);
}
</style>
