@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold">programmes Availble</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('programme/add_programme')}}" class="btn primary float-right">Add programme <i class="fa fa-plus"></i></a>
                    </div>
                </div>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>abbreviation</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>abbreviation</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($programmes as $programme)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $programme->name }}</td>
                                    <td>{{ $programme->programme_abbreviation }}</td>
                                    <td>{{ $programme->created_at }}</td>
                                    <td>{{ $programme->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ url('programme/view_programme', ['id' => $programme->id ])}}">
                                                    <i class="fa fa-eye text-primary"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url('programme/edit_programme', ['id' => $programme->id ])}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{ route('destroy_programme', ['id' => $programme->id ]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-white"><i class="fa fa-trash text-danger"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
