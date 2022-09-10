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
	<div class="uploaded-ig-attr">
		<img src="{{ $news->full_image }}">
    </div>
	@endif
	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

@php
	$date = date('Y-m-d');
	if(@$news){
	$date = null;
	}
@endphp
<div class="form-flex two-column mb-15">
	<div class="form-grouph input-design{!! ($errors->has('publish_date') ? ' has-error' : '') !!}">
		{!! Form::label('publish_date','Publish Date', ['class' => 'form-label']) !!}
		{!! Form::date('publish_date', $date, ['class' => ($errors->has('publish_date') ? ' is-invalid' : '')]) !!}
		{!! $errors->first('publish_date', '<span class="help-block">:message</span>') !!}
	</div>

	@php
		$selectedGames = [];
		if(@$news && $news->newsGames){
			$selectedGames = $news->newsGames->pluck('games_id');
		}
	@endphp
	
	<div class="form-grouph select-custom-design{!! ($errors->has('games') ? ' has-error' : '') !!}">
		{!! Form::label('games','Games', ['class' => 'form-label']) !!}
		{!! Form::select('games[]', $games, $selectedGames ?? null, ['class' => 'select-tags'.($errors->has('games') ? ' is-invalid' : ''), 'multiple']) !!}
		{!! $errors->first('games', '<span class="help-block">:message</span>') !!}
	</div>
</div>
<div class="form-grouph radio-design mb-15{!! ($errors->has('status') ? ' has-error' : '') !!}">
{!! Form::label('status','Status', ['class' => 'form-label']) !!}
	<div class="d-flex">
	<div class="checkbox-design position-relative d-flex align-items-center mr-10">
	                    {!! Form::radio('status','1') !!} 
						<button class="checkbox-btn"></button>
						<span class="checkbox-text">Active</span>
	</div>
	<div class="checkbox-design position-relative d-flex align-items-center">
	{!! Form::radio('status','0') !!} 
						<button class="checkbox-btn"></button>
						<span class="checkbox-text">De-active</span>
	</div>
	</div>
	{!! $errors->first('status', '<span class="help-block">:message</span>') !!}
</div>

@section('script')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace( 'description' );
</script>
@endsection