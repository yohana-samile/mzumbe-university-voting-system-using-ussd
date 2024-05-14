@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Update programme Name</h5>
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
                <form action="{{ route('update_programme') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $programme->id }}" id="id" class="form-control" required>
                        <input type="text" name="name" value="{{ $programme->name }}" id="name" class="form-control" required>
                        <label for="name">Enter programme Name</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="programme_abbreviation" value="{{ $programme->programme_abbreviation }}" id="programme_abbreviation" class="form-control" required>
                        <label for="name">Enter programme abbreviation</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="form-control bg">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
