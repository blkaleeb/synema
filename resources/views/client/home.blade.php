@extends('layouts.main', ['activePage' => 'Home'])
@section('content')

<!-- ***** Welcome Area Start ***** -->
<section class="welcome-area">
  <!-- Welcome Slides -->
  <div class="welcome-slides owl-carousel">
    <!-- Single Welcome Slide -->
    @foreach ($banners as $banner)
    <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('storage/'.$banner->image) }});">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <!-- Welcome Text -->
            <div class="welcome-text">
              <h2 data-animation="fadeInUp" data-delay="100ms">{{ $banner->title }}</h2>
              <h5 data-animation="fadeInUp" data-delay="300ms">{{ $banner->subtitle }}</h5>
              <div class="welcome-btn-group">
                <a href="#" class="btn poca-btn m-2 ml-0 active" data-animation="fadeInUp" data-delay="500ms">Subscribe with iTunes</a>
                <a href="#" class="btn poca-btn btn-2 m-2" data-animation="fadeInUp" data-delay="700ms">Subscribe with RSS</a>
              </div>
            </div>
            <!-- Welcome Music Area -->
            <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap" data-animation="fadeInUp" data-delay="900ms">
              <div class="poca-music-thumbnail">
                <img src="{{ asset('img/bg-img/4.jpg') }}" alt="">
              </div>
              <div class="poca-music-content">
                <span class="music-published-date">{{ $banner->songs->created_at }}</span>
                <h2>{{ $banner->songs->title }}</h2>
                <div class="music-meta-data">
                  <p>By <a href="#" class="music-author">{{ $banner->songs->artists }}</a> | <a href="#" class="music-catagory">{{ $banner->songs->genre }}</a> | <a href="#" class="music-duration">00:02:56</a></p>
                </div>
                <!-- Music Player -->
                <div class="poca-music-player">
                  <audio preload="auto" controls>
                    <source src="{{ asset('storage/'.$banner->songs->song)}}">
                  </audio>
                </div>
                {{-- <!-- Likes, Share & Download -->
                <div class="likes-share-download d-flex align-items-center justify-content-between">
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
    @endforeach

    <!-- Single Welcome Slide -->
    <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/banner.jpg') }});">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <!-- Welcome Text -->
            <div class="welcome-text">
              <h2 data-animation="fadeInUp" data-delay="100ms">Listen Now</h2>
              <h5 data-animation="fadeInUp" data-delay="300ms">Please schedule a podcast post, to make it visible here.</h5>
              <div class="welcome-btn-group">
                <a href="#" class="btn poca-btn m-2 ml-0 active" data-animation="fadeInUp" data-delay="500ms">Subscribe with iTunes</a>
                <a href="#" class="btn poca-btn btn-2 m-2" data-animation="fadeInUp" data-delay="700ms">Subscribe with RSS</a>
              </div>
            </div>
            <!-- Welcome Music Area -->
            <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap" data-animation="fadeInUp" data-delay="900ms">
              <div class="poca-music-thumbnail">
                <img src="{{ asset('img/bg-img/4.jpg') }}" alt="">
              </div>
              <div class="poca-music-content">
                <span class="music-published-date">December 8, 2018</span>
                <h2>Episode 202 - The Last Blockbuster</h2>
                <div class="music-meta-data">
                  <p>By <a href="#" class="music-author">Admin</a> | <a href="#" class="music-catagory">Tutorials</a> | <a href="#" class="music-duration">00:02:56</a></p>
                </div>
                <!-- Music Player -->
                <div class="poca-music-player">
                  <audio preload="auto" controls>
                    <source src="{{ asset('audio/dummy-audio.mp3') }}">
                  </audio>
                </div>
                <!-- Likes, Share & Download -->
                <div class="likes-share-download d-flex align-items-center justify-content-between">
                  <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
                  <div>
                    <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Single Welcome Slide -->
    <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/2.jpg') }});">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <!-- Welcome Text -->
            <div class="welcome-text">
              <h2 data-animation="fadeInUp" data-delay="100ms">Discover Today</h2>
              <h5 data-animation="fadeInUp" data-delay="300ms">Please schedule a podcast post, to make it visible here.</h5>
              <div class="welcome-btn-group">
                <a href="#" class="btn poca-btn m-2 ml-0 active" data-animation="fadeInUp" data-delay="500ms">Subscribe with iTunes</a>
                <a href="#" class="btn poca-btn btn-2 m-2" data-animation="fadeInUp" data-delay="700ms">Subscribe with RSS</a>
              </div>
            </div>
            <!-- Welcome Music Area -->
            <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap" data-animation="fadeInUp" data-delay="900ms">
              <div class="poca-music-thumbnail">
                <img src="{{ asset('img/bg-img/4.jpg') }}" alt="">
              </div>
              <div class="poca-music-content">
                <span class="music-published-date">December 7, 2018</span>
                <h2>Episode 201 - The Last Blockbuster</h2>
                <div class="music-meta-data">
                  <p>By <a href="#" class="music-author">Admin</a> | <a href="#" class="music-catagory">Tutorials</a> | <a href="#" class="music-duration">00:02:56</a></p>
                </div>
                <!-- Music Player -->
                <div class="poca-music-player">
                  <audio preload="auto" controls>
                    <source src="{{ asset('audio/dummy-audio.mp3') }}">
                  </audio>
                </div>
                <!-- Likes, Share & Download -->
                <div class="likes-share-download d-flex align-items-center justify-content-between">
                  <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
                  <div>
                    <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Latest Episodes Area Start ***** -->
<section class="poca-latest-epiosodes section-padding-80">
  <div class="container">
    <div class="row">
      <!-- Section Heading -->
      <div class="col-12">
        <div class="section-heading text-center">
          <h2>Latest Songs</h2>
          <div class="line"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Projects Menu -->
  <div class="container">
    <div class="poca-projects-menu mb-30 wow fadeInUp" data-wow-delay="0.3s">
      <div class="text-center portfolio-menu">
        <button class="btn" data-filter=".entre">Synema</button>
        <button class="btn" data-filter=".media">Verse</button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row poca-portfolio">

      @foreach ($songs as $song)
      <!-- Single gallery Item -->
      <div class="col-12 col-md-6 single_gallery_item entre wow fadeInUp" data-wow-delay="0.2s">
        <!-- Welcome Music Area -->
        <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
          <div class="poca-music-thumbnail">
            <a href="{{ url('song-item/'.$song->id)}}"><img src="{{ asset('img/bg-img/5.jpg') }}" alt=""></a>
          </div>
          <div class="poca-music-content text-center">
            <span class="music-published-date mb-2">{{ $song->created_at }}</span>
            <h2>{{ $song->title }}</h2>
            <div class="music-meta-data">
              <p>By <a href="#" class="music-author">{{ $song->artists }}</a> | <a href="#" class="music-catagory">{{ $song->genre }}</a></p>
            </div>
            <!-- Music Player -->
            <div class="poca-music-player">
              <audio preload="auto" controls>
                <source src="{{ asset('storage/'.$song->song) }}">
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
      @endforeach
    </div>
  </div>

  {{-- <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <a href="#" class="btn poca-btn mt-70">Load More</a>
      </div>
    </div>
  </div> --}}
</section>
<!-- ***** Latest Episodes Area End ***** -->

<!-- ***** Featured Guests Area Start ***** -->
<section class="featured-guests-area">
  <div class="container">
    <div class="row">
      <!-- Section Heading -->
      <div class="col-12">
        <div class="section-heading text-center">
          <h2>Featured Guests</h2>
          <div class="line"></div>
        </div>
      </div>
    </div>

    <div class="row justify-content-around">
      <!-- Single Featured Guest -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="single-featured-guest mb-80">
          <img src="img/bg-img/25.jpg') }}" alt="">
          <div class="guest-info">
            <h5>Alfred Day</h5>
            <span>PRODUCER</span>
          </div>
        </div>
      </div>

      <!-- Single Featured Guest -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="single-featured-guest mb-80">
          <img src="img/bg-img/26.jpg') }}" alt="">
          <div class="guest-info">
            <h5>Jayden White</h5>
            <span>DRUMMER</span>
          </div>
        </div>
      </div>

      <!-- Single Featured Guest -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="single-featured-guest mb-80">
          <img src="img/bg-img/27.jpg') }}" alt="">
          <div class="guest-info">
            <h5>Vincent Reid</h5>
            <span>ENTREPRENEUR</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Featured Guests Area End ***** -->
  
@endsection