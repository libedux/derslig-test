<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()
            ->get(['id', 'title', 'description', 'image_url', 'event_date']);

        return Inertia::render('events/Index', [
            'events' => $events,
        ]);
    }

    public function show($id)
    {
        $event = Event::with('venue')
            ->findOrFail($id);

        return Inertia::render('events/Show', [
            'selectedEvent' => $event,
            'categories' => TicketCategory::get()->toArray()
        ]);
    }
    
}
