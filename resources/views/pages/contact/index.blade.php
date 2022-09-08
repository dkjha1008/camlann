@extends('layouts.app')
@section('content')
<div class="row">
	
	@foreach($users as $user)
	<div class="card col-md-3" >
		<img class="card-img-top" src="{{ $user->profile_pic }}" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title">{{ $user->name }}</h5>
			<p class="card-text">{{ $user->email }}</p>
			<div class="card-btn">

				
				<a class="view-btn" href="{{ route('contact.show', $user->id) }}">View Thread</a>
		
				
			</div>
		</div>
	</div>
	@endforeach
		
</div>
@endsection