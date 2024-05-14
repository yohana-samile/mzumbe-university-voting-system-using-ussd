@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body">
                <h4>Voting Result For <span class="badge badge-primary">{{ $position->name }}</span></h4>
                <div class="alert alert-success">Total Votes {{ $result }}</div>
            </div>
        </div>
    </div>
@endsection

