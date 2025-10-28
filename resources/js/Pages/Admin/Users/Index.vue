<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  users: Object
})
</script>

<template>
  <AdminLayout>
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">User Management</h1>
      <p class="text-gray-500">Manage users and their roles</p>
    </div>

    <div class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
      <table class="min-w-full text-sm text-gray-700">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
          <tr>
            <th class="py-3 px-4 text-left">ID</th>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Roles</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users.data" :key="user.id" class="border-t hover:bg-gray-50">
            <td class="py-3 px-4">{{ user.id }}</td>
            <td class="py-3 px-4 font-medium">{{ user.name }}</td>
            <td class="py-3 px-4">{{ user.email }}</td>
            <td class="py-3 px-4">
              <span
                v-for="(role, i) in user.roles"
                :key="i"
                class="bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded mr-1"
              >
                {{ role }}
              </span>
            </td>
            <td class="py-3 px-4">
              <Link
                :href="route('admin.users.destroy', user.id)"
                method="delete"
                as="button"
                class="text-red-500 hover:text-red-700"
              >
                Delete
              </Link>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="flex justify-between items-center p-4 text-sm text-gray-600">
        <span>Showing {{ users.from }} - {{ users.to }} of {{ users.total }}</span>

        <div class="flex gap-2">
          <Link
            v-if="users.prev_page_url"
            :href="users.prev_page_url"
            class="px-3 py-1 border rounded hover:bg-gray-100"
          >
            Previous
          </Link>
          <Link
            v-if="users.next_page_url"
            :href="users.next_page_url"
            class="px-3 py-1 border rounded hover:bg-gray-100"
          >
            Next
          </Link>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
