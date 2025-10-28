<script setup>
import { ref, computed } from 'vue'
import { Link, usePage, router } from '@inertiajs/vue3'
import {
  ShoppingCartIcon,
  UserCircleIcon,
  Bars3Icon,
  XMarkIcon
} from '@heroicons/vue/24/outline'
import CartDrawer from '@/Components/CartDrawer.vue'

const page = usePage()
const user = computed(() => page.props?.auth?.user || null)
const roles = computed(() => page.props?.auth?.roles || [])
const isAdmin = computed(() => page.props?.auth?.isAdmin === true || roles.value.includes('admin'))

// 🛒 Cart count from props
const cart = computed(() => page.props?.cart || [])
const cartCount = computed(() =>
  cart.value.reduce((sum, item) => sum + (item.quantity || 0), 0)
)

const showLogoutModal = ref(false)
const showMobileMenu = ref(false)
const showCart = ref(false)

const handleLogout = () => {
  router.post(route('logout'))
  showLogoutModal.value = false
}
</script>

<template>
  <!-- ✅ Header -->
  <header class="border-b border-gray-300 bg-[#F8F0E1] backdrop-blur-md sticky top-0 z-40">
    <div class="max-w-full mx-auto flex items-center justify-between py-2 px-8 relative">
      <!-- Logo -->
      <Link href="/" class="flex items-center">
        <img
          src="/images/logo.png"
          alt="GLISQ Logo"
          class="h-14 w-auto hover:opacity-80 transition duration-200"
        />
      </Link>

      <!-- Desktop Navigation -->
      <nav class="hidden tablet:flex items-center gap-7 font-normal">
        <Link href="/" class="hover:text-gray-600 transition">Home</Link>
        <Link href="/products" class="hover:text-gray-600 transition">Products</Link>
        <Link href="/science" class="hover:text-gray-600 transition">Science</Link>
        <Link href="/testimonials" class="hover:text-gray-600 transition">Testimonials</Link>
        <Link href="/about" class="hover:text-gray-600 transition">About</Link>
        <Link href="/contact" class="hover:text-gray-600 transition">Contact</Link>

        <!-- Authenticated User -->
        <template v-if="user">
          <div class="flex items-center gap-4">
            <!-- Cart Drawer -->
            <button
              @click="showCart = true"
              title="Cart"
              class="relative flex items-center justify-center transition-colors"
            >
              <ShoppingCartIcon class="w-7 h-7 text-gray-700 hover:text-[#c6a664] transition-colors duration-200" />
              <span
                v-if="cartCount > 0"
                class="absolute -top-1.5 -right-2 bg-red-500 text-white text-[10px] font-semibold rounded-full w-4 h-4 flex items-center justify-center"
              >
                {{ cartCount }}
              </span>
            </button>

            <!-- Profile -->
            <Link href="/profile" title="Profile">
              <UserCircleIcon class="w-8 h-8 text-gray-700 hover:text-[#c6a664] transition-colors duration-200" />
            </Link>

            <!-- Admin -->
            <Link
              v-if="isAdmin"
              href="/admin"
              class="px-4 py-1.5 rounded-full border border-gray-900 hover:bg-[#c6a664] hover:text-white transition text-sm"
            >
              Admin
            </Link>

            <!-- Logout -->
            <button
              @click="showLogoutModal = true"
              class="px-2 py-1.5 rounded-full border border-gray-900 hover:bg-[#c6a664] hover:text-white transition text-sm"
            >
              Logout
            </button>
          </div>
        </template>

        <!-- Guest -->
        <template v-else>
          <div class="flex items-center gap-3">
            <Link :href="route('login')" class="px-4 py-1.5 rounded-full border border-gray-900 hover:bg-[#c6a664] hover:text-white transition">Login</Link>
            <Link :href="route('register')" class="px-4 py-1.5 rounded-full border border-gray-900 hover:bg-[#c6a664] hover:text-white transition">Register</Link>
          </div>
        </template>
      </nav>

      <!-- Mobile Section -->
      <div class="tablet:hidden flex items-center gap-4">
        <!-- Mobile Cart -->
        <button
          title="Cart"
          @click="showCart = true"
          class="relative text-gray-800 hover:text-[#c6a664] transition"
        >
          <ShoppingCartIcon class="w-7 h-7" />
          <span
            v-if="cartCount > 0"
            class="absolute -top-1.5 -right-2 bg-red-500 text-white text-[10px] font-semibold rounded-full w-4 h-4 flex items-center justify-center"
          >
            {{ cartCount }}
          </span>
        </button>

        <!-- Menu Toggle -->
        <button
          class="text-gray-800 hover:text-[#c6a664] focus:outline-none"
          @click="showMobileMenu = !showMobileMenu"
        >
          <Bars3Icon v-if="!showMobileMenu" class="w-7 h-7" />
          <XMarkIcon v-else class="w-7 h-7" />
        </button>
      </div>

      <!-- Mobile Dropdown -->
      <transition name="fade">
        <div
          v-if="showMobileMenu"
          class="absolute top-full left-0 w-full bg-gray-200 border-t text-gray-800 px-6 py-4 space-y-3 shadow-lg z-40"
        >
          <Link href="/" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Home</Link>
          <Link href="/products" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Products</Link>
          <Link href="/science" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Science</Link>
          <Link href="/testimonials" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Testimonials</Link>
          <Link href="/about" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">About</Link>
          <Link href="/contact" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Contact</Link>

          <template v-if="user">
            <hr class="my-3 border-gray-400" />
            <button @click="showCart = true; showMobileMenu = false" class="block hover:text-[#c6a664] transition">Cart</button>
            <Link href="/profile" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Profile</Link>
            <Link v-if="isAdmin" href="/admin" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Admin</Link>
            <button @click="showLogoutModal = true; showMobileMenu = false" class="block w-full text-left hover:text-[#c6a664] transition">Logout</button>
          </template>

          <template v-else>
            <hr class="my-3 border-gray-400" />
            <Link :href="route('login')" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Login</Link>
            <Link :href="route('register')" class="block hover:text-[#c6a664]" @click="showMobileMenu = false">Register</Link>
          </template>
        </div>
      </transition>
    </div>

    <!-- Cart Drawer -->
    <CartDrawer v-if="showCart" :key="page.props.cart.length" @close="showCart = false" />
  </header>

  <!-- ✅ Logout Modal (now outside header) -->
  <transition name="fade">
    <div
      v-if="showLogoutModal"
      class="fixed inset-0 flex items-center justify-center bg-black/50 z-[9999]"
    >
      <div class="bg-white rounded-xl shadow-xl p-8 w-[90%] max-w-sm text-center">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to logout?</h2>
        <div class="flex justify-center gap-4 mt-6">
          <button
            @click="handleLogout"
            class="px-5 py-2 bg-black text-white rounded-full hover:bg-[#c6a664] transition"
          >
            Yes, Logout
          </button>
          <button
            @click="showLogoutModal = false"
            class="px-5 py-2 border border-gray-400 rounded-full hover:bg-gray-200 transition"
          >
            Cancel
          </button>
        </div>
      </div>
    </div>
  </transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
