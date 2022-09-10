@extends('layouts.app2')
@section('content')
<section class="banner-section--view" style="background-image: url('{{$game->full_image}}')">
   <div class="container-1205px">
    <div class="page-headeing-wrap">
      <h1>{{$game->title}}</h1>
    </div>
   </div>
 </section>
 <section class="tags-comps-data">
  <div class="container-1205px">
    <div class="tags-white-wrapper">
     <div class="row">
      
     @if($game->gameTags)
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
          <div class="tags-data">
            <h4 class="h4-design">Game Tags</h4>
            <ul class="list-unstyled tags-list-design">
              @foreach($game->gameTags as $tag)
              <li>{{$tag->tag->name}}</li>
              @endforeach
            </ul>
          </div>
      </div>
      @endif

      @if($game->full_exe)
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
          <div class="link-button_design">
            <h4 class="h4-design">Exe File</h4>
            <a href="{{ $game->full_exe }}"  class="btn-design">Download</a> 
          </div>
      </div>
      @endif

      @if($game->playable_demo)
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
          <div class="link-button_design">
             <h4 class="h4-design">Playable Demo</h4>
            <a href="{{ $game->playable_demo }}" class="btn-design">Playable Demo</a>
          </div>
      </div>
      @endif

      @if($game->attach_files)
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
          <div class="link-button_design">
          <h4 class="h4-design">Attachment File</h4>
            <a href="{{ $game->attach_files }}" class="btn-design">Download</a>
          </div>
      </div>
      @endif

      @if($game->description)
      <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 mb-3">
          <div class="tags-data">
            <h4 class="h4-design">Description</h4>
            <p>{!! $game->description !!}</p>
          </div>
      </div>
      @endif




     </div>
  </div>
  </div>
 </section>
 <section class="game-screenshots-design">
  <div class="container-1205px">
    <div class="game-ss-header">
      <h2 class="h2-design">Game Screenshots</h2>
    </div>
    <div class="slider game-ss-slider">
    	@foreach($game->full_screenshort as $img)
      <div>
      	 <img src="{{ $img }}"  >
      </div>
      @endforeach
     
    </div>
  </div>
 </section>




 <section class="desk-files-sec">
  <div class="container-1205px">
    <div class="row">
      
      @foreach($game->youtube_array as $link)
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" allowfullscreen src="{{ $link }}">
        </iframe>
      </div>
      </div>
        @endforeach

    </div>
  </div>
 </section>
 
@endsection