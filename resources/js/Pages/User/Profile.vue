    <script setup>
import { useForm } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'
const props = defineProps({ user: Object })

const form = useForm({
  name: props.user.name,
  email: props.user.email,
  password: '',
  password_confirmation: ''
})
</script>

<template>
  <AuthLayout>
    <h2 class="text-2xl font-semibold mb-4">Profile</h2>
    <form @submit.prevent="form.patch(route('profile.update'))" class="grid gap-4 max-w-lg">
      <input v-model="form.name" class="border rounded-lg px-4 py-3" placeholder="Name" />
      <input v-model="form.email" class="border rounded-lg px-4 py-3" placeholder="Email" type="email"/>
      <input v-model="form.password" class="border rounded-lg px-4 py-3" placeholder="New Password" type="password"/>
      <input v-model="form.password_confirmation" class="border rounded-lg px-4 py-3" placeholder="Confirm Password" type="password"/>
      <button class="rounded-xl bg-black text-white px-5 py-3" :disabled="form.processing">Save</button>
    </form>

    <div class="mt-10">
      <form method="post" :action="route('profile.destroy')" onsubmit="return confirm('Delete account?');">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" :value="(window).Laravel?.csrfToken ?? document.querySelector('meta[name=csrf-token]')?.content">
        <input required name="password" type="password" class="border rounded-lg px-4 py-3 mt-3" placeholder="Confirm password to delete">
        <button class="ml-2 rounded-xl bg-red-600 text-white px-5 py-3">Delete Account</button>
      </form>
    </div>
  </AuthLayout>
</template>
