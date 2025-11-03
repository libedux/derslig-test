<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use DB;
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
        // $validated = $request->validate([
        //     // 'event_id' => 'required|exists:events,id',
        //     // 'category_id' => 'required|exists:categories,id',
        //     // 'seat_ids' => 'required|array|min:1',
        //     // 'seat_ids.*' => 'exists:seats,id',
        //     'name' => 'required|string|max:255',
        //     'surname' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'phone' => 'nullable|string|max:20',
        //     'total_amount' => 'required|numeric|min:0',
        //     'cc_number' => 'required|digits:16',
        //     'cc_exp_month' => 'required|integer|min:1|max:12',
        //     'cc_exp_year' => 'required|integer|min:' . date('Y'),
        //     'cc_cvv' => 'required|digits_between:3,4',
        // ]);

        // DB::transaction(function () use ($validated, &$order) {
        //     // 1️⃣ Create the Order
        //     $order = Order::create([
        //         'event_id' => $validated['event_id'],
        //         'category_id' => $validated['category_id'],
        //         'name' => $validated['name'],
        //         'surname' => $validated['surname'],
        //         'email' => $validated['email'],
        //         'phone' => $validated['phone'] ?? null,
        //         'total_amount' => $validated['total_amount'],
        //         'cc_number' => $validated['cc_number'], // optionally encrypt
        //         'cc_exp_month' => $validated['cc_exp_month'],
        //         'cc_exp_year' => $validated['cc_exp_year'],
        //         'cc_cvv' => $validated['cc_cvv'],       // optionally encrypt
        //     ]);

        //     // 2️⃣ Create Tickets for each selected seat
        //     foreach ($validated['seat_ids'] as $seatId) {
        //         Ticket::create([
        //             'event_id' => $validated['event_id'],
        //             'category_id' => $validated['category_id'],
        //             'seat_id' => $seatId,
        //             'order_id' => $order->id,
        //         ]);
        //     }
        // });

        // 3️⃣ Redirect to order/show page
        return Inertia::render('payment/Success', [
            'ticket' => Ticket::with(['event', 'category', 'event.venue'])->first()
        ]);
    }


    public function success()
    {
        return Inertia::render('payment/Success', [
            'ticket' => Ticket::with(['event', 'category', 'event.venue'])->first()
        ]);
    }


    public function show()
    {
        return Inertia::render('payment/Success', [
            'ticket' => Ticket::with(['event', 'category', 'event.venue'])->first()
        ]);
    }
}
