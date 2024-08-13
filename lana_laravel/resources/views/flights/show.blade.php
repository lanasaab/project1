@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Flight Details</h1>
            <div class="card">
                <div class="card-header">
                    Flight #{{ $flight->flight_number }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $flight->origin_airport->name  }} to {{ $flight->destination_airport->name  }}</h5>
                    <p class="card-text"><strong>Departure Time:</strong> {{ $flight->departure_time }}</p>
                    <p class="card-text"><strong>Arrival Time:</strong> {{ $flight->arrival_time }}</p>
                    <a href="{{ route('flights.index') }}" class="btn btn-primary">Back to Flights</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
