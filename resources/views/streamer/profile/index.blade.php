@extends('layouts.app')
@section('content')
@php
$userTags = $user->tags->pluck('tags_id');
@endphp

<div class="container-for-box">
	{!! Form::model($user->userStreamer, ['route' => 'streamer.store', 'class'=>'form-design']) !!}

		
		<div class="form-grouph input-design mb-15{!! ($errors->has('twitter') ? ' has-error' : '') !!}">
			{!! Form::label('twitter','Twitter URL', ['class' => 'form-label']) !!}
			{!! Form::url('twitter', null, ['class' => ($errors->has('twitter') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('twitter', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="more-links">
			<div class="form-grouph input-design mb-15{!! ($errors->has('links') ? ' has-error' : '') !!}">
				{!! Form::label('links','Add Link to Articles', ['class' => 'form-label']) !!}
				{!! Form::url('links[]', null, ['class' => ($errors->has('links') ? ' is-invalid' : '')]) !!}
				{!! $errors->first('links', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		
		<div class="add-more mb-15">
			<button class="add-more-btn"><span class="add-span"><i class="fa-solid fa-plus"></i></span> Add More</button>
		</div>
		
		<div class="form-flex two-column mb-15">
			<div class="form-grouph select-design{!! ($errors->has('visibility') ? ' has-error' : '') !!}">
				{!! Form::label('visibility','Profile Visibility', ['class' => 'form-label']) !!}
				{!! Form::select('visibility', ['public'=>'Public', 'private'=>'Private'], null, ['class' => ($errors->has('visibility') ? ' is-invalid' : '')]) !!}
				{!! $errors->first('visibility', '<span class="help-block">:message</span>') !!}
			</div>
			
			<div class="form-grouph select-custom-design{!! ($errors->has('tags') ? ' has-error' : '') !!}">
				{!! Form::label('tags','Game Tags', ['class' => 'form-label']) !!}
				{!! Form::select('tags[]', $tags, $userTags ?? null, ['class' => 'select-tags'.($errors->has('tags') ? ' is-invalid' : ''), 'multiple']) !!}
				{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('youtube_channel') ? ' has-error' : '') !!}">
			{!! Form::label('youtube_channel', 'Youtube channel link', ['class' => 'form-label']) !!}
			{!! Form::url('youtube_channel', null, ['class' => ($errors->has('youtube_channel') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('youtube_channel', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('twitch_channel') ? ' has-error' : '') !!}">
			{!! Form::label('twitch_channel', 'Twitch channel link', ['class' => 'form-label']) !!}
			{!! Form::url('twitch_channel', null, ['class' => ($errors->has('twitch_channel') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('twitch_channel', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="more-link-videos">
			<div class="form-grouph input-design mb-15{!! ($errors->has('link_videos') ? ' has-error' : '') !!}">
				{!! Form::label('link_videos','Link to videos', ['class' => 'form-label']) !!}
				{!! Form::url('link_videos[]', null, ['class' => ($errors->has('link_videos') ? ' is-invalid' : '')]) !!}
				{!! $errors->first('link_videos', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		
		<div class="add-more mb-15">
			<button class="add-more-btn"><span class="add-span"><i class="fa-solid fa-plus"></i></span> Add More</button>
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