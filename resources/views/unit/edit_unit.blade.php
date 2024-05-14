@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card">
            <div class="card-header">
                <h5>Update Unit Name</h5>
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
                <form action="{{ route('update_unit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $unit->id }}" id="id" class="form-control" required>
                        <input type="text" name="name" value="{{ $unit->name }}" id="name" class="form-control" required>
                        <label for="name">Enter Unit Name</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="unit_abbreviation" value="{{ $unit->unit_abbreviation }}" id="unit_abbreviation" class="form-control" required>
                        <label for="name">Enter unit abbreviation</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="form-control bg">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
