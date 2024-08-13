@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Airport Details</h1>
            <div class="card">
                <div class="card-header">
                    Airport #{{ $airport->code }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $airport->name }}</h5>
                    <p class="card-text"><strong>City:</strong> {{ $airport->city }}</p>
                    <p class="card-text"><strong>Country:</strong> {{ $airport->country }}</p>
                    <a href="{{ route('airports.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
