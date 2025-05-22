<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        return Weather::all();
    }

    public function show($id)
    {
        return Weather::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
            'wind_speed' => 'nullable|numeric',
            'wind_direction' => 'nullable|string|max:255',
            'precipitation' => 'nullable|numeric',
            'sunrise' => 'nullable|date_format:H:i:s',
            'sunset' => 'nullable|date_format:H:i:s',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:255',
        ]);

        $weather = Weather::create($validated);

        return response()->json($weather, 201);
    }

    public function update(Request $request, $id)
    {
        $weather = Weather::findOrFail($id);

        $validated = $request->validate([
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
            'wind_speed' => 'nullable|numeric',
            'wind_direction' => 'nullable|string|max:255',
            'precipitation' => 'nullable|numeric',
            'sunrise' => 'nullable|date_format:H:i:s',
            'sunset' => 'nullable|date_format:H:i:s',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:255',
        ]);

        $weather->update($validated);

        return response()->json($weather);
    }

    public function destroy($id)
    {
        $weather = Weather::findOrFail($id);
        $weather->delete();

        return response()->json(null, 204);
    }
}
