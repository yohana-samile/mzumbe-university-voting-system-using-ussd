@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body text-capitalize">
                <h5 class="form-control">programme name: {{ $programme->name }}</h5>
                <hr>
                <h5 class="form-control">programme abbreviation: {{ $programme->programme_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">Date Created: {{ $programme->created_at }}</h5>
                <hr>
                <h5 class="form-control">Date Update: {{ $programme->updated_at }}</h5>
            </div>
        </div>
    </div>
@endsection
