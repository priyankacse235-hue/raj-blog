<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Feb 2023 05:49:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $site_data = App\Models\Genral_setting::first(); 
    ?>
    <title>{{ (($site_data !== null) ? $site_data->site_name : ''). ' | '.  $title }}</title>
    @include('master/layout/css')
    <style>
        #box_{
            box-shadow: 3px 2px 4px 2px rgba(117, 109, 109, 0.842);
        }
        .custom_logo_image{
            width: 100px;
            height: 100px;
        }
        .bg-transparent {
            background-color:  rgba(0, 0, 0, 0.614) !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="card bg-transparent text-light" id="box_">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1">
                <img class="custom_logo_image" src="{{ url('storage/'.($site_data !== null ? $site_data->logo : '')) }}" alt="">
            <br> Login</a>
        </div>
        <div class="card-body bg-transparent text-light">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <strong>{!! \Session::get('success') !!}</strong>
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <strong>{!! \Session::get('error') !!}</strong>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control bg-transparent text-light" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control bg-transparent text-light" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                </div>
                <div class="social-auth-links text-center mt-2 mb-3"> 
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     <h4 class="text-light text-center"><span class="text-center"></span>
                        <a href="/registration" class="link">Register New User</a></h4>
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
        </div>

    </div>

    </div>

</body>
    @include('master/layout/js')
</html>