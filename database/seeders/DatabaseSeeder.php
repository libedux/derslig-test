<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            TicketCategorySeeder::class,
            VenueSeeder::class,
            EventSeeder::class,
            SeatSeeder::class,
            TicketSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
        ]);

    }
}
