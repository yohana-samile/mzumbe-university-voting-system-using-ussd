@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Update candidate Name</h5>
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
                <form action="{{ route('update_candidate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $candidate->id }}" id="id" class="form-control" required>
                        <select name="name" id="name" class="form-control" required>
                            <option selected hidden disabled>Enter canidate Name</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <label for="name">Enter canidate Name</label>
                    </div>
                    <div class="form-group">
                        <select name="position_id" id="position_id" class="form-control" required>
                            <option selected hidden disabled>Enter canidate position</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        <label for="name">Enter canidate position</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="form-control bg">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
