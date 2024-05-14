@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Register New Candidate For Election</h5>
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
                        <select name="name" id="name" class="form-control" required>
                            <option selected hidden disabled>Choose canidate Name</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <label for="name">Enter canidate Name</label>
                    </div>
                    <div class="form-group">
                        <select name="position_id" id="position_id" class="form-control" required>
                            <option selected hidden disabled>Choose postiont Belong</option>
                            @foreach ($positions as $postion)
                                <option value="{{ $postion->id }}">{{ $postion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control bg" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
