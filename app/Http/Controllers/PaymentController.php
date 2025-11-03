<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('payment/Checkout', [
            
        ]);
    }

    public function success()
    {
        return Inertia::render('payment/Success', [
        ]);
    }


    
}
