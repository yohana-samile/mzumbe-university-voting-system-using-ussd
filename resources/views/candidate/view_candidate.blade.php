@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body text-capitalize">
                <h5 class="form-control">candidate name: {{ $candidate->candidate_name }}</h5>
                <hr>
                <h5 class="form-control">regstration_number: {{ $candidate->regstration_number }}</h5>
                <hr>
                <h5 class="form-control">phone number: {{ $candidate->phone_number }}</h5>
                <hr>
                <h5 class="form-control">gender: {{ $candidate->gender }}</h5>
                <hr>
                <h5 class="form-control">email: {{ $candidate->email }}</h5>
                <hr>
                <h5 class="form-control">postion of election: {{ $candidate->position_name }}</h5>
                <hr>
                <h5 class="form-control">year of study: {{ $candidate->year }}</h5>
                <hr>
                <h5 class="form-control">unit abbreviation belong: {{ $candidate->unit_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">programme abbreviation study: {{ $candidate->programme_abbreviation }}</h5>
            </div>
        </div>
    </div>
@endsection
