<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { ref, computed } from 'vue'
import { Head } from '@inertiajs/vue3'

const questions = [
  {
    question: 'How would you describe your skin type?',
    options: ['Oily', 'Dry', 'Combination', 'Sensitive', 'Normal'],
  },
  {
    question: 'What is your main skin concern?',
    options: [
      'Acne or breakouts',
      'Dryness or flakiness',
      'Fine lines or wrinkles',
      'Uneven tone or dark spots',
      'Loss of elasticity',
    ],
  },
  {
    question: 'How often do you use skincare products?',
    options: ['Rarely', 'Once a day', 'Twice a day', 'More than twice'],
  },
  {
    question: 'What texture do you prefer in skincare products?',
    options: ['Light & watery', 'Creamy', 'Gel-based', 'Rich & thick'],
  },
]

const current = ref(0)
const answers = ref([])
const showResult = ref(false)

function next(option) {
  answers.value[current.value] = option
  if (current.value < questions.length - 1) {
    current.value++
  } else {
    showResult.value = true
  }
}

function restart() {
  current.value = 0
  answers.value = []
  showResult.value = false
}

const recommendation = computed(() => {
  const skinType = answers.value[0]
  const concern = answers.value[1]

  if (skinType === 'Dry' || concern?.includes('Dryness'))
    return {
      title: 'GLISQ Silk Sericin Hydrating Serum',
      desc: 'Deep hydration powered by Sericin protein to smooth and plump dry skin.',
      image: '/images/products/hydrating.jpg',
    }

  if (skinType === 'Oily' || concern?.includes('Acne'))
    return {
      title: 'GLISQ Clarifying Balance Serum',
      desc: 'Lightweight formula with Niacinamide to reduce acne and control oil.',
      image: '/images/products/clarifying.jpg',
    }

  if (concern?.includes('Wrinkles') || concern?.includes('Elasticity'))
    return {
      title: 'GLISQ Age-Defying Silk Serum',
      desc: 'Sericin + Peptides help firm skin and smooth fine lines.',
      image: '/images/products/age-defying.jpg',
    }

  if (concern?.includes('Uneven') || concern?.includes('Dark spots'))
    return {
      title: 'GLISQ Brightening Glow Serum',
      desc: 'Silk essence with Niacinamide to brighten and even skin tone.',
      image: '/images/products/brightening.jpg',
    }

  return {
    title: 'GLISQ 2-in-1 Silk Sericin Serum & Moisturizer',
    desc: 'Perfect for daily hydration. Smooth, light, and non-sticky for all skin types.',
    image: '/images/products/default.jpg',
  }
})
</script>

<template>
  <GuestLayout>
    <Head title="Skin Type Quiz" />

    <section
      class="min-h-screen bg-gradient-to-b from-[#fdfcf8] to-[#f6f3eb] flex items-center justify-center px-4 py-16"
    >
      <div
        class="max-w-2xl w-full bg-white/95 rounded-[2rem] shadow-lg border border-gray-200 p-10 backdrop-blur-sm"
      >
        <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-3">
          Discover Your Perfect GLISQ Match
        </h1>
        <p class="text-center text-gray-600 mb-10">
          Answer a few questions to reveal your personalized skincare recommendation.
        </p>

        <!-- Quiz -->
        <transition name="fade" mode="out-in">
          <div v-if="!showResult" :key="current" class="text-center">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-900 mb-6">
              {{ questions[current].question }}
            </h2>

            <div class="grid gap-4">
              <button
                v-for="(opt, i) in questions[current].options"
                :key="i"
                @click="next(opt)"
                class="w-full py-3 px-6 rounded-xl border border-gray-300 bg-white text-gray-800 font-medium shadow-sm hover:shadow-md hover:border-[#c6a664] hover:text-[#c6a664] transition-all duration-300"
              >
                {{ opt }}
              </button>
            </div>

            <!-- Progress -->
            <div class="mt-8 text-sm text-gray-500">
              Question {{ current + 1 }} of {{ questions.length }}
              <div class="w-full bg-gray-200 h-2 mt-2 rounded-full overflow-hidden">
                <div
                  class="h-full bg-[#c6a664] transition-all duration-700 ease-out"
                  :style="{ width: ((current + 1) / questions.length) * 100 + '%' }"
                ></div>
              </div>
            </div>
          </div>

          <!-- Result -->
          <div v-else :key="'result'" class="text-center animate-fadeIn">
            <h2 class="text-2xl font-semibold text-gray-900 mb-5">Your Recommended Product</h2>
            <img
              :src="recommendation.image"
              alt="Recommended product"
              class="h-48 w-auto mx-auto object-contain mb-6 drop-shadow-md"
            />
            <h3 class="text-xl font-bold text-[#c6a664] mb-2">{{ recommendation.title }}</h3>
            <p class="text-gray-700 mb-8 max-w-md mx-auto leading-relaxed">
              {{ recommendation.desc }}
            </p>

            <div class="flex justify-center gap-4">
              <a
                href="/products"
                class="px-6 py-3 bg-[#c6a664] text-white rounded-full hover:bg-[#b49755] shadow-md hover:shadow-lg transition-all"
              >
                Shop Now
              </a>
              <button
                @click="restart"
                class="px-6 py-3 border border-gray-400 rounded-full hover:bg-gray-100 transition-all"
              >
                Retake Quiz
              </button>
            </div>
          </div>
        </transition>
      </div>
    </section>
  </GuestLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.4s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
