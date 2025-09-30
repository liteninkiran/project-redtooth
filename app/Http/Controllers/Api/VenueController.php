<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        return Venue::all();
    }

    public function show(Venue $venue)
    {
        return $venue;
    }

    public function store(Request $request)
    {
        $venue = Venue::create($request->all());
        return response()->json($venue, 201);
    }

    public function update(Request $request, Venue $venue)
    {
        $venue->update($request->all());
        return response()->json($venue);
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        return response()->json(null, 204);
    }
}
