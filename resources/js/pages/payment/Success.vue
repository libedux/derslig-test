<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <section class="bg-white py-12 text-center">
    <div class="max-w-lg mx-auto">
      <h1 class="text-4xl font-bold text-green-600 mb-4">Payment Successful!</h1>
      <p class="text-gray-700 mb-6">
        Your ticket purchase has been completed successfully.
      </p>
      <Link
        href="/events"
        class="px-6 py-3 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition"
      >
        Back to Events
      </Link>
    </div>
  </section>
</template>