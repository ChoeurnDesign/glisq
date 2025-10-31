<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import ReviewSection from '@/Components/ReviewSection.vue'
import { router, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
  product: { type: Object, required: true },
  reviews: { type: Array, default: () => [] }
})

const page = usePage()
const user = computed(() => page.props?.auth?.user || null)

// ✅ Build safe image URL
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

  const userLoggedIn = !!user.value

  router.post(
    `/cart/add/${props.product.id}`,
    {
      id: props.product.id,
      name: props.product.name,
      price: props.product.price,
      image_path: props.product.image_path,
      quantity: 1,
    },
    {
      preserveScroll: true,
      onSuccess: () => {
        // optional — console message or UI feedback
        if (!userLoggedIn) {
          console.log('Added to guest cart (session)')
        } else {
          console.log('Added to user cart (database)')
        }
      },
      onFinish: () => (adding.value = false),
    }
  )
}

</script>

<template>
  <GuestLayout>
    <section class="py-16 max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14">
      <!-- LEFT SIDE -->
      <div>
        <!-- Product Image -->
        <div
          class="aspect-square rounded-3xl bg-gray-100 overflow-hidden shadow-md bg-cover bg-center"
          :style="imageUrl ? { backgroundImage: `url(${imageUrl})` } : {}"
        ></div>

        <!-- Mobile Add to Cart (with Price + Buttons in one line) -->
        <div
          class="mt-6 flex flex-wrap items-center justify-between border-t border-gray-200 pt-4 lg:hidden"
        >
          <p class="text-2xl font-semibold text-gray-900">
            ${{ Number(props.product?.price || 0).toFixed(2) }}
          </p>

          <div class="flex gap-3 mt-3 sm:mt-0">
            <button
              @click="addToCart"
              :disabled="adding"
              class="px-6 py-2.5 bg-[#c6a664] text-white rounded-full shadow hover:bg-[#b49755] disabled:opacity-60 disabled:cursor-not-allowed transition-all duration-300"
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

        <!-- Review Section -->
        <ReviewSection :product="props.product" :reviews="props.reviews" :user="user" class="mt-8" />
      </div>

      <!-- RIGHT SIDE -->
      <div>
        <h1 class="text-4xl font-serif text-gray-900 leading-tight">
          {{ props.product?.name }}
        </h1>

        <p class="mt-6 text-gray-700 text-lg leading-relaxed">
          {{ props.product?.description }}
        </p>

        <!-- Desktop Price + Add to Cart -->
        <div class="mt-8 hidden lg:flex lg:flex-wrap lg:items-center lg:gap-6">
          <p class="text-3xl font-semibold text-gray-900">
            ${{ Number(props.product?.price || 0).toFixed(2) }}
          </p>

          <button
            @click="addToCart"
            :disabled="adding"
            class="px-6 py-2.5 bg-[#c6a664] text-white rounded-full shadow hover:bg-[#b49755] disabled:opacity-60 disabled:cursor-not-allowed transition-all duration-300"
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

        <!-- Product Info Sections -->
        <div class="mt-12 border-t border-gray-200 pt-8 space-y-10 text-gray-800">
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
                v-for="(item, i) in (props.product.key_ingredients || '').split('\n').filter(Boolean)"
                :key="i"
                class="flex items-start gap-3"
              >
                <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center mt-1">
                  <CheckCircleIcon class="w-5 h-5 text-[#c6a664]" />
                </div>
                <span class="text-gray-700 leading-relaxed">{{ item }}</span>
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
  </GuestLayout>
</template>
