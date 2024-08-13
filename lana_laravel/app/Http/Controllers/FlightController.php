<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;



class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with(['origin_airport', 'destination_airport'])->get();
        //return Response::json($flights);
        // dd($flights);
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        $airports = Airport::all(); // Retrieve all airports
        return view('flights.create', compact('airports')); // Pass airports to the view
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $airports = Airport::all(); // Retrieve all airports
        return view('flights.edit', compact('flight', 'airports')); // Pass airports to the view
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        Flight::create([
            'flight_number' => $request->flight_number,
            'origin' => $request->origin, 
            'destination' => $request->destination,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
        ]);
        return redirect()->route('flights.index')->with('success', 'Flight created successfully.');
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    

    public function update(Request $request, $id)
    {
        $request->validate([
            'flight_number' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return redirect()->route('flights.index')
                         ->with('success', 'Flight updated successfully.');
    }

    public function confirmDelete($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.delete', compact('flight'));
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')
                         ->with('success', 'Flight deleted successfully.');
    }
}

