@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body">
                <h5 class="form-control">position name: {{ $position->name }}</h5>
                <hr>
                <h5 class="form-control">Date Created: {{ $position->created_at }}</h5>
                <hr>
                <h5 class="form-control">Date Update: {{ $position->updated_at }}</h5>
            </div>
        </div>
    </div>
@endsection
