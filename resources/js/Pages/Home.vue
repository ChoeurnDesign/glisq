<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
defineProps({ tagline: String })
</script>

<template>
  <GuestLayout>
    <!-- Hero Section -->
    <section
      class="relative min-h-screen flex flex-col justify-center bg-[#f9f5f0] text-gray-800 px-6 md:px-16 overflow-hidden"
    >
      <!-- Full-width Banner Background (Behind All Content) -->
      <div
        class="absolute top-0 left-0 w-full h-[46%] bg-cover bg-center z-10"
        style="background-image: url('/images/banner.png');"
      >
    </div> 
      

      <div class="grid md:grid-cols-2 gap-12 items-center relative z-10">
        <!-- Left Text Content -->
        <div>
          <div class="flex gap-4 mb-28 mt-8">
            <a href="/products" class="px-8 py-3 rounded-full bg-gray-800 text-white hover:bg-[#c6a664] hover:text-white transition duration-200 shadow-md">
              Shop Now
            </a>
            
            <a href="/about" class="px-8 py-3 rounded-full border border-gray-900 text-gray-900 hover:bg-gray-500 hover:text-white transition-all duration-200">
              Learn More
            </a>
            <a href="/skin-quiz" class="px-6 py-3 border border-[#c6a664] text-[#c6a664] rounded-full hover:bg-[#c6a664]/10 hover:shadow-sm hover:-translate-y-[1px] transition-all duration-300">
              Skin Quiz
            </a>
          </div>
          <h1
            class="text-3xl md:text-5xl font-serif text-gray-900 leading-snug tracking-tight"
          >
            <span class="block">
              Soft Like Silk,
              <span class="text-[#c6a664]">Strong Like You.</span>
            </span>
          </h1>
          <p
            class="text-[1.05rem] mt-6 md:text-lg text-gray-700 leading-relaxed border-l-4 border-[#c6a664] pl-4 italic"
          >
            Discover the beauty of silk-inspired skincare.  
            <span class="font-medium text-gray-900">GLISQ</span>
            fuses the purity of silkworm sericin with 
            modern science to unveil skin that glows with natural radiance — hydrated, soft, and resilient.
          </p>
        </div>

        <!-- Right Image -->
        <div class="relative flex justify-center items-center">
          <div
            class="w-full max-w-[430px] aspect-square rounded-3xl shadow-lg overflow-hidden bg-cover bg-center"
            style="background-image: url('/images/serum.png');"
          ></div>

        </div>
      </div>
    </section>

    <!-- Highlight Section -->
    <section class="py-4 text-center bg-white">
      <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mb-8 tracking-wide">
        Why Choose <span class="text-[#c6a664]">GLISQ</span>
      </h2>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed text-lg">
        At <span class="font-medium text-gray-900">GLISQ</span>, we believe that skincare should feel as 
        pure and luxurious as silk. Our formulas are infused with natural <span class="text-gray-800 font-medium">sericin protein</span> — 
        a unique compound from silkworms that helps nourish, hydrate, and renew your skin barrier.
      </p>
      <p class="mt-5 text-gray-600 max-w-3xl mx-auto leading-relaxed text-lg">
        Backed by modern science and crafted with ethical precision, each GLISQ product is designed 
        to deliver visible radiance, silky softness, and long-lasting balance — for skin that truly glows from within.
      </p>
    </section>
  </GuestLayout>
</template>

<style scoped>
/* Smooth fade-in for banner */
section > div.absolute {
  animation: fadeIn 1.2s ease-in-out;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: scale(1.02);
  }
  to {
    opacity: 0.9;
    transform: scale(1);
  }
}
</style>
