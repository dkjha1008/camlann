<div class="form-grouph input-design mb-15{!! ($errors->has('title') ? ' has-error' : '') !!}">
	{!! Form::label('title','Title', ['class' => 'form-label']) !!}
	{!! Form::text('title', null, ['class' => ($errors->has('title') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph textarea-design mb-15{!! ($errors->has('description') ? ' has-error' : '') !!}">
	{!! Form::label('description','Description', ['class' => 'form-label']) !!}
	{!! Form::textarea('description', null, ['class' => ($errors->has('description') ? ' is-invalid' : ''), 'id'=>'description']) !!}
	{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph input-design mb-15{!! ($errors->has('image') ? ' has-error' : '') !!}">
	{!! Form::label('image','Image', ['class' => 'form-label']) !!}
	<input type="file" name="image" />
	
	@if(@$news && $news->full_image)
		<img width="200" src="{{ $news->full_image }}">
	@endif
	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>


<div class="form-flex two-column mb-15">
	<div class="form-grouph input-design{!! ($errors->has('publish_date') ? ' has-error' : '') !!}">
		{!! Form::label('publish_date','Publish Date', ['class' => 'form-label']) !!}
		{!! Form::date('publish_date', null, ['class' => ($errors->has('publish_date') ? ' is-invalid' : '')]) !!}
		{!! $errors->first('publish_date', '<span class="help-block">:message</span>') !!}
	</div>

	@php
		$selectedTags = [];
		if(@$news && $news->newsTags){
			$selectedTags = $news->newsTags->pluck('tags_id');
		}
	@endphp
	
	<div class="form-grouph select-custom-design{!! ($errors->has('tags') ? ' has-error' : '') !!}">
		{!! Form::label('tags','Game Tags', ['class' => 'form-label']) !!}
		{!! Form::select('tags[]', $tags, $selectedTags ?? null, ['class' => 'select-tags'.($errors->has('tags') ? ' is-invalid' : ''), 'multiple']) !!}
		{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-grouph radio-design mb-15{!! ($errors->has('status') ? ' has-error' : '') !!}">
	{!! Form::label('status','Status', ['class' => 'form-label']) !!}
	{!! Form::radio('status','1') !!} Active
	{!! Form::radio('status','0') !!} De-active
	{!! $errors->first('status', '<span class="help-block">:message</span>') !!}
</div>

@section('script')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace( 'description' );
</script>
@endsection