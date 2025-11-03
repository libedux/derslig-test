<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\TicketCategory;
use App\Models\Seat;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::inRandomOrder()->value('id') ?? Event::factory(),
            'ticket_category_id' => TicketCategory::inRandomOrder()->value('id'),
            'seat_id' => Seat::inRandomOrder()->value('id') ?? Seat::factory(),
            'order_id' => Order::inRandomOrder()->value('id') ?? Order::factory(),
        ];
    }
}
