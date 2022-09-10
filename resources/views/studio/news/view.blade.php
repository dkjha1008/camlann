@extends('layouts.app2')
@section('content')
<main id="main-content">
 <section class="view-inner-wrapper" style="background-image: url('{{ asset('assets/images/side-banner.png') }}')">
    <div class="container-1205px">
      <div class="page-headeing-wrap">
        <h1>{{$new->title}}</h1>
      </div>
    </div>
  </section>
 <section class="inner-view-content">
    <div class="container-1205px">
    <div class="light-bg-container">
      <div class="back-div d-flex align-items-center">
          <span class="page-text-header">News</span>
      </div>
      <div class="container-for-box">
        <div class="row">
          <div class="col-xl-3 col-md-3 col-sm-12">
          <div class="uploaded-img-view position-relative">
            <img src="{{ asset('assets/images/thumbnail.png') }}">
            <span class="profile-visibility-tag">Active</span>
          </div>
          </div>
          <div class="col-xl-9 col-md-9 col-sm-12">
            <div class="view-data-box">
                 <div class="description-text-design">
                  <h4 class="h4-design">Publish Date</h4>
                  <p>10 sep 2022</p>
                </div>
                <div class="tags-data">
                  <h4 class="h4-design">Games Tags</h4>
                  <ul class="list-unstyled tags-list-design">
                    <li>{{$new->slug}}</li>
                  </ul>
                </div>
                <div class="description-text">
                    <h4 class="h4-design">Description</h4>
                    <p>{!! $new->description !!}</p>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>
@endsection