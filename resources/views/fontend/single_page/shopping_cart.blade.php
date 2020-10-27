@extends('fontend/master')

@section('content')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Shopping Cart
		</h2>
	</section>
		
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Image</th>
								<th class="column-2">Product Name</th>
								<th class="column-3">Color</th>
								<th class="column-3">size</th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th class="column-5">Remove</th>
							</tr>

							@php
                             $card = Cart::content();



                           
							@endphp


							@foreach($card  as $cart)

							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{ $cart->options->image?url('public/backend/product_image/'.$cart->options->image):'' }}" style="height: 95px;width: 80px;border-radius: 9px" alt="IMG">
									</div>
								</td>
								<td style="padding-left: 15px" class="column-2" style="margin-left: 5px">{{ $cart->name }}</td>
								<td class="column-3">
									@php
                                    $color_name = App\colors::where('id',$cart->options->color_id)->first();
									@endphp

									{{ $color_name->color_name }}

								</td>

								<td class="column-3">
									@php
                                    $size_name = App\sizes::where('id',$cart->options->size_id)->first();
									@endphp

									{{ $size_name->size_name }}

								</td>
								<td class="column-3">$ {{ $cart->price }}.00</td>
								<td class="column-4">
									
										
                                         <form action="{{ route('ShoppingCartUpdate') }}" method="POST">

                                         	 @csrf

                                         	 <div>
										<input class="mtext-104 cl3 txt-center num-product form-control sss" style="float: left" type="number" name="qty" value="{{ $cart->qty }}">
                                         	 <input type="hidden" value="{{ $cart->rowId }}" name="rowId">
										<input type="submit" value="Update" style="height: 42px; border:1px solid #e6e6e6" class="flex-c-m stext-101 c12 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                         	 </div>

                                         </form>

										
								
								</td>
								<td class="column-5">$ {{ $cart->subtotal }}.00</td>
								<td class="column-5"><a href="{{ route('ShoppingCartRemove',$cart->rowId) }}" class="btn btn-danger btn-sm"><i class="fa fa-window-close"></i></a></td>
							</tr>

							@endforeach

							


						</table>
					</div>
				</div>

				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">
                                    <h5>What would you like to do next?</h5>
                                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="total_area">
                                        <ul>
                                        <li>Cart Sub Total <span>${{ Cart::priceTotal() }}.00</span></li>
                                        <li>Eco Tax <span>0.00</span> Tk</li>
                                     
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Total <span>${{ Cart::priceTotal() }}0.00</span></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <a href="{{ route('catProduct') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Continue Shopping</a>
                            &nbsp;&nbsp;

                              @if(@Auth::user()->id==true)
                               <a href="{{ route('CheckOutPage') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                              @else
                               <a href="{{ route('CustomerLogin') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>

                              @endif
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>


@endsection