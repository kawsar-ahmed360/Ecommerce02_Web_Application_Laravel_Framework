@extends('fontend/master')


@section('content')


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Registation
		</h2>
	</section>


		<section class="bg0 p-t-50 p-b-116">
		<div class="container">

			<div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden" style="width: 570px;box-shadow: 4px -3px 6px 1px black;">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h4 class="text-white font-size-20">Free Register</h4>
                                    <p class="text-white-50">Get your free Veltrix account now.</p>
                                    <a href="index.html" class="logo logo-admin">
                                      <img src="{{ asset('public/backend/images/logo-sm.png') }}" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>
    
                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form class="form-horizontal mt-4" action="{{ route('CustomerRegisterSave') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter your User Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter your Email..............">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Enter your Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>  


                                          <div class="form-group">
                                            <label for="userpassword">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
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

                            <p>Already have an account ? <a href="{{ route('CustomerLogin') }}" class="font-weight-medium text-primary"> Login </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>
    
    
                    </div>
                </div>

		</div>
	</section>


@endsection

