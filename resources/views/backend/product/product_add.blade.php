@extends('backend/master')

@section('content')

         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    	@if ($errors->any())
											    <div class="alert alert-danger">
											        <ul>
											            @foreach ($errors->all() as $error)
											                <li>{{ $error }}</li>
											            @endforeach
											        </ul>
											    </div>
											@endif

										@if(Session::has('message'))
										 <div class="alert alert-danger">
										 	     {{ Session::get('message') }}
										 </div>
										@endif

										@if(Session::has('success'))
										 <div class="alert alert-success">
										 	     {{ Session::get('success') }}
										 </div>
										@endif	
        
                                        <h3 class="" style="margin-bottom: 40px">Product Add Form</h3>


                             <form action="{{ route('Product_Save') }}" method="post" class="custom-validation" accept-charset="utf-8" enctype="multipart/form-data">
                                      	
                                      	
                                   @csrf           

        
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" data-parsley-required name="product_name" placeholder="Enter your Product Name..." id="example-text-input">
                                            </div>
                                        </div>


                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" isValid({true}) name="cat_id" id="cat_id">
                                                    <option selected="" disabled="">...Select Category..</option>
                                                      @foreach($cat as $c)
                                                        <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                                      @endforeach
                                                </select>
                                            </div>
                                        </div>


                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Brand Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" data-parsley-required name="brand_id" id="brand_id">
                                                    <option selected="" disabled="">...Select Brand..</option>
                                                     @foreach($brand as $b)
                                                        <option value="{{ $b->id }}">{{ $b->brand_name }}</option>
                                                      @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Color Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" data-parsley-required multiple name="color_id[]">
                                                    <option disabled="">...Select Color..</option>
                                                     @foreach($color as $co)
                                                        <option value="{{ $co->id }}">{{ $co->color_name }}</option>
                                                      @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Size Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" data-parsley-required multiple name="size_id[]" id="size_id">
                                                    <option disabled="">...Select Size..</option>
                                                      @foreach($size as $s)
                                                        <option value="{{ $s->id }}">{{ $s->size_name }}</option>
                                                      @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Summery</label>
                                            <div class="col-sm-10">

                                            	<textarea class="form-control" name="product_summary" data-parsley-required placeholder="Product Summery........"></textarea>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Description</label>
                                            <div class="col-sm-10">

                                            	<textarea class="form-control" name="product_description" data-parsley-required placeholder="Product Description....."></textarea>
                                                
                                            </div>
                                        </div>

                                       

                                      <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Price</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="product_price" data-parsley-required placeholder="Enter your Product Price...594$" id="example-text-input">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" data-parsley-required name="image">
                                            </div>
                                        </div>  


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Gallery</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" data-parsley-required multiple="" name="product_gallery[]" >
                                            </div>
                                        </div>
                                        

                                      
                                        <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="" class="btn btn-success btn-sm">Submit Product</button>
                                            </div>
                                        </div>
                                    
                                     
                                 </form> 

                                     
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

@endsection