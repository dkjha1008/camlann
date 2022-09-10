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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="tags-data">
            <h4 class="h4-design">Publish Date: {{ @$new->publish_date }}</h4>
            {!! $new->description !!}
          </div>
      </div>
     </div>
  </div>
  </div>
 </section>
 <section class="game-screenshots-design">
  <div class="container-1205px">
     @if($new->newsGames)
        <h3>Games</h3>
        <div class="row">
          @foreach($new->newsGames as $newsGame)
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
            <a href="{{ route('game.view', [$newsGame->game->id, $newsGame->game->slug]) }}">
              @if($newsGame->game->full_image)
              <img src="{{ $newsGame->game->full_image }}">
              @endif
              <b>{{ $newsGame->game->title }}</b>
            </a>
          </div>
            @endforeach
        </div>
        @endif
  </div>
 </section>
</main>
@endsection