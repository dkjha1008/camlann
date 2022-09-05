<div class="form-grouph input-design mb-15{!! ($errors->has('publication') ? ' has-error' : '') !!}">
	{!! Form::label('publication','Name of Publication', ['class' => 'form-label']) !!}
	{!! Form::text('publication', null, ['class' => ($errors->has('publication') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('publication', '<span class="help-block">:message</span>') !!}
</div>

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
				@if(@$publication->profile_pic)
				<img src="{{ $publication->profile_pic }}">
				@else
				<img src="{{ asset('assets/images/sample-img.png') }}">
				@endif
			</div>
		</div>
	</div>
	{!! $errors->first('image', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph textarea-design mb-15{!! ($errors->has('description') ? ' has-error' : '') !!}">
	{!! Form::label('description','About Us', ['class' => 'form-label']) !!}
	{!! Form::textarea('description', null, ['class' => ($errors->has('description') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

@php
	$selectedReporters = [];
	if(@$publication){
		$selectedReporters = $publication->reporters->pluck('users_id');
	}
@endphp
<div class="form-grouph select-custom-design mb-15{!! ($errors->has('reporters') ? ' has-error' : '') !!}">
	{!! Form::label('reporters','List of Reporters', ['class' => 'form-label']) !!}
	{!! Form::select('reporters[]', $reporters, $selectedReporters ?? null, ['class' => 'select-tags'.($errors->has('reporters') ? ' is-invalid' : ''), 'multiple']) !!}
	{!! $errors->first('reporters', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph radio-design mb-15{!! ($errors->has('status') ? ' has-error' : '') !!}">
	{!! Form::label('status','Status', ['class' => 'form-label']) !!}
    {!! Form::radio('status', 1) !!} Active
    {!! Form::radio('status', 0) !!} De-active
	</br>	
	{!! $errors->first('status', '<span class="help-block">:message</span>') !!}
</div>



@section('script')
@include('includes.croppie')
@endsection