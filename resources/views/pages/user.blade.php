@extends('layouts.app2')
@section('content')
<section class="view-inner-wrapper" style="background-image: url({{ asset('assets/images/side-banner.png') }}">
    <div class="container-1205px">
      <div class="page-headeing-wrap">
        <h1>{{ @$user->name }}</h1>
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
          <div class="uploaded-img-view position-relative">
            @if(@$user->profile_pic)
            <img src="{{ $user->profile_pic }}">
            @endif
            @if(@$user->role=='reporter')
            <span class="profile-visibility-tag">{{ ucfirst($user->userReporter->visibility) }}</span>
            @endif
          </div>
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
                  <ul class="list-unstyled d-flex">
                    <li>{{ $user->userStudio->description }}</li>
                   </ul>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection