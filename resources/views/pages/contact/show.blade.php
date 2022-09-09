@extends('layouts.app')
@section('content')
<div class="row">
	<div class="comments-box-wrapper">
	<div class="comments-box-msg">
	@foreach($threads as $thread)
	<div class="comment-box d-flex align-items-center">
		<div class="comment-box-img">
			<img src="https://camlann.itxwebsolutions.com/assets/images/thumbnail.png">
		</div>
		<div class="comment-box-cntnt">
		<h5 class="user-name">Loream</h5>
		<p class="comment-date"></p>
		 <p class="description">{{ $thread->message }}</p>
		</div>
	</div>
	@endforeach
	</div>
	<div class="comments-box-msg-send">
	<div class="comment-box-formS">
	{!! Form::open(['route' => ['contact.store', $user->id], 'class'=>'form-design']) !!}
        
        <div class="form-grouph input-design{!! ($errors->has('message') ? ' has-error' : '') !!}">
			{!! Form::label('message','Message', ['class' => 'form-label']) !!}
			{!! Form::textarea('message', null, ['class' => ($errors->has('message') ? ' is-invalid' : ''), 'rows'=>'2']) !!}
			{!! $errors->first('message', '<span class="help-block">:message</span>') !!}
		</div>
		
        <div class="form-grouph submit-design text-center">
			<button class="submit-short-btn" type="submit">{{__ ('Send') }}</button>
		</div>
		
	{!! Form::close() !!}
	</div>
	</div>
	</div>
</div>
@endsection