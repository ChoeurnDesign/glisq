<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { BeakerIcon, SparklesIcon, SunIcon } from '@heroicons/vue/24/outline'
</script>

<template>
  <GuestLayout>
  <!-- 🌸 HERO SECTION -->
  <section
    class="relative flex flex-col justify-center items-center text-gray-800 bg-gradient-to-b from-[#faf8f5] via-[#fdfcf9] to-[#f7f4ef] overflow-hidden py-16"
  >
    <div
      class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-gradient-to-b from-[#fff9ef] via-[#f9f4e8] to-transparent opacity-70 rounded-full blur-3xl"
    ></div>

    <div class="relative z-10 max-w-5xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-serif text-gray-900 leading-tight mb-6">
        Soft Like Silk, <span class="text-[#c6a664]">Strong Like You.</span>
      </h1>

      <p class="text-lg text-gray-700 leading-relaxed max-w-2xl mx-auto mb-8">
        <span class="font-medium text-gray-900">Discover the secret to silk-soft, radiant skin.</span>
        Glisq blends the natural power of sericin with modern innovation to deliver effortless hydration, a silky-smooth texture, and a youthful glow that lasts all day.
      </p>

      <div class="flex flex-wrap gap-4 justify-center">
        <a
          href="/products"
          class="px-8 py-3 rounded-full bg-gray-800 text-white hover:bg-[#c6a664] hover:text-white transition duration-200 shadow-md"
        >
          Shop Now
        </a>
        <a
          href="/about"
          class="border border-gray-800 text-gray-900 px-8 py-3 rounded-full hover:bg-gray-800 hover:text-white transition duration-200"
        >
          Learn More
        </a>
      </div>
    </div>
  </section>

   <!-- 💎 WHY CHOOSE GLISQ -->
    <section class="bg-white py-16 px-6 md:px-16">
      <div
        class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center"
      >
        <!-- Left Text -->
        <div class="text-left md:text-left">
          <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mb-6 text-center md:text-left">
            Why Choose <span class="text-[#c6a664]">GLISQ</span>
          </h2>

          <div class="flex flex-col md:block items-center md:items-start">
            <p class="text-gray-700 text-base md:text-lg leading-relaxed max-w-xl">
              At <span class="font-medium text-gray-900">GLISQ,</span>
              we believe skincare should feel as pure and luxurious as silk. Our formulas are infused with natural sericin protein — a unique compound from silkworms that helps nourish, hydrate, strengthen and renew your skin barrier.
            </p>
            <p class="text-gray-700 mt-2 text-base md:text-lg leading-relaxed max-w-xl">
              Backed by modern innovation and crafted with ethical precision, each GLISQ product delivers visible radiance, silky softness, and lasting balance — for skin that truly glows from within.
            </p>

            <!-- Image (same column on small screens) -->
            <div class="mt-6 flex justify-center md:hidden">
              <img
                src="/images/serum.png"
                alt="GLISQ Serum"
                class="w-[220px] sm:w-[260px] rounded-2xl shadow-lg object-contain"
              />
            </div>
          </div>
        </div>

        <!-- Right Image (only visible on desktop) -->
        <div class="hidden md:flex justify-end">
          <img
            src="/images/serum.png"
            alt="GLISQ Serum"
            class="w-[300px] md:w-[340px] rounded-2xl shadow-lg object-contain"
          />
        </div>
      </div>
    </section>

    <!-- 🌸 WHY CHOOSE GLISQ -->
  <section class="bg-white py-16 px-6 md:px-16">
    <div
      class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center"
    >
      <!-- 🩵 Left Text -->
      <div class="text-center md:text-left">
        <h2
          class="text-3xl md:text-4xl font-serif text-gray-900 mb-6 tracking-wide"
        >
          Why Choose <span class="text-[#c6a664]">GLISQ</span>
        </h2>

        <p
          class="text-gray-700 text-base md:text-lg leading-relaxed max-w-xl mx-auto md:mx-0"
        >
          At <span class="font-medium text-gray-900">GLISQ,</span> we believe
          skincare should feel as pure and luxurious as silk. Our formulas are
          powered by <span class="font-medium">silkworm sericin</span> — a natural
          protein that deeply nourishes, hydrates, and strengthens your skin
          barrier while enhancing its youthful glow.
        </p>

        <p
          class="text-gray-700 mt-4 text-base md:text-lg leading-relaxed max-w-xl mx-auto md:mx-0"
        >
          Guided by science and crafted with ethical precision, every GLISQ
          product delivers visible radiance, silky softness, and lasting balance —
          revealing your skin’s natural brilliance.
        </p>

        <!-- Image (same column on mobile) -->
        <div class="mt-8 flex justify-center md:hidden">
          <img
            src="/images/serum.png"
            alt="GLISQ Serum"
            class="w-[240px] sm:w-[260px] rounded-2xl shadow-md object-contain"
          />
        </div>
      </div>

      <!-- 💧 Right Image (desktop only) -->
      <div class="hidden md:flex justify-end">
        <img
          src="/images/serum.png"
          alt="GLISQ Serum"
          class="w-[340px] lg:w-[380px] rounded-2xl shadow-md object-contain"
        />
      </div>
    </div>
  </section>
  </GuestLayout>
</template>

<style scoped>
section:first-of-type {
  animation: fadeInHero 1.2s ease-in-out;
}

@keyframes fadeInHero {
  from {
    opacity: 0;
    transform: translateY(25px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>


