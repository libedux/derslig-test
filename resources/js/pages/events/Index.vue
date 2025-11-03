<script setup>
import { Link } from '@inertiajs/vue3'

// Props from Laravel controller
defineProps({
  events: {
    type: Array,
    default: () => [],
  },
})
</script>

<template>
  <section class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <!-- Heading -->
      <div class="mb-10 md:mb-16 text-center">
        <h2 class="mb-4 text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
          Derslig Events
        </h2>
      </div>

      <!-- Grid -->
      <div
        class="grid gap-8 sm:grid-cols-2 sm:gap-12 lg:grid-cols-2 xl:grid-cols-2 xl:gap-16"
      >
        <!-- event Card -->
        <article
          v-for="event in events"
          :key="event.id"
          class="flex flex-col items-center gap-4 md:flex-row lg:gap-6"
        >
          <Link
            :href="`/events/${event.id}`"
            class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40"
          >
            <img
              :src="event.image_url"
              :alt="event.title"
              loading="lazy"
              class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
            />
          </Link>

          <div class="flex flex-col gap-2">
            <span class="text-sm text-gray-400">
              {{ formatDate(event.event_date) }}
            </span>

            <h2 class="text-xl font-bold text-gray-800">
              <Link
                :href="`/events/${event.id}`"
                class="transition duration-100 hover:text-rose-500 active:text-rose-600"
              >
                {{ event.title }}
              </Link>
            </h2>

            <p class="text-gray-500 line-clamp-3">
              {{ event.description }}
            </p>

            <div>
              <Link
                :href="`/events/${event.id}`"
                class="font-semibold text-rose-500 transition duration-100 hover:text-rose-600 active:text-rose-700"
              >
                Read more
              </Link>
            </div>
          </div>
        </article>
        <!-- /event Card -->
      </div>
    </div>
  </section>
</template>

<script>
export default {
  methods: {
    formatDate(date) {
      if (!date) return ''
      return new Date(date).toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric',
      })
    },
  },
}
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>