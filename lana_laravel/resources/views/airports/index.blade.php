@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Airports</h1>
            <a href="{{ route('airports.create') }}" class="btn btn-primary mb-2">Add Airport</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($airports as $airport)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $airport->code }}</td>
                        <td>{{ $airport->name }}</td>
                        <td>{{ $airport->city }}</td>
                        <td>{{ $airport->country }}</td>
                        <td>
                            <form action="{{ route('airports.destroy', $airport->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('airports.show', $airport->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('airports.edit', $airport->id) }}">Edit</a>
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
