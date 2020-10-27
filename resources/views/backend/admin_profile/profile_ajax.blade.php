 		<tr align="center">
 	      	         	             	 	 	  			<th>Name</th>
 	      	         	             	 	 	  			<td>{{ $user->name }}</td>
 	      	         	             	 	 	  		</tr>

 	      	         	             	 	 	  		<tr align="center">
 	      	         	             	 	 	  			<th>Email</th>
 	      	         	             	 	 	  			<td>{{ $user->email }}</td>
 	      	         	             	 	 	  		</tr>

 	      	         	             	 	 	  		<tr align="center">
 	      	         	             	 	 	  			<th>Mobile</th>
 	      	         	             	 	 	  			<td>{{ $user->mobile }}</td>
 	      	         	             	 	 	  		</tr>

 	      	         	             	 	 	  		<tr align="center">
 	      	         	             	 	 	  			<th>Address</th>
 	      	         	             	 	 	  			<td>{{ $user->address }}</td>
 	      	         	             	 	 	  		</tr>

 	      	         	             	 	 	  		<tr align="center">
 	      	         	             	 	 	  		
 	      	         	             	 	 	  			<td colspan="2">
 	      	         	             	 	 	  				<button onclick="Profi_edit('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}','{{ $user->mobile }}','{{ $user->address }}')" type="" class="btn btn-info btn-sm">Info Edite</button>
 	      	         	             	 	 	  				<button onclick="pass_chan('{{ $user->id }}')" type="" class="btn btn-danger btn-sm">Password Change</button>
 	      	         	             	 	 	  				<button onclick="image()" type="" class="btn btn-success btn-sm">Profile Chnage</button>
 	      	         	             	 	 	  			</td>
 	      	         	             	 	 	  		</tr>