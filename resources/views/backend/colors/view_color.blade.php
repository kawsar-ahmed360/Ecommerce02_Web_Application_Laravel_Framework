@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 style="" class="card-title">Color View  <button onclick="add_color()" class="btn btn-success btn-sm">Add Color</button></h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Color Name</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="colorshow">

                                                     @include('backend/colors/view_ajax')
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                   @include('backend/colors/modal/add_color')     
                   @include('backend/colors/modal/edite')     

@endsection




@section('footer')

<script type="text/javascript">
    function add_color(){

        $('#AddColor').modal('show');
    }

    $('#Color_add').submit(function(e){
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('#AddColor').modal('hide');

        $.ajax({
            url:url,
            type:method,
            data:data,

            success:function(){

                $.get("{{ route('Colors_Viewajax') }}",function(data){
                    $('#colorshow').empty().html(data);
                });
            }
        });

    });

    function active(ColId){

        var alrm = "if you want to active this item,press ok";

        if (confirm(alrm)) {
           
           $.ajax({
             url:"{{ route('Colors_Activeajax') }}",
            type:"GET",
            data:{ColId:ColId},

            success:function(){
               
                 $.get("{{ route('Colors_Viewajax') }}",function(data){
                    $('#colorshow').empty().html(data);
                });

            }
           });
        }
    } 


    function deactive(ColId){

        var alrm = "if you want to Deactive this item,press ok";

        if (confirm(alrm)) {
           
           $.ajax({
             url:"{{ route('Colors_Deactiveajax') }}",
            type:"GET",
            data:{ColId:ColId},

            success:function(){
               
                 $.get("{{ route('Colors_Viewajax') }}",function(data){
                    $('#colorshow').empty().html(data);
                });

            }
           });
        }
    } 

    function dele(ColId){

        var alrm = "if you want to Delete this item,press ok";

        if (confirm(alrm)) {
           
           $.ajax({
             url:"{{ route('Colors_Deleteajax') }}",
            type:"GET",
            data:{ColId:ColId},

            success:function(){
               
                 $.get("{{ route('Colors_Viewajax') }}",function(data){
                    $('#colorshow').empty().html(data);
                });

            }
           });
        }
    }

    function edite(ColorID,Name){

     $('#EditeColor').modal('show');
     $('#EditeColor').find('#color_name').val(Name);
     $('#EditeColor').find('#UsId').val(ColorID);

    }

    $('#Color_Edite').submit(function(e){

        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

     $('#EditeColor').modal('hide');

     $.ajax({

        url:url,
        type:method,
        data:data,

        success:function(){
           
            $.get("{{ route('Colors_Viewajax') }}",function(data){
                    $('#colorshow').empty().html(data);
                });

        }
     });
    });
</script>

@endsection