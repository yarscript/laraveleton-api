@extends('dashboard::layout.master-without-nav')

@section('title')
    Login
@endsection

@section('body')
    <body>
    @endsection

    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="{{url('/')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Sign in</h5>
                                            <p>Dashboard login</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="/">
                                        <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">

                                            <i class="bx bx-analyse text-primary" style="font-size: 28px"></i>
                                        </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('dashboard.login.index') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="login-username">Username</label>
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? '' }}" id="login-username" placeholder="Enter username" autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="login-password">Password</label>
                                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="login-password" value="" placeholder="Enter password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Time Tracker App</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
