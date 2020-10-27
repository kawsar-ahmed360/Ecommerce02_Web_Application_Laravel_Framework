<!DOCTYPE html>
<html lang="en">
<head>
	<title>Popularsoft E-Commerce</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('public/fontend/images/icons/favicon.png') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/MagnificPopup/magnific-popup.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
	       <!-- DataTables -->
        <link href="{{ asset('public/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('public/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 

  
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/toastr.min.css') }}">


	
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/main.css') }}">

	<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<div class="left-top-bar">
							<font size="3px" color="#fff">
		                        01928511049 &nbsp;&nbsp;&nbsp;
		                        asadullahkpi@gmail.com
		                    </font>
						</div>
					</div>

					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
	                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
	                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
	                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
	                    </ul>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.html" class="logo">
						<img src="{{ asset('public/fontend/images/logo/logo.png') }}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
	                        <li class="active-menu">
	                            <a href="{{ route('/') }}">HOME</a>
	                        </li>
	                        <li class="active-menu">
	                            <a href="#">SHOPS</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{ route('catProduct') }}">Products</a></li>
	                                <li><a href="shoping-cart.html">Checkout</a></li>
	                                <li><a href="{{ route('ShoppingCart') }}">Cart</a></li>
	                            </ul>
	                        </li>
	                        <li>
	                            <a href="">ABOUT US</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('ContactPage') }}">CONTACT US</a>
	                        </li>

	                        @if(@Auth::user()->id==null)
                             <li><a href="{{ route('CustomerLogin') }}">LOGIN</a></li>
	                        @else

                             <li class="active-menu">
	                            <a href="#">ACCOUNT</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{ route('Customer_Dashbord') }}">Profile</a></li>
	                           
	                                <li><a href="{{ route('customerOrder') }}">Your Order</a></li>
	                                <li>

	                                	<a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">LogOut</a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

	                                </li>
	                            </ul>
	                        </li>
	                        @endif
	                    </ul>
					</div>	


					@php
                      $count = Cart::content();
					@endphp

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ count($count) }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>

				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="{{ asset('public/fontend/images/logo/logo.png') }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<font size="3px" color="#fff">
	                        01928511049 &nbsp;&nbsp;&nbsp;
	                        asadullahkpi@gmail.com
	                    </font>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
	                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
	                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
	                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
	                    </ul>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li><a href="index.html">Home</a></li>
				<li>
					<a href="">SHOPS</a>
					<ul class="sub-menu-m">
						<li><a href="">Products</a></li>
                        <li><a href="">Checkout</a></li>
                        <li><a href="shoping-cart.html">Cart</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<li>
                    <a href="">ABOUT US</a>
                </li>
                <li>
                    <a href="contact.html">CONTACT US</a>
                </li>
                <li><a href="">LOGIN</a></li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('public/fontend/images/icons/icon-close2.png') }}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">


					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{ asset('public/fontend/images/item-cart-01.jpg') }}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>



				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	
@yield('content')


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-6 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contact Us
					</h4>
					<p class="stext-107 cl7 hov-cl1 trans-04" style="font-size: 15px;">
	                    Address: Notun bazar,Gulshan-Dhaka, &nbsp; Cell: 01928511049 , &nbsp; Email: asadullahkpi@gmail.com
	                </p>
				</div>

				<div class="col-sm-6 col-lg-6 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Follow Us
					</h4>

					<ul class="social">
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
				</div>
			</div>

			<div class="p-t-40">
				<p class="stext-107 cl6 txt-center">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> @FF. Designed & Developed By Popularsoft
				</p>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



	<!-- Modal1 -->


	

	<script src="{{ asset('public/fontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="{{ asset('public/fontend/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('public/fontend/js/slick-custom.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/parallax100/parallax100.js') }}"></script>

	  <script src="{{ asset('public/backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

         <script src="{{ asset('public/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

            <script src="{{ asset('public/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.j') }}s"></script>
        <script src="{{ asset('public/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.j') }}s"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('public/backend/js/pages/datatables.init.js') }}"></script> 

        <script src="{{ asset('public/fontend/js/toastr.min.js') }}"></script> 


      

	<script>
        $('.parallax100').parallax100();
	</script>
	<script src="{{ asset('public/fontend/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
	<script src="{{ asset('public/fontend/js/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('public/fontend/js/countdown.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/isotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('public/fontend/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
	<script src="{{ asset('public/fontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<script src="{{ asset('public/fontend/js/main.js') }}"></script>

	@yield('footer');

	

</body>
</html>