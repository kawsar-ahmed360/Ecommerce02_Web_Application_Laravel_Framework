@php($sl=1)

@foreach($contact as $it)
    
    <tr align="center">
    	<td>{{ $sl++ }}</td>
    	<td>{{ $it->name }}</td>
    	<td>{{ $it->email }}</td>
    	<td>{{ $it->mobile }}</td>
    	<td>Please Click Message box</td>
        <td>
        	@if($it->status=='1')
    	 <span class="badge badge-warning">Unseen</span>
        @else
    	 <span class="badge badge-success">Seen</span>
    	@endif
        </td>


          <td>
        	@if($it->status=='1')
    	 <button onclick="message('{{ $it->id }}','{{ $it->message }}')" class="btn btn-success btn-sm"><i class="fa fa-envelope"></i></button>
        @else
    
    	 <button onclick="messageUnseen('{{ $it->id }}','{{ $it->message }}')" class="btn btn-warning btn-sm"><i class="fa fa-envelope"></i></button>
    	@endif
    	 <button onclick="del('{{ $it->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
    	 
        </td>
    </tr>

@endforeach



