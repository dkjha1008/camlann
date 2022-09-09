@extends('layouts.auth')
@section('content')
<section class="authentication-sec login-sec">
	<div class="authentication-left-column position-relative">
		<div class="auth-banner-img position-relative">
			<img src="{{ asset('assets/images/side-banner.png') }}">
		</div>
		<div class="auth-banner-contant">
			<h2>Login to your Account</h2>
			<p>See what is going on with your business</p>
		</div>
	</div>
	<div class="authentication-right-column">
		<div class="authentication-form-wrapper">
			<div class="authentication-header">
				<a href="{{ url('/') }}"><img src="{{ asset('assets/images/dark-logo.png') }}" alt="Logo"></a>
			</div>
			{!! Form::open(['route' => 'login', 'class'=>'form-design']) !!}
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('email') ? ' has-error' : '') !!}">
					{!! Form::label('email','Email', ['class' => 'form-label']) !!}
					{!! Form::email('email', request()->email ?? null, ['class' => ($errors->has('email') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph input-design{!! ($errors->has('email') ? ' has-error' : '') !!}">
					{!! Form::label('password','Password', ['class' => 'form-label']) !!}
					<input type="password" id="password" name="password" class="{!! ($errors->has('email') ? ' is-invalid' : '') !!}" />
					{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph forgot-rember-block d-flex justify-content-spacebw align-items-center mb-15 mt-1">
					<div class="checkbox-design position-relative d-flex align-items-center">
						<input type="checkbox" placeholder="">
						<button class="checkbox-btn"></button>
						<span class="checkbox-text">Remember Me</span>
					</div>
					
					@if (Route::has('password.request'))
					<div class="forgot-password-link">
						<a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
					</div>
					@endif
				</div>
				
				<div class="form-grouph submit-design">
					<button class="submit-btn" type="submit">{{__ ('Login') }}</button>
				</div>
				<div class="or-text text-center">
					<p>or Sign in with Email</p>
				</div>
				<div class="social-login-btns">
					<button class="bordered-btn google-btn mb-15"><img src="{{ asset('assets/images/google.svg') }}"> Continue with Google</button>
					<button class="bordered-btn twitter-btn"><img src="{{ asset('assets/images/twitter.svg') }}"> Continue with Twitter</button>
				</div>
				
				@if (Route::has('register'))
				<div class="auth-bottom-text text-center">
					<p>Not Registered Yet? <a href="{{ route('register') }}" class="link-design">Create an account</a></p>
				</div>
				@endif
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection