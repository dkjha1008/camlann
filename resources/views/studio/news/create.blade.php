@extends('layouts.app')
@section('content')
<div class="container-for-box">
	{!! Form::open(['route' => 'studio.news.store', 'class'=>'form-design', 'enctype' => 'multipart/form-data']) !!}
        
		@include('studio.news.form')
		
        <div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Create') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection