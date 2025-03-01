<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PaymentMethodController extends Controller
{
    public function index()
    {
        return response()->json(['payment_methods' => Auth::user()->paymentMethods], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|min:16|max:16',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string|min:3|max:4',
        ]);
    
        $paymentMethod = Auth::user()->paymentMethods()->create($validated);
    
        return response()->json([
            'message' => 'Payment method added successfully',
            'payment_method' => $paymentMethod
        ], 201);
    }
    
}
