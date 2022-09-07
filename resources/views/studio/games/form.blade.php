<div class="form-grouph input-design mb-15{!! ($errors->has('title') ? ' has-error' : '') !!}">
	{!! Form::label('title','Title of game', ['class' => 'form-label']) !!}
	{!! Form::text('title', null, ['class' => ($errors->has('title') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph img-upload-design">
	<label>Title image upload</label>
	<div class="avatar-upload">
		<div class="avatar-edit">
			<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
			<input type="hidden" name="image" id="upload-img" />
			<label for="imageUpload"></label>
		</div>
		<div class="avatar-preview">
			@if(@$game->full_image)
			<div id="imagePreview" style="background-image: url({{ $game->full_image }});">
				<img src="{{ $game->full_image }}">
			</div>
			@else
			<div id="imagePreview" style="background-image: url({{asset('assets/images/add-png.png')}});">
				<img src="{{asset('assets/images/add-png.png')}}">
			</div>
			@endif
			
		</div>
	</div>
	{!! $errors->first('image', '<span class="help-block">:message</span>') !!}
</div>

@php
	$gameTags = [];
	
	if(@$game){
		$gameTags = $game->gameTags->pluck('tags_id');
	}
@endphp
<div class="form-flex two-column mb-15">
	<div class="form-grouph select-custom-design{!! ($errors->has('tags') ? ' has-error' : '') !!}">
		{!! Form::label('tags','Game Tags', ['class' => 'form-label']) !!}
		{!! Form::select('tags[]', $tags, $gameTags ?? null, ['class' => 'select-tags'.($errors->has('tags') ? ' is-invalid' : ''), 'multiple']) !!}
		{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
	</div>
	
	<div class="form-grouph input-design{!! ($errors->has('comps') ? ' has-error' : '') !!}">
		{!! Form::label('comps','Comps', ['class' => 'form-label']) !!}
		{!! Form::text('comps', null, ['class' => ($errors->has('comps') ? ' is-invalid' : '')]) !!}
		{!! $errors->first('comps', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-grouph multiple-img-upload mb-15">
	<label>Screenshots of game upload</label>
	<div class="needsclick dropzone" id="document-dropzone"></div>
	
	{{--
	<div class="upload__box">
		<div class="upload__btn-box">
			<label class="upload__btn">
                <p><i class="fa-solid fa-plus"></i> Uplod Game Screenshots</p>
                <input type="file" name="screenshots[]" multiple="" data-max_length="20" class="upload__inputfile">
			</label>
		</div>
		<div class="upload__img-wrap"></div>
	</div>
	--}}
</div>

<div class="addNewLayout">
	{!! Form::label('youtube','Embedded Youtube video(s)', ['class' => 'form-label']) !!}

	@if(@$game->youtube_array)
	@foreach($game->youtube_array as $i => $link)
	<div class="layout layout-{{$i+1}}">
		<div class="row">
			<div class="col-md-10">
				<div class="form-grouph input-design mb-15{!! ($errors->has('youtube') ? ' has-error' : '') !!}">
					{!! Form::text('youtube[]', $link ?? null, ['class' => ($errors->has('youtube') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('youtube', '<span class="help-block">:message</span>') !!}
				</div>
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-danger btn-icon pull-right removeLayout" onclick="removeLayout({{$i+1}})"><i class="fa fa-trash"></i></button>
			</div>
		</div>
	</div>
	@endforeach
	@else
	<div class="layout layout-1 form-grouph input-design mb-15{!! ($errors->has('youtube') ? ' has-error' : '') !!}">
		{!! Form::text('youtube[]', null, ['class' => ($errors->has('youtube') ? ' is-invalid' : '')]) !!}
		{!! $errors->first('youtube', '<span class="help-block">:message</span>') !!}
	</div>
	@endif
</div>

<div class="add-more mb-15">
	<button type="button" class="add-more-btn" onclick="addNew()"><span class="add-span"><i class="fa-solid fa-plus"></i></span> Add More</button>
</div>

<div class="form-grouph file-upload-design mb-15">
	<label>Pitch deck upload <span class="grey-label-text"> (.pdf or .doc or .ppt upload)</span></label>
	<div class="d-flex align-items-center">
		<div class="position-relative cstim-upload-btn">
            <input type="file" class="file-upload" name="attach_files" accept=".pdf, .ppt, .docx">
            <button class="upload-btn-design">Upload</button>
		</div>
		<p class="cstm-upload-text"></p>
	</div>
	
	@if(@$game->full_attach_files)
		<a target="_blank" href="{{ $game->full_attach_files }}">Attachment</a>
	@endif
</div>

<div class="form-grouph input-design mb-15{!! ($errors->has('playable_demo') ? ' has-error' : '') !!}">
	{!! Form::label('playable_demo','Link to playable demo', ['class' => 'form-label']) !!}
	{!! Form::text('playable_demo', null, ['class' => ($errors->has('playable_demo') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('playable_demo', '<span class="help-block">:message</span>') !!}
</div>


<div class="form-grouph input-design mb-15">
	<label>.Exe upload of playable demo</label>
	<div class="d-flex align-items-center">
		<input type="file" name="playable_demo_exe" accept=".exe">
	</div>
	@if(@$game->full_exe)
		<a target="_blank" href="{{ $game->full_exe }}">Uploaded Exe</a>
	@endif
</div>


<div class="form-grouph radio-design mb-15{!! ($errors->has('status') ? ' has-error' : '') !!}">
	{!! Form::label('status','Status', ['class' => 'form-label']) !!}
	{!! Form::radio('status','1') !!} Active
	{!! Form::radio('status','0') !!} De-active
	{!! $errors->first('status', '<span class="help-block">:message</span>') !!}
</div>


@section('script')


<div id="addNew" style="display: none">
	<div>
		<div class="layout layout-0key0">
			<div class="row">
				<div class="col-md-10">
					<div class="form-grouph input-design mb-15{!! ($errors->has('youtube') ? ' has-error' : '') !!}">
						<input name="youtube[]" type="text" value="">
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script>
	var uploadedDocumentMap = {}
	Dropzone.options.documentDropzone = {
		url: '{{ route('dropzone') }}',
		maxFilesize: 2, // MB
		addRemoveLinks: true,
	    maxFiles: 5,
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		headers: {
			'X-CSRF-TOKEN': "{{ csrf_token() }}"
		},
		success: function (file, response) {
			$('form').append('<input type="hidden" name="screenshots[]" value="' + response.name + '">')
			uploadedDocumentMap[file.name] = response.name
		},
		removedfile: function (file) {
			file.previewElement.remove()
			var name = ''
			if (typeof file.file_name !== 'undefined') {
				name = file.file_name
				} else {
				name = uploadedDocumentMap[file.name]
			}
			$('form').find('input[name="screenshots[]"][value="' + name + '"]').remove()
		},
		init: function () {
			@if(isset($game) && $game->full_screenshort)
			var files = {!! json_encode($game->full_screenshort) !!}
			//console.log('files', files)


			for (var i in files) {
			
				var file = files[i]
				//console.log(file)

				this.options.addedfile.call(this, file)
				//file.previewElement.classList.add('dz-complete')
				
				//$('form').append('<input type="hidden" name="screenshots[]" value="' + file + '">')


				/*console.log(this.options.addedfile.call(this, file))
				
				this.options.addedfile.call(this, file)
				file.previewElement.classList.add('dz-complete')
				$('form').append('<input type="hidden" name="screenshots[]" value="' + file + '">')*/
			}
			@endif
		}
	}



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