<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:29 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Login  | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/backend/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('public/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('public/backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>

    
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5" style="box-shadow: 21px 8px 11px 4px;">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to Veltrix.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{ asset('public/backend/images/logo-sm.png') }}" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">

                                <form class="form-horizontal mt-4" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                         <input id="text" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your User Name..">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>

                                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your Password...">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                                
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-4">

                                             @if (Route::has('password.request'))
                                               <a class="btn btn-link" href="{{ route('password.request') }}">
                                               <i class="mdi mdi-lock"></i> Forgot your password?
                                            </a>
                                        @endif
                                            
                                        </div>
                                    </div>


                                 <div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-4">

                                            <a href="{{ route('redirectToProvider') }}" class="btn btn-success btn-sm">Login Github</a> 
                                            
                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="{{ route('register') }}" class="font-weight-medium text-primary"> Signup now </a> </p>
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('public/backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/backend/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('public/backend/js/app.js') }}"></script>

</body>


<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:29 GMT -->
</html>