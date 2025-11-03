<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->value('id'),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000),
            'cc_number' => $this->faker->creditCardNumber(),
            'cc_exp_month' => $this->faker->numberBetween(1, 12),
            'cc_exp_year' => $this->faker->numberBetween(date('Y'), date('Y') + 5),
            'cc_cvv' => $this->faker->numerify('###'),
        ];
    }
}
