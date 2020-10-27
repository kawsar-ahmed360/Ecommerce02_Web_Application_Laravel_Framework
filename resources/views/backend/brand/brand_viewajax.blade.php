@php($sl=1)

@foreach($brand as $b)


 <tr align="center">
 	<td>{{ $sl++ }}</td>
 	<td>{{ $b->brand_name }}</td>
 	<td>
 		@if($b->status=='1')
           <span class="badge badge-warning">Deactive</span>
 		@else
           <span class="badge badge-success">Active</span>

 		@endif
 	</td>

 	<td>
 		@if($b->status=='1')
 		  <button onclick="acitve('{{ $b->id }}')" class="btn btn-success btn-sm" type=""><i class="fa fa-arrow-alt-circle-down"></i></button>
 		@else
 		  <button onclick="deactive('{{ $b->id }}')" class="btn btn-warning btn-sm" type=""><i class="fa fa-arrow-alt-circle-up"></i></button>
 		@endif
 		  <button onclick="edite('{{ $b->id }}','{{ $b->brand_name }}')" class="btn btn-info btn-sm" type=""><i class="fa fa-edit"></i></button>
 		  <button onclick="dele('{{ $b->id }}')" class="btn btn-danger btn-sm" type=""><i class="fa fa-trash"></i></button>
 	</td>
 </tr>

@endforeach