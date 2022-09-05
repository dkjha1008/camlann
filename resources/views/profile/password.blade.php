@extends('layouts.app')
@section('content')
<div class="container-for-box">
	{!! Form::open(['route' => ['profile.password.update']]) !!}
	
		<div class="form-grouph input-design mb-15{!! ($errors->has('current-password') ? ' has-error' : '') !!}">
			{!! Form::label('current-password','Current Password', ['class' => 'form-label']) !!}
			<input name="current-password" type="password" class="form-control {!! ($errors->has('current-password') ? ' is-invalid' : '') !!}" id="current-password">
			{!! $errors->first('current-password', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('new-password') ? ' has-error' : '') !!}">
			{!! Form::label('new-password','New Password', ['class' => 'form-label']) !!}
			<input name="new-password" type="password" class="form-control {!! ($errors->has('new-password') ? ' is-invalid' : '') !!}" id="new-password">
			{!! $errors->first('new-password', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('new-password_confirmed') ? ' has-error' : '') !!}">
			{!! Form::label('new-password_confirmed','Confirm Password', ['class' => 'form-label']) !!}
			<input name="new-password_confirmed" type="password" class="form-control {!! ($errors->has('new-password_confirmed') ? ' is-invalid' : '') !!}" id="new-password_confirmed">
			{!! $errors->first('new-password_confirmed', '<span class="help-block">:message</span>') !!}
		</div>
		
        <div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Update') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection