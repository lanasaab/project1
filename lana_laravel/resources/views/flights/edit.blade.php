@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Flight</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('flights.update', $flight->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="flight_number">Flight Number:</label>
                    <input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ $flight->flight_number }}">
                </div>
                <div class="form-group">
                    <label for="origin">Origin:</label>
                    <!--<input type="text" class="form-control" id="origin" name="origin" value="{{ $flight->origin }}">-->
                    <select class="form-control" id="origin" name="origin">
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}" @if($flight->origin == $airport->id) selected @endif>
                            {{ $airport->name }} ({{ $airport->code }})
                        </option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="destination">Destination:</label>
                    <!--<input type="text" class="form-control" id="destination" name="destination" value="{{ $flight->destination }}">-->
                    <select class="form-control" id="destination" name="destination">
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}" @if($flight->destination == $airport->id) selected @endif>
                            {{ $airport->name }} ({{ $airport->code }})
                        </option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="departure_time">Departure Time:</label>
                    <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" value="{{ $flight->departure_time }}">
                </div>
                <div class="form-group">
                    <label for="arrival_time">Arrival Time:</label>
                    <input type="datetime-local" class="form-control" id="arrival_time" name="arrival_time" value="{{ $flight->arrival_time }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
