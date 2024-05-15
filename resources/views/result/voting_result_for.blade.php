@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="row">
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
            <h4>Voting Result For <span class="badge badge-primary">{{ $position->name }}</span></h4>
            @foreach ($candidates as $index => $candidate)
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <p>Candidate: {{ $candidate->candidate_name }}</p>
                            @if ($candidate->total_votes == null)
                                <div class="p-5 text-center">Total Votes <span class="alert alert-success">0</span></div>
                            @else
                                <div class="p-5 text-center">Total Votes <span class="alert alert-success">{{ $candidate->total_votes }}</span></div>
                            @endif
                            @if ($candidate->wining_status == 1 )
                                Wining Status: <p class="badge badge-success text-center">Winner <i class="fa fa-check"></i></p>
                            @else
                                Wining Status: <p class="badge badge-danger">Looser</p>
                            @endif
                        </div>
                    </div>
                </div>
                @if (($index + 1) % 2 == 0 && !$loop->last)
                    <div class="col-md-2" hidden>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">VS</h4>
                            </div>
                        </div>
                    </div>
                @endif
                @if (($index + 1) % 2 == 0 && !$loop->last)
                    </div><div class="row">
                @endif
            @endforeach
        </div>
        @if ($window_status->status !== 'open')
            @if ($highest_total_votes == 0)
                <div class="alert alert-danger my-3">No More Action is allowed</div>
            @else
                <form action="{{ route('publish_voting_result')}}" method="POST">
                    @csrf
                    <div class="form-group my-3">
                        <input type="hidden" name="wining_status" value="1" required>
                        <input type="hidden" name="total_votes" value="{{ $highest_total_votes }}" required>
                        <input type="submit" name="submit" value="Publish Result" class="form-control bg">
                    </div>
                </form>
            @endif
        @endif
    </div>
@endsection

