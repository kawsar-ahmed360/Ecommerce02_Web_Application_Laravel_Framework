@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 style="" class="card-title">Message View</h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="brandshow">

                                                     @include('backend/contact/message_view_ajax')
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                   @include('backend/contact/modal/show_message')     
                   {{-- @include('backend/brand/modal/edite')      --}}

@endsection




@section('footer')


<script type="text/javascript">
 


	
  function message(Id,Message){

  	var alert = "If you Wnat to seen Message box";

  	if (confirm(alert)) {

  $('#message').modal('show');
  $('#message').find('#showmessage').val(Message);

   	$.ajax({
  		url:"{{ route('MessageSeen') }}",
  		type:"GET",
  		data:{Id:Id},

  		success:function(){

  			$.get("{{ route('contactViewajax') }}",function(data){
                
                $('#brandshow').empty().html(data);

  			});
  		}
  	});

  	}


  }


  function messageUnseen(Id,Message){
     
      var alrm = "If you Want to Unseen This Message Box";

      if (confirm(alrm)) {
        
         $('#message').modal('show');
         $('#message').find('#showmessage').val(Message);

         $.ajax({
            
            url:"{{ route('MessageUnSeen') }}",
            type:"GET",
            data:{Id:Id},

            success:function(){

            	$.get("{{ route('contactViewajax') }}",function(data){

            		 $('#brandshow').empty().html(data);
            	});
            }

         });

      }

  }


  function del(Id){

  	var alrm = "If You Want to delete This item Press OK";

  	if (confirm(alrm)) {

  		$.ajax({
  			url:"{{ route('MessageDelete') }}",
  			type:"GET",
  			data:{Id:Id},

  			success:function(){
              
              $.get("{{ route('contactViewajax') }}",function(data){

            		 $('#brandshow').empty().html(data);
            	});

              

  			}
  		});
  	}
  }




</script>



@endsection


