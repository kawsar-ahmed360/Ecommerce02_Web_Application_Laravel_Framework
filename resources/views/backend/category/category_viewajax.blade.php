                       


                                     @php($sl=1)
                                              @foreach($cat as $it)
                                                    
                                                    <tr align="center">
                                                    	<td>{{ $sl++ }}</td>
                                                      <td>{{ $it->category_name }}</td>
                                                      <td>
                                                        @if($it->status=='1')
                                                          <span class="badge badge-warning">Deactive</span>
                                                        @else
                                                          <span class="badge badge-success">Active</span>
                                                        @endif
                                                      </td>

                                                       <td>
                                                        @if($it->status=='1')
                                                             <button onclick="active('{{ $it->id }}')" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
                                                        @else
                                                           <button onclick="deactive('{{ $it->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button> 

                                                        @endif
                                                            <button onclick="edite_category('{{ $it->id }}','{{ $it->category_name }}')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                                            <button onclick="dele('{{ $it->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                      </td>
                                                    	
                                                    
                                                    	<td>
                                                    		
                                                    	</td>
                                                    </tr>
                                              @endforeach