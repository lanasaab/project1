@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Delete Flight</h1>
            <div class="alert alert-danger">
                <strong>Warning!</strong> You are about to delete a flight. This action cannot be undone.
            </div>
            <div class="card">
                <div class="card-header">
                    Flight #{{ $flight->flight_number }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $flight->origin }} to {{ $flight->destination }}</h5>
                    <p class="card-text"><strong>Departure Time:</strong> {{ $flight->departure_time }}</p>
                    <p class="card-text"><strong>Arrival Time:</strong> {{ $flight->arrival_time }}</p>
                    <form action="{{ route('flights.destroy', $flight->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('flights.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
