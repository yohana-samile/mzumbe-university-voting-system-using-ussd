@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Register New programme</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" required>
                        <label for="name">Enter programme Name</label>
                        <small>Eg Facult Of Scince And Technology</small>
                    </div>
                    <div class="form-group">
                        <select name="unit_id" id="unit_id" class="form-control" required>
                            <option selected hidden disabled>Choose Unit Belong</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="programme_abbreviation" id="programme_abbreviation" class="form-control" required>
                        <label for="name">Enter programme abbreviation</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control bg" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
