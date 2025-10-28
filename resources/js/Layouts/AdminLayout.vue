<script setup>
import { ref, computed } from 'vue'
import { Link, router, usePage } from '@inertiajs/vue3'
import {
  HomeIcon, CubeIcon, ChatBubbleLeftRightIcon, InformationCircleIcon,
  UsersIcon, Bars3Icon, XMarkIcon, ArrowRightOnRectangleIcon,
} from '@heroicons/vue/24/outline'

const page = usePage()
const url = computed(() => page.url || '/')
const sidebarOpen = ref(false)
const logout = () => router.post(route('logout'))

const nav = [
  { label: 'Dashboard', href: '/admin',          icon: HomeIcon },
  { label: 'Products',  href: '/admin/products', icon: CubeIcon },
  { label: 'Reviews',   href: '/admin/reviews',  icon: ChatBubbleLeftRightIcon }, // ensure route exists
  { label: 'About',     href: '/admin/about',    icon: InformationCircleIcon },
  { label: 'Users',     href: '/admin/users',    icon: UsersIcon },
]

// ✅ exact match for /admin; prefix match for others
const isActive = (href) => {
  return href === '/admin'
    ? (url.value === '/admin' || url.value === '/admin/')
    : (url.value === href || url.value.startsWith(href + '/'))
}
</script>

<template>
  <div class="min-h-screen flex bg-rose-50/40">
    <!-- Sidebar (desktop) -->
    <aside class="hidden md:flex md:flex-col w-64 bg-white/80 backdrop-blur border-r border-gray-300">
      <div class="h-16 flex items-center justify-between px-5 border-b border-gray-300">
        <Link href="/admin" class="font-semibold tracking-wide text-rose-900">
          GLISQ Admin
        </Link>
      </div>

      <nav class="flex-1 px-3 py-4 space-y-1">
        <Link
          v-for="item in nav"
          :key="item.href"
          :href="item.href"
          class="flex items-center gap-3 px-3 py-2 rounded-xl transition"
          :class="isActive(item.href)
            ? 'bg-rose-100 text-rose-900 ring-1 ring-rose-200'
            : 'text-slate-700 hover:bg-rose-50 hover:text-rose-900'"
        >
          <component :is="item.icon" class="w-5 h-5" />
          <span>{{ item.label }}</span>
        </Link>
      </nav>

      <div class="p-4 border-t border-gray-300">
        <button
          type="button"
          @click="logout"
          class="w-full px-3 py-2 text-sm rounded-xl border border-rose-200 text-rose-700 hover:bg-rose-50 flex items-center justify-center gap-2"
        >
          <ArrowRightOnRectangleIcon class="w-5 h-5" />
          Logout
        </button>
      </div>
    </aside>

    <!-- Mobile sidebar (overlay) -->
    <transition name="fade">
      <div v-if="sidebarOpen" class="fixed inset-0 z-40 md:hidden">
        <div class="absolute inset-0 bg-black/30" @click="sidebarOpen=false"></div>
        <aside class="absolute inset-y-0 left-0 w-72 bg-white/95 border-r border-gray-300 shadow-xl z-50 flex flex-col">
          <div class="h-16 flex items-center justify-between px-5 border-b border-gray-300">
            <Link href="/admin" class="font-semibold text-rose-900" @click="sidebarOpen=false">GLISQ Admin</Link>
            <button class="p-2 rounded hover:bg-rose-50" @click="sidebarOpen=false" aria-label="Close">
              <XMarkIcon class="w-6 h-6" />
            </button>
          </div>
          <nav class="flex-1 px-3 py-4 space-y-1">
            <Link
              v-for="item in nav"
              :key="item.href + '-m'"
              :href="item.href"
              @click="sidebarOpen=false"
              class="flex items-center gap-3 px-3 py-2 rounded-xl transition"
              :class="isActive(item.href)
                ? 'bg-rose-100 text-rose-900 ring-1 ring-rose-200'
                : 'text-slate-700 hover:bg-rose-50 hover:text-rose-900'"
            >
              <component :is="item.icon" class="w-5 h-5" />
              <span>{{ item.label }}</span>
            </Link>
          </nav>
          <div class="p-4 border-t border-gray-300">
            <button
              type="button"
              @click="logout(); sidebarOpen=false"
              class="w-full px-3 py-2 text-sm rounded-xl border border-rose-200 text-rose-700 hover:bg-rose-50 flex items-center justify-center gap-2"
            >
              <ArrowRightOnRectangleIcon class="w-5 h-5" />
              Logout
            </button>
          </div>
        </aside>
      </div>
    </transition>

    <!-- Main -->
    <div class="flex-1 min-w-0">
      <!-- Top bar with requested bottom border -->
      <header class="h-16 bg-white/80 backdrop-blur border-b border-gray-300 flex items-center px-4 md:px-6">
        <button class="md:hidden mr-3 p-2 rounded-lg hover:bg-rose-50" @click="sidebarOpen=true" aria-label="Open menu">
          <Bars3Icon class="w-6 h-6 text-rose-900" />
        </button>
        <div class="font-medium text-slate-700">Admin</div>
      </header>

      <main class="p-4 md:p-8">
        <slot />
      </main>
    </div>
  </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity .15s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
