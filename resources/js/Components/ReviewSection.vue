<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import { StarIcon as StarSolid } from '@heroicons/vue/20/solid'
import { StarIcon as StarOutline } from '@heroicons/vue/24/outline'

const props = defineProps({
  product: Object,
  reviews: Array,
  user: Object,
})

const showReviewForm = ref(false)
const isSubmitting = ref(false)

const newReview = ref({
  rating: 0,
  comment: '',
})

// Detect if user already reviewed
const userReview = computed(() => {
  if (!props.user) return null
  return props.reviews.find(r => r.user_id === props.user.id) || null
})

// Pre-fill if editing
function openReviewForm() {
  showReviewForm.value = !showReviewForm.value
  if (userReview.value && showReviewForm.value) {
    newReview.value.rating = userReview.value.rating
    newReview.value.comment = userReview.value.comment
  } else {
    newReview.value = { rating: 0, comment: '' }
  }
}

// Submit or update review
function submitReview() {
  if (!props.user) {
    router.visit('/login')
    return
  }

  isSubmitting.value = true
  router.post(route('reviews.store', props.product.slug), newReview.value, {
    preserveScroll: true,
    onSuccess: () => {
      showReviewForm.value = false
    },
    onFinish: () => (isSubmitting.value = false),
  })
}
</script>

<template>
  <section class="mt-10 border-t border-gray-200 pt-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <h2 class="text-2xl font-serif text-gray-900">Customer Reviews</h2>
      <button
        @click="openReviewForm"
        class="mt-4 md:mt-0 px-6 py-2 bg-[#c6a664] text-white rounded-full shadow hover:bg-[#b49755] transition-all duration-300"
      >
        {{ showReviewForm ? 'Cancel' : (userReview ? 'Edit Your Review' : 'Write a Review') }}
      </button>
    </div>

    <!-- Review Form -->
    <div
      v-if="showReviewForm"
      class="mb-8 bg-[#f9f5f0] p-6 rounded-2xl shadow-inner border border-gray-200"
    >
      <h3 class="text-xl font-serif text-gray-900 mb-4">
        {{ userReview ? 'Edit Your Review' : 'Share Your Experience' }}
      </h3>

      <div class="space-y-5">
        <!-- Rating Stars -->
        <div class="flex items-center gap-2">
          <span class="text-gray-700 font-medium">Your Rating:</span>
          <div class="flex">
            <button
              v-for="i in 5"
              :key="i"
              @click="newReview.rating = i"
              class="focus:outline-none"
            >
              <component
                :is="i <= newReview.rating ? StarSolid : StarOutline"
                class="h-6 w-6 transition-all duration-150"
                :class="i <= newReview.rating
                  ? 'text-[#c6a664]'
                  : 'text-white stroke-gray-400 stroke-[1]'"
              />  
            </button>
          </div>
        </div>

        <!-- Comment -->
        <textarea
          v-model="newReview.comment"
          rows="3"
          placeholder="Write your review..."
          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#c6a664] focus:outline-none resize-none bg-white/90"
        ></textarea>

        <button
          @click="submitReview"
          :disabled="isSubmitting"
          class="px-6 py-2 bg-[#c6a664] text-white rounded-full shadow-md hover:bg-[#b49755] transition-all duration-300 disabled:opacity-70"
        >
          {{ isSubmitting ? 'Saving...' : (userReview ? 'Update Review' : 'Submit Review') }}
        </button>
      </div>
    </div>

    <!-- Review List -->
    <div v-if="props.reviews.length" class="space-y-6">
      <div
        v-for="(review, index) in props.reviews"
        :key="index"
        class="bg-white p-5 rounded-2xl shadow border border-gray-100"
      >
        <!-- Reviewer Info -->
        <div class="flex justify-between items-center mb-2">
          <div>
            <!-- ✅ Reviewer Name -->
            <h3 class="font-semibold text-lg text-gray-900">
              {{ review.user?.name || review.name || 'Anonymous' }}
            </h3>

            <!-- ✅ Star Rating -->
            <div class="flex mt-1 text-[#c6a664] text-sm">
              <component
                v-for="i in 5"
                :key="i"
                :is="i <= review.rating ? StarSolid : StarOutline"
                class="h-5 w-5"
                :class="i <= review.rating 
                  ? 'text-[#c6a664]' 
                  : 'text-gray-300 stroke-gray-400 stroke-[1]'"
              />
            </div>
          </div>

          <!-- ✅ Review Date -->
          <span class="text-sm text-gray-400">
            {{ new Date(review.created_at).toLocaleDateString() }}
          </span>
        </div>

        <!-- ✅ Review Comment -->
        <p class="text-gray-700 leading-relaxed">
          {{ review.comment }}
        </p>
      </div>
    </div>

    <!-- No Reviews Yet -->
    <p v-else class="text-center text-gray-500 italic mt-6">
      No reviews yet. Be the first to share your thoughts!
    </p>
  </section>
</template>
