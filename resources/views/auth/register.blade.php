@extends('layouts.auth')
@section('content')
@php
$publications = \App\Models\Publication::whereStatus('1')->pluck('publication', 'id');

@endphp
<section class="authentication-sec login-sec">
	<div class="authentication-left-column position-relative">
        <div class="auth-banner-img position-relative">
			<img src="{{ asset('assets/images/side-banner.png') }}">
		</div>
		<div class="auth-banner-contant">
			<h2>Create Your Account</h2>
			<p>See what is going on with your business</p>
		</div>
	</div>
	<div class="authentication-right-column">
        <div class="authentication-form-wrapper">
			<div class="authentication-header">
				<a href="{{ url('/') }}"><img src="{{ asset('assets/images/dark-logo.png') }}" alt="Logo"></a>
			</div>
			{!! Form::open(['route' => 'register', 'method'=>'post', 'class'=>'form-design']) !!}
				{{--
				<div class="form-grouph select-design mb-15{!! ($errors->has('role') ? ' has-error' : '') !!}">
					{!! Form::label('role','Select Role', ['class' => 'form-label']) !!}
					{!! Form::select('role', ['studio'=>'Studio', 'reporter'=>'Reporter', 'streamer'=>'Streamer'], null, ['class' => ($errors->has('role') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('role', '<span class="help-block">:message</span>') !!}
				</div>
				--}}


				<div class="form-grouph select-design mb-15{!! ($errors->has('role') ? ' has-error' : '') !!}">
					{!! Form::label('role','Select Role', ['class' => 'form-label']) !!}
					{!! Form::radio('role', 'studio') !!} Studio
					{!! Form::radio('role', 'streamer') !!} Streamer
					{!! Form::radio('role', 'reporter') !!} Reporter
					{!! $errors->first('role', '<span class="help-block">:message</span>') !!}
				</div>


				


				<div class="form-grouph input-design mb-15{!! ($errors->has('first_name') ? ' has-error' : '') !!}">
					{!! Form::label('first_name','First Name', ['class' => 'form-label']) !!}
					{!! Form::text('first_name', request()->first_name ?? null, ['class' => ($errors->has('first_name') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('last_name') ? ' has-error' : '') !!}">
					{!! Form::label('last_name','Last Name', ['class' => 'form-label']) !!}
					{!! Form::text('last_name', request()->last_name ?? null, ['class' => ($errors->has('last_name') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-grouph studioName input-design mb-15{!! ($errors->has('studio_name') ? ' has-error' : '') !!}" style="display:none">
					{!! Form::label('studio_name','Studio Name', ['class' => 'form-label']) !!}
					{!! Form::text('studio_name', request()->studio_name ?? null, ['class' => ($errors->has('studio_name') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('studio_name', '<span class="help-block">:message</span>') !!}
				</div>

				
				<div class="form-grouph input-design mb-15{!! ($errors->has('email') ? ' has-error' : '') !!}">
					{!! Form::label('email','Email', ['class' => 'form-label']) !!}
					{!! Form::email('email', request()->email ?? null, ['class' => ($errors->has('email') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('password') ? ' has-error' : '') !!}">
					{!! Form::label('password','Password', ['class' => 'form-label']) !!}
					<input type="password" id="password" name="password" class="{!! ($errors->has('password') ? ' is-invalid' : '') !!}" />
					{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
				</div>
				
				<div class="form-grouph input-design mb-15{!! ($errors->has('password') ? ' has-error' : '') !!}">
					{!! Form::label('password_confirmation','Confirm Password', ['class' => 'form-label']) !!}
					<input type="password" id="password_confirmation" name="password_confirmation" class="{!! ($errors->has('password') ? ' is-invalid' : '') !!}" />
					{!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
				</div>
				
				

				<div class="form-grouph publication select-design mb-15{!! ($errors->has('publication_id') ? ' has-error' : '') !!}" style="display:none">
					{!! Form::label('publication_id','Select Publication', ['class' => 'form-label']) !!}
					{!! Form::select('publication_id', $publications, null, ['class' => ($errors->has('publication_id') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('publication_id', '<span class="help-block">:message</span>') !!}
				</div>



				
				<div class="form-grouph submit-design">
					<button class="submit-btn" type="submit">{{__ ('Sign Up') }}</button>
				</div>
				
				<div class="or-text text-center">
					<p>or Sign Up with Email</p>
				</div>
				<div class="social-login-btns">
					<button class="bordered-btn google-btn mb-15"><img src="{{ asset('assets/images/google.svg') }}"> Continue with Google</button>
					<button class="bordered-btn twitter-btn"><img src="{{ asset('assets/images/twitter.svg') }}"> Continue with Twitter</button>
				</div>
				<div class="auth-bottom-text text-center">
					<p>Already have an account ? <a href="{{ route('login') }}" class="link-design">Login</a></p>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
	$('input[name=role]').on('change', function(){
		let val = $(this).val();

		$('.publication').hide();
		$('.studioName').hide();
		$('select[name=publication_id]').removeAttr('required');
		$('input[name=studio_name]').removeAttr('required');

		if(val != 'studio'){
			$('.publication').show();
			$('select[name=publication_id]').attr('required', 'required');
		}
		if(val == 'studio'){
			$('.studioName').show();
			$('input[name=studio_name]').attr('required', 'required');
		}

	})
</script>
@endsection