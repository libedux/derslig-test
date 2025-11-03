<script setup>
import { ref, computed } from 'vue'
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
    selectedEvent: Object,
    seats: Array,
})

// Reactive data
const selectedSeats = ref([])

const toggleSeat = (seatId) => {
    if (selectedSeats.value.includes(seatId)) {
        selectedSeats.value = selectedSeats.value.filter(id => id !== seatId)
    } else {
        selectedSeats.value.push(seatId)
    }
}

// Computed total
const totalPrice = computed(() => {
    return selectedSeats.value
        .map(id => props.seats.find(s => s.id === id)?.price || 0)
        .reduce((sum, price) => sum + price, 0)
})

// Form for submitting
const form = useForm({
    event_id: null,
    seat_ids: [],
})

const handleSubmit = () => {
    form.event_id = props.selectedEvent.id
    form.seat_ids = selectedSeats.value

    if (!form.seat_ids.length) {
        alert('Please select at least one seat!')
        return
    }

    form.get('/payment');
}
</script>

<template>
    <section class="bg-white py-8 sm:py-12 lg:py-16">
        <div class="mx-auto max-w-screen-md px-4 md:px-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Select Your Seats
            </h1>

            <!-- Event Info -->
            <div class="mb-8 text-gray-600">
                <p class="text-lg font-semibold">{{ selectedEvent.title }}</p>
                <p>{{ new Date(selectedEvent.event_date).toLocaleDateString() }}</p>
                <p>{{ selectedEvent.venue?.name }} — {{ selectedEvent.venue?.address }}</p>
            </div>

            <!-- Seat Grid -->
            <div class="grid grid-cols-10 gap-2 justify-center items-center mb-8"
                style="max-width: 500px; margin: 0 auto;">
                <div v-for="seat in seats" :key="seat.id" @click="toggleSeat(seat.id)"
                    class="cursor-pointer h-10 w-10 flex items-center justify-center rounded-md text-sm font-semibold border transition-all"
                    :class="{
                        'bg-rose-500 text-white': selectedSeats.includes(seat.id),
                        'bg-gray-100 text-gray-800 hover:bg-gray-200': !selectedSeats.includes(seat.id),
                        'opacity-50 cursor-not-allowed bg-gray-300': seat.is_reserved,
                    }">
                    {{ seat.label }}
                </div>
            </div>

            <!-- Seat Info -->
            <div class="flex justify-center gap-6 text-gray-600 mb-6">
                <div class="flex items-center gap-2">
                    <div class="h-5 w-5 bg-gray-100 border rounded"></div>
                    <span>Available</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="h-5 w-5 bg-rose-500 rounded"></div>
                    <span>Selected</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="h-5 w-5 bg-gray-300 rounded"></div>
                    <span>Reserved</span>
                </div>
            </div>

            <!-- Summary -->
            <div class="mb-8 text-gray-700">
                <p class="text-lg">
                    Selected Seats:
                    <span class="font-semibold">{{ selectedSeats.join(', ') || 'None' }}</span>
                </p>
                <p class="text-lg">
                    Total Price:
                    <span class="font-bold">{{ totalPrice }} ₺</span>
                </p>
            </div>

            <div class="flex justify-center gap-4">
                <button @click="handleSubmit"
                    class="px-6 py-3 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition">
                    Continue to Checkout
                </button>

                <Link href="/events"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                Back to Events
                </Link>
            </div>
        </div>
    </section>
</template>