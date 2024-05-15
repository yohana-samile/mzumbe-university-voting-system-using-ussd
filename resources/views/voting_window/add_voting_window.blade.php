@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Open New Window, Voting Process for muso</h5>
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
                <form action="{{ route('store_voting_window') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="time" name="time_from" id="time_from" class="form-control" required>
                        <label for="name">Enter time to start votting</label>
                    </div>
                    <div class="form-group">
                        <input type="time" name="time_to_end" id="time_to_end" class="form-control" required>
                        <label for="name">Enter time to end votting</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control bg" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
