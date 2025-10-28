<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const showPassword = ref(false)
const showConfirm = ref(false)

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
// Google login redirect
const loginWithGoogle = () => {
  window.location.href = route('google.redirect')
}
</script>

<template>
  <Head title="Create Account" />

  <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-md bg-white border rounded-2xl p-6 shadow-sm">
      <h1 class="text-2xl font-semibold mb-5 text-center">Create Account</h1>

      <form @submit.prevent="submit" class="grid gap-4">
        <!-- Full Name -->
        <div>
          <label class="block text-sm mb-1">Full Name</label>
          <input v-model="form.name" type="text" required class="w-full border rounded-lg px-3 py-2" />
          <div v-if="form.errors.name" class="text-sm text-red-600 mt-1">{{ form.errors.name }}</div>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input v-model="form.email" type="email" required class="w-full border rounded-lg px-3 py-2" />
          <div v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</div>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm mb-1">Password</label>
          <div class="relative">
            <input
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              required
              class="w-full border rounded-lg px-3 py-2 pr-10"
            />
            <button
              type="button"
              @click="showPassword = !showPassword"
              class="absolute right-3 top-2.5 text-gray-500 hover:text-gray-700"
            >
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
                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 
                  12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 
                  .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 
                  0-8.573-3.007-9.963-7.178Z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
              </svg>

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
                  d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 
                  12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 
                  10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 
                  10.522 0 0 1-4.293 5.774M6.228 6.228 3 
                  3m3.228 3.228 3.65 3.65m7.894 
                  7.894L21 21m-3.228-3.228-3.65-3.65m0 
                  0a3 3 0 1 0-4.243-4.243m4.242 
                  4.242L9.88 9.88"
                />
              </svg>
            </button>
          </div>
          <div v-if="form.errors.password" class="text-sm text-red-600 mt-1">{{ form.errors.password }}</div>
        </div>

        <!-- Confirm Password -->
        <div>
          <label class="block text-sm mb-1">Confirm Password</label>
          <div class="relative">
            <input
              v-model="form.password_confirmation"
              :type="showConfirm ? 'text' : 'password'"
              required
              class="w-full border rounded-lg px-3 py-2 pr-10"
            />
            <button
              type="button"
              @click="showConfirm = !showConfirm"
              class="absolute right-3 top-2.5 text-gray-500 hover:text-gray-700"
            >
              <svg
                v-if="!showConfirm"
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
                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 
                  12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 
                  .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 
                  0-8.573-3.007-9.963-7.178Z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
              </svg>

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
                  d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 
                  12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 
                  10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 
                  10.522 0 0 1-4.293 5.774M6.228 6.228 3 
                  3m3.228 3.228 3.65 3.65m7.894 
                  7.894L21 21m-3.228-3.228-3.65-3.65m0 
                  0a3 3 0 1 0-4.243-4.243m4.242 
                  4.242L9.88 9.88"
                />
              </svg>
            </button>
          </div>
          <div v-if="form.errors.password_confirmation" class="text-sm text-red-600 mt-1">
            {{ form.errors.password_confirmation }}
          </div>
        </div>

        <!-- Submit -->
        <button
          :disabled="form.processing"
          class="w-full rounded-xl bg-black text-white py-2.5 disabled:opacity-50"
        >
          Register
        </button>
      </form>

      <!-- OR Divider -->
      <div class="flex items-center my-6">
        <div class="flex-grow h-px bg-gray-200"></div>
        <span class="px-3 text-gray-500 text-sm">OR</span>
        <div class="flex-grow h-px bg-gray-200"></div>
      </div>

      <!-- Google Login Button -->
      <button
        @click="loginWithGoogle"
        class="w-full flex items-center justify-center gap-3 border border-gray-400 rounded-full py-2.5 hover:bg-gray-50 transition"
      >
        <img src="/images/google.png" alt="Google" class="w-5 h-5" />
        <span class="text-gray-700 font-medium">Continue with Google</span>
      </button>

      <div class="text-sm text-center mt-4">
        <span class="text-gray-600">Already have an account?</span>
        <Link href="/login" class="underline ml-1">Log in</Link>
      </div>
    </div>
  </div>
</template>
