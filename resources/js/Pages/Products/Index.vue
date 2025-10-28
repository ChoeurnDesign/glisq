<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { StarIcon as StarSolid } from '@heroicons/vue/20/solid'
import { StarIcon as StarOutline } from '@heroicons/vue/24/outline'

defineProps({ products: Array })
</script>

<template>
  <GuestLayout>
    <section class="py-16 max-w-7xl mx-auto px-6">
      <!-- Elegant Heading -->
      <h2 class="text-4xl md:text-5xl font-serif mb-14 text-gray-900 text-center tracking-tight">
        Our Products
      </h2>

      <!-- Product Grid -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        <div
          v-for="p in products"
          :key="p.id"
          class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
        >
          <!-- Product Image -->
          <div
            class="aspect-square bg-gray-100 relative"
            :style="p.image_path
              ? `background-image:url(${p.image_path.startsWith('/storage') ? p.image_path : p.image_path});background-size:cover;background-position:center`
              : ''"
          >
            <div
              v-if="p.is_featured"
              class="absolute top-4 left-4 bg-[#c6a664]/90 text-white text-xs px-3 py-1 rounded-full tracking-wide"
            >
              Featured
            </div>
          </div>

          <!-- Product Content -->
          <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-gray-900 group-hover:text-[#c6a664] transition-colors duration-200">
              {{ p.name }}
            </h3>

            <!-- Rating Stars -->
            <div class="flex justify-center items-center mt-3">
              <div class="flex">
                <component
                  v-for="i in 5"
                  :key="i"
                  :is="i <= Math.round(p.reviews_avg_rating) ? StarSolid : StarOutline"
                  class="h-5 w-5"
                  :class="i <= Math.round(p.reviews_avg_rating) 
                  ? 'text-[#c6a664]' 
                  : 'text-gray-300 stroke-gray-400 stroke-[1]'"
                />
              </div>
              <span class="ml-2 text-sm text-gray-500">
                ({{ p.reviews_count }} {{ p.reviews_count === 1 ? 'review' : 'reviews' }})
              </span>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-600 mt-2 leading-relaxed line-clamp-3">
              {{ p.description }}
            </p>

            <!-- Price + Button -->
            <div class="mt-5 flex items-center justify-between gap-4">
              <span class="text-lg font-medium text-gray-800">
                ${{ Number(p.price).toFixed(2) }}
              </span>

              <a
                :href="`/products/${p.slug}`"
                class="bg-[#c6a664] text-white text-sm px-5 py-2 rounded-full hover:bg-[#b49755] transition-all duration-200"
              >
                View Details
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

h2 {
  font-family: 'Playfair Display', serif;
  letter-spacing: -0.5px;
}

p, span, a {
  font-family: 'Inter', sans-serif;
}
</style>
