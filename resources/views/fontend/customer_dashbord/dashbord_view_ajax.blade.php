	       

	       	       	          	   	   	     	 	 	     <tr style="text-align: center">
	       	       	          	   	   	     	 	 		<th>Name</th><td>{{ @Auth::user()->name }}</td>
	       	       	          	   	   	     	 	 	</tr>
	       	       	          	   	   	     	 	 	<tr style="text-align: center">
	       	       	          	   	   	     	 	 		<th>Email</th><td>{{ @Auth::user()->email }}</td>
	       	       	          	   	   	     	 	 	</tr>
	       	       	          	   	   	     	 	 	<tr style="text-align: center">
	       	       	          	   	   	     	 	 		<th>Mobile</th><td>{{ @Auth::user()->mobile }}</td>
	       	       	          	   	   	     	 	 	</tr>

	       	       	          	   	   	     	 	 	<tr style="text-align: center">
	       	       	          	   	   	     	 	 		<th>Address</th><td>{{ @Auth::user()->address }}</td>
	       	       	          	   	   	     	 	 	</tr>

	       	       	          	   	   	     	 	 	<tr>
	       	       	          	   	   	     	 	 		<th colspan="2" style="text-align: center">
	       	       	          	   	   	     	 	 			<button onclick="edit_pro('{{ @Auth::user()->id }}','{{ @Auth::user()->name }}','{{ @Auth::user()->email }}','{{ @Auth::user()->mobile }}','{{ @Auth::user()->address }}')" class="btn btn-info btn-sm">Edite Profile</button>
	       	       	          	   	   	     	 	 			<button onclick="password_change('{{ @Auth::user()->id }}')" class="btn btn-danger btn-sm">Password Change</button>
	       	       	          	   	   	     	 	 			<button data-toggle="modal" data-target="#imageupload" class="btn btn-secondary btn-sm">Profile Picture Change</button>
	       	       	          	   	   	     	 	 		</th>
	       	       	          	   	   	     	 	 	</tr>
	       	       	          	   	   	     	 	 



