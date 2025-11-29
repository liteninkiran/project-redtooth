<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index(Request $request)
    {
        // Number of rows per page
        $perPage = $request->input('pageSize', 20);

        // Current page (ag-Grid sends 1-based page numbers)
        $page = $request->input('startRow', 0) / $perPage + 1;

        $query = Venue::query();

        // Sorting based on request
        if ($request->has('sortModel')) {
            $sort = json_decode($request->sortModel, true);
            foreach ($sort as $s) {
                $query->orderBy($s['colId'], $s['sort']);
            }
        }

        // Filtering based on request
        if ($request->has('filterModel')) {
            $filters = json_decode($request->filterModel, true);
            foreach ($filters as $col => $f) {
                // Simple example: only supports contains filter
                $query->where($col, 'like', '%' . $f['filter'] . '%');
            }
        }

        $venues = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'rows' => $venues->items(),
            'lastRow' => $venues->total(),
        ]);
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
