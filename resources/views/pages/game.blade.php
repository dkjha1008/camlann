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
      


      @if(auth()->check())
          @php
          $favouritesGame = auth()->user()->favouriteGames()->pluck('games_id')->toArray();
          @endphp
           


           @if(in_array($game->id, $favouritesGame))
          <a class="view-btn toggle-class-remove" href="{{ route('favourite.game.action', $game->id) }}">
            
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 20 18" style="enable-background:new 0 0 20 18;" xml:space="preserve" width="20" height="18">
<style type="text/css">
  .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#EC428A;}
  .st1{fill-rule:evenodd;clip-rule:evenodd;}
</style>
<path class="st0" d="M9.5,3.2c0,0-4-4.3-6.9-0.6s0,7.9,0,7.9l4.9,5.4l2.5,1c0,0,7.6-4.9,7.3-5.4C17,11.1,20,3.5,18.4,3.4  C16.9,3.2,14.9-1.2,9.5,3.2z"/>
<path class="st1" d="M0.2,6c0-3.3,2.6-5.8,5.7-5.8c1.6,0,3,0.8,4,1.9c1-1,2.4-1.9,4-1.9c3.1,0,5.7,2.5,5.7,5.8  c0,2.2-0.9,4.2-2.1,5.9c-1.2,1.7-2.8,3.1-4.3,4.2c-0.6,0.4-1.2,0.8-1.7,1.1c-0.5,0.3-1.1,0.5-1.6,0.5s-1.1-0.3-1.6-0.5  c-0.5-0.3-1.1-0.7-1.7-1.1c-1.5-1.1-3.1-2.5-4.3-4.2C1.1,10.2,0.2,8.3,0.2,6z M6,2.1c-2.3,0-4.1,1.8-4.1,4c0,1.7,0.7,3.3,1.7,4.7  c1.1,1.5,2.5,2.8,4,3.8c0.6,0.4,1.1,0.8,1.5,1c0.5,0.3,0.8,0.3,0.9,0.3s0.4-0.1,0.9-0.3c0.4-0.2,1-0.6,1.5-1c1.5-1.1,2.9-2.4,4-3.8  c1.1-1.5,1.7-3,1.7-4.7c0-2.1-1.8-4-4.1-4c-1.3,0-2.6,0.9-3.3,2c-0.2,0.2-0.4,0.4-0.7,0.4C9.7,4.4,9.5,4.2,9.3,4  C8.6,2.9,7.3,2.1,6,2.1z"/>
</svg>

          </a>
          @else
          <a class="view-btn toggle-class" href="{{ route('favourite.game.action', $game->id) }}">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 6.01872C0.25 2.7595 2.8899 0.25 5.98857 0.25C7.58587 0.25 8.99139 1.0612 10 2.11083C11.0086 1.0612 12.4141 0.25 14.0114 0.25C17.1101 0.25 19.75 2.7595 19.75 6.01872C19.75 8.25132 18.871 10.2147 17.6531 11.8743C16.4374 13.531 14.8471 14.9371 13.3244 16.0796C12.7429 16.516 12.1545 16.9186 11.616 17.2156C11.1104 17.4945 10.529 17.75 10 17.75C9.471 17.75 8.88961 17.4945 8.38399 17.2156C7.84551 16.9186 7.25714 16.516 6.67556 16.0796C5.15291 14.9371 3.56263 13.531 2.34689 11.8743C1.12904 10.2147 0.25 8.25132 0.25 6.01872ZM5.98857 2.06034C3.67169 2.06034 1.92143 3.90581 1.92143 6.01872C1.92143 7.71259 2.58531 9.28965 3.65536 10.7478C4.72751 12.2089 6.17011 13.498 7.6274 14.5915C8.17883 15.0053 8.69823 15.3573 9.1425 15.6024C9.61964 15.8656 9.896 15.9397 10 15.9397C10.104 15.9397 10.3804 15.8656 10.8575 15.6024C11.3018 15.3573 11.8212 15.0053 12.3726 14.5915C13.8299 13.498 15.2725 12.2089 16.3446 10.7478C17.4147 9.28965 18.0786 7.71259 18.0786 6.01872C18.0786 3.90581 16.3283 2.06034 14.0114 2.06034C12.6808 2.06034 11.4383 2.92137 10.6625 4.01422C10.5043 4.23706 10.2595 4.36765 10 4.36765C9.74047 4.36765 9.49568 4.23706 9.33749 4.01422C8.56168 2.92137 7.3192 2.06034 5.98857 2.06034Z" fill="black"/>
</svg>

          </a>
          @endif
          @endif



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
 
 @if(@$game->full_screenshort)
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
@endif


@if(@$game->youtube_array)
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
 @endif
 
@endsection