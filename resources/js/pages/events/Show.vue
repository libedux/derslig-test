<script setup>
import { ref } from 'vue'
import { Link, router, useForm } from '@inertiajs/vue3'

const props =  defineProps({
  selectedEvent: Object,
  categories: Array
})

const form = useForm({
  category_id: '',
})

const handleSelect = () => {
  if (!form.category_id) {
    alert('Please select a category!')
    return
  }

  const eventId = props.selectedEvent.id;
  router.visit(`/seat-plans/${eventId}/${form.category_id}`)
}

</script>

<template>
  <section class="bg-white py-8 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-screen-md px-4 md:px-8">
      <!-- Image -->
      <div class="mb-6 overflow-hidden rounded-xl shadow-lg">
        <img :src="selectedEvent.image_url" :alt="selectedEvent.title" class="h-80 w-full object-cover" />
      </div>

      <!-- Title & Info -->
      <div class="mb-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
          {{ selectedEvent.title }}
        </h1>

        <div class="text-gray-500 space-y-1">
          <p><span class="font-semibold">Date:</span> {{ formatDate(selectedEvent.event_date) }}</p>
          <p><span class="font-semibold">Time:</span> {{ formatTime(selectedEvent.event_date) }}</p>
          <p>
            <span class="font-semibold">Venue:</span>
            {{ selectedEvent.venue?.name }}
          </p>
          <p>
            <span class="font-semibold">Address:</span>
            {{ selectedEvent.venue?.address }}
          </p>
        </div>
      </div>

      <!-- Description -->
      <div class="mb-6">
        <p class="text-gray-600 leading-relaxed">
          {{ selectedEvent.description }}
        </p>
      </div>

      <!-- Ticket Category Selector -->
      <div class="border-t border-gray-200 pt-6 mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-3">
          Choose a Ticket Category
        </h2>

        <select v-model="form.category_id"
          class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3">
          <option value="" disabled>Select a category</option>
          <option v-for="category in categories" :key="category.id" :value="category.id">
            {{ category.name }}
          </option>
        </select>

        <button @click="handleSelect" class="mt-4 px-6 py-2 rounded-lg bg-rose-500 text-white hover:bg-rose-600">
          Continue
        </button>
      </div>

      <div class="mt-8">
        <Link href="/selectedEvents" class="text-rose-500 hover:text-rose-600 font-medium">
        ← Back to selectedEvents
        </Link>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  methods: {
    formatDate(date) {
      return new Date(date).toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric',
      })
    },
    formatTime(date) {
      return new Date(date).toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
      })
    },
  },
}
</script>