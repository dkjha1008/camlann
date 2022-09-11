@extends('layouts.app')
@section('content')
<div class="dashboard-main-files-wrapper">
  <div class="row">
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
	@if(@count($news)>0)
	@include('pages.dashboard.news', ['news'=>$news])
	@endif
   </div>	
   <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
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
    </div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
	@if(@count($favGames)>0)
	@include('pages.dashboard.favGames', ['favGames'=>$favGames])
	@endif
    </div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
	@if(@$messages)
	@include('pages.contact.table', ['users'=>$messages])
	@endif
    </div>
</div>
</div>
@endsection