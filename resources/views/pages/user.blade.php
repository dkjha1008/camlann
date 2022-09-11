@extends('layouts.app2')
@section('content')
<section class="view-inner-wrapper" style="background-image: url('{{ asset('assets/images/side-banner.png') }}')">
    <div class="container-1205px">
      <div class="page-headeing-wrap">
        <h1>{{ $user->userStudio->studio_name ?? $user->name }}</h1>
      </div>
    </div>
  </section>
  <section class="inner-view-content">
    <div class="container-1205px">
    <div class="light-bg-container">
      {{--
      <div class="back-div d-flex align-items-center">
        <a href="{{ route('home') }}"><svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.44666 16C7.35892 16.0005 7.27194 15.9837 7.19072 15.9505C7.10949 15.9174 7.03561 15.8685 6.97332 15.8067L1.52666 10.36C1.21623 10.0504 0.969948 9.68256 0.801905 9.27759C0.633862 8.87262 0.547363 8.43848 0.547363 8.00003C0.547363 7.56158 0.633862 7.12744 0.801905 6.72248C0.969948 6.31751 1.21623 5.94967 1.52666 5.64004L6.97332 0.193375C7.03548 0.131216 7.10927 0.0819092 7.19049 0.048269C7.2717 0.0146288 7.35875 -0.00268555 7.44666 -0.00268555C7.53456 -0.00268555 7.62161 0.0146288 7.70282 0.048269C7.78404 0.0819092 7.85783 0.131216 7.91999 0.193375C7.98215 0.255534 8.03146 0.329328 8.0651 0.410542C8.09874 0.491757 8.11605 0.578802 8.11605 0.666708C8.11605 0.754614 8.09874 0.841659 8.0651 0.922874C8.03146 1.00409 7.98215 1.07788 7.91999 1.14004L2.47332 6.5867C2.09879 6.9617 1.88842 7.47003 1.88842 8.00003C1.88842 8.53003 2.09879 9.03836 2.47332 9.41336L7.91999 14.86C7.98247 14.922 8.03207 14.9957 8.06592 15.077C8.09976 15.1582 8.11719 15.2453 8.11719 15.3334C8.11719 15.4214 8.09976 15.5085 8.06592 15.5897C8.03207 15.671 7.98247 15.7447 7.91999 15.8067C7.85769 15.8685 7.78382 15.9174 7.70259 15.9505C7.62137 15.9837 7.53439 16.0005 7.44666 16Z" fill="#374957"/>
          </svg>
          </a>
          <span class="page-text-header">{{ @ucfirst($user->role) }}</span>
      </div>
      --}}


      <div class="container-for-box">
        <div class="row">
          <div class="col-xl-3 col-md-3 col-sm-12">
          <div class="uploaded-btn0favourite-btn">
          <div class="uploaded-img-view position-relative">
            @if(@$user->profile_pic)
            <img src="{{ $user->profile_pic }}">
            @endif
            
            {{--
            @if(@$user->role=='reporter')
            <span class="profile-visibility-tag">{{ ucfirst($user->userReporter->visibility) }}</span>
            @endif
            --}}
            
          </div>

          @if(auth()->check())
          <button type="button" class="btn btn-warning messageForm">Message</button>

          @php
          $favourites = auth()->user()->favourite()->pluck('fav_users_id')->toArray();
          @endphp
           


           @if(in_array($user->id, $favourites))
          <a class="view-btn toggle-class-remove" href="{{ route('favourite.action', $user->id) }}">
            
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
          <a class="view-btn toggle-class" href="{{ route('favourite.action', $user->id) }}">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 6.01872C0.25 2.7595 2.8899 0.25 5.98857 0.25C7.58587 0.25 8.99139 1.0612 10 2.11083C11.0086 1.0612 12.4141 0.25 14.0114 0.25C17.1101 0.25 19.75 2.7595 19.75 6.01872C19.75 8.25132 18.871 10.2147 17.6531 11.8743C16.4374 13.531 14.8471 14.9371 13.3244 16.0796C12.7429 16.516 12.1545 16.9186 11.616 17.2156C11.1104 17.4945 10.529 17.75 10 17.75C9.471 17.75 8.88961 17.4945 8.38399 17.2156C7.84551 16.9186 7.25714 16.516 6.67556 16.0796C5.15291 14.9371 3.56263 13.531 2.34689 11.8743C1.12904 10.2147 0.25 8.25132 0.25 6.01872ZM5.98857 2.06034C3.67169 2.06034 1.92143 3.90581 1.92143 6.01872C1.92143 7.71259 2.58531 9.28965 3.65536 10.7478C4.72751 12.2089 6.17011 13.498 7.6274 14.5915C8.17883 15.0053 8.69823 15.3573 9.1425 15.6024C9.61964 15.8656 9.896 15.9397 10 15.9397C10.104 15.9397 10.3804 15.8656 10.8575 15.6024C11.3018 15.3573 11.8212 15.0053 12.3726 14.5915C13.8299 13.498 15.2725 12.2089 16.3446 10.7478C17.4147 9.28965 18.0786 7.71259 18.0786 6.01872C18.0786 3.90581 16.3283 2.06034 14.0114 2.06034C12.6808 2.06034 11.4383 2.92137 10.6625 4.01422C10.5043 4.23706 10.2595 4.36765 10 4.36765C9.74047 4.36765 9.49568 4.23706 9.33749 4.01422C8.56168 2.92137 7.3192 2.06034 5.98857 2.06034Z" fill="black"/>
