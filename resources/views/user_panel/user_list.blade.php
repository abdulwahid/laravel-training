
 @extends('default')

	@section('title')
	
	  		AllUsers

	@stop	

	@section('content')
			<table>
				<thead>
					<tr>
					  <th></th>		
				      <th>Username</th>
				      <th>First Name</th>
				      <th>Last Name</th>
				      <th>Email</th>
				    </tr>
				</thead>
				<tbody>
 					
					@foreach($userinfo as $key => $value )
						<?php //echo $key['name']; ?>
						<tr>
							<td></td>
							<td>{{ $value['name'] }}</td>
							<td>{{ $value['f_name'] }}</td>
							<td>{{ $value['l_name'] }}</td>
							<td>{{ $value['email'] }}</td>
							

						</tr>	

					@endforeach
					
				</tbody>
			</table> 	
 	@stop	



 
