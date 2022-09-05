@extends('layouts.app')
@section('content')
<div class="container-for-box">
	{!! Form::model($publication ,['route' => ['admin.publication.update', $publication->id], 'method' => 'PATCH', 'class'=>'form-design']) !!}
        
		@include('admin.publication.form')
		
        <div class="form-grouph submit-design text-center mt-5">
			<button class="submit-short-btn" type="submit">{{__ ('Update') }}</button>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection