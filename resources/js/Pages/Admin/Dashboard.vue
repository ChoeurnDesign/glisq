<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
// import { Users, Package, ShoppingBag } from 'lucide-vue-next'

defineProps({ stats: Object })
</script>

<template>
  <AdminLayout>
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Overview</h1>
      <p class="text-gray-500">Quick summary of system activity and performance</p>
    </div>

    <div class="grid gap-6 sm:grid-cols-3">
      <!-- Users -->
      <div
        class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300"
      >
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm font-medium">Users</p>
            <p class="text-4xl font-bold text-gray-800 mt-1">{{ stats.users }}</p>
          </div>
          <div class="bg-blue-500 text-white p-3 rounded-xl">
            <Users class="w-6 h-6" />
          </div>
        </div>
      </div>

      <!-- Products -->
      <div
        class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300"
      >
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm font-medium">Products</p>
            <p class="text-4xl font-bold text-gray-800 mt-1">{{ stats.products }}</p>
          </div>
          <div class="bg-green-500 text-white p-3 rounded-xl">
            <Package class="w-6 h-6" />
          </div>
        </div>
      </div>

      <!-- Sales -->
      <div
        class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300"
      >
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm font-medium">Sales</p>
            <p class="text-4xl font-bold text-gray-800 mt-1">{{ stats.sales }}</p>
          </div>
          <div class="bg-purple-500 text-white p-3 rounded-xl">
            <ShoppingBag class="w-6 h-6" />
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped>
h1 {
  letter-spacing: -0.5px;
}
</style>
