@extends('dashboard::layout.master-without-nav')

@section('title')
    Register
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
                                            <p>Dashboard register</p>
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
                                    <form class="form-horizontal" method="POST" action="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="first-name">First Name</label>
                                            <input name="first_name" type="text" class="form-control is-invalid" value=""
                                                   id="first-name" placeholder="Enter username" autocomplete="email"
                                                   autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message ?? '' }}</strong>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name">Last Name</label>
                                            <input type="text" name="last_name" class="form-control  is-invalid "
                                                   id="last-name" value="" placeholder="Enter password">
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message ?? '' }}</strong>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control  is-invalid "
                                                   id="email" value="" placeholder="Enter password">
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message ?? '' }}</strong>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control  is-invalid "
                                                   id="password" value="" placeholder="Enter password">
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message ?? '' }}</strong>
                                            </span>
                                        </div>

                                        <div class="mt-3">
                                            <button
                                                id="register-submit"
                                                class="btn btn-primary btn-block waves-effect waves-light"
                                                type="button">Log In
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="mt-5 text-center">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script>
                                Time Tracker App
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection



    @section('script')
        <script>
            $(function () {
                console.log('success');

                $('#register-submit').on('click', function () {
                    $.ajax({
                        method: "POST",
                        url: "{{ url('/') . '/api/register' }}",
                        data: {
                            email: $('#email').val(),
                            password: $('#password').val(),
                            first_name: $('#first-name').val(),
                            last_name: $('#last-name').val(),
                        }
                    })
                        .done(function (msg) {
                            alert("Data Saved: " + msg);
                        });
                });
            });
        </script>
@endsection
