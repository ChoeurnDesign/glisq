<script setup>
import { computed } from 'vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  status: String,
})

const form = useForm({})
const submit = () => form.post(route('verification.send'))
const verificationLinkSent = computed(() => props.status === 'verification-link-sent')
</script>

<template>
  <GuestLayout>
    <Head title="Email Verification" />

    <div class="min-h-[80vh] flex items-center justify-center bg-gray-50 px-4">
      <div class="w-full max-w-md bg-white border rounded-2xl shadow-sm p-6 text-center">
        <!-- Icon -->
        <div class="flex justify-center mb-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-12 h-12 text-gray-700"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 
              0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 
              0019.5 4.5H4.5a2.25 2.25 0 00-2.25 
              2.25m19.5 0v.243a2.25 2.25 0 
              01-1.07 1.916l-7.5 4.615a2.25 2.25 
              0 01-2.36 0L3.32 8.91a2.25 2.25 
              0 01-1.07-1.916V6.75"
            />
          </svg>
        </div>

        <!-- Title -->
        <h1 class="text-xl font-semibold text-gray-900 mb-3">Verify Your Email</h1>

        <!-- Description -->
        <p class="text-sm text-gray-600 leading-relaxed mb-4">
          Thanks for signing up! Please verify your email address by clicking on the link
          we just sent to your inbox. Didn’t receive the email? You can request another below.
        </p>

        <!-- Success Message -->
        <div
          v-if="verificationLinkSent"
          class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-3 py-2 text-sm"
        >
          ✅ A new verification link has been sent to the email address you provided during registration.
        </div>

        <!-- Resend Form -->
        <form @submit.prevent="submit" class="space-y-4">
          <PrimaryButton
            class="w-full bg-black text-white rounded-xl hover:bg-gray-800 transition disabled:opacity-50"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Resend Verification Email
          </PrimaryButton>

          <Link
            :href="route('logout')"
            method="post"
            as="button"
            class="w-full text-sm text-gray-600 underline hover:text-gray-900"
          >
            Log Out
          </Link>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>
