<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FlightController extends Controller
{
    public function search(Request $request)
    {
        if (!$request->has('from')) {
            return view('flights.results', ['results' => []]);
        }

        $validated = $request->validate([
            'tripType' => 'required|in:round-trip,one-way',
            'passengers' => 'required|string',
            'class' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'departureDate' => 'required|date',
            'returnDate' => 'nullable|date|required_if:tripType,round-trip',
        ]);

        $travelClassMap = [
            'economy' => '1',
            'premium-economy' => '2',
            'business' => '3',
            'first' => '4',
        ];

        $params = [
            'engine' => 'google_flights',
            'api_key' => env('SERPAPI_KEY'),
            'hl' => 'en',
            'gl' => 'us',
            'currency' => 'USD',
            'departure_id' => $validated['from'],
            'arrival_id' => $validated['to'],
            'outbound_date' => $validated['departureDate'],
            'adults' => (int) $validated['passengers'],
            'travel_class' => $travelClassMap[$validated['class']] ?? '1',
            'type' => $validated['tripType'] === 'round-trip' ? '1' : '2',
        ];

        if ($validated['tripType'] === 'round-trip' && isset($validated['returnDate'])) {
            $params['return_date'] = $validated['returnDate'];
        }

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://serpapi.com/search', $params);

        if ($response->failed()) {
            Log::error('SerpAPI request failed: ' . $response->body());
            return response()->view('flights.results', ['error' => 'Failed to fetch flight data. Please check logs for details.'], 500);
        }

        $results = $response->json();

        return view('flights.results', ['results' => $results]);
    }
}
