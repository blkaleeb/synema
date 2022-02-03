@extends('layouts.main', ['activePage' => 'songs-item'])
@section('content')
<div class="breadcumb-area single-podcast-breadcumb bg-img bg-overlay" style="background-image: url(/img/bg-img/2.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8">
        <!-- Music Area -->
        <div class="poca-music-area style-2 bg-transparent mb-0">
          <div class="poca-music-content text-center">
            <span class="music-published-date mb-2">{{ $songs->created_at }}</span>
            <h2 class="text-white">{{ $songs->title }}</h2>
            <div class="music-meta-data">
              <p class="text-white">By <a href="#" class="music-author text-white">{{ $songs->artists }}</a> | <a href="#" class="music-catagory  text-white">{{ $songs->genre }}</a></p>
            </div>
            <!-- Music Player -->
            <div class="poca-music-player style-2">
              <audio preload="auto" controls>
                <source src="{{ asset('storage/'.$songs->song) }}">
              </audio>
            </div>
            <!-- Likes, Share & Download -->
            {{-- <div class="likes-share-download d-flex align-items-center justify-content-between">
              <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
              <div>
                <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="breadcumb--con">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Podcast</a></li>
            <li class="breadcrumb-item active" aria-current="page">Single</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<section class="podcast-details-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="podcast-details-content d-flex mt-5 mb-80">

          <!-- Post Share -->
          <div class="post-share">
            <p>Share</p>
            <div class="social-info">
              <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
              <a href="#" class="pinterest"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#" class="thumb-tack"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
            </div>
          </div>

          <!-- Post Details Text -->
          <div class="post-details-text">
            {!! $songs->description !!}

            {{-- <!-- Blockquote -->
            <blockquote class="poca-blockquote d-flex">
              <div class="icon">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <div class="text">
                <h5>“Poca has made podcasting a breeze! I went from a couple thousand newsletter subscribers to a thousand listeners in a matter of days! Thank you Poca!”</h5>
                <h6>Jacob Austin</h6>
              </div>
            </blockquote> --}}

            <!-- Post Catagories -->
            <div class="post-catagories d-flex align-items-center">
              <h6>Genre:</h6>
              <ul class="d-flex flex-wrap align-items-center">
                <li><a href="#">{{ $songs->genre }}</a></li>
              </ul>
            </div>

            <!-- Pagination -->
            {{-- <div class="poca-pager d-flex mb-30">
              <a href="#">Previous Post <span>Episode 3 – Wardrobe For Busy People</span></a>
              <a href="#">Next Post <span>Episode 6 – Defining Your Style</span></a>
            </div> --}}

            <!-- Comments Area -->
            <div class="comment_area mb-50 clearfix">
              <h5 class="title">03 Comments</h5>

              @include('client.commentsDisplay' , ['comments' => $songs->comments, 'songs_id' => $songs->id])
            </div>

            <!-- Leave A Reply -->
            <div class="contact-form">
              <h5 class="mb-30">Leave A Comment</h5>

              <!-- Form -->
              <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" name="name" class="form-control mb-30" placeholder="Name">
                  </div>
                  <div class="col-lg-6">
                    <input type="email" name="email" class="form-control mb-30" placeholder="Email">
                  </div>
                  <div class="col-12">
                    <textarea name="body" class="form-control mb-30" placeholder="Comment"></textarea>
                    <input type="hidden" name="songs_id" value="{{ $songs->id }}" />
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn poca-btn mt-30">Post Comment</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="sidebar-area mt-5">

          <!-- Single Widget Area -->
          <div class="single-widget-area search-widget-area mb-80">
            <form action="#" method="post">
              <input type="search" name="search" class="form-control" placeholder="Search ...">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area catagories-widget mb-80">
            <h5 class="widget-title">Genre</h5>

            <!-- catagories list -->
            <ul class="catagories-list">
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entrepreneurship</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Media</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tech</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tutorials</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Business</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entertainment</a></li>
            </ul>
          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area news-widget mb-80">
            <h5 class="widget-title">Recent Songs</h5>
            @foreach ($allSongs as $song )
            <!-- Single News Area -->
            <div class="single-news-area d-flex">
              <div class="blog-thumbnail">
                <img src="./img/bg-img/11.jpg" alt="">
              </div>
              <div class="blog-content">
                <a href="#" class="post-title">{{ $song->title }}</a>
                <span class="post-date">{{ $song->created_at }}</span>
              </div>
            </div>
            @endforeach

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection