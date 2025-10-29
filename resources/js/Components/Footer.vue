<script setup>
</script>

<template>
  <footer class="bg-[#f5f4f0] border-t text-gray-700">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">
      <div class="col-span-2 text-center md:text-left">
        <img src="/images/logo-no-bg.png" alt="GLISQ" class="h-14 mx-auto md:mx-0 mb-4" />
        <p class="text-sm text-gray-600 leading-relaxed max-w-sm mx-auto md:mx-0">
          GLISQ is a Cambodian skincare brand blending the power of silk sericin with science to create
          clean, luxurious beauty.
        </p>
      </div>

      <div class="col-span-2">
        <div class="max-w-md mx-auto md:max-w-none md:mx-0">
          <div class="grid grid-cols-2 gap-8 text-left">
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h3>
              <ul class="space-y-2 text-sm mb-6">
                <li><a href="/about" class="hover:text-[#c6a664] transition">About Us</a></li>
                <li><a href="/products" class="hover:text-[#c6a664] transition">Products</a></li>
                <li><a href="/science" class="hover:text-[#c6a664] transition">Science</a></li>
                <li><a href="/contact" class="hover:text-[#c6a664] transition">Contact</a></li>
              </ul>

              <div class="flex justify-start gap-5 mt-2">
                <a href="#" aria-label="Instagram" class="hover:opacity-80">
                  <img src="/images/social-icon/instagram.png" alt="Instagram" class="h-6 w-6" />
                </a>
                <a href="#" aria-label="Facebook" class="hover:opacity-80">
                  <img src="/images/social-icon/facebook.png" alt="Facebook" class="h-6 w-6" />
                </a>
                <a href="#" aria-label="TikTok" class="hover:opacity-80">
                  <img src="/images/social-icon/tik-tok.png" alt="TikTok" class="h-6 w-6" />
                </a>
              </div>
            </div>

            <div class="text-left">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Customer Care</h3>
              <ul class="space-y-2 text-sm">
                <li><a href="/faq" class="hover:text-[#c6a664] transition">FAQ</a></li>
                <li><a href="/shipping" class="hover:text-[#c6a664] transition">Shipping & Delivery</a></li>
                <li><a href="/skin-quiz" class="hover:text-[#c6a664] transition">Skin Quiz</a></li>
                <li><a href="/returns" class="hover:text-[#c6a664] transition">Return Policy</a></li>
                <li><a href="/privacy-policy" class="hover:text-[#c6a664] transition">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-200 bg-[#f1f0ed] px-6 py-8">
      <div class="max-w-6xl mx-auto text-center space-y-6">
        <div class="flex flex-wrap justify-center gap-10 items-center">
          <div>
            <p class="text-sm font-medium mb-1 text-gray-700">Implemented by</p>
            <div class="flex justify-center gap-3">
              <img src="/images/sponsor/wonder-logo.png" alt="Wonders" class="h-6 object-contain" />
              <img src="/images/sponsor/nicc-logo.png" alt="NICC" class="h-4 object-contain" />
            </div>
          </div>
          <div>
            <p class="text-sm font-medium mb-1 text-gray-700">Co-funded by</p>
            <img src="/images/sponsor/childfund-korea.png" alt="ChildFund" class="h-7 mx-auto object-contain" />
          </div>
          <div>
            <p class="text-sm font-medium mb-1 text-gray-700">Funded by</p>
            <img src="/images/sponsor/koica-logo.png" alt="KOICA" class="h-6 mx-auto object-contain" />
          </div>
        </div>
        <div>
          <img
            src="/images/sponsor/dynamic.png"
            alt="Dynamic Entrepreneur Spark"
            class="h-10 mx-auto object-contain"
          />
        </div>
      </div>
    </div>

    <div class="border-t border-gray-300 bg-[#f5f4f0] py-5 px-6">
      <div
        class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between text-sm text-gray-600"
      >
        <p class="order-2 md:order-1 mt-3 md:mt-0">
          © {{ new Date().getFullYear() }} GLISQ. All rights reserved.
        </p>
        <p class="order-1 md:order-2 text-gray-500">Discover your natural glow with GLISQ</p>
      </div>
    </div>
  </footer>
</template>