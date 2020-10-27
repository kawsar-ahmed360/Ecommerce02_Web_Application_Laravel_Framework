
@extends('backend/master')

@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 style="" class="card-title">Customer Order View</h3>
                                      

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>SL</th>
                                                <th>Customer_name</th>
                                                <th>Customer_Mobile</th>
                                                <th>Payment Type</th>
                                                <th>Total Ammount</th>
                                                <th>Qty</th>
                                                <th>Status</th>
                                            
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                       @php
                                          $sl=1;
                                         
                                         

                                       @endphp
                                             <tbody id="colorshow">
                                   
                                                 @foreach($ordeddr as $o)

                                                 @php
                                                    $details = App\order_details::where('order_id',$o->id)->count('order_id');
                                                 @endphp

                                                   <tr align="center">
                                                   	<td>{{ $sl++ }}</td>
                                                   	<td>{{ $o->shippings['fname'] }}</td>
                                                   	<td>{{ $o->shippings['mobile'] }}</td>
                                                   	<td>{{ $o->payments['payment'] }}</td>
                                                   	<td>{{ $o->total_ammount }}</td>
                                                   	<td>{{ $details }}</td>
                                                   	<td>
                                                   		@if($o->status=='1')
                                                            <span class="badge badge-warning">panding</span>
                                                   		@else
                                                            <span class="badge badge-success">Approve</span>
                                                              
                                                   		@endif
                                                   	</td>

                                                   	<td>
                                                   		@if($o->status=='1')
                                                         <a href="{{ route('customerOrderApprove',$o->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></a>
                                                   		@else
                                                         <a href="" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></a>

                                                   		@endif
                                                         <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                         <a href="{{ route('customerOrderDelete',$o->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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



@endsection

 