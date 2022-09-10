@extends('layouts.app')
@section('content')
@php
$reporter = $user->userReporter;
$userTags = $user->tags->pluck('tags_id');
@endphp

<div class="container-for-box">
	{!! Form::model($reporter, ['route' => 'reporter.store', 'class'=>'form-design']) !!}
		
		<div class="form-grouph input-design mb-15{!! ($errors->has('twitter') ? ' has-error' : '') !!}">
			{!! Form::label('twitter','Twitter URL', ['class' => 'form-label']) !!}
			{!! Form::url('twitter', null, ['class' => ($errors->has('twitter') ? ' is-invalid' : '')]) !!}
			{!! $errors->first('twitter', '<span class="help-block">:message</span>') !!}
		</div>
		


		<div class="form-grouph input-design{!! ($errors->has('bio') ? ' has-error' : '') !!}">
			{!! Form::label('bio','Bio', ['class' => 'form-label']) !!}
			{!! Form::textarea('bio', null, ['class' => ($errors->has('bio') ? ' is-invalid' : ''), 'multiple']) !!}
			{!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="addNewLayout">
			{!! Form::label('links','Add Link to Articles', ['class' => 'form-label']) !!}
			@if(@$reporter->links_array)
			@foreach($reporter->links_array as $i => $link)
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

@include('includes.croppie')

<script>
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
</script>
@endsection