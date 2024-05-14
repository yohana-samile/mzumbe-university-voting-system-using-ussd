@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Update Voting Time</h5>
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
                <form action="{{ route('update_voting_window') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $window->id }}" id="id" class="form-control" required>
                        <input type="time" name="time_from" value="{{ $window->time_from }}" id="time_from" class="form-control" required>
                        <label for="name">Enter time to start votting</label>
                    </div>
                    <div class="form-group">
                        <input type="time" name="time_to_end" value="{{ $window->time_to_end }}" id="time_to_end" class="form-control" required>
                        <label for="name">Enter time to end votting</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="form-control bg">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
