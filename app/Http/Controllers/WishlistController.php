<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        return Auth::user()->wishlists()->with('trip')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);

        return Wishlist::create([
            'user_id' => Auth::id(),
            'trip_id' => $request->trip_id,
        ]);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::where('id', $id)->where('user_id', Auth::id())->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['message' => 'Removed from wishlist'], 200);
        }
        return response()->json(['message' => 'Not found'], 404);
    }
}
