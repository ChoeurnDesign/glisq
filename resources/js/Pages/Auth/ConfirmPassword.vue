<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = useForm({
  password: '',
})

const showPassword = ref(false)

const submit = () => {
  form.post(route('password.confirm'), {
    onFinish: () => form.reset(),
  })
}
</script>

<template>
  <GuestLayout>
    <Head title="Confirm Password" />

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
              d="M16.5 10.5V6.75a4.5 4.5 0 00-9 0v3.75m-.75 
              11.25h10.5a2.25 2.25 0 002.25-2.25V12a2.25 
              2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 
              004.5 12v7.5a2.25 2.25 0 002.25 2.25z"
            />
          </svg>
        </div>

        <!-- Title -->
        <h1 class="text-xl font-semibold text-gray-900 mb-3">Confirm Your Password</h1>
        <p class="text-sm text-gray-600 mb-6 leading-relaxed">
          This is a secure area of the site. Please confirm your password before continuing.
        </p>

        <!-- Form -->
        <form @submit.prevent="submit" class="space-y-4 text-left">
          <div>
            <label class="block text-sm mb-1">Password</label>
            <div class="relative">
              <input
                v-model="form.password"
                :type="showPassword ? 'text' : 'password'"
                required
                autofocus
                autocomplete="current-password"
                class="w-full border rounded-lg px-3 py-2 pr-10"
              />
              <button
                type="button"
                @click="showPassword = !showPassword"
                class="absolute right-3 top-2.5 text-gray-500 hover:text-gray-700"
              >
                <!-- Show icon -->
                <svg
                  v-if="!showPassword"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 
                    7.51 7.36 4.5 12 4.5c4.638 0 8.573 
                    3.007 9.963 7.178.07.207.07.431 0 
                    .639C20.577 16.49 16.64 19.5 12 
                    19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                  />
                </svg>

                <!-- Hide icon -->
                <svg
                  v-else
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 
                    16.338 7.244 19.5 12 19.5c.993 0 
                    1.953-.138 2.863-.395M6.228 
                    6.228A10.451 10.451 0 0 1 12 
                    4.5c4.756 0 8.773 3.162 10.065 
                    7.498a10.522 10.522 0 0 1-4.293 
                    5.774M6.228 6.228 3 
                    3m3.228 3.228 3.65 3.65m7.894 
                    7.894L21 21m-3.228-3.228-3.65-3.65m0 
                    0a3 3 0 1 0-4.243-4.243m4.242 
                    4.242L9.88 9.88"
                  />
                </svg>
              </button>
            </div>

            <div v-if="form.errors.password" class="text-sm text-red-600 mt-1">
              {{ form.errors.password }}
            </div>
          </div>

          <button
            :disabled="form.processing"
            class="w-full rounded-xl bg-black text-white py-2.5 disabled:opacity-50 hover:bg-gray-800 transition"
          >
            Confirm Password
          </button>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>
