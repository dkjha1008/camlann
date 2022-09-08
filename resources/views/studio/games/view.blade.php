@extends('layouts.app2')
@section('content')
<main id="main-content">
 <section class="banner-section--view" style="background-image: url('/assets/images/game-banner.png')">
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
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="tags-data">
            <h4 class="h4-design">Game Tags</h4>
            <ul class="list-unstyled tags-list-design">
              <li>{{$game->slug}}</li>
              <li>Game</li>
              <li>Action Game</li>
              <li>Game</li>
              <li>Game</li>
              <li>Action Game</li>
            </ul>
          </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="tags-data">
          <h4 class="h4-design">Comps</h4>
          <ul class="list-unstyled comps-list-design">
            <li><img src="/assets/images/icons/games.svg"> {{$game->comps}}</li>
           <!--  <li><img src="assets/images/icons/games.svg"> Adventures Game</li>
            <li><img src="assets/images/icons/games.svg"> Adventures Game</li>
            <li><img src="assets/images/icons/games.svg"> Adventures Game</li> -->
          </ul>
        </div>
    </div>
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
      <div>
      	 <img src="{{url('/storage/games/'.$game->screenshots)}}"  >
     
    
      </div>
      <div>
        <img src="/assets/images/game-ss.png">
      </div>
     
    </div>
  </div>
 </section>
 <section class="video-sec-wrap">
  <div class="full-width-container">
     <div class="row align-items-center">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="video-wrapper">
          <img src="/assets/images/youtube-thumbnail.png">
          <button class="play-btn"><img src="/assets/images/icons/Youtube.svg"></button>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="heading-paragraph-design">
          <h2>Latest Game Trends</h2>
          <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without</p>
          <a href="#" class="heading-btn">Explore</a>
        </div>
      </div>
     </div>
  </div>
 </section>
 <section class="desk-files-sec">
  <div class="container-1205px">
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="white-box-data text-center">
          <h4 class="h4-design">Pitch deck Files</h4>
          <p><img src="/assets/images/icons/document.svg"> <span class="file-name">{{$game->attach_files}}</span></p>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="white-box-data text-center">
          <h4 class="h4-design">Link To Playble Demo</h4>
          <p><img src="/assets/images/icons/document.svg"> <a href="#">{{$game->playable_demo}}</a></p>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="white-box-data text-center">
          <h4 class="h4-design">.EXE Playble Demo</h4>
          <p><img src="/assets/images/icons/document.svg"> <a href="#">youtube.com</a></p>
        </div>
      </div>
    </div>
 <!--    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="white-box-data align-items-start">
          <div class="tags-data">
            <h4 class="h4-design">Game Tags</h4>
            <ul class="list-unstyled tags-list-design">
              <li>Game</li>
              <li>Game</li>
              <li>Action Game</li>
              <li>Game</li>
              <li>Game</li>
              <li>Action Game</li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
  </div>
 </section>
</main>
@endsection