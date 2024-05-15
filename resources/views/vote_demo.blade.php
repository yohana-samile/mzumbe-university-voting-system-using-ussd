@include('includes.header')
    <div class="container my-4">
        @if (!empty($voting_window_id))
            <small class="my-4 alert alert-warning">Note: you can vote once, submit action can not be undone</small>

            <h4 class="my-4">Demo Of USSD</h4>
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
            <form action="{{ route('submit_vote') }}" method="POST">
                @csrf
                <div class="form-group">
                    {{-- <input type="hidden" name="voting_window_id" class="form-control" value="{{ $voting_window_id->id }}" required id="voting_window_id"> --}}
                    <input type="text" name="regstration_number" class="form-control" required id="regstration_number">
                    <label for="regstration_number">Enter Your Registration Number</label>
                </div>
                <div class="form-group">
                    <select name="president_candidate" id="president_candidate" class="form-control">
                        <option selected hidden disabled> Choose Present</option>
                        @foreach ($president_candidates as $president)
                            <option value="{{ $president->id}}">{{ $president->name }}</option>
                        @endforeach
                    </select>
                    <label for="president_candidate">Choose Present</label>
                </div>
                <div class="form-group">
                    <select name="senetor_candidate" id="senetor_candidate" class="form-control">
                        <option selected hidden disabled> Choose senetor</option>
                        @foreach ($senator_candidates as $senator)
                            <option value="{{ $senator->id}}">{{ $senator->name }}</option>
                        @endforeach
                    </select>
                    <label for="senetor_candidate">Choose senetor</label>
                </div>
                <div class="form-group">
                    <select name="fr_candidate" id="fr_candidate" class="form-control">
                        <option selected hidden disabled> Choose Fr</option>
                        @foreach ($fr_candidates as $fr)
                            <option value="{{ $fr->id}}">{{ $fr->name }}</option>
                        @endforeach
                    </select>
                    <label for="fr_candidate">Choose Fr (Fucult Representative)</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit Your Vote" class="form-control bg">
                </div>
            </form>
        @else
            <div class="my-4 alert alert-danger">Election Window For Muso Is Not Open</div>
        @endif
    </div>
@include('includes.footer')
