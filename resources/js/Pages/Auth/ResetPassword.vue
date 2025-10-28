<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
  email: { type: String, required: true },
  token: { type: String, required: true },
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('password.store'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Reset Password - GLISQ" />

    <div class="min-h-screen flex items-center justify-center bg-[#FAF9F7] px-4">
      <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-10">
        <!-- Header -->
        <div class="text-center mb-8">
          <h1 class="text-3xl font-serif font-semibold text-gray-900">Reset Your Password</h1>
          <p class="text-gray-500 mt-2 text-sm">
            Enter your new password to regain access to your GLISQ account.
          </p>
        </div>

        <!-- Form -->
        <form @submit.prevent="submit" class="space-y-5">
          <div>
            <InputLabel for="email" value="Email Address" />
            <TextInput
              id="email"
              type="email"
              v-model="form.email"
              required
              autofocus
              autocomplete="username"
              class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
            />
            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div>
            <InputLabel for="password" value="New Password" />
            <TextInput
              id="password"
              type="password"
              v-model="form.password"
              required
              autocomplete="new-password"
              class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
            />
            <InputError class="mt-2" :message="form.errors.password" />
          </div>

          <div>
            <InputLabel for="password_confirmation" value="Confirm Password" />
            <TextInput
              id="password_confirmation"
              type="password"
              v-model="form.password_confirmation"
              required
              autocomplete="new-password"
              class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
            />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
          </div>

          <PrimaryButton
            class="w-full mt-6 justify-center bg-gray-900 text-white py-3 rounded-lg hover:bg-gray-800 transition shadow-md"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Reset Password
          </PrimaryButton>
        </form>

        <!-- Back to login -->
        <div class="text-center mt-6 text-sm">
          <p class="text-gray-600">
            Remember your password?
            <a href="/login" class="text-gray-900 font-medium hover:underline">Sign in</a>
          </p>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
