@extends('layouts.app')
@section('content')
    <div class="container text-capitalize">
        @include('url')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold">election manager(s) Availble</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('voter/election_manager')}}" class="btn primary float-right">election manager <i class="fa fa-plus"></i></a>
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
                                <th>regstration_number</th>
                                <th>programme abbreviation</th>
                                <th>unit abbreviation</th>
                                <th>is election Manager</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>regstration_number</th>
                                <th>programme abbreviation</th>
                                <th>unit abbreviation</th>
                                <th>is election Manager</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $sn = 1;
                                @endphp
                            @foreach ($managers as $manager)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $manager->manager_name }}</td>
                                <td>{{ $manager->regstration_number }}</td>
                                <td>{{ $manager->programme_abbreviation }}</td>
                                <td>{{ $manager->unit_abbreviation }}</td>
                                <td class=" text-center"><i class="fa fa-check text-primary"></i></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ url('election_manager/view_election_manager', ['id' => $manager->id ])}}">
                                                <i class="fa fa-eye text-primary"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ url('election_manager/edit_election_manager', ['id' => $manager->id ])}}">
                                                <i class="fa fa-edit text-primary"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{ route('destroy_election_manager', ['id' => $manager->id ]) }}" method="POST">
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
