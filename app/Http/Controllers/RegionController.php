<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::all();
    }

    public function show($id)
    {
        return Region::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'climate' => 'required',
            'challenge_level' => 'required',
        ]);

        return Region::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $region = Region::findOrFail($id);
        $region->update($request->all());
        return $region;
    }

    public function destroy($id)
    {
        return Region::destroy($id);
    }
}
