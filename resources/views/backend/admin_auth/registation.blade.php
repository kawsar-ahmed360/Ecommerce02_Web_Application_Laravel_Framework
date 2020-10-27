<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:30 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Register | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
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
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20">Free Register</h5>
                                    <p class="text-white-50">Get your free Veltrix account now.</p>
                                    <a href="index.html" class="logo logo-admin">
                                      <img src="{{ asset('public/backend/images/logo-sm.png') }}" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>
    
                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form class="form-horizontal mt-4" action="{{ route('register') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your User Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email..............">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>  


                                          <div class="form-group">
                                            <label for="userpassword">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                        </div>
    
                                        <div class="form-group mt-2 mb-0 row">
                                            <div class="col-12 mt-4">
                                                <p class="mb-0">By registering you agree to the Veltrix <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div>
                                        </div>
    
                                    </form>
    
                                </div>
                            </div>
    
                        </div>
    
                        <div class="mt-5 text-center">

                            <p>Already have an account ? <a href="{{ route('login') }}" class="font-weight-medium text-primary"> Login </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
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

<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:30 GMT -->
</html>
