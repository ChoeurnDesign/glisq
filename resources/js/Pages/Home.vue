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
                class="w-[240px] sm:w-[280px] rounded-2xl shadow-lg object-contain"
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

    <!-- ✨ PRODUCT HIGHLIGHT -->
  <section class="relative bg-[#f9f5f0] py-20 px-6 overflow-hidden">
    <!-- Soft gradient background glow -->
    <div
      class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-gradient-to-b from-[#fff8ed] via-[#f8f3e8] to-transparent opacity-60 rounded-full blur-3xl"
    ></div>

    <div class="relative z-10 text-center max-w-5xl mx-auto">
      <!-- Section Title -->
      <h2 class="text-3xl md:text-4xl font-serif mb-12 text-gray-900 tracking-wide">
        Our <span class="text-[#c6a664]">Signature</span>
      </h2>

      <!-- Benefit Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Card 1 -->
        <div
          class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-md p-8 hover:shadow-lg transition duration-300"
        >
          <BeakerIcon class="w-10 h-10 text-[#c6a664] mb-4 mx-auto" />
          <h3 class="font-semibold text-xl mb-2 text-gray-900">Hydration Boost</h3>
          <p class="text-gray-600 text-base leading-relaxed">
            Replenishes and locks in moisture, giving your skin a soft, silky feel.
          </p>
        </div>

        <!-- Card 2 -->
        <div
          class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-md p-8 hover:shadow-lg transition duration-300"
        >
          <SparklesIcon class="w-10 h-10 text-[#c6a664] mb-4 mx-auto" />
          <h3 class="font-semibold text-xl mb-2 text-gray-900">Elasticity Repair</h3>
          <p class="text-gray-600 text-base leading-relaxed">
            Smooths fine lines and improves firmness for a youthful, lifted look.
          </p>
        </div>

        <!-- Card 3 -->
        <div
          class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-md p-8 hover:shadow-lg transition duration-300"
        >
          <SunIcon class="w-10 h-10 text-[#c6a664] mb-4 mx-auto" />
          <h3 class="font-semibold text-xl mb-2 text-gray-900">Natural Radiance</h3>
          <p class="text-gray-600 text-base leading-relaxed">
            Brightens dull skin and restores a healthy, luminous glow.
          </p>
        </div>
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


