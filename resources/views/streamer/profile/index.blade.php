@extends('layouts.app')
@section('content')
@php
$streamer = $user->userStreamer;
$userTags = $user->tags->pluck('tags_id');
$userPublication = '';
if(@$user->publicationReporter){
$userPublication = $user->publicationReporter->pluck('publication_id');
}

$publications = \App\Models\Publication::whereStatus('1')->pluck('publication', 'id');

@endphp

<div class="container-for-box">
	{!! Form::model($streamer, ['route' => 'streamer.store', 'class'=>'form-design']) !!}

		
		<div class="form-grouph input-design mb-15{!! ($errors->has('twitter') ? ' has-error' : '') !!}">
			{!! Form::label('twitter','Twitter URL', ['class' => 'form-label']) !!}
			{!! Form::url('twitter', null, ['class' => ($errors->has('twitter') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('twitter', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-grouph input-design mb-15{!! ($errors->has('bio') ? ' has-error' : '') !!}">
			{!! Form::label('bio','Bio', ['class' => 'form-label']) !!}
			{!! Form::textarea('bio', $user->bio ?? null, ['class' => ($errors->has('bio') ? ' is-invalid' : ''), 'multiple']) !!}
			{!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-grouph select-design mb-15{!! ($errors->has('publication_id') ? ' has-error' : '') !!}">
			{!! Form::label('publication_id','Select Publication', ['class' => 'form-label']) !!}
			{!! Form::select('publication_id', $publications, $userPublication ?? null, ['class' => ($errors->has('publication_id') ? ' is-invalid' : ''), 'placeholder'=>'Select Publication']) !!}
			{!! $errors->first('publication_id', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="addNewLayout">
			{!! Form::label('links','Add Link to Articles', ['class' => 'form-label']) !!}
			@if(@$streamer->links_array)
			@foreach($streamer->links_array as $i => $link)
			<div class="layout layout-{{$i+1}}">
				<div class="row">
					<div class="col-md-10">
						<div class="form-grouph input-design mb-15{!! ($errors->has('links') ? ' has-error' : '') !!}">
							{!! Form::text('links[]', $link ?? null, ['class' => ($errors->has('links') ? ' is-invalid' : '')]) !!}
							{!! $errors->first('links', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-danger btn-icon pull-right removeLayout" onclick="removeLayout({{$i+1}})"><i class="fa fa-trash"></i></button>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="layout layout-1 form-grouph input-design mb-15{!! ($errors->has('links') ? ' has-error' : '') !!}">
				{!! Form::text('links[]', null, ['class' => ($errors->has('links') ? ' is-invalid' : '')]) !!}
				{!! $errors->first('links', '<span class="help-block">:message</span>') !!}
			</div>
			@endif
		</div>
		
		<div class="add-more mb-15">
			<button type="button" class="add-more-btn" onclick="addNew()"><span class="add-span"><i class="fa-solid fa-plus"></i></span> Add More</button>
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
		

		<div class="addNewLayoutVideo">
			{!! Form::label('link_videos','Link to videos', ['class' => 'form-label']) !!}
			@if(@$streamer->link_videos_array)
			@foreach($streamer->link_videos_array as $i => $video)
			<div class="layouts layouts-{{$i+1}}">
				<div class="row">
					<div class="col-md-10">
						<div class="form-grouph input-design mb-15{!! ($errors->has('link_videos') ? ' has-error' : '') !!}">
							{!! Form::text('link_videos[]', $video ?? null, ['class' => ($errors->has('link_videos') ? ' is-invalid' : '')]) !!}
							{!! $errors->first('link_videos', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-danger btn-icon pull-right" onclick="removeLayoutVideo({{$i+1}})"><i class="fa fa-trash"></i></button>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="layouts layouts-1 form-grouph input-design mb-15{!! ($errors->has('link_videos') ? ' has-error' : '') !!}">
				{!! Form::text('link_videos[]', null, ['class' => ($errors->has('link_videos') ? ' is-invalid' : '')]) !!}
				{!! $errors->first('link_videos', '<span class="help-block">:message</span>') !!}
			</div>
			@endif
		</div>
		

		<div class="add-more mb-15">
			<button type="button" class="add-more-btn" onclick="addNewVideo()"><span class="add-span"><i class="fa-solid fa-plus"></i></span> Add More</button>
		</div>

	
		
		<div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Submit') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection

@section('script')
<div id="addNew" style="display: none">
	<div>
		<div class="layout layout-0key0">
			<div class="row">
				<div class="col-md-10">
					<div class="form-grouph input-design mb-15{!! ($errors->has('links') ? ' has-error' : '') !!}">
						<input name="links[]" type="text" value="">
					</div>
				</div>


				<div class="col-md-2">
					<button type="button" class="btn btn-danger btn-icon pull-right removeLayout" onclick="removeLayout(0key0)"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="addNewVideo" style="display: none">
	<div>
		<div class="layouts layouts-0key0">
			<div class="row">
				<div class="col-md-10">
					<div class="form-grouph input-design mb-15{!! ($errors->has('link_videos') ? ' has-error' : '') !!}">
						<input name="link_videos[]" type="text" value="">
					</div>
				</div>


				<div class="col-md-2">
					<button type="button" class="btn btn-danger btn-icon pull-right" onclick="removeLayoutVideo(0key0)"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.croppie')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'bio' );
	//add new layout
	function addNew(){
		var rowCount = $('.addNewLayout .layout').length;
		rowCount = rowCount + 1;

		var new_cf = $('#addNew').clone();
		var html = $(new_cf).html().replace(/0key0/g, rowCount);
		
		$('.addNewLayout').append(html);
	}
	
	//remove layout
	function removeLayout(key){
		jQuery('.layout-'+key).remove();
	}


	//add new layout
	function addNewVideo(){
		var rowCount = $('.addNewLayoutVideo .layouts').length;
		rowCount = rowCount + 1;

		var new_cf = $('#addNewVideo').clone();
		var html = $(new_cf).html().replace(/0key0/g, rowCount);
		
		$('.addNewLayoutVideo').append(html);
	}
	
	//remove layout
	function removeLayoutVideo(key){
		jQuery('.layouts-'+key).remove();
	}


</script>
@endsection