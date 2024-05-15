@include('includes.header')
        <div class="mx-auto d-flex justify-content-center col-md-10 my-4">
            <div class="col-lg-5 col-md-5">
                <div class="col-md-10">
                    <div class="card bg-secondary shadow border-0 ">
                        <div class="card-header bg-white pb-2">
                            <div class="row justify-content-md-center mu_logo">

                                <div class="text-muted text-center mb-3 navbar-brand">
                                    <img src="{{ asset('mulogo.jpg') }}" style="width: 100px">
                                    <h5 class="text-center">MU-OVS</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="text-center text-muted mb-4">
                                <p>Sign in with credentials</p>
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
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user fa-2x"></i></span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock ni-lock-circle-open fa-2x"></i></span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="form-control text-white custom-btn-primary my-4" id="btn"  maxlength="200">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
