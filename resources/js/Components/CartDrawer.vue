<script setup>
import { computed } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import { XMarkIcon, TrashIcon, PlusIcon, MinusIcon } from '@heroicons/vue/24/outline'

const emit = defineEmits(['close'])
const cart = computed(() => usePage().props.cart || [])
const total = computed(() =>
  cart.value.reduce((sum, i) => sum + i.price * i.quantity, 0).toFixed(2)
)

function getImageUrl(path) {
  if (!path) return '/images/placeholder.png'
  if (path.startsWith('http')) return path
  if (path.startsWith('images/') || path.startsWith('/images/')) return `/${path.replace(/^\/?/, '')}`
  if (path.startsWith('storage/') || path.startsWith('/storage/')) return `/${path.replace(/^\/?/, '')}`
  return `/storage/${path}`
}

function removeItem(id) {
  router.delete(route('cart.remove', id), { preserveScroll: true })
}

function clearCart() {
  router.delete(route('cart.clear'), { preserveScroll: true })
}

function updateQuantity(item, quantity) {
  if (quantity < 1) return removeItem(item.id)
  router.patch(route('cart.update', item.id), { quantity }, { preserveScroll: true })
}

function checkout() {
  alert('✨ Checkout feature coming soon!')
}
</script>

<template>
  <transition name="slide-cart">
    <div v-if="true">
      <div
        class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 transition-opacity"
        @click="$emit('close')"
      ></div>

      <div
        class="fixed top-0 right-0 h-screen w-80 sm:w-96 bg-[#faf7f2] shadow-2xl z-[60] flex flex-col border border-gray-300 rounded-l-xl"
      >
        <div
          class="flex items-center justify-between p-5 border-b border-gray-300 bg-[#f5efe6] flex-shrink-0"
        >
          <h2 class="text-lg font-semibold text-gray-800 tracking-wide">
            Your Cart
          </h2>
          <button
            @click="$emit('close')"
            class="rounded-full hover:bg-gray-200 p-1 transition"
          >
            <XMarkIcon class="w-6 h-6 text-gray-600 hover:text-gray-900 transition" />
          </button>
        </div>

        <div class="flex-1 overflow-y-auto p-5 space-y-4">
          <div
            v-for="item in cart"
            :key="item.id"
            class="flex items-center gap-4 border border-gray-300 rounded-lg p-2"
          >
            <img
              :src="getImageUrl(item.image_path)"
              alt="Product"
              class="w-16 h-auto rounded-lg object-cover bg-gray-100 border border-gray-200"
            />

            <div class="flex-1">
              <p class="font-medium text-gray-900">{{ item.name }}</p>
              <p class="text-sm text-[#8a826b] font-medium">
                ${{ Number(item.price).toFixed(2) }}
              </p>

              <div class="flex items-center justify-between mt-2">
                <div class="flex items-center gap-2">
                  <button
                    @click="updateQuantity(item, item.quantity - 1)"
                    class="w-6 h-6 flex items-center justify-center border border-gray-400 rounded hover:bg-[#f3efe9] transition"
                  >
                    <MinusIcon class="w-4 h-4 text-[#8a826b]" />
                  </button>

                  <span class="w-6 text-center text-[#8a826b] font-medium">
                    {{ item.quantity }}
                  </span>

                  <button
                    @click="updateQuantity(item, item.quantity + 1)"
                    class="w-6 h-6 flex items-center justify-center border border-gray-400 rounded hover:bg-[#f3efe9] transition"
                  >
                    <PlusIcon class="w-4 h-4 text-[#8a826b]" />
                  </button>
                </div>

                <button
                  @click="removeItem(item.id)"
                  class="text-[#8a826b] hover:text-[#c6a664] transition"
                >
                  <TrashIcon class="w-5 h-5" />
                </button>
              </div>
            </div>
          </div>

          <p v-if="cart.length === 0" class="text-center text-gray-500 pt-10 italic">
            Your cart is empty.
          </p>
        </div>

        <div class="p-5 border-t border-gray-300 bg-[#f5efe6] flex-shrink-0">
          <div class="flex items-center justify-between mb-3">
            <span class="text-gray-700 font-medium">Total</span>
            <span class="text-lg font-semibold text-gray-900">${{ total }}</span>
          </div>

          <div class="flex gap-2">
            <button
              @click="checkout"
              class="w-full bg-[#c6a664] text-white py-2 rounded-full hover:bg-[#b18e4d] transition font-medium shadow-sm"
            >
              Checkout
            </button>
            <button
              v-if="cart.length > 0"
              @click="clearCart"
              class="w-full border border-gray-400 text-gray-700 py-2 rounded-full hover:bg-gray-100 transition font-medium"
            >
              Clear Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<style scoped>
.slide-cart-enter-active,
.slide-cart-leave-active {
  transition: transform 0.4s ease, opacity 0.4s ease;
}
.slide-cart-enter-from,
.slide-cart-leave-to {
  transform: translateX(100%);
  opacity: 0;
}
::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-thumb {
  background-color: #d4c59d;
  border-radius: 10px;
}
</style>
