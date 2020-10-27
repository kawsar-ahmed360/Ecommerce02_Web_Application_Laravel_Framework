@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 style="" class="card-title">Category View  <button onclick="add_categor()" class="btn btn-success btn-sm">Add Category</button></h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Category Name</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="CategoryView">

                                               @include('backend/category/category_viewajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
@include('backend/category/modal/add_category')
@include('backend/category/modal/edite_category')
@endsection




@section('footer')

<script type="text/javascript">
    
function add_categor(){

    $('#AddCategory').modal('show');

}

$('#Category_add').submit(function(e){
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

            $.get("{{ route('Category_Viewajax') }}",function(data){
                $('#CategoryView').empty().html(data);
            });
         
        }
    });

});

function active(CatId){

    var alrm = "if you want to acive this item,press ok";

    if (confirm(alrm)) {
        $.ajax({
            url:"{{ route('Category_active') }}",
            type:"GET",
            data:{CatId:CatId},

            success:function(){
               
                $.get("{{ route('Category_Viewajax') }}",function(data){
                $('#CategoryView').empty().html(data);
            });

            }
        });
    }
}

function deactive(CartId){

    var alrm = "if you want to Deactive this item ,press ok";

    if (confirm(alrm)) {
        $.ajax({
            url:"{{ route('Category_Deactive') }}",
            type:"GET",
            data:{CartId:CartId},

            success:function(){

                  $.get("{{ route('Category_Viewajax') }}",function(data){
                $('#CategoryView').empty().html(data);
            });
            }
        });
    }
}


function edite_category(CatId,Name){

   $('#EditeCategory').modal('show'); 
   $('#EditeCategory').find('#category_name').val(Name); 
   $('#EditeCategory').find('#UsId').val(CatId); 
    
}

$('#Category_Edite').submit(function(e){
    e.preventDefault();
    var url =$(this).attr('action');
    var method =$(this).attr('method');
    var data =$(this).serialize();

   $('#EditeCategory').modal('hide'); 

   $.ajax({

       url:url,
       type:method,
       data:data,

       success:function(){

          $.get("{{ route('Category_Viewajax') }}",function(data){
                $('#CategoryView').empty().html(data);
            });
       }
   });

});

function dele(CatId){

    var arlmr = "if you want to delete this item,press ok";

    if (confirm(arlmr)) {
          
          $.ajax({
            url:"{{ route('Category_Delete') }}",
            type:"GET",
            data:{CatId:CatId},

            success:function(){
             
             $.get("{{ route('Category_Viewajax') }}",function(data){
                $('#CategoryView').empty().html(data);
            });

            }
          });

    }
}

</script>

@endsection