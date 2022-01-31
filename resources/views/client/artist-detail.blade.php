@extends('layouts.main', ['activePage' => 'artist-detail'])
@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/2.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h2 class="title mt-70">Our Personnel Detail</h2>
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
            <li class="breadcrumb-item"><a href="#">Artist</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artists</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->
<section class="blog-details-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="podcast-details-content d-flex mt-5 mb-80">
          <!-- Post Details Text -->
          <div class="post-details-text">
            <img src="{{ asset('storage/' . $artists->image) }}" class="mb-30" alt="">

            <div class="post-content">
              <a href="#" class="post-date">{{ $artists->created_at }}</a>
              <h2>{{ $artists->name }}</h2>
              <div class="post-meta">
                <a href="#" class="post-author">By Admin</a> |
                <a href="#" class="post-catagory">{{ $artists->role }}</a>
              </div>
            </div>

            {!! $artists->description !!}

            <!-- Comments Area -->
            {{-- <div class="comment_area mb-50 clearfix">
              <h5 class="title">03 Comments</h5>

              <ol>
                <!-- Single Comment Area -->
                <li class="single_comment_area">
                  <!-- Comment Content -->
                  <div class="comment-content d-flex">
                    <!-- Comment Author -->
                    <div class="comment-author">
                      <img src="img/bg-img/16.jpg" alt="author">
                    </div>
                    <!-- Comment Meta -->
                    <div class="comment-meta">
                      <a href="#" class="post-date">27 Aug 2018</a>
                      <h5>Jerome Leonard</h5>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                      <a href="#" class="like">Like</a>
                      <a href="#" class="reply">Reply</a>
                    </div>
                  </div>

                  <ol class="children">
                    <li class="single_comment_area">
                      <!-- Comment Content -->
                      <div class="comment-content d-flex">
                        <!-- Comment Author -->
                        <div class="comment-author">
                          <img src="img/bg-img/17.jpg" alt="author">
                        </div>
                        <!-- Comment Meta -->
                        <div class="comment-meta">
                          <a href="#" class="post-date">27 Aug 2018</a>
                          <h5>Theodore Adkins</h5>
                          <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                          <a href="#" class="like">Like</a>
                          <a href="#" class="reply">Reply</a>
                        </div>
                      </div>
                    </li>
                  </ol>
                </li>

                <!-- Single Comment Area -->
                <li class="single_comment_area">
                  <!-- Comment Content -->
                  <div class="comment-content d-flex">
                    <!-- Comment Author -->
                    <div class="comment-author">
                      <img src="img/bg-img/18.jpg" alt="author">
                    </div>
                    <!-- Comment Meta -->
                    <div class="comment-meta">
                      <a href="#" class="post-date">27 Aug 2018</a>
                      <h5>Roger Marshall</h5>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                      <a href="#" class="like">Like</a>
                      <a href="#" class="reply">Reply</a>
                    </div>
                  </div>
                </li>
              </ol>
            </div> --}}

            <!-- Leave A Reply -->
            {{-- <div class="contact-form">
              <h5 class="mb-30">Leave A Comment</h5>

              <!-- Form -->
              <form action="#" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" name="message-name" class="form-control mb-30" placeholder="Name">
                  </div>
                  <div class="col-lg-6">
                    <input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
                  </div>
                  <div class="col-12">
                    <textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn poca-btn mt-30">Post Comment</button>
                  </div>
                </div>
              </form>

            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection