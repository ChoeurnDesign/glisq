<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
</script>

<template>
  <GuestLayout>
    <section class="max-w-6xl mx-auto px-6 py-16 bg-[#f9f5f0] text-gray-800">
      <h1 class="text-4xl font-bold text-center mb-8">The Modern Science Behind GLISQ</h1>
      <p class="text-center text-gray-600 max-w-3xl mx-auto mb-12">
        Our research focuses on sericin — a natural silk protein known for its ability to hydrate, protect, and rejuvenate the skin barrier. GLISQ combines biotechnology and natural extraction to deliver luminous, age-defying results with a silken touch.
      </p>

      <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
          <h2 class="text-2xl font-semibold mb-4">How Sericin Works</h2>
          <p class="text-gray-700 leading-relaxed mb-6">
            Enriched with essential amino acids, sericin binds seamlessly to the skin, creating a delicate moisture veil that smooths texture and enhances firmness — for skin that feels as soft as silk and as strong as you.
          </p>
          <h3 class="text-xl font-semibold mb-2">Sustainable Science</h3>
          <p class="text-gray-700 leading-relaxed">
            GLISQ extracts sericin through a responsible process that reduces waste from traditional silk production — turning what was once discarded into a valuable skincare ingredient.
          </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-md text-center">
          <img src="/images/sericin.png" alt="Sericin extraction process" class="rounded-lg mb-4" />
          <p class="text-sm text-gray-600">
            Natural sericin extraction from Cambodian silkworm cocoons.
          </p>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
