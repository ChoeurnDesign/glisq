<script setup>
import { useForm, Head, usePage } from '@inertiajs/vue3'

// ✅ Get user data from backend
const page = usePage()
const user = page.props.user

// ✅ Initialize form with old data
const form = useForm({
  name: user?.name || '',
  email: user?.email || '',
  current_password: '',
  new_password: '',
  confirm_password: '',
})

// Save profile changes
const submit = () => {
  form.patch(route('profile.update'))
}

// ✅ Back button handler
const goBack = () => {
  if (history.length > 1) {
    history.back()
  } else {
    // fallback if user landed directly
    window.location.href = route('dashboard') // change to the route you prefer
  }
}
</script>

<template>
  <Head title="Your Profile" />

  <div class="max-w-3xl mx-auto bg-[#f9f5f0] border rounded-2xl shadow p-8 mt-10 relative">
    <!-- Top-right back button -->
    <button
      @click="goBack"
      class="absolute right-4 top-4 inline-flex items-center gap-2 bg-white border px-3 py-1.5 rounded-lg shadow-sm hover:bg-gray-50"
      type="button"
    >
      <!-- simple chevron -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path d="M15 18l-6-6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Back
    </button>

    <h1 class="text-2xl font-semibold mb-6 pr-24">Profile Settings</h1>

    <!-- Personal Info -->
    <form @submit.prevent="submit" class="space-y-4 mb-8">
      <div>
        <label class="block text-sm mb-1">Full Name</label>
        <input type="text" v-model="form.name" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <div>
        <label class="block text-sm mb-1">Email</label>
        <input type="email" v-model="form.email" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <button
        type="submit"
        class="mt-3 bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800"
        :disabled="form.processing"
      >
        Save Changes
      </button>
    </form>

    <hr class="my-6" />

    <!-- Password Section -->
    <h2 class="text-xl font-semibold mb-4">Change Password</h2>
    <div class="space-y-4">
      <div>
        <label class="block text-sm mb-1">Current Password</label>
        <input type="password" v-model="form.current_password" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <div>
        <label class="block text-sm mb-1">New Password</label>
        <input type="password" v-model="form.new_password" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <div>
        <label class="block text-sm mb-1">Confirm Password</label>
        <input type="password" v-model="form.confirm_password" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <button
        class="mt-3 bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800"
        :disabled="form.processing"
      >
        Update Password
      </button>
    </div>
  </div>
</template>
