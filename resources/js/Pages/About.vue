<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'

const team = [
  {
    name: "Chun Choeurn",
    role: "IT Development Manager",
    photo: "/images/team/choeurn.png",
    bio: "Develops and manages the website to provide a seamless, engaging digital experience.",
  },
  {
    name: "Sim Siv Gech",
    role: "Project & Financial Manager",
    photo: "/images/team/gech.png",
    bio: "Oversees project planning, budgeting, and coordination to ensure smooth and efficient execution.",
  },
  {
    name: "Mon Ina",
    role: "Marketing & Branding Manager",
    photo: "/images/team/ina.png",
    bio: "Leads marketing campaigns and brand identity to promote the product’s natural and innovative image.",
  },
  {
    name: "Dorn Vannak",
    role: "Operations Manager",
    photo: "/images/team/vannak.png",
    bio: "Handles daily operations, ensuring tasks run efficiently and meet project timelines.",
  },
  {
    name: "Tak Virak Bunnavatthana",
    role: "Business Development Manager",
    photo: "/images/team/vatthana.png",
    bio: "Explores partnerships, market opportunities, and strategies to grow the brand sustainably.",
  },
  {
    name: "Hort Vouchleng",
    role: "Creative Design Manager",
    photo: "/images/team/vouchleang.png",
    bio: "Creates packaging and visual designs that reflect the elegance and purity of silk sericin.",
  },
]
</script>

<template>
  <GuestLayout>
    <!-- Hero Section -->
    <section class="text-center py-20 bg-[#f9f5f0] text-gray-800">
      <h1 class="text-4xl md:text-5xl font-serif mb-4">About GLISQ</h1>
      <p class="max-w-2xl mx-auto text-lg leading-relaxed">
        GLISQ is redefining the Cambodian skincare brand dedicated to transforming the power of silk into modern skincare innovation. Using silk sericin protein, a rare silk-derived ingredient, we create products that hydrate, protect, and renew your skin — naturally.
      </p>

      <p class="max-w-2xl mt-2 mx-auto text-lg leading-relaxed">
          Our mission is to craft effective, sustainable, and accessible skincare that celebrates both the strength and softness within you.
      </p>
    </section>

    <!-- Story Section -->
    <section class="grid md:grid-cols-2 gap-10 items-center py-20 px-8 bg-white">
      <div>
        <img src="/images/our_story.png" alt="GLISQ Story" class="rounded-3xl shadow-lg" />
      </div>
      <div>
        <h2 class="text-3xl font-serif mb-4 text-gray-900">Our Story</h2>
        <p class="text-gray-600 leading-relaxed mb-4">
          Born from curiosity and a love for nature, GLISQ was founded by a team of young Cambodian innovators inspired by the wonders of silk.
        </p>
        <p class="text-gray-600 leading-relaxed">
          From a humble university project to a purpose-driven brand, we’ve stayed true to one belief — that skincare can be both high-performing and kind.
        </p>
        <p class="text-gray-600 leading-relaxed">
          At GLISQ, we combine local craftsmanship, clean ingredients, and scientific precision to deliver beauty that feels authentic and sustainable.
        </p>
      </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-[#f9f5f0] text-center">
      <h2 class="text-3xl font-serif mb-10 text-gray-900">Our Team</h2>
      <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-6">
        <div
          v-for="member in team"
          :key="member.name"
          class="bg-white rounded-2xl shadow p-6 hover:-translate-y-1 transition-transform duration-200"
        >
          <img
            :src="member.photo"
            :alt="member.name"
            class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-[#f9f5f0]"
          />
          <h3 class="text-lg font-semibold text-gray-900">{{ member.name }}</h3>
          <p class="text-sm text-gray-600">{{ member.role }}</p>
          <p class="mt-3 text-gray-500 text-sm leading-relaxed">{{ member.bio }}</p>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
