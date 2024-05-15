@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="row">
            @foreach ($results as $index => $result)
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <p>Position: {{ $result->position_name }}</p>
                            </div>
                            <div class="card-body">
                                <p>Candidate: {{ $result->candidate_name }}</p>
                                @if ($result->total_votes == null)
                                    <div class="my-4 text-center">Total Votes <span class="alert alert-success">0</span></div>
                                @else
                                    <div class="my-4 text-center">Total Votes <span class="alert alert-success">{{ $result->total_votes }}</span></div>
                                @endif
                                @if ($result->wining_status == 1 )
                                    Wining Status: <p class="badge badge-success text-center my-4">Winner <i class="fa fa-check"></i></p>
                                @else
                                    Wining Status: <p class="badge badge-danger my-4">Looser</p>
                                @endif
                            </div>
                        </div>
                        <br>
                    </div>
                    @if (($index + 1) % 2 == 0 && !$loop->last)
                    @if (($index + 1) % 2 == 0 && !$loop->last)
                        <div class="col-md-2" hidden>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">VS</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                </div><div class="row">
                    @endif
                @endforeach
        </div>
    </div>
@endsection
