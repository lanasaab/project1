@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Flights</h1>
            <a href="{{ route('flights.create') }}" class="btn btn-primary mb-2">Add Flight</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Departure Time</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flights as $flight)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                        <td>{{ $flight->flight_number }}</td>
                        
                        <td> {{ $flight->origin_airport->name }} </td>
                        <td> {{ $flight->destination_airport->name }}  </td>
                        <td>{{ $flight->departure_time }}</td>
                        <td>{{ $flight->arrival_time }}</td>
                        <td>
                            <form action="{{ route('flights.destroy', $flight->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('flights.show', $flight->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('flights.edit', $flight->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
