<div class="form-grouph input-design mb-15{!! ($errors->has('title') ? ' has-error' : '') !!}">
	{!! Form::label('title','Title of game', ['class' => 'form-label']) !!}
	{!! Form::text('title', null, ['class' => ($errors->has('title') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph img-upload-design">
	<label>Title image upload</label>
	<div class="avatar-upload avatar-second-img">
		
		<input type="file" name="image" accept=".png, .jpg, .jpeg" />
		
		{{--
		<div class="avatar-edit">
			<input type="file" name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
			<label for="imageUpload">Drag Or Upload Your Title Image</label>
		</div>
		<div class="avatar-preview">
			<div id="imagePreview" style="background-image: url({{asset('assets/images/banner-thumbnail.png')}});">
			</div>
		</div>
		--}}
	</div>
</div>

<div class="form-flex two-column mb-15">
	<div class="form-grouph select-custom-design{!! ($errors->has('tags') ? ' has-error' : '') !!}">
		{!! Form::label('tags','Game Tags', ['class' => 'form-label']) !!}
		{!! Form::select('tags[]', $tags, $userTags ?? null, ['class' => 'select-tags'.($errors->has('tags') ? ' is-invalid' : ''), 'multiple']) !!}
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

<div class="data-you">
	<div class="form-grouph input-design mb-15{!! ($errors->has('youtube') ? ' has-error' : '') !!}">
		{!! Form::label('youtube','Embedded Youtube video(s)', ['class' => 'form-label']) !!}
		{!! Form::text('youtube', null, ['class' => ($errors->has('youtube') ? ' is-invalid' : '')]) !!}
		{!! $errors->first('youtube', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="add-more mb-15">
	<button class="add-more-btn"><span class="add-span"><i class="fa-solid fa-plus"></i></span> Add More</button>
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
</div>

<div class="form-grouph input-design mb-15{!! ($errors->has('playable_demo') ? ' has-error' : '') !!}">
	{!! Form::label('playable_demo','Link to playable demo', ['class' => 'form-label']) !!}
	{!! Form::text('playable_demo', null, ['class' => ($errors->has('playable_demo') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('playable_demo', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph input-design mb-15{!! ($errors->has('playable_demo') ? ' has-error' : '') !!}">
	{!! Form::label('playable_demo','Link to playable demo', ['class' => 'form-label']) !!}
	{!! Form::text('playable_demo', null, ['class' => ($errors->has('playable_demo') ? ' is-invalid' : '')]) !!}
	{!! $errors->first('playable_demo', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-grouph input-design mb-15">
	<label>.Exe upload of playable demo</label>
	<div class="d-flex align-items-center">
		<div class="position-relative cstim-upload-btn">
			<input type="file" class="file-upload" name="playable_demo_exe" accept=".exe">
			<button class="upload-btn-design">Upload</button>
		</div>
		<p class="cstm-upload-text"></p>
	</div>
</div>


@section('script')
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
			$('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
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
			$('form').find('input[name="document[]"][value="' + name + '"]').remove()
		},
		init: function () {
			/* @if(isset($project) && $project->document)
			var files =
			{!! json_encode($project->document) !!}
			for (var i in files) {
				var file = files[i]
				this.options.addedfile.call(this, file)
				file.previewElement.classList.add('dz-complete')
				$('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
			}
			@endif */
		}
	}
</script>
@endsection