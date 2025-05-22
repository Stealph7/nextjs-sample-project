<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        return Alert::all();
    }

    public function show($id)
    {
        return Alert::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:urgent,important,information',
            'alert_date' => 'nullable|date',
            'parcel_id' => 'nullable|exists:parcels,id',
        ]);

        $alert = Alert::create($validated);

        return response()->json($alert, 201);
    }

    public function update(Request $request, $id)
    {
        $alert = Alert::findOrFail($id);

        $validated = $request->validate([
            'type' => 'sometimes|required|string',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|string|in:urgent,important,information',
            'alert_date' => 'nullable|date',
            'parcel_id' => 'nullable|exists:parcels,id',
        ]);

        $alert->update($validated);

        return response()->json($alert);
    }

    public function destroy($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->delete();

        return response()->json(null, 204);
    }
}
