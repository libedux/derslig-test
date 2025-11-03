<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Seat;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SeatPlanController extends Controller
{
    public function index(string $eventId, string $eventCategoryId)
    {
        $event = Event::with('venue')->find($eventId);
        return Inertia::render('events/SeatPlan', [
            'selectedEvent' => $event,
            'eventCategoryId' => $eventCategoryId,
            'seats' => Seat::get()->toArray()
        ]);
    }

}
