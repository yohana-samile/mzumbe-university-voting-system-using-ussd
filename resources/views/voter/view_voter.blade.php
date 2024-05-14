@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body text-capitalize">
                <h5 class="form-control">voter name: {{ $voter->voter_name }}</h5>
                <hr>
                <h5 class="form-control">regstration_number: {{ $voter->regstration_number }}</h5>
                <hr>
                <h5 class="form-control">phone number: {{ $voter->phone_number }}</h5>
                <hr>
                <h5 class="form-control">gender: {{ $voter->gender }}</h5>
                <hr>
                <h5 class="form-control">email: {{ $voter->email }}</h5>
                <hr>
                <h5 class="form-control">role name: {{ $voter->role_name }}</h5>
                <hr>
                <h5 class="form-control">year: {{ $voter->year }}</h5>
                <hr>
                <h5 class="form-control">unit abbreviation: {{ $voter->unit_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">programme abbreviation: {{ $voter->programme_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">Date Created: {{ $voter->created_at }}</h5>
                <hr>
                <h5 class="form-control">Date Update: {{ $voter->updated_at }}</h5>
            </div>
        </div>
    </div>
@endsection
