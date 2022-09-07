@extends('layouts.app2')
@section('content')
<main id="main-content">
 <section class="banner-section--view" style="background-image: url('/assets/images/game-banner.png')">
   <div class="container-1205px">
    <div class="page-headeing-wrap">
      <h1>{{$new->title}}</h1>
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
              <li>{{$new->slug}}</li>
             <!--  <li>Game</li>
              <li>Action Game</li>
              <li>Game</li>
              <li>Game</li>
              <li>Action Game</li> -->
            </ul>
          </div>
      </div>
      <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="tags-data">
          <h4 class="h4-design">Comps</h4>
          <ul class="list-unstyled comps-list-design">
            <li><img src="/assets/images/icons/games.svg"></li>
            <li><img src="assets/images/icons/games.svg"> Adventures Game</li>
            <li><img src="assets/images/icons/games.svg"> Adventures Game</li>
            <li><img src="assets/images/icons/games.svg"> Adventures Game</li>
          </ul>
        </div>
    </div> -->
     </div>
  </div>
  </div>
 </section>
 <section class="game-screenshots-design">
  <div class="container-1205px">
    <div class="game-ss-header">
      <h2 class="h2-design">{!! $new->description !!}</h2>
    </div>
    <div class="slider game-ss-slider">
      <div>
      	
     
        <!-- <img src="/assets/images/game-ss.png"> -->
    
      </div>
      <!-- <div>
        <img src="assets/images/game-ss.png">
      </div>
      <div>
        <img src="assets/images/game-ss.png">
      </div>
      <div>
        <img src="assets/images/game-ss.png">
      </div> -->
    </div>
  </div>
 </section>
 <!-- <section class="video-sec-wrap">
  <div class="full-width-container">
     <div class="row align-items-center">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="video-wrapper">
          <img src="assets/images/youtube-thumbnail.png">
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
 </section> -->
</main>
@endsection