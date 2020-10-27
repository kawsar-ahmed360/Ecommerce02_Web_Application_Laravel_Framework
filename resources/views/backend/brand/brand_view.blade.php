@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 style="" class="card-title">Brand View  <button onclick="add_brand()" class="btn btn-success btn-sm">Add Brand</button></h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Brand Name</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="brandshow">

                                                     @include('backend/brand/brand_viewajax')
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                   @include('backend/brand/modal/add_brand')     
                   @include('backend/brand/modal/edite')     

@endsection




@section('footer')

<script type="text/javascript">
    function add_brand(){
     $('#AddBrand').modal('show');
    }

    $('#Brand_add').submit(function(e){
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();
     $('#AddBrand').modal('hide');

        $.ajax({
           
           url:url,
           type:method,
           data:data,

           success:function(){

            $.get("{{ route('Brands_Viewajax') }}",function(data){
                $('#brandshow').empty().html(data);
            });

           }

        });
    });

    function acitve(BrId){
        var alrt = "if you want to active this item,press ok";
        if (confirm(alrt)) {
            $.ajax({
                url:"{{ route('Brands_Activeajax') }}",
                type:"GET",
                data:{BrId:BrId},

                success:function(){
                   
                    $.get("{{ route('Brands_Viewajax') }}",function(data){
                $('#brandshow').empty().html(data);
            });


                }
            });
        }
    }  


    function deactive(BrId){
        var alrt = "if you want to Deactive this item,press ok";
        if (confirm(alrt)) {
            $.ajax({
                url:"{{ route('Brands_Deactiveajax') }}",
                type:"GET",
                data:{BrId:BrId},

                success:function(){
                   
                    $.get("{{ route('Brands_Viewajax') }}",function(data){
                $('#brandshow').empty().html(data);
            });


                }
            });
        }
    }  


     function dele(BrId){
        var alrt = "if you want to Delete this item,press ok";
        if (confirm(alrt)) {
            $.ajax({
                url:"{{ route('Brands_Deleteajax') }}",
                type:"GET",
                data:{BrId:BrId},

                success:function(){
                   
                    $.get("{{ route('Brands_Viewajax') }}",function(data){
                $('#brandshow').empty().html(data);
            });


                }
            });
        }
    }

    function edite(BraId,Name){

        $('#EditeBrand').modal('show');
        $('#EditeBrand').find('#brand_name').val(Name);
        $('#EditeBrand').find('#UsId').val(BraId);
    }

    $('#Brand_Edite').submit(function(e){
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('#EditeBrand').modal('hide');
         $.ajax({
            url:url,
            type:method,
            data:data,
            success:function(){

                       $.get("{{ route('Brands_Viewajax') }}",function(data){
                $('#brandshow').empty().html(data);
            });
            }
         });
    });
</script>


@endsection