@extends('layout.master')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					List of users
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="cart-table cart-table-full table-responsive">
							<table class='table'>
								<thead>
									<tr>
										<th class='col-product-name'>Number</th>
										<th class='col-product-price'>Name</th>
										<th class='col-product-times'>First Name</th>
										<th class='col-product-quantity'>Last Name</th>
										<th class='col-product-equal'>E-Mail</th>
										<th class='col-product-actions'>Address</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $index=>$user)
										<tr>
											<td>
												<a href="#" class="link__order-detail"> {{$index}} </a>
											</td>
											<td> {{$user['name']}} </td>
											<td> {{$user['first-name']}} </td>
											<td> {{$user['last-name']}} </td>
											<td> {{$user['email']}} </td>
											<td> {{$user['address']}} </td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>			
@endsection