<script setup>
  import { MapPinIcon, PhoneIcon, EnvelopeIcon } from '@heroicons/vue/24/outline'
</script>

<template>
  <footer class="border-t bg-[#dcdcdc] mt-16">
    <!-- Top Section -->
    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-4 gap-8 text-sm text-gray-700">
      <!-- Brand Info -->
      <div>
        <img src="/images/logo-no-bg.png" alt="GLISQ" class="h-14 mb-3" />
        <p class="text-gray-600 leading-relaxed">
          GLISQ is a Cambodian skincare brand combining the natural power of silk sericin with science
          to create clean, effective beauty.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="text-center md:text-left">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Quick Links</h3>
        <ul class="space-y-2">
          <li><a href="/about" class="hover:text-[#c6a664] transition">About Us</a></li>
          <li><a href="/products" class="hover:text-[#c6a664] transition">Products</a></li>
          <li><a href="/science" class="hover:text-[#c6a664] transition">Science</a></li>
          <li><a href="/contact" class="hover:text-[#c6a664] transition">Contact</a></li>
        </ul>
      </div>

      <!-- Customer Care -->
      <div class="text-center md:text-left">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Customer Care</h3>
        <ul class="space-y-2">
          <li><a href="/faq" class="hover:text-[#c6a664] transition">FAQ</a></li>
          <li><a href="/shipping" class="hover:text-[#c6a664] transition">Shipping & Delivery</a></li>
          <li><a href="/skin-quiz" class="hover:text-[#c6a664] transition">Skin Quiz</a></li>
          <li><a href="/returns" class="hover:text-[#c6a664] transition">Return Policy</a></li>
          <li><a href="/privacy-policy" class="hover:text-[#c6a664] transition">Privacy Policy</a></li>
          <li><a href="/terms" class="hover:text-[#c6a664] transition">Terms of Service</a></li>
        </ul>
      </div>

      <!-- Contact + Social Icons -->
      <div class="text-center md:text-right">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Contact Us</h3>
        <div class="flex justify-center md:justify-end items-center gap-2 text-gray-700">
          <MapPinIcon class="h-5 w-5 text-[#c6a664]" />
          <p>Phnom Penh, Cambodia</p>
        </div>
        <div class="flex justify-center md:justify-end items-center gap-2 text-gray-700 mt-2">
          <PhoneIcon class="h-5 w-5 text-[#c6a664]" />
          <p>+855 70 229 710</p>
        </div>
        <div class="flex justify-center md:justify-end items-center gap-2 text-gray-700 mt-2 mb-4">
          <EnvelopeIcon class="h-5 w-5 text-[#c6a664]" />
          <p>support@glisq.com</p>
        </div>

        <div class="flex justify-center md:justify-end gap-5 mt-3">
          <a href="#" aria-label="Instagram" class="hover:opacity-80">
            <img src="/images/social-icon/instagram.png" alt="Instagram" class="h-7 w-7" />
          </a>
          <a href="#" aria-label="Facebook" class="hover:opacity-80">
            <img src="/images/social-icon/facebook.png" alt="Facebook" class="h-7 w-7" />
          </a>
          <a href="#" aria-label="TikTok" class="hover:opacity-80">
            <img src="/images/social-icon/tik-tok.png" alt="TikTok" class="h-7 w-7" />
          </a>
        </div>
      </div>
    </div>

    <!-- Sponsor Section -->
    <div class="bg-[#dcdcdc] border-t border-gray-200 px-6 py-6">
      <div class="max-w-6xl mx-auto text-center">
        <div class="flex flex-col items-center justify-center">
          <div
            class="flex flex-col sm:flex-row sm:flex-wrap justify-center items-center gap-8 text-gray-800 text-sm font-medium"
          >
            <!-- Implemented by -->
            <div class="flex flex-col items-center w-full sm:w-auto">
              <p class="mb-1 font-medium">Implemented by</p>
              <div class="flex items-center justify-center gap-4">
                <img src="/images/Sponsor/wonder-logo.png" alt="Wonders" class="h-8 object-contain" />
                <img src="/images/Sponsor/nicc-logo.png" alt="NICC" class="h-5 object-contain" />
              </div>
            </div>

            <!-- Co-funded by -->
            <div class="flex flex-col items-center w-full sm:w-auto">
              <p class="mb-1 font-medium">Co-funded by</p>
              <img
                src="/images/Sponsor/childfund-korea.png"
                alt="ChildFund Korea"
                class="h-8 object-contain mx-auto"
              />
            </div>

            <!-- Funded by -->
            <div class="flex flex-col mb-2 items-center w-full sm:w-auto">
              <p class="mb-1 font-medium">Funded by</p>
              <img
                src="/images/Sponsor/koica-logo.png"
                alt="KOICA"
                class="h-6 object-contain mx-auto"
              />
            </div>
          </div>

          <!-- Dynamic Entrepreneur Spark -->
          <div class="text-center mt-6">
            <img
              src="/images/Sponsor/dynamic.png"
              alt="Dynamic Entrepreneur Spark"
              class="h-12 mx-auto object-contain"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-200 px-6 py-5">
      <div
        class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between text-sm text-gray-600"
      >
        <p class="order-2 md:order-1 mt-4 md:mt-0">
          © {{ new Date().getFullYear() }} GLISQ. All rights reserved.
        </p>
        <p class="order-1 md:order-2 text-gray-500">Discover your natural glow with Glisq</p>
      </div>
    </div>
  </footer>
</template>
