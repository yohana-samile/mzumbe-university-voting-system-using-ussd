@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold">candidates Availble</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('candidate/add_candidate')}}" class="btn primary float-right">Add candidate <i class="fa fa-plus"></i></a>
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
                                <th>candidate Name</th>
                                <th>position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>candidate Name</th>
                                <th>position</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                    $sn = 1;
                                    @endphp
                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $candidate->candidate_name }}</td>
                                    <td>{{ $candidate->position_name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ url('candidate/view_candidate', ['id' => $candidate->user_id ])}}">
                                                    <i class="fa fa-eye text-primary"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url('candidate/edit_candidate', ['id' => $candidate->id ])}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{ route('destroy_candidate', ['id' => $candidate->id ]) }}" method="POST">
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
