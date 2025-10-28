<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

defineProps({
  status: String,
})

const form = useForm({
  email: '',
})

const submit = () => {
  form.post(route('password.email'))
}
</script>

<template>
  <GuestLayout>
    <Head title="Forgot Password" />

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
              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 
              2.25H4.5A2.25 2.25 0 012.25 
              17.25V6.75m19.5 0A2.25 2.25 
              0 0019.5 4.5H4.5a2.25 2.25 
              0 00-2.25 2.25m19.5 0v.243a2.25 
              2.25 0 01-1.07 1.916l-7.5 4.615a2.25 
              2.25 0 01-2.36 0L3.32 8.91a2.25 
              2.25 0 01-1.07-1.916V6.75"
            />
          </svg>
        </div>

        <!-- Title -->
        <h1 class="text-xl font-semibold text-gray-900 mb-3">Forgot Your Password?</h1>

        <!-- Message -->
        <p class="text-sm text-gray-600 mb-5 leading-relaxed">
          No problem. Enter your email address below, and we’ll send you a secure link to reset your password.
        </p>

        <!-- Success Message -->
        <div v-if="status" class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-3 py-2 text-sm">
          {{ status }}
        </div>

        <!-- Form -->
        <form @submit.prevent="submit" class="space-y-4 text-left">
          <div>
            <label class="block text-sm mb-1">Email Address</label>
            <input
              v-model="form.email"
              type="email"
              required
              autofocus
              autocomplete="username"
              class="w-full border rounded-lg px-3 py-2"
              placeholder="you@example.com"
            />
            <div v-if="form.errors.email" class="text-sm text-red-600 mt-1">
              {{ form.errors.email }}
            </div>
          </div>

          <button
            :disabled="form.processing"
            class="w-full rounded-xl bg-black text-white py-2.5 disabled:opacity-50 hover:bg-gray-800 transition"
          >
            Email Password Reset Link
          </button>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>
