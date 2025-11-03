<script setup>
import { useForm, Link, router } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  surname: '',
  email: '',
  cc_number: '',
  cc_exp_month: '',
  cc_exp_year: '',
  cc_cvv: '',
})

const handleSubmit = () => {
  form.post('/payment', {
    onSuccess: () => {
      router.visit('/payment/success')
    },
    onError: () => {
      console.error('Payment failed')
    },
  })
}
</script>

<template>
  <section class="bg-white py-10 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-md px-4 md:px-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">
        Payment Information
      </h1>

      <form @submit.prevent="handleSubmit" class="space-y-5">
        <!-- Customer Name -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Name</label>
          <input
            v-model="form.name"
            type="text"
            class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
            placeholder="John"
          />
          <div v-if="form.errors.name" class="text-rose-500 text-sm mt-1">
            {{ form.errors.name }}
          </div>
        </div>

        <!-- Surname -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Surname</label>
          <input
            v-model="form.surname"
            type="text"
            class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
            placeholder="Doe"
          />
          <div v-if="form.errors.surname" class="text-rose-500 text-sm mt-1">
            {{ form.errors.surname }}
          </div>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Email</label>
          <input
            v-model="form.email"
            type="email"
            class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
            placeholder="john@example.com"
          />
          <div v-if="form.errors.email" class="text-rose-500 text-sm mt-1">
            {{ form.errors.email }}
          </div>
        </div>

        <!-- Credit Card Number -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">
            Credit Card Number
          </label>
          <input
            v-model="form.cc_number"
            type="text"
            maxlength="16"
            class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
            placeholder="4111111111111111"
          />
          <div v-if="form.errors.cc_number" class="text-rose-500 text-sm mt-1">
            {{ form.errors.cc_number }}
          </div>
        </div>

        <!-- Expiration -->
        <div class="flex gap-4">
          <div class="flex-1">
            <label class="block text-gray-700 font-medium mb-1">Exp. Month</label>
            <input
              v-model="form.cc_exp_month"
              type="number"
              min="1"
              max="12"
              class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
              placeholder="MM"
            />
          </div>
          <div class="flex-1">
            <label class="block text-gray-700 font-medium mb-1">Exp. Year</label>
            <input
              v-model="form.cc_exp_year"
              type="number"
              min="2024"
              max="2035"
              class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
              placeholder="YYYY"
            />
          </div>
        </div>
        <div v-if="form.errors.cc_exp_month || form.errors.cc_exp_year" class="text-rose-500 text-sm">
          {{ form.errors.cc_exp_month || form.errors.cc_exp_year }}
        </div>

        <!-- CVV -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">CVV</label>
          <input
            v-model="form.cc_cvv"
            type="text"
            maxlength="4"
            class="w-full border-gray-300 rounded-lg focus:ring-rose-500 focus:border-rose-500 p-3"
            placeholder="123"
          />
          <div v-if="form.errors.cc_cvv" class="text-rose-500 text-sm mt-1">
            {{ form.errors.cc_cvv }}
          </div>
        </div>

        <!-- Submit -->
        <button
          type="submit"
          class="w-full bg-rose-500 text-white py-3 rounded-lg hover:bg-rose-600 transition font-semibold"
          :disabled="form.processing"
        >
          <span v-if="form.processing">Processing...</span>
          <span v-else>Buy Ticket</span>
        </button>
      </form>

      <div class="mt-6 text-center">
        <Link href="/events" class="text-rose-500 hover:text-rose-600">
          ← Back to Events
        </Link>
      </div>
    </div>
  </section>
</template>