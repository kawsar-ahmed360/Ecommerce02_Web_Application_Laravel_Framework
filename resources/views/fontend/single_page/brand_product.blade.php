@extends('fontend/master')

@section('content')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Brand wise Products
		</h2>
	</section>	

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					@foreach(App\categorys::where('status','2')->get() as $cat)

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $cat->id }}">
						{{ $cat->category_name }}
					</button>

					@endforeach



				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					       <form action="{{ route('searchProduct') }}" method="get" accept-charset="utf-8">
					<div class="bor8 dis-flex p-l-15">
                           	 
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
                           	 
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="fname" placeholder="Search">
						{{-- <input class="mtext-107 cl2 size-114 plh2 p-r-15" value="{{ 'asdfghjklzxcvbnmqwertyuiop' }}" type="hidden" name="lname" placeholder="Search"> --}}

                           	
					</div>	
                           </form>
					
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full">
					<div class="wrap-filter flex-w w-full" style="background-color: #858585;">
				        <div>
				            <div style="padding: 20px; font-size: 25px; color: #fff">
				                Brands
				            </div>
				            <div style="padding: 0px 20px 20px 20px;">


				               <form action="{{ route('BrandProduct') }}" method="get" accept-charset="utf-8">
	                    @foreach(App\brands::where('status','2')->get() as $b)

				               	 
				               	  <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" style="cursor: pointer;color:white" value="{{ $b->id }}" name="brand_id" class="filter-link stext-106 trans-04" style="color: #fff">
				                    {{ $b->brand_name }}
				                </button>
				               	

				                @endforeach
				               </form>

				                
				            </div>
				        </div>
				    </div>
				</div>
			</div>



			<div class="row isotope-grid">

				@foreach($product as $key => $p)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 @if($key > 3) moreload @endif isotope-item {{ $p->cat_id }}">
					<!-- Block2 -->
                   
                   	<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ $p->image?url('public/backend/product_image/'.$p->image):"" }}" height="350px" width="100px" style="border-radius: 4px" alt="IMG-PRODUCT">

							<a href="{{ route('SinglePorduct',$p->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Add to Card
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('SinglePorduct',$p->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $p->product_name }}
								</a>

								<span class="stext-105 cl3">
									${{ $p->product_price }}
								</span>
							</div>

						</div>
					</div>

				</div>
				@endforeach


				


			</div>
				
		</div>
	</section>



@endsection