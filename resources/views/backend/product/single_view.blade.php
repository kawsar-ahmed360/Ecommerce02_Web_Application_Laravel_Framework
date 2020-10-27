@extends('backend/master')

@section('content')
<div class="row" style="margin-top: 30px">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                            @if(Session::has('success'))
                                         <div class="alert alert-success">
                                                 {{ Session::get('success') }}
                                         </div>
                                        @endif  

                                        <h3 style="" class="">Single Product View </h3>
                                      

                                       <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <h4>Product Info:</h4>
                                            
                                            <thead>
                                               <th>SL</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Product summary</th>
                                                <th>Product Price</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                          
                                            </thead>


                                            <tbody>
                                              
                                               <tr align="center">
                                                                  
                                                                  <td>{{ $product->id }}</td>
                                                                  <td>{{ $product->product_name }}</td>
                                                                  <td>{{ $product->categorys['category_name'] }}</td>
                                                                  <td>{{ $product->brands['brand_name'] }}</td>
                                                                  <td>{{ Str::limit($product->product_summary,20) }}</td>
                                                                  <td>{{ $product->product_price }}</td>
                                                                  <td>
                                                                      @if($product->status=='1')
                                                                          <span class="badge badge-warning">Deactive</span>
                                                                      @else
                                                                          <span class="badge badge-success">active</span>

                                                                      @endif
                                                                  </td>
                                                                  <td><img src="{{ $product->image?url('public/backend/product_image/'.$product->image):"" }}" width="100px" alt=""></td>
                                                                </tr>

                                                               
                                            </tbody>

                                       </table>

                                       <span><b>Poduct Summary : &nbsp;&nbsp;&nbsp;&nbsp;</b></span> {{ $product->product_summary }} <br><br>


                                        <span><b>Poduct Description : &nbsp;&nbsp;&nbsp;&nbsp;</b></span> {{ $product->product_description }} <br><br>


                                     <table width="100%">
                                         <h4>Product Gellary</h4>
                                         @foreach(App\product_gallerys::where('product_id',$product->id)->get() as $img)
                                            <img src="{{ $img->product_gallery?url('public/backend/product_gallery/'.$img->product_gallery):"" }}" width="150px" style="margin: 6px" alt="">
                                         @endforeach
                                     </table> 

                                         <table width="100%" style="margin-top: 10px">
                                         <h4>Product Color</h4>
                                         @foreach(DB::table('product_colors')->where('product_id',$product->id)->join('colors','product_colors.color_id','colors.id')->get() as $color)
                                            {{ $color->color_name }},
                                         @endforeach
                                     </table> 


                                           <table width="100%" style="margin-top: 10px">
                                         <h4>Product Size</h4>
                                         @foreach(DB::table('product_sizes')->where('product_id',$product->id)->join('sizes','product_sizes.size_id','sizes.id')->get() as $size)
                                            {{ $size->size_name }},
                                         @endforeach
                                     </table>   
                                         

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      

@endsection




@section('footer')



@endsection