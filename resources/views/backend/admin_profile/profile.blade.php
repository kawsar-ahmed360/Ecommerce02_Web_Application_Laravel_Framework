@extends('backend/master')

@section('content')

 <div class="container">
 	      
 	      <div class="row" style="margin-top: 50px">
 	      	         
 	      	      <div class="col-md-2">
 	      	         	
 	      	     </div>

 	      	       <div class="col-md-8">
 	      	         	<div class="row">
 	      	         		
 	      	         		<div class="col-md-12">
 	      	         	             
 	      	         	             <div class="card">
 	      	         	             	 <div class="card-body">
 	      	         	             	 	 <div class="image" align="center">
 	      	         	             	 	 	  <img src="{{ $user->image?url('public/backend/profile/'.$user->image):url('public/backend/envato.png') }}" width="300px;" style="border-radius: 9px" alt="">
 	      	         	             	 	 	  <h3>Popular Soft</h3>
 	      	         	             	 	 	  <p>Dhaka,Bangladesh</p> 
 	      	         	             	 	 </div>

 	      	         	             	 	 <div class="admininfo">

 	      	         	             	 	 	  <table class="table table-bordered">
 	      	         	             	 	 	  	<tbody id="AdminInfo">


 	      	         	             	 	     	@include('backend/admin_profile/profile_ajax')
 	      	         	             	 	 	 
 	      	         	             	 	 	  	</tbody>
 	      	         	             	 	 	  </table>
 	      	         	             	 	 </div>
 	      	         	             	 </div>
 	      	         	             	
 	      	         	             </div>
 	      	                 </div>

 	      	         	</div>
 	      	     </div>
 	      </div>
 </div>

@endsection

@include('backend/admin_profile/modal/profile_edite')
@include('backend/admin_profile/modal/password_change')
@include('backend/admin_profile/modal/image')

@section('footer')

 <script type="text/javascript">
 	function Profi_edit(ProId,Name,Email,Mobile,Address){
    
    $('#AdminEdit').modal('show');
    $('#AdminEdit').find('#name').val(Name);
    $('#AdminEdit').find('#email').val(Email);
    $('#AdminEdit').find('#mobile').val(Mobile);
    $('#AdminEdit').find('#address').val(Address);
    $('#AdminEdit').find('#UsId').val(ProId);

 	}

 	$('#Admin_Edite').submit(function(e){
 		e.preventDefault();
 		var url = $(this).attr('action');
 		var method = $(this).attr('method');
 		var data = $(this).serialize();

        $('#AdminEdit').modal('hide');

        $.ajax({
        	url:url,
        	method:method,
        	data:data,

        	success:function(){

        		$.get("{{ route('AdminProfileajax') }}",function(data){
        			$('#AdminInfo').empty().html(data);
        		});
        	}
        });

 	});

 	function pass_chan(AdminId){

 		$('#paswordChange').modal('show');
 		$('#paswordChange').find('#UsId').val(AdminId);
 	}

 	$('#password_change').submit(function(e){
 		e.preventDefault();

 		var url = $(this).attr('action');
 		var method = $(this).attr('method');
 		var data = $(this).serialize();
 		$('#paswordChange').modal('hide');
       
       $.ajax({
       	url:url,
       	method:method,
       	data:data,
       
       success:function(){

       	$.get("{{ route('AdminProfileajax') }}",function(data){
        			$('#AdminInfo').empty().html(data);
        		});
       }

       });

 	});

 	function image(AdminId){
      
      $('#image').modal('show');
      
 	}
 </script>

@endsection