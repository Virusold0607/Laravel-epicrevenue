@extends('shared.layout')

@section('body')
	<div class="main dashboard payouts">
		<div class="signup-bg">
			<div class="container">
				<div class="signup-content">
					<h1 class="text-center">Settings</h1>
					<div class="setting-form">
						<h2 class="text-center">ACCOUNT	INFORMATION</h2>
						{!! Form::model($user, array('url' => '/settings/updateInfo', 'method' => 'post', 'class' => ''))!!}
						<div class="container">
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
							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('firstname', 'First name', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('firstname', null, array('class' => '', 'placeholder' => 'First name', 'required'=>'required' )) !!}
									</div>
								</div>
								<div class="col-sm-6">
									{!! Form::label('lastname', 'Last name', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('lastname', null, array('class' => '', 'placeholder' => 'Last name', 'required'=>'required' )) !!}
									</div>
								</div>
								<div class="col-sm-12">
									{!! Form::label('email', 'Email', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('email', null, array('class' => '', 'placeholder' => 'Email', 'required'=>'required' )) !!}
									</div>
								</div>
								<div class="col-sm-12">
									{!! Form::label('address1', 'Address', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('address1', null, array('class' => '', 'placeholder' => 'Address', 'required'=>'required' )) !!}
									</div>
								</div>
								<div class="col-sm-12">
									{!! Form::label('address2', 'Address 2', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('address2', null, array('class' => '', 'placeholder' => 'Address 2' )) !!}
									</div>
								</div>
								<div class="col-sm-6">
									{!! Form::label('city', 'City', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('city', null, array('class' => '', 'placeholder' => 'City' )) !!}
									</div>
								</div>
								<div class="col-sm-6">
									{!! Form::label('state', 'State', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('state', null, array('class' => '', 'placeholder' => 'State' )) !!}
									</div>
								</div>
								<div class="col-sm-6">
									{!! Form::label('zip', 'Zipcode', array('class' => '')) !!}
									<div class="input-text">
										{!! Form::text('zip', null, array('class' => '', 'placeholder' => 'Zipcode', 'required'=>'required' )) !!}
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<button type="submit" class="btn default-btn black-button small-round font-large">UPDATE	INFO</button>
								</div>
							</div>
						</div>

						{!! Form::close() !!}

						<div class="gray-bold-line white-background"></div>
						<h2 class="text-center">EMAIL	NOTIFICATIONS</h2>
						<div class="signup-small-container">
							{!! Form::open(array('url' => '/settings/updateNotifications', 'method' => 'post'))!!}
							<ul class="signup-form padding-bottom-60">
								<li class="text-center input-checkbox-outher">
									<div class="input-checkbox">
										<input name="newsletters" id="newsletters" type="checkbox" @if($user->emailNotification->newsletters === 'yes') checked @endif>
										<label for="newsletters" class="font-large">Newsletter	&	Emails	for	Support</label>
									</div>
								</li>
								<li class="text-center input-checkbox-outher">
									<div class="input-checkbox">
										<input name="leads" id="leads" type="checkbox" @if($user->emailNotification->leads === 'yes') checked @endif>
										<label for="leads" class="font-large">New	Lead	Email</label>
									</div>
								</li>
								<li class="text-center">
									<button type="submit" class="btn default-btn black-button small-round font-large">UPDATE</button>
								</li>
								<li>
									<a href="{!! url('/settings/password') !!}" class="btn default-btn long-button sky-blue-background font-large">Click	here	to	change	the	Password</a>
								</li>
								<li>
									<a href="{!! url('/taxdetails') !!}" class="btn default-btn long-button sky-blue-background font-large">Click	here	to	submit	or	update	tax	information</a>
								</li>
							</ul>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection