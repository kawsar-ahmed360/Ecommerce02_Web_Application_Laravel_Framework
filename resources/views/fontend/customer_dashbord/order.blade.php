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
			Your Orders
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
	       	       	          	   	 
	       	       	          	   	   	     	 
           


	       	       	          	   	   	     	 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
	       	       	          	   	   	     	 
                                                     <thead>
                                                     	 <tr align="center">
                                                     	 	<th>Sl</th>
                                                     	 	<th>Fname</th>
                                                     	 	<th>Mobile</th>   
                                                     	     <th>Total Ammount</th>
                                                     	 	<th style="">date</th>
                                                     	 	<th style="">Qty</th>
                                                     	 	<th>Status</th>
                                                     	 	<th>Action</th>
                                                     	 </tr>
                                                     </thead>


                                                     <tbody>
                                                     	@php
                                                         $sl=1;


                                                       
                                                     	@endphp
                                                     	
                                                     	 @foreach($order as $o)

                                                     	 @php
                                                             $details = App\order_details::where('order_id',$o->id)->count('order_id');
                                                     	 @endphp
                                                             
                                                              <tr align="center">
                                                              	<td>{{ $sl++ }}</td>
                                                              	<td>{{ $o->fname }}</td>
                                                              	
                                                              	<td>{{ $o->mobile }}</td>
                                                                 
                                                                 <td>{{ $o->total_ammount }}</td>
                                                              
                                                              	<td>{{ $o->created_at}}</td>
                                                              	<td>{{ $details}}</td>
                                                              	<td>
                                                              		@if($o->status=='1')
                                                                      <span class="badge badge-warning">panding</span>
                                                              		@else
                                                                      <span class="badge badge-success">Approve</span>

                                                              		@endif
                                                              	</td>
                                                              	<td>
                                                              		<a href="{{ route('customerOrderDetails',$o->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                              	</td>
                                                              </tr>

                                                     	 @endforeach

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

