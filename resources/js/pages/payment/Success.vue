<script setup>
import { Link } from '@inertiajs/vue3'

// Props passed from controller
defineProps({
  ticket: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <section class="bg-white py-12">
    <div class="max-w-lg mx-auto text-center">
      <!-- Success Message -->
      <h1 class="text-4xl font-bold text-green-600 mb-4">Payment Successful!</h1>
      <p class="text-gray-700 mb-6">
        Your ticket purchase has been completed successfully.
      </p>

      <!-- Ticket Details -->
      <div class="bg-gray-100 rounded-lg p-6 text-left mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-3">{{ ticket.event.title }}</h2>
        <p class="text-gray-600 mb-2">
          <span class="font-semibold">Event Date:</span>
          {{ new Date(ticket.event.event_date).toLocaleString() }}
        </p>
        <p class="text-gray-600 mb-2">
          <span class="font-semibold">Venue:</span> {{ ticket.event.venue.name }}
        </p>
        <p class="text-gray-600 mb-2">
          <span class="font-semibold">Address:</span> {{ ticket.event.venue.address }}
        </p>
        <p class="text-gray-600 mb-2">
          <span class="font-semibold">Category:</span> {{ ticket.category.name }} ({{ ticket.category.price }}₺)
        </p>
        <p class="text-gray-600 mb-2">
          <span class="font-semibold">Seats:</span> {{ ticket.seats.map(s => s.label).join(', ') }}
        </p>
        <p class="text-gray-800 font-bold mt-3">
          Total Paid: {{ ticket.total_amount }}₺
        </p>
      </div>

      <!-- Back Link -->
      <Link
        href="/events"
        class="px-6 py-3 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition"
      >
        Back to Events
      </Link>
    </div>
  </section>
</template>