@extends('backend.master')

@section('content')


<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="card-title">All User view</h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                            	<th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>

                                         @php($sl=1)
                                              @foreach($user as $it)
                                                    
                                                    <tr align="center">
                                                    	<td>{{ $sl++ }}</td>
                                                    	<td>{{ $it->name }}</td>
                                                    	<td>{{ $it->email }}</td>
                                                    	<td>{{ $it->mobile }}</td>
                                                    	<td>{{ $it->address }}</td>
                                                    	<td>
                                                    		<a href="{{ route('UserDelete',$it->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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