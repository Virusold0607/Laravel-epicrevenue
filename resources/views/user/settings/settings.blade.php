@extends('shared.layout')

@section('body')
	<div class="hero hero-txt">
		<div class="container">
			<h1 class="hero-heading">Settings</h1>
		</div>
	</div>
	<div class="page-container background-gray no-shadow">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="panel panel-default">
						<div class="panel-heading">Account Information</div>
						<div class="panel-body">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<div class="alert alert-danger" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
											{{ $error }}
										</div>
									@endforeach
								</div>
							@endif
							{!! Form::model($user, array('url' => '/settings/updateInfo', 'method' => 'post', 'class' => 'form-horizontal'))!!}
							<div class="form-group">
								{!! Form::label('firstname', 'First name', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'First name', 'required'=>'required', 'size'=>'70' )) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('lastname', 'Last name', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Last name', 'cols' => '30', 'rows' => '6' )) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::email('email', null, array('class' => 'form-control', 'disabled' )) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('address1', 'Address', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('address1', null, array('class' => 'form-control', 'placeholder' => 'Address line 1', 'required'=>'required', 'size'=>'70' )) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('address2', '', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('address2', null, array('class' => 'form-control', 'placeholder' => 'Address line 2', 'required'=>'required' )) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('city', 'City', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City', 'required'=>'required' )) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('state', 'State', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('state', null, array('class' => 'form-control', 'placeholder' => 'State')) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('zip', 'Zipcode', array('class' => 'col-sm-2 control-label')) !!}
								<div class="col-sm-9">
									{!! Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Zipcode')) !!}
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="col-sm-2 control-label"></label>
								<div class="col-sm-9">
									{!! Form::submit('Update Info', array('class' => 'btn btn-default')) !!}
								</div>
							</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div><!--end grid_4-->

				<div class="col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">Email Notifications</div>
						<div class="panel-body">
							{!! Form::open(array('url' => '/settings/updateNotifications', 'method' => 'post'))!!}
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="newsletters" @if($user->emailNotification->newsletters === 'yes') checked @endif> Newsletter & Emails from Support
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="leads" @if($user->emailNotification->leads === 'yes') checked @endif> New lead email
									</label>
								</div>
							</div>
							{!! Form::submit('Update Notifications', array('class' => 'btn btn-default')) !!}
							{!! Form::close() !!}
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<a href="{!! url('/settings/password') !!}">Click here to change password</a>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<a href="{!! url('/taxdetails') !!}">Click here to submit or update tax information</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection