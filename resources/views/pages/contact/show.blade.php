@extends('layouts.app')
@section('content')
<div class="row">
	
	@foreach($threads as $thread)
	<div class="card">
		<div class="card-body">
		{{ $thread->message }}
		</div>
	</div>
	@endforeach




	<div class="card">
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
@endsection