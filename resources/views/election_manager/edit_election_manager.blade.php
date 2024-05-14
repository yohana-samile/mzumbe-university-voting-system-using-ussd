@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Update election manager details</h5>
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
                <form action="{{ route('update_election_manager') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $manager->id }}" id="id" class="form-control" required>
                        <input type="text" name="name" value="{{ $manager->name }}" id="name" class="form-control" required>
                        <label for="name">Enter election manager Name</label>
                    </div>
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control">
                            <option selected hidden disabled>Choose Gender</option>
                            <option value="male">Male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone_number" value="{{ $manager->phone_number }}" id="phone_number" class="form-control" required>
                        <label for="name">Enter manager phone_number</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="form-control bg">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
