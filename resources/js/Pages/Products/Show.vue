<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import ReviewSection from '@/Components/ReviewSection.vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/20/solid'

const props = defineProps({ product: Object, reviews: Array })
const page = usePage()
const user = computed(() => page.props.auth?.user || null)
</script>

<template>
  <GuestLayout>
    <section class="py-16 max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14">
      <!-- LEFT SIDE -->
      <div>
        <div
          class="aspect-square rounded-3xl bg-gray-100 overflow-hidden shadow-md bg-cover bg-center"
          :style="props.product.image_path ? `background-image:url(${props.product.image_path})` : ''"
        ></div>

        <!-- Review Section -->
        <ReviewSection :product="props.product" :reviews="props.reviews" :user="user" />
      </div>

      <!-- RIGHT SIDE -->
      <div>
        <h1 class="text-4xl font-serif font-semibold text-gray-900 leading-tight">
          {{ props.product.name }}
        </h1>

        <p class="mt-6 text-gray-700 text-lg leading-relaxed">
          {{ props.product.description }}
        </p>

        <p class="mt-8 text-3xl font-semibold text-gray-900">
          ${{ Number(props.product.price).toFixed(2) }}
        </p>

        <div class="mt-8 flex flex-wrap gap-4">
          <a href="/cart" class="px-6 py-2.5 bg-[#c6a664] text-white rounded-full shadow hover:bg-[#b49755] transition-all duration-300">
            Add to Cart
          </a>
          <a href="/products" class="px-6 py-2.5 border border-gray-400 rounded-full hover:bg-gray-100 transition-all duration-300">
            Back to Products
          </a>
        </div>

        <!-- Product Info Sections -->
        <div class="mt-12 border-t border-gray-200 pt-8 space-y-10 text-gray-800">
          <div v-if="props.product.formulated_for">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Formulated For</h3>
            <ul class="list-disc ml-6 text-gray-700 leading-relaxed">
              <li v-for="(item, i) in props.product.formulated_for.split('\n')" :key="i">{{ item }}</li>
            </ul>
          </div>

          <div v-if="props.product.key_ingredients">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Key Ingredients</h3>
            <ul class="space-y-2">
              <li v-for="(ing, i) in props.product.key_ingredients.split('\n')" :key="i" class="flex items-start gap-2">
                <CheckCircleIcon class="w-5 h-5 text-[#c6a664] mt-1" />
                <span>{{ ing }}</span>
              </li>
            </ul>
          </div>

          <div v-if="props.product.key_benefits">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Key Benefits</h3>
            <ul class="space-y-2">
              <li v-for="(b, i) in props.product.key_benefits.split('\n')" :key="i" class="flex items-start gap-2">
                <CheckCircleIcon class="w-5 h-5 text-[#c6a664] mt-1" />
                <span>{{ b }}</span>
              </li>
            </ul>
            <p class="text-sm text-gray-600 mt-4">
              Not sure which product suits your skin?
              <a href="/skin-quiz" class="text-[#c6a664] underline hover:text-[#b49755]">Take the Skin Quiz</a>.
            </p>
          </div>

          <div v-if="props.product.recommended_use">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Recommended Use</h3>
            <ul class="list-disc ml-6 text-gray-700 leading-relaxed">
              <li v-for="(use, i) in props.product.recommended_use.split('\n')" :key="i">{{ use }}</li>
            </ul>
          </div>

          <div v-if="props.product.how_to_apply">
            <h3 class="text-xl font-serif text-gray-900 mb-3">How to Apply</h3>
            <ul class="list-disc ml-6 text-gray-700 leading-relaxed">
              <li v-for="(step, i) in props.product.how_to_apply.split('\n')" :key="i">{{ step }}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
