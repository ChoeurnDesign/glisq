<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Form from './Form.vue'

defineProps({
  product: Object, // provided by controller
})
</script>

<template>
  <AdminLayout>
    <Form :product="product" />
  </AdminLayout>
</template>
