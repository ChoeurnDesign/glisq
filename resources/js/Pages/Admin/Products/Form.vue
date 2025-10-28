<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ product: Object })
const editing = !!props.product

const form = useForm({
  name: props.product?.name ?? '',
  slug: props.product?.slug ?? '',
  description: props.product?.description ?? '',
  formulated_for: props.product?.formulated_for ?? '',
  key_ingredients: props.product?.key_ingredients ?? '',
  recommended_use: props.product?.recommended_use ?? '',
  how_to_apply: props.product?.how_to_apply ?? '',
  key_benefits: props.product?.key_benefits ?? '',
  price: props.product?.price ?? 0,
  is_published: props.product?.is_published ?? false,
  image: null,
})

const submit = () => {
  if (editing) {
    form.post(`/admin/products/${props.product.id}?_method=PUT`, { forceFormData: true })
  } else {
    form.post('/admin/products', { forceFormData: true })
  }
}
</script>

<template>
  <AdminLayout>
    <h2 class="text-2xl font-serif font-semibold mb-6 text-gray-900">
      {{ editing ? 'Edit Product' : 'Create Product' }}
    </h2>

    <form
      @submit.prevent="submit"
      class="grid gap-5 max-w-3xl bg-white border rounded-2xl shadow-sm p-8"
    >
      <!-- 🧴 Basic Info -->
      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Name</label>
        <input
          v-model="form.name"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Product Name"
        />
      </div>

      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Slug (optional)</label>
        <input
          v-model="form.slug"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Unique Slug"
        />
      </div>

      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Description</label>
        <textarea
          v-model="form.description"
          rows="4"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Product description..."
        ></textarea>
      </div>

      <!-- 💧 Additional Fields -->
      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Formulated For</label>
        <textarea
          v-model="form.formulated_for"
          rows="3"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Who this product is made for..."
        ></textarea>
      </div>

      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Key Ingredients</label>
        <textarea
          v-model="form.key_ingredients"
          rows="4"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="List of main ingredients, each on a new line..."
        ></textarea>
      </div>

      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Recommended Use</label>
        <textarea
          v-model="form.recommended_use"
          rows="3"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="When and how often to apply..."
        ></textarea>
      </div>

      <div>
        <label class="font-semibold text-gray-800 mb-2 block">How to Apply</label>
        <textarea
          v-model="form.how_to_apply"
          rows="4"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Steps for correct application..."
        ></textarea>
      </div>

      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Key Benefits</label>
        <textarea
          v-model="form.key_benefits"
          rows="3"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Short bullet benefits for display"
        ></textarea>
      </div>

      <!-- 💲 Price -->
      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Price ($)</label>
        <input
          v-model.number="form.price"
          type="number"
          step="0.01"
          min="0"
          class="border rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-[#c6a664]"
          placeholder="Product price"
        />
      </div>

      <!-- 🖼️ Image Upload -->
      <div>
        <label class="font-semibold text-gray-800 mb-2 block">Product Image</label>
        <input
          type="file"
          @change="e => form.image = e.target.files[0]"
          class="border rounded-lg px-4 py-2 w-full"
        />
        <p v-if="props.product?.image_path" class="text-sm text-gray-500 mt-2">
          Current image: <span class="underline">{{ props.product.image_path }}</span>
        </p>
      </div>

      <!-- 🌟 Published -->
      <label class="flex items-center gap-2">
        <input type="checkbox" v-model="form.is_published" class="w-5 h-5" />
        <span class="font-medium text-gray-800">Published</span>
      </label>

      <!-- 💾 Buttons -->
      <div class="flex gap-3 mt-4">
        <button
          class="px-6 py-2.5 rounded-xl bg-[#c6a664] text-white hover:bg-[#b49755] transition disabled:opacity-70"
          :disabled="form.processing"
        >
          Save
        </button>
        <a
          href="/admin/products"
          class="px-6 py-2.5 rounded-xl border hover:bg-gray-100 transition"
        >
          Cancel
        </a>
      </div>

      <!-- ⚠️ Validation Errors -->
      <div v-if="Object.keys(form.errors).length" class="text-red-600 text-sm space-y-1">
        <div v-for="(msg, key) in form.errors" :key="key">{{ msg }}</div>
      </div>
    </form>
  </AdminLayout>
</template>