</svg>

          </a>
          @endif
            </div>




          @endif

          </div>
          <div class="col-xl-9 col-md-9 col-sm-12">
            <div class="view-data-box">
                
                @if(@$user->role=='reporter')
                @if(@$user->userReporter->twitter)
                <div class="url-field twiiter-url">
                  <h4 class="h4-design">Twitter URL</h4>
                  <ul class="list-unstyled">
                  <li><a href="{{ $user->userReporter->twitter }}">{{ $user->userReporter->twitter }}</a></li>
                  </ul>
                </div>
                @endif

                @if(@$user->userReporter->links_array)
                 <div class="url-field add-links-articles">
                  <h4 class="h4-design">Links</h4>
                  <ul class="list-unstyled d-flex">
                    @foreach($user->userReporter->links_array as $link)
                    <li><a href="{{ $link }}">{{ $link }}</a></li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @endif



                @if(@$user->role=='streamer')
                @if(@$user->userStreamer->twitter)
                <div class="url-field twiiter-url">
                  <h4 class="h4-design">Twitter URL</h4>
                  <ul class="list-unstyled">
                  <li><a href="{{ $user->userStreamer->twitter }}">{{ $user->userStreamer->twitter }}</a></li>
                  </ul>
                </div>
                @endif

                @if(@$user->userStreamer->links_array)
                 <div class="url-field add-links-articles">
                  <h4 class="h4-design">Links</h4>
                  <ul class="list-unstyled d-flex">
                    @foreach($user->userStreamer->links_array as $link)
                    <li><a href="{{ $link }}">{{ $link }}</a></li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @endif


                @if(@$user->role=='studio')
                @if(@$user->userStudio->website)
                <div class="url-field twiiter-url">
                  <h4 class="h4-design">Website</h4>
                  <ul class="list-unstyled">
                  <li><a href="{{ $user->userStudio->website }}">{{ $user->userStudio->website }}</a></li>
                  </ul>
                </div>
                @endif

                @if(@$user->userStudio->description)
                 <div class="url-field add-links-articles">
                  <h4 class="h4-design">Description</h4>
                  <p>{!! $user->userStudio->description !!}</p>
                </div>
                @endif
                @endif


                @if(@$user->tags)
	            <div class="tags-data">
	              <h4 class="h4-design">Tags</h4>
	              <ul class="list-unstyled tags-list-design">
	                @foreach($user->tags as $tag)
	                <li>{{ $tag->tag->name }}</li>
	                @endforeach
	              </ul>
	            </div>
	            @endif


              @if(@$user->publicationReporter)
              <div class="tags-data">
                <h4 class="h4-design">Publication</h4>
                <ul class="list-unstyled tags-list-design">
                  <li><a href="{{ route('publication.view', $user->publicationReporter->publication->id) }}">{{ $user->publicationReporter->publication->publication }}</a></li>
                </ul>
              </div>
              @endif






	            @if(@$user->role=='streamer')
                @if(@$user->userStreamer->youtube_channel)
                <div class="url-field youtube-url">
                  <h4 class="h4-design">Youtube channel link</h4>
                  <ul class="list-unstyled">
                  <li><a href="{{$user->userStreamer->youtube_channel}}">youtube.com</a></li>
                  </ul>
                </div>
                @endif
                @if(@$user->userStreamer->twitch_channel)
                <div class="url-field twitch-url">
                  <h4 class="h4-design">Twitch channel link</h4>
                  <ul class="list-unstyled">
                  <li><a href="{{$user->userStreamer->twitch_channel}}">twitch.com</a></li>
                  </ul>
                </div>
                @endif

                
                @if(@$user->userStreamer->link_videos_array)
                 <div class="url-field add-links-articles">
                  <h4 class="h4-design">Link Videos</h4>
                  <ul class="list-unstyled d-flex">
                    @foreach($user->userStreamer->link_videos_array as $linkVideo)
                    <li><a href="{{ $linkVideo }}">{{ $linkVideo }}</a></li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @endif

                @php
                $games = $user->games()->whereStatus('1')->get();
                @endphp
                @if(@$games)
                <div class="url-field games-slider">
                  <h4 class="h4-design">Games</h4>
                <div class="slider game-ss-slider">
                  @foreach($games as $game)
                  <div>
                    <div class="slider-design-2">
                    <a href="{{ route('game.view', [$game->id, $game->slug]) }}">
                      @if($game->full_image)
                      <img src="{{ $game->full_image }}">
                      @endif
                      <h5>{{ $game->title }}</h5>
                    </a>
                  </div>
                  </div>
                    @endforeach
                </div>
                </div>
                @endif


                @php
                $news = $user->news()->whereStatus('1')->where('publish_date', '<=', date('Y-m-d'))->get();
                @endphp
                @if(@$news)
                <div class="url-field games-slider">
                  <h4 class="h4-design">News</h4>
                <div class="slider game-ss-slider">
                  @foreach($news as $data)
                  <div>
                    <div class="slider-design-2">
                    <a href="{{ route('news.view', [$data->id, $data->slug]) }}">
                      @if($data->full_image)
                      <img src="{{ $data->full_image }}">
                      @endif
                      <h5>{{ $data->title }}</h5>
                    </a>
                  </div>
                  </div>
                    @endforeach
                </div>
                </div>
                @endif


            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection



@section('script')

@if(auth()->check())
<div class="modal fade modal-design" id="contactForm" tabindex="-1" aria-labelledby="contactForm" aria-hidden="true">
    <div class="modal-dialog modal_style">
        <button type="button" class="btn btn-default close closeModal">
            <i class="fas fa-close"></i>
        </button>
        <div class="modal-content">
            <form action="{{ route('contact.store', $user->id) }}" method="post">
              @csrf
                <div class="modal-header">
                    <h3>Contact</h3>
                </div>

                <div class="modal-body">
                    <div>
                        <div class="form-grouph input-design mb-15">
                            <label>Message</label>
                            <textarea name="message" class="form-control" required></textarea>
                            {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                        </div>
                      </div>
                    </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-success">
                        Send
                    </button>
                 </div>
        </form>
        
      </div>
    </div>
  </div>

<script>
  $('.messageForm').on('click', function (){
    $('#contactForm').modal('show');
  });

  $('.closeModal').on('click', function (){
    $('#contactForm').modal('hide');
  });
</script>
@endif
@endsection