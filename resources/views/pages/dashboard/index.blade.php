@extends('layouts.app')
@section('content')

	@if(@count($news)>0)
	@include('pages.dashboard.news', ['news'=>$news])
	@endif


		
	@if($user->role=='studio')
	
		@if(@count($favReporter)>0)
		@include('pages.dashboard.favUser', ['users'=>$favReporter, 'title'=>'Favourite Reporter'])
		@endif

		@if(@count($favStreamer)>0)
		@include('pages.dashboard.favUser', ['users'=>$favStreamer, 'title'=>'Favourite Streamer'])
		@endif

	@else

		@if(@count($favStudio)>0)
		@include('pages.dashboard.favUser', ['users'=>$favStudio, 'title'=>'Favourite Studios'])
		@endif

	@endif




	@if(@count($favGames)>0)
	@include('pages.dashboard.favGames', ['favGames'=>$favGames])
	@endif

	@if(@count($messages)>0)
	@include('pages.contact.table', ['users'=>$messages])
	@endif

@endsection