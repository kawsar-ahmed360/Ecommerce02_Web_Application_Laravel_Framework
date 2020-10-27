@extends('fontend/master')


@section('content')


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Login
		</h2>
	</section>	


		<section class="bg0 p-t-50 p-b-116">
		<div class="container">

		 <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5" style="">
                    <div class="card overflow-hidden" style="width: 570px;box-shadow: 4px -3px 6px 1px black;">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to Veltrix.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{ asset('public/backend/images/logo-sm.png') }}" height="24" alt="logo">
                                </a>
                            </div>
                        </div>
                          @if ($errors->any())
                                                                            <div class="alert alert-danger">
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li>{{ $error }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endif


                        <div class="card-body p-4">
                            <div class="p-3">
                                      @if(Session::has('message'))
                                        <div class="alert alert-danger">
                                             {{ Session::get('message') }}
                                        </div>
                                      @endif                                  

                            

                                <form class="form-horizontal mt-4" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                         <input id="text" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter your User Name..">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>

                                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Enter your Password...">

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

                                       <div class="form-group row">
                                        
                                         <a  href="{{ route('redirectToProvider') }}" class="btn btn-success btn-sm m-r-20"><i>Login Gitgub</i></a>
                                         <a href="" class="btn btn-info btn-sm"><i>Login goolge</i></a>
                                       
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

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="{{ route('CustomerRegister') }}" class="font-weight-medium text-primary"> Signup now </a> </p>
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>


                </div>
            </div>

		</div>
	</section>


@endsection

