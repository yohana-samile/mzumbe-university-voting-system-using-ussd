@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold">Time Required For Voting Process</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('voting_window/add_voting_window')}}" class="btn primary float-right">Open Voting Window<i class="fa fa-plus"></i></a>
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
                                <th>time_from</th>
                                <th>time_to_end</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>time_from</th>
                                <th>time_to_end</th>
                                <th>status</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                    $sn = 1;
                                    @endphp
                                @foreach ($windows as $window)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $window->time_from }}</td>
                                    <td>{{ $window->time_to_end }}</td>
                                    <td>
                                        @if ($window->status == 'open')
                                            <div  class="badge badge-primary">{{ $window->status }} <i class="fa fa-check"></i></div>
                                        @else
                                            <div  class="badge badge-danger">{{ $window->status }} <i class="fa fa-close"></i></div>
                                        @endif
                                    </td>
                                    <td>{{ $window->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            @if ($window->status == 'open')
                                                <div class="col-md-4">
                                                    <form action="{{ route('end_voting_process', ['id' => $window->id ]) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" id="status" name="status" value="closed" required>
                                                        <button type="submit" class="btn btn-white"><i class="fa fa-times text-danger"></i> End</button>
                                                    </form>
                                                    <a href="javascript::void(0)" hidden>
                                                        <i class="fa fa-eye text-primary"></i>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="col-md-4">
                                                <a href="{{ url('voting_window/edit_voting_window', ['id' => $window->id ])}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{ route('destroy_voting_window', ['id' => $window->id ]) }}" method="POST">
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
