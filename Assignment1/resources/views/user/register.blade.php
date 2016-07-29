@extends('layout.master')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Create a new User and store it into session!</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="POST" role="form" action="{{url('user/store')}}" >
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">User Name</label>
							<div class="col-md-6">
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('first-name') ? 'has-error' :'' }}">
							<label for="first-name" class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" name="first-name" id="first-name" class="form-control" value="{{ old('first-name') }}">
								@if ($errors->has('first-name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first-name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('last-name') ? 'has-error' : '' }}">
							<label for="last-name" class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input type="text" name="last-name" id="last-name" class="form-control" value="{{ old('last-name') }}">
								@if ($errors->has('last-name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last-name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
							<label for="address" class="col-md-4 control-label">Address(Optional)</label>
							<div class="col-md-6">
								<input type="email" name="address" id="address" class="form-control" value="{{ old('address') }}">
								@if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>




@endsection