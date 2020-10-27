@extends('fontend/master')


@section('content')

<style type="text/css">
	.li{
		background: gray;
		margin: 10px;
		width: 190px;
		padding: 5px;
		text-align: center;
		border-radius: 6px;
		border:1px solid lime;

		


	}
	.li a{
		color:white;
		display: block;

	}

	button{
		color:white;
	}

	

</style>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Single Orders Details
		</h2>
	</section>	


		<section class="bg0 p-t-50 p-b-116">
		<div class="container">

	       <div class="row">
	       	       
	       	       <div class="col-md-2">
	       	       	<ul>
	         			    <li class="li"><a href="{{ route('Customer_Dashbord') }}">Profile</a></li>
	         			  {{--   <li class="li"><button disabled="" onclick="password_change('{{ @Auth::user()->id }}')" href="">Password Change</button></li> --}}
	         			    <li class="li"><a href="{{ route('customerOrder') }}">Your Order</a></li>
	         			   
	         			</ul>
	       	       </div>

	       	       <div class="col-md-10">
	       	                             	         
	       	       	          
	       	       	          <div class="row">
	       	                        

	        	       	          	   <div class="col-md-12 m-l-30">

	        	       	          	   	@php
                                        $shipping = App\shippings::where('id',$order->shipping_id)->first();
                                        $order_details = App\order_details::where('order_id',$order->id)->get();
                                        $order_details = App\order_details::where('order_id',$order->id)->get();
                                       

                                     
	        	       	          	   	@endphp
	       	       	          	   	 
	       	       	          	   	   	     	 
                                         <table width="100%">
                                         	<tr>
                                         		<td width="30%">
                                         			<h4 style="text-decoration: underline;" class="m-b-10">Customer Info</h4>
                                         			 <b><i>Name :</i></b> {{ $shipping->fname }}<br>
                                         			 <b><i>Email :</i></b> {{ $shipping->email }}<br>
                                         			 <b><i>Mobile :</i></b> {{ $shipping->mobile }}<br>
                                         			 <b><i>Address :</i></b> {{ $shipping->address }}<br>
                                         		</td>
                                         		<td width="40%"></td>
                                         		<td width="30%">
                                         			<h4 style="text-decoration: underline;">Order Info</h4>
                                         			 <b><i>Order Id :#</i></b> {{ $order->id }}<br>
                                         			 <b><i>Date :</i></b> {{ $order->created_at }}<br>
                                         		</td>
                                         	</tr>
                                         </table>


                                         <table class="table table-bordered" width="100#">
                                         	<h4 style="text-decoration: underline;" class="m-t-30">Order Details</h4>

                                         	<thead>
                                         		<tr align="center">
                                         			<th>Sl</th>
                                         			<th>Product Name</th>
                                         			<th>Color Name</th>
                                         			<th>Size Name</th>
                                         	
                                         			<th>Subtotal</th>
                                         		</tr>
                                         	</thead>

                                         	<tbody>
                                         		@php
                                                $sl=1;
                                                $total = 0;
                                         		@endphp

                                         	@foreach($order_details as $or)
                                              	<tr align="center">
                                         			<td>{{ $sl++ }}</td>
                                         			<td>{{ $or->products['product_name'] }}</td>
                                         			<td>{{ $or->colors['color_name'] }}</td>
                                         			<td>{{ $or->sizes['size_name'] }}</td>
                                         			<td>{{ $or->subtotal }}</td>
                                         		</tr>

                                         		@php
                                                  $total+=$or->subtotal;
                                         		@endphp
                                         	@endforeach

                                         	<tr>
                                         		<td colspan="4" align="right">Total Ammount</td>
                                         		<td  align="center">{{ $total }}</td>
                                         	</tr>

                                         	<tr>
                                         		<td colspan="4" align="right">Payment</td>
                                         		<td  align="center">{{ $order->payments['payment'] }}</td>
                                         	</tr>
                                         	</tbody>
                                         	
                                         </table>


	       	       	          	   	   	     	

	       	       	          	   </div>
	       	       	          </div>
	       	       </div>
	       </div>

		</div>
	</section>


@endsection


	
@section('footer')


@endsection

