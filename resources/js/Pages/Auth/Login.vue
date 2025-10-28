<script setup>
import { useForm, Link, Head } from '@inertiajs/vue3'

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}

// Google login redirect
const loginWithGoogle = () => {
  window.location.href = route('google.redirect')
}
</script>

<template>
  <Head title="Log in" />

  <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-md bg-white border rounded-2xl p-6 shadow-sm">
      <h1 class="text-2xl font-semibold mb-5 text-center">Log in</h1>

      <!-- Email / Password Form -->
      <form @submit.prevent="submit" class="grid gap-4">
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            class="w-full border rounded-lg px-3 py-2"
            autocomplete="username"
          />
          <div v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</div>
        </div>

        <div>
          <label class="block text-sm mb-1">Password</label>
          <input
            v-model="form.password"
            type="password"
            required
            class="w-full border rounded-lg px-3 py-2"
            autocomplete="current-password"
          />
          <div v-if="form.errors.password" class="text-sm text-red-600 mt-1">{{ form.errors.password }}</div>
        </div>

        <label class="inline-flex items-center gap-2 text-sm">
          <input type="checkbox" v-model="form.remember" />
          <span>Remember me</span>
        </label>

        <button
          :disabled="form.processing"
          class="w-full rounded-xl bg-black text-white py-2.5 disabled:opacity-50"
        >
          Log in
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
        <span class="text-gray-600">Don't have an account?</span>
        <Link href="/register" class="underline ml-1">Register</Link>
      </div>
    </div>
  </div>
</template>
