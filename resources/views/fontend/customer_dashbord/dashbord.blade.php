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
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Your Dashbord
		</h2>
	</section>	


		<section class="bg0 p-t-50 p-b-116">
		<div class="container">

	       <div class="row">
	       	       
	       	       <div class="col-md-2">
	       	       	<ul>
	         			    <li class="li"><a href="{{ route('Customer_Dashbord') }}">Profile</a></li>
	         			    <li class="li"><button onclick="password_change('{{ @Auth::user()->id }}')" href="">Password Change</button></li>
	         			    <li class="li"><a href="{{ route('customerOrder') }}">Your Order</a></li>
	         			   
	         			</ul>
	       	       </div>

	       	       <div class="col-md-10">
	       	       	          
	       	       	          <div class="row">
	       	       	         
	       	       	          	   <div class="col-md-2">
	       	       	          	   	
	       	       	          	   </div>

	       	       	          	   <div class="col-md-7">
	       	       	          	   	   <div class="card">
	       	       	          	   	   	     <div class="card-body">
	       	       	          	   	   	     	 

	       	       	          	   	   	     	       <div class="image" style="text-align: center">
@php
$us = App\user::find(Auth::user()->id);
@endphp
                                                      
                                                   
														
																   <img src="{{ @Auth::user()->image?url('public/fontend/profile/'.@Auth::user()->image):url('public/fontend/envato.png') }}" alt="" style="border-radius: 9px;width: 300px">
															
														
	       	       	          	   	   	     	 	
	       	       	          	   	   	     	 	   <h3 style="margin-top: 6px">Creatice It</h3>
	       	       	          	   	   	     	 	   <p>Dhaka,Bangladesh</p>
	       	       	          	   	   	     	 </div>

	       	       	          	   	   	     	 <table class="table table-bordered">
	       	       	          	   	   	     	 	 <tbody id="customerInfo">


	       	       	          	   	   	     	

	       	       	          	   	   	     	 	 	@include('fontend/customer_dashbord/dashbord_view_ajax');

	       	       	          	   	   	     	 	</tbody>
	       	       	          	   	   	     	 </table> 	

	       	       	          	   	   	     </div>
	       	       	          	   	 
	       	       	          	   	   </div>
	       	       	          	   </div>
	       	       	          </div>
	       	       </div>
	       </div>

		</div>
	</section>

@include('fontend/customer_dashbord/modal/customer_info');
@include('fontend/customer_dashbord/modal/password_change');
@include('fontend/customer_dashbord/modal/image');
@endsection


	
@section('footer')


  <script type="text/javascript">
  	 function edit_pro(EditeId,Name,Email,Mobile,Address){

  	 	$('#AddCategory').modal('show');
  	 	$('#AddCategory').find('#name').val(Name);
  	 	$('#AddCategory').find('#email').val(Email);
  	 	$('#AddCategory').find('#mobile').val(Mobile);
  	 	$('#AddCategory').find('#address').val(Address);
  	 	$('#AddCategory').find('#UsId').val(EditeId);

  	 }

  	 $('#customerinfo').submit(function(e){
  	 	e.preventDefault();
  	 	var url = $(this).attr('action');
  	 	var method = $(this).attr('method');
  	 	var data = $(this).serialize();

  	 	$('#AddCategory').modal('hide');

  	 	$.ajax({
  	 		url:url,
  	 		method:method,
  	 		data:data,

  	 		success:function(){

  	 			$.get("{{ route('CustomerviewAjax') }}",function(data){
  	 				$('#customerInfo').empty().html(data);
  	 			});
  	 		}
  	 	});
  	 	
  	 });


  	 function password_change(UsId){
  	 	$('#passwordChange').modal('show');
  	 	$('#passwordChange').find('#UsId').val(UsId);
  	 }

  	 $('#passchnage').submit(function(e){
  	 	e.preventDefault();
  	 	var url = $(this).attr('action');
  	 	var method = $(this).attr('method');
  	 	var data = $(this).serialize();

  	 	$('#passwordChange').modal('hide');

  	 	$.ajax({
  	 		url:url,
  	 	    method:method,
  	 	    data:data,

  	 	    success:function(){

  	 	    	$.get("{{ route('CustomerviewAjax') }}",function(data){
  	 				$('#customerInfo').empty().html(data);
  	 			});
  	 	    }
  	 	});

  	 });
  </script>

@endsection

