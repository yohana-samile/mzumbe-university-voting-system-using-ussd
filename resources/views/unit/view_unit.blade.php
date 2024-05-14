@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body text-capitalize">
                <h5 class="form-control">unit name: {{ $unit->name }}</h5>
                <hr>
                <h5 class="form-control">unit abbreviation: {{ $unit->unit_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">Date Created: {{ $unit->created_at }}</h5>
                <hr>
                <h5 class="form-control">Date Update: {{ $unit->updated_at }}</h5>
            </div>
        </div>
    </div>
@endsection
