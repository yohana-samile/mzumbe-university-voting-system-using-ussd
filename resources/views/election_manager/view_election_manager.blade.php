@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-body text-capitalize">
                <h5 class="form-control">election manager name: {{ $manager->manager_name }}</h5>
                <hr>
                <h5 class="form-control">regstration_number: {{ $manager->regstration_number }}</h5>
                <hr>
                <h5 class="form-control">phone number: {{ $manager->phone_number }}</h5>
                <hr>
                <h5 class="form-control">gender: {{ $manager->gender }}</h5>
                <hr>
                <h5 class="form-control">email: {{ $manager->email }}</h5>
                <hr>
                <h5 class="form-control">role name: {{ $manager->role_name }}</h5>
                <hr>
                <h5 class="form-control">year: {{ $manager->year }}</h5>
                <hr>
                <h5 class="form-control">unit abbreviation: {{ $manager->unit_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">programme abbreviation: {{ $manager->programme_abbreviation }}</h5>
                <hr>
                <h5 class="form-control">Date Created: {{ $manager->created_at }}</h5>
                <hr>
                <h5 class="form-control">Date Update: {{ $manager->updated_at }}</h5>
            </div>
        </div>
    </div>
@endsection
