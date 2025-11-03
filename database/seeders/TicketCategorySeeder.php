<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketCategory::insert([
            [
                'name' => 'Genel Giriş',
                'created_at' => fake()->dateTime(),
                'updated_at' => fake()->dateTime()
            ],
            [
                'name' => 'Protokol',
                'created_at' => fake()->dateTime(),
                'updated_at' => fake()->dateTime()
            ],
        ]);
    }
}
