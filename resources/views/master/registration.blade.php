<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta property="og:title" content="Create Your Account | Join the Community – Raj Blogs" />
    <meta property="og:description" content="Create your free account and start writing! Connect with passionate writers and readers around the world." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('registration') }}" />
    <meta property="og:image" content="{{ url('images/Untitled design.jpg') }}" />

    <meta name="description" content="Create your free account and become a part of our growing blogging community. Share your thoughts, connect with readers, and grow your influence.">
    <meta name="twitter:title" content="Create Your Account | Join the Community – Raj Blogs" />
    <meta name="twitter:description" content="Start your writing journey today. Free sign-up. Easy blogging platform." />
    <meta name="twitter:image" content="{{ url('images/Untitled design.jpg') }}">
    <?php
        $site_data = App\Models\Genral_setting::first(); 
    ?>
    @if ($site_data)
    <title>{{ (($site_data !== null) ? $site_data->site_name : ''). ' | '.  $title }}</title>
    @else 
    <title>
        Raj blogs
    </title>
    @endif
    @include('master.layout.css')
    <style>
        #box_{
            box-shadow: 3px 2px 4px 2px rgba(117, 109, 109, 0.842);
        }
    </style>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .form-container {
            /* margin-top: 5%; */
            height: 100vh;
            width: 100%;
        }

        .form-box {
            background-color: rgba(255, 255, 255, 0.85) !important;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .custom_logo_image{
            width: 100px;
            height: 100px;
        }
        .bg-transparent {
            background-color:  rgba(0, 0, 0, 0.614) !important;
        }
        .bg-remove{
            background: transparent !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
{{-- <div class="register-box mt-3">
    <div class="card" id="box_">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1">
                <img class="w-100" src="{{ url('storage/'.$site_data->logo) }}" alt="">
            <br> Registration</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form method="post" action="{{ url('registration') }}">
                @csrf
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show"  role="alert">
                                <strong>{!! \Session::get('success') !!}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    @endif
                    @if (\Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                                <strong>{!! \Session::get('error') !!}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" name="user_name" value="{{ old('user_name') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" name="confirm_password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Referral code" name="referral_by" value="{{ request()->segment(2) }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-bullhorn"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="1" name="terms" required {{ old('terms') == 1 ? 'checked' : '' }}>
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                </div>
            </form>
            <div class="social-auth-links text-center"> 
                <a href="{{ url('login') }}" class="btn btn-block btn-secondary">
                    Login
                </a>
            </div>
        </div>

    </div>
</div> --}}
<!-- Fullscreen background video -->
  <video autoplay muted loop class="video-bg">
    <source src="{{ url('images/Untitled design.mp4') }}" type="video/mp4">
  </video>

  <!-- Centered form -->
  <div class="container-fluid d-flex align-items-center justify-content-center form-container bg-transparent">
    <div class="col-md-5 col-lg-5">
        <div class="card bg-remove">
            <h1 class="text-light text-center">Create Your Account</h1>
            <h4 class="text-light text-center">Sign up and connect with writers, readers, and creators. Together, we learn, grow, and inspire through words.</h4>
            <div class="card-header text-center p-0 m-0">
                <a href="{{ url('/') }}" class="h1">
                    {{-- @if ($site_data->logo !== null)
                    <img class="custom_logo_image" src="{{ url('storage/'.$site_data->logo ?? "") }}" alt="">
                        
                    @endif --}}
                    @if (!empty($site_data?->logo))
    <img class="custom_logo_image" src="{{ url('storage/'.$site_data->logo) }}" alt="">
@endif
                </a>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('registration') }}{{ request()->has('redirecturl') ? '?redirecturl='.request()->query('redirecturl') : '' }}" class="">
                    @csrf
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                                    @foreach ($errors->all() as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show"  role="alert">
                                    <strong>{!! \Session::get('success') !!}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                                    <strong>{!! \Session::get('error') !!}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                    </div>
    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bg-transparent text-light" placeholder="Full name" name="user_name" value="{{ old('user_name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" value="{{ old('email') }}" class="form-control bg-transparent text-light" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control bg-transparent text-light" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control bg-transparent text-light" placeholder="Retype password" name="confirm_password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bg-transparent text-light" placeholder="Referral code" name="referral_by" value="{{ request()->segment(2) }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-bullhorn"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input class="bg-transparent text-light" type="checkbox" id="agreeTerms" name="terms" value="1" name="terms" required {{ old('terms') == 1 ? 'checked' : '' }}>
                                <label for="agreeTerms">
                                    <span class="text-light">I agree to the <a href="{{ url('terms-and-conditions') }}">terms</a></span> 
                                </label>
                            </div>
                        </div>
    
                        <div class="col-4">
                            
                        </div>
    
                    </div>
                    <div class="social-auth-links text-center"> 
                        <button type="submit" class="btn btn-primary btn-block">
                            <b>Register</b>
                        </button>
                        <h4 class="text-light text-center"><span class="text-center">Already have an account?</span>
                        <a href="/login" class="link">Login</a></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

</body>
    @include('master.layout.js')
</html>