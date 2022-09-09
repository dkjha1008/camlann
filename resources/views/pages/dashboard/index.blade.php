@extends('layouts.app')
@section('content')

	@if(@count($news)>0)
	@include('pages.dashboard.news', ['news'=>$news])
	@endif


	@if(@count($favUser)>0)
	@include('pages.dashboard.favUser', ['favUser'=>$favUser])
	@endif

	@if(@count($favGames)>0)
	@include('pages.dashboard.favGames', ['favGames'=>$favGames])
	@endif

	@if(@$messages)
	@include('pages.contact.table', ['users'=>$messages])
	@endif

@endsection