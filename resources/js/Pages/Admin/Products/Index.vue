<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import {
  PlusIcon,
  PencilSquareIcon,
  TrashIcon,
} from '@heroicons/vue/24/outline'

defineProps({ products: Object })

const destroyItem = (id) => {
  if (confirm('Delete this product?')) {
    router.delete(`/admin/products/${id}`)
  }
}
</script>

<template>
  <AdminLayout>
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-semibold">Products</h2>

      <Link
        href="/admin/products/create"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
      >
        <PlusIcon class="w-5 h-5" />
        Add Product
      </Link>
    </div>

    <div class="bg-white border rounded-2xl overflow-hidden">
      <table class="w-full text-left">
        <thead class="bg-gray-50">
          <tr class="text-sm text-gray-600">
            <th class="p-3">ID</th>
            <th class="p-3">Name</th>
            <th class="p-3">Price</th>
            <th class="p-3">Published</th>
            <th class="p-3 w-40">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="p in products.data" :key="p.id" class="border-t">
            <td class="p-3">{{ p.id }}</td>
            <td class="p-3">{{ p.name }}</td>
            <td class="p-3">${{ Number(p.price).toFixed(2) }}</td>
            <td class="p-3">
              <span
                :class="p.is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600'"
                class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded-full"
              >
                {{ p.is_published ? 'Published' : 'Draft' }}
              </span>
            </td>
            <td class="p-3">
              <div class="flex items-center gap-2">
                <Link
                  :href="`/admin/products/${p.id}/edit`"
                  class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border hover:bg-gray-50"
                  title="Edit"
                >
                  <PencilSquareIcon class="w-5 h-5" />
                  <span class="text-sm">Edit</span>
                </Link>

                <button
                  class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50"
                  @click="destroyItem(p.id)"
                  title="Delete"
                >
                  <TrashIcon class="w-5 h-5" />
                  <span class="text-sm">Delete</span>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Pagination (quick) -->
      <div class="p-3 text-sm text-gray-600">
        Page {{ products.current_page }} of {{ products.last_page }}
      </div>
    </div>
  </AdminLayout>
</template>
