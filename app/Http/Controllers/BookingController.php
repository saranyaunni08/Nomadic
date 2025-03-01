<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class BookingController extends Controller
{
    public function index()
    {
        return Auth::user()->bookings;
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
        return Auth::user()->bookings()->create($request->all());
    }
}
