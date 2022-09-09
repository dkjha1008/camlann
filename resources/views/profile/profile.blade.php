@extends('layouts.app')
@section('content')
<div class="container-for-box">
	{!! Form::model($user ,['route' => 'profile.update', 'class'=>'form-design']) !!}
        
		<div class="form-flex two-column mb-15">
			<div class="form-grouph input-design{!! ($errors->has('first_name') ? ' has-error' : '') !!}">
				{!! Form::label('first_name','First Name', ['class' => 'form-label']) !!}
				{!! Form::text('first_name', null, ['class' => ($errors->has('first_name') ? ' is-invalid' : ''), 'multiple']) !!}
				{!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
			</div>
			
			<div class="form-grouph input-design{!! ($errors->has('last_name') ? ' has-error' : '') !!}">
				{!! Form::label('last_name','Last Name', ['class' => 'form-label']) !!}
				{!! Form::text('last_name', null, ['class' => ($errors->has('last_name') ? ' is-invalid' : ''), 'multiple']) !!}
				{!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('email') ? ' has-error' : '') !!}">
			{!! Form::label('email','Email', ['class' => 'form-label']) !!}
			{!! Form::email('email', null, ['class' => ($errors->has('email') ? ' is-invalid' : ''), 'disabled']) !!}
			{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
		</div>


		<div class="form-grouph input-design{!! ($errors->has('bio') ? ' has-error' : '') !!}">
			{!! Form::label('bio','Bio', ['class' => 'form-label']) !!}
			{!! Form::textarea('bio', null, ['class' => ($errors->has('bio') ? ' is-invalid' : ''), 'multiple']) !!}
			{!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
		</div>



		<div class="form-grouph img-upload-design">
			<label>Photo/logo</label>
			<div class="avatar-upload">
				<div class="avatar-edit">
					<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
					<input type="hidden" name="image" id="upload-img" />
					<label for="imageUpload"></label>
				</div>
				<div class="avatar-preview">
					<div id="imagePreview">
						<img src="{{ $user->profile_pic }}">
					</div>
				</div>
			</div>
			{!! $errors->first('image', '<span class="help-block">:message</span>') !!}
		</div>

		
        <div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Update') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection

@section('script')
@include('includes.croppie')
@endsection