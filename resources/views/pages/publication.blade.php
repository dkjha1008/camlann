@extends('layouts.app2')
@section('content')
<section class="view-inner-wrapper" style="background-image: url('{{ asset('assets/images/side-banner.png') }}')">
    <div class="container-1205px">
      <div class="page-headeing-wrap">
        <h1>{{ $publication->publication }}</h1>
      </div>
    </div>
  </section>
  <section class="inner-view-content">
    <div class="container-1205px">
    <div class="light-bg-container">

      <div class="container-for-box">
        <div class="row">
          <div class="col-xl-3 col-md-3 col-sm-12">
          <div class="uploaded-img-view position-relative">
            @if(@$publication->profile_pic)
            <img src="{{ $publication->profile_pic }}">
            @endif
            
          </div>
          </div>
          <div class="col-xl-9 col-md-9 col-sm-12">

            @php
            	$streamerUser = \App\Models\User::query()
            				->whereRole('streamer')
            				->whereStatus('1')
            				->whereHas('userStreamer', function($query){
            					$query->where('visibility', 'public');
            				})
            				->whereHas('publicationReporter', function($query) use ($publication) {
            					$query->where('publication_id', $publication->id);
            				})
            				->get();


            	$reporterUser = \App\Models\User::query()
            				->whereRole('reporter')
            				->whereStatus('1')
            				->whereHas('publicationReporter', function($query) use ($publication) {
            					$query->where('publication_id', $publication->id);
            				})
            				->get();
            @endphp


            @if(count($streamerUser)>0)
            <div class="view-data-box">
            <h4 class="h4-design mb-4">Streamers</h4>
            <div class="row">
              @foreach($streamerUser as $streamer)
              <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <div class="publication_list-design">
                <a href="{{ route('user.view', [$streamer->id, $streamer->slug]) }}">
                  @if($streamer->profile_pic)
                  <img src="{{ $streamer->profile_pic }}">
                  @endif
                  <h5>{{ $streamer->name }}</h5>
                </a>
                </div>
              </div>
                @endforeach
            </div>
            <div class="publication-description-box">
            <p>{!! $publication->description !!}</p>
            </div>
            </div>
            @endif


            @if(count($reporterUser)>0)
            <div class="view-data-box">
            <h4 class="h4-design mb-4">Reporters</h4>
            <div class="row">
              @foreach($reporterUser as $reporter)
              <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
              <div class="publication_list-design">
                <a href="{{ route('user.view', [$reporter->id, $reporter->slug]) }}">
                  @if($reporter->profile_pic)
                  <img src="{{ $reporter->profile_pic }}">
                  @endif
                  <h5>{{ $reporter->name }}</h5>
                </a>
                </div>
              </div>
                @endforeach
            </div>
            <div class="publication-description-box">
            <h4 class="h4-design">Description</h4>
            <p>{!! $publication->description !!}</p>
            </div>
          </div>
            @endif





          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection