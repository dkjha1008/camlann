@extends('layouts.app')
@section('content')
<div class="row">
	
	@include('pages.contact.table', ['users'=>$users])
		
</div>
@endsection