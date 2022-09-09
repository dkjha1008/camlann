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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="tags-data">
            <h4 class="h4-design"><a href="{{ $game->full_exe }}">Download</a> Exe File</h4>
          </div>
      </div>
      @endif

      @if($game->playable_demo)
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="tags-data">
            <h4 class="h4-design"><a href="{{ $game->playable_demo }}">Playable Demo</a></h4>
          </div>
      </div>
      @endif

      @if($game->attach_files)
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="tags-data">
            <h4 class="h4-design">Attachment File <a href="{{ $game->attach_files }}">Download</a></h4>
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
      
      @foreach($game->youtube_array as $you)
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <iframe width="420" height="315"
          src="{{ $you }}">
        </iframe>
      </div>
        @endforeach

    </div>
  </div>
 </section>
 
@endsection