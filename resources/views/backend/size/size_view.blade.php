@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 style="" class="card-title">Size View  <button onclick="add_Size()" class="btn btn-success btn-sm">Add Size</button></h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Size Name</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="sizeshow">

                                                     @include('backend/size/size_view_ajax')
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                   @include('backend/size/modal/add_size')     
                   @include('backend/size/modal/edite')     

@endsection




@section('footer')

<script type="text/javascript">
    function add_Size(){
        $('#AddSize').modal('show');
    }

    $('#Size_add').submit(function(e){
        
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('#AddSize').modal('hide');

        $.ajax({
            url:url,
            type:method,
            data:data,

            success:function(){

                $.get("{{ route('Sizes_Viewajax') }}",function(data){
                    $('#sizeshow').empty().html(data);
                });
            }
        });


    });

    function active(SizeId){

        var alerm = 'if you want to active this item,press ok';

         if (confirm(alerm)) {

            $.ajax({

                url:"{{ route('Sizes_Activeajax') }}",
                type:"GET",
                data:{SizeId:SizeId},

                success:function(){

                    $.get("{{ route('Sizes_Viewajax') }}",function(data){
                    $('#sizeshow').empty().html(data);
                }); 
                }
            });
        }
    }


     function deactive(SizeId){

        var alerm = 'if you want to deactive this item,press ok';

         if (confirm(alerm)) {

            $.ajax({

                url:"{{ route('Sizes_Deactiveajax') }}",
                type:"GET",
                data:{SizeId:SizeId},

                success:function(){

                    $.get("{{ route('Sizes_Viewajax') }}",function(data){
                    $('#sizeshow').empty().html(data);
                }); 
                }
            });
        }
    }    


     function dele(SizeId){

        var alerm = 'if you want to Delete this item,press ok';

         if (confirm(alerm)) {

            $.ajax({

                url:"{{ route('Sizes_Deleteajax') }}",
                type:"GET",
                data:{SizeId:SizeId},

                success:function(){

                    $.get("{{ route('Sizes_Viewajax') }}",function(data){
                    $('#sizeshow').empty().html(data);
                }); 
                }
            });
        }
    }

    function edite(SizeId,Name){

        $('#EditeSize').modal('show');
        $('#EditeSize').find('#size_name').val(Name);
        $('#EditeSize').find('#UsId').val(SizeId);
    }

    $('#Size_Edite').submit(function(e){
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();
        $('#EditeSize').modal('hide');

        $.ajax({

            url:url,
            type:method,
            data:data,

            success:function(){
              
                 $.get("{{ route('Sizes_Viewajax') }}",function(data){
                    $('#sizeshow').empty().html(data);
                }); 

            }
        });


    });


</script>

@endsection