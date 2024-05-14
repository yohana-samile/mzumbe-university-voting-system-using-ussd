@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Register New voter</h5>
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
                        <label for="name">Enter voter Name</label>
                    </div>
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control">
                            <option selected hidden disabled>Choose Gender</option>
                            <option value="male">Male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone_number" id="phone_number" class="form-control" required>
                        <label for="name">Enter phone_number</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="regstration_number" id="regstration_number" class="form-control" required>
                        <label for="name">Enter regstration number</label>
                    </div>
                    <div class="form-group">
                        <select name="year_of_studie_id" id="year_of_studie_id" class="form-control">
                            <option selected hidden disabled>Choose Year Of Study</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="programme_id" id="programme_id" class="form-control">
                            <option selected hidden disabled>Choose programme Of Study</option>
                            @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" min="5" max="15" required>
                        <label for="name">Enter password</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control bg" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
