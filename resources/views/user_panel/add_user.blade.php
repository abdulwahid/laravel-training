
 @extends('default')

  		@section('title')
  		AddUser
 	

 @stop	

 @section('content')


 		<h1>Create a New User</h1>	
		<form id="add_user" action="{{ url('user/validate') }}" method="post" >

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<fieldset>

						<?php// echo $validator;?>
					<p>
						<label for="username">Username*</label>
						<input name="name" id="name" type="text"/>
						<!-- <div class="error">{{ $errors->first('name') }}</div> -->
						@foreach ($errors->get('name') as $error)
			               		 {{ $error }}
			            @endforeach
					</p>
						
					<p>
						<label for="firstname">First Name*</label>
						<input name="f_name" id="f_name" type="text"/>
						<div class="error">{{ $errors->first('f_name') }}</div>
					</p>
						
					<p>
						<label for="lastname">Last Name*</label>
						<input name="l_name" id="l_name" type="text"/>
						<div class="error">{{ $errors->first('l_name') }}</div>
					</p>
						
					<p>
						<label for="email">Email*</label>
						<input name="email" id="email" type="email"/>
						<div class="error">{{ $errors->first('email') }}</div>
					</p>
						
					<p>
						<label for="address">Address</label>
						<input name="address" id="address" type="email"/>
					</p>
					<input type="submit" value="Submit"/>

				
				    


			</fieldset>

		</form>	 	
			  	
 @stop	



 
