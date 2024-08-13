@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create Flight</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('flights.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="flight_number">Flight Number:</label>
                    <input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ old('flight_number') }}">
                </div>
                <div class="form-group">
                    <label for="origin">Origin:</label>
                    <select class="form-control" id="origin" name="origin">
                        @foreach($airports as $airport)
                            <option value="{{ $airport->id }}">
                                {{ $airport->name }} ({{ $airport->code }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination">Destination:</label>
                    <select class="form-control" id="destination" name="destination">
                        @foreach($airports as $airport)
                            <option value="{{ $airport->id }}">
                                {{ $airport->name }} ({{ $airport->code }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure_time">Departure Time:</label>
                    <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" value="{{ old('departure_time') }}">
                </div>
                <div class="form-group">
                    <label for="arrival_time">Arrival Time:</label>
                    <input type="datetime-local" class="form-control" id="arrival_time" name="arrival_time" value="{{ old('arrival_time') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
