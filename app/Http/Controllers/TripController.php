<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        return response()->json(['trips' => Trip::all()], 200);
    }

    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return response()->json(['trip' => $trip], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'region_id' => 'required|exists:regions,id',
        ]);
        
        $trip = Trip::create($request->all());
        return response()->json(['message' => 'Trip created successfully', 'trip' => $trip], 201);
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        return response()->json(['message' => 'Trip updated successfully', 'trip' => $trip], 200);
    }

    public function destroy($id)
    {
        $deleted = Trip::destroy($id);
        return response()->json(['message' => $deleted ? 'Trip deleted successfully' : 'Trip not found'], $deleted ? 200 : 404);
    }
}
