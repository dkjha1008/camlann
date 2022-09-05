@extends('layouts.app')
@section('content')
@php
$userTags = $user->tags->pluck('tags_id');
@endphp

<div class="container-for-box">
	{!! Form::model($user->userStudio, ['route' => 'studio.store', 'class'=>'form-design']) !!}

		<div class="form-grouph img-upload-design">
			<label>Photo/logo upload of Studio</label>
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
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('website') ? ' has-error' : '') !!}">
			{!! Form::label('website','Website of Studio', ['class' => 'form-label']) !!}
			{!! Form::url('website', null, ['class' => ($errors->has('website') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('website', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-grouph textarea-design mb-15{!! ($errors->has('description') ? ' has-error' : '') !!}">
			{!! Form::label('description','Description of Studio', ['class' => 'form-label']) !!}
			{!! Form::textarea('description', null, ['class' => ($errors->has('description') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-flex two-column mb-15">
			<div class="form-grouph select-custom-design{!! ($errors->has('games') ? ' has-error' : '') !!}">
				{!! Form::label('games','List of Games', ['class' => 'form-label']) !!}
				{!! Form::select('games[]', $games, null, ['class' => 'select-tags'.($errors->has('games') ? ' is-invalid' : ''), 'multiple']) !!}
				{!! $errors->first('games', '<span class="help-block">:message</span>') !!}
			</div>
		
			<div class="form-grouph select-custom-design{!! ($errors->has('tags') ? ' has-error' : '') !!}">
				{!! Form::label('tags','Game Tags', ['class' => 'form-label']) !!}
				{!! Form::select('tags[]', $tags, $userTags ?? null, ['class' => 'select-tags'.($errors->has('tags') ? ' is-invalid' : ''), 'multiple']) !!}
				{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		
		<div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Submit') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection

@section('script')
@include('includes.croppie')
@endsection