@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                            @if(Session::has('success'))
                                         <div class="alert alert-success">
                                                 {{ Session::get('success') }}
                                         </div>
                                        @endif  

                                        <h3 style="" class="card-title">Product View </h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Product summary</th>
                                                <th>Product Price</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="colorshow">
                                                   @php($sl=1)

                                                    @foreach($product as $p)
                                                              
                                                              <tr align="center">
                                                                  
                                                                  <td>{{ $sl++ }}</td>
                                                                  <td>{{ $p->product_name }}</td>
                                                                  <td>{{ $p->categorys['category_name'] }}</td>
                                                                  <td>{{ $p->brands['brand_name'] }}</td>
                                                                  <td>{{ Str::limit($p->product_summary,20) }}</td>
                                                                  <td>{{ $p->product_price }}</td>
                                                                  <td>
                                                                      @if($p->status=='1')
                                                                          <span class="badge badge-warning">Deactive</span>
                                                                      @else
                                                                          <span class="badge badge-success">active</span>

                                                                      @endif
                                                                  </td>

                                                                  <td>
                                                                      @if($p->status=='1')
                                                                       <a href="{{ route('Product_Active',$p->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></a>
                                                                       @else
                                                                       <a href="{{ route('Product_Deactive',$p->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></a> 


                                                                      @endif
                                                                       <a href="{{ route('Product_Edite',$p->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                                       <a href="{{ route('Product_Single_view',$p->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>

                                                                       <a href="{{ route('Product_Delete',$p->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                                  </td>
                                                              </tr>

                                                    @endforeach
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      

@endsection




@section('footer')

 <script type="text/javascript">
   @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','success') }}";

      switch(type){
        case "success":
         toastr.success("{{ Session::get('message') }}");
          break;
      }
   @endif
 </script>


@endsection