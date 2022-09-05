@extends('layouts.app')
@section('content')
<div class="container-for-box">
	{!! Form::model($news ,['route' => ['studio.news.update', $news->id], 'method'=>'PATCH', 'class'=>'form-design', 'enctype' => 'multipart/form-data']) !!}
        
		@include('studio.news.form')
		
        <div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Update') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection