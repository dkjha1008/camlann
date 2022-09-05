@extends('layouts.auth')
@section('content')
<section class="authentication-sec login-sec">
	<div class="authentication-left-column position-relative">
		<div class="auth-banner-img position-relative">
			<img src="{{ asset('assets/images/side-banner.png') }}">
		</div>
		<div class="auth-banner-contant">
			<h2>Reset Password</h2>
		</div>
	</div>
	<div class="authentication-right-column">
		<div class="authentication-form-wrapper">
			<div class="authentication-header">
				<a href="{{ url('/') }}"><img src="{{ asset('assets/images/dark-logo.png') }}" alt="Logo"></a>
			</div>
			{!! Form::open(['route' => 'password.update', 'class'=>'form-design']) !!}
				<input type="hidden" name="token" value="{{ request()->route('token') }}">
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('email') ? ' has-error' : '') !!}">
					{!! Form::label('email','Email', ['class' => 'form-label']) !!}
					{!! Form::email('email', request()->email ?? null, ['class' => ($errors->has('email') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('password') ? ' has-error' : '') !!}">
					{!! Form::label('password','Password', ['class' => 'form-label']) !!}
					<input type="password" id="password" name="password" class="{!! ($errors->has('password') ? ' is-invalid' : '') !!}" />
					{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
					{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('password') ? ' has-error' : '') !!}">
					{!! Form::label('password_confirmation','Confirm Password', ['class' => 'form-label']) !!}
					<input type="password" id="password_confirmation" name="password_confirmation" class="{!! ($errors->has('password') ? ' is-invalid' : '') !!}" />
					{!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
					{!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph submit-design">
					<button class="submit-btn" type="submit">{{__ ('Reset Password') }}</button>
				</div>
				
				<div class="auth-bottom-text text-center">
					<p>Already have an account ? <a href="{{ route('login') }}" class="link-design">Login</a></p>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection