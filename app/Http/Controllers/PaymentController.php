<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('payment/Checkout', [

        ]);
    }

    public function store(Request $request)
    {
        Ticket::create([
            'event_id' => $request->event_id,
            'order_id' => $request->order_id,
            'seat_id' => $request->seat_id,
            'ticket_category_id' => $request->ticket_category_id
        ]);

        return redirect()->back()->with([
            'success' => 'Service created successfully.',
        ]);
    }


    public function show(string $id)
    {
        return Inertia::render('payment/Success', [
            'ticket' => Ticket::findOrFail($id)
        ]);
    }
}
