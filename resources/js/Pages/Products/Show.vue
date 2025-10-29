<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import ReviewSection from '@/Components/ReviewSection.vue'
import { router, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import { CheckCircleIcon, StarIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
  product: { type: Object, required: true },
  reviews: { type: Array, default: () => [] }
})

const page = usePage()
const user = computed(() => page.props?.auth?.user || null)

// ⭐ Calculate average rating
const averageRating = computed(() => {
  if (!props.reviews?.length) return 0
  const sum = props.reviews.reduce((acc, r) => acc + (r.rating || 0), 0)
  return (sum / props.reviews.length).toFixed(1)
})

// ✅ Safe product image path
const imageUrl = computed(() => {
  const p = props.product?.image_path || ''
  if (!p) return ''
  if (p.startsWith('http') || p.startsWith('/')) return p
  return `/storage/${p}`
})

// 🛒 Add to cart
const adding = ref(false)
function addToCart() {
  if (!props.product?.id) return
  adding.value = true
  const url = `/cart/add/${props.product.id}`
  router.post(
    url,
    {
      id: props.product.id,
      name: props.product.name,
      price: props.product.price,
      image_path: props.product.image_path,
      quantity: 1,
    },
    {
      preserveScroll: true,
      onFinish: () => (adding.value = false),
    }
  )
}
</script>

<template>
  <GuestLayout>
    <section class="py-12 md:py-16 max-w-7xl mx-auto px-4 md:px-6 grid lg:grid-cols-2 gap-14">
      <!-- LEFT SIDE -->
      <div>
        <div
          class="aspect-square rounded-3xl bg-gray-100 overflow-hidden shadow-md bg-cover bg-center"
          :style="imageUrl ? { backgroundImage: `url(${imageUrl})` } : {}"
        ></div>

        <!-- Reviews Section (Full) -->
        <ReviewSection :product="props.product" :reviews="props.reviews" :user="user" class="mt-10" />
      </div>

      <!-- RIGHT SIDE -->
      <div>
        <!-- Product Title -->
        <h1 class="text-3xl md:text-4xl font-serif text-gray-900 leading-tight">
          {{ props.product?.name }}
        </h1>

        <!-- Rating Summary -->
        <div v-if="averageRating > 0" class="flex items-center gap-2 mt-2">
          <div class="flex">
            <StarIcon
              v-for="n in 5"
              :key="n"
              class="w-5 h-5"
              :class="n <= Math.round(averageRating) ? 'text-yellow-500' : 'text-gray-300'"
            />
          </div>
          <span class="text-sm text-gray-600">
            {{ averageRating }} / 5 ({{ props.reviews.length }} reviews)
          </span>
        </div>

        <!-- Short Description -->
        <p class="mt-6 text-gray-700 text-lg leading-relaxed">
          {{ props.product?.description }}
        </p>

        <!-- Price + Buttons -->
        <div class="mt-6">
          <p class="text-3xl text-gray-900 font-semibold">
            ${{ Number(props.product?.price || 0).toFixed(2) }}
          </p>

          <div class="mt-5 flex flex-wrap gap-4">
            <button
              @click="addToCart"
              :disabled="adding"
              class="px-6 py-2.5 bg-[#c6a664] text-white rounded-full shadow hover:bg-[#b49755] disabled:opacity-60 transition-all duration-300"
            >
              {{ adding ? 'Adding…' : 'Add to Cart' }}
            </button>

            <a
              href="/products"
              class="px-6 py-2.5 border border-gray-400 rounded-full hover:bg-gray-100 transition-all duration-300"
            >
              Back to Products
            </a>
          </div>
        </div>

        <!-- Product Info Sections -->
        <div class="mt-10 border-t border-gray-200 pt-8 space-y-10 text-gray-800">
          <div v-if="props.product?.formulated_for">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Formulated For</h3>
            <ul class="list-disc ml-6 text-gray-700 leading-relaxed">
              <li
                v-for="(item, i) in (props.product.formulated_for || '').split('\n').filter(Boolean)"
                :key="i"
              >
                {{ item }}
              </li>
            </ul>
          </div>

          <div v-if="props.product?.key_ingredients">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Key Ingredients</h3>
            <ul class="space-y-2">
              <li
                v-for="(ing, i) in (props.product.key_ingredients || '').split('\n').filter(Boolean)"
                :key="i"
                class="flex items-start gap-2"
              >
                <CheckCircleIcon class="w-5 h-5 text-[#c6a664] mt-1" />
                <span>{{ ing }}</span>
              </li>
            </ul>
          </div>

          <div v-if="props.product?.key_benefits">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Key Benefits</h3>
            <ul class="space-y-2">
              <li
                v-for="(b, i) in (props.product.key_benefits || '').split('\n').filter(Boolean)"
                :key="i"
                class="flex items-start gap-2"
              >
                <CheckCircleIcon class="w-5 h-5 text-[#c6a664] mt-1" />
                <span>{{ b }}</span>
              </li>
            </ul>
          </div>

          <div v-if="props.product?.recommended_use">
            <h3 class="text-xl font-serif text-gray-900 mb-3">Recommended Use</h3>
            <ul class="list-disc ml-6 text-gray-700 leading-relaxed">
              <li
                v-for="(use, i) in (props.product.recommended_use || '').split('\n').filter(Boolean)"
                :key="i"
              >
                {{ use }}
              </li>
            </ul>
          </div>

          <div v-if="props.product?.how_to_apply">
            <h3 class="text-xl font-serif text-gray-900 mb-3">How to Apply</h3>
            <ul class="list-disc ml-6 text-gray-700 leading-relaxed">
              <li
                v-for="(step, i) in (props.product.how_to_apply || '').split('\n').filter(Boolean)"
                :key="i"
              >
                {{ step }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- 🛒 Sticky Add-to-Cart Bar (Mobile Only) -->
    <div
      class="lg:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow-md px-5 py-3 flex justify-between items-center"
    >
      <span class="text-lg font-semibold text-gray-900">
        ${{ Number(props.product?.price || 0).toFixed(2) }}
      </span>
      <button
        @click="addToCart"
        :disabled="adding"
        class="px-5 py-2 bg-[#c6a664] text-white rounded-full shadow hover:bg-[#b49755] disabled:opacity-60 transition-all duration-300"
      >
        {{ adding ? 'Adding…' : 'Add to Cart' }}
      </button>
    </div>
  </GuestLayout>
</template>
