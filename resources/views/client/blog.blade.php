@extends('layouts.main', ['activePage' => 'Blog'])
@section('content')
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h2 class="title mt-70">Blog</h2>
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
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Blog Area Start ***** -->
<section class="blog-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">

        <!-- Single Blog Area -->
        <div class="single-blog-area mt-50 mb-50">
          <a href="#" class="mb-30"><img src="./img/bg-img/21.jpg" alt=""></a>
          <!-- Content -->
          <div class="post-content">
            <a href="#" class="post-date">December 9, 2018</a>
            <a href="#" class="post-title">TLS #281: The Lively Show</a>
            <div class="post-meta mb-15">
              <a href="#" class="post-author">By Admin</a> |
              <a href="#" class="post-catagory">Tutorials</a>
            </div>
            <p>Vestibulum lacus erat, pharetra et sodales ut, porta sit amet nibh. Sed vestibulum lacinia quam, vel iaculis nunc condimentum eget. Aliquam in mi pharetra, molestie augue ac, fermentum orci.</p>
            <a href="#" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <!-- Single Blog Area -->
        <div class="single-blog-area mb-50">
          <a href="#" class="mb-30"><img src="./img/bg-img/22.jpg" alt=""></a>
          <!-- Content -->
          <div class="post-content">
            <a href="#" class="post-date">December 9, 2018</a>
            <a href="#" class="post-title">TLS #275: Your Alignment Questions</a>
            <div class="post-meta mb-15">
              <a href="#" class="post-author">By Admin</a> |
              <a href="#" class="post-catagory">Tutorials</a>
            </div>
            <p>Vestibulum lacus erat, pharetra et sodales ut, porta sit amet nibh. Sed vestibulum lacinia quam, vel iaculis nunc condimentum eget. Aliquam in mi pharetra, molestie augue ac, fermentum orci.</p>
            <a href="#" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <!-- Single Blog Area -->
        <div class="single-blog-area mb-50">
          <a href="#" class="mb-30"><img src="./img/bg-img/23.jpg" alt=""></a>
          <!-- Content -->
          <div class="post-content">
            <a href="#" class="post-date">December 9, 2018</a>
            <a href="#" class="post-title">TLS #281: The Entrepreneur On Fire</a>
            <div class="post-meta mb-15">
              <a href="#" class="post-author">By Admin</a> |
              <a href="#" class="post-catagory">Tutorials</a>
            </div>
            <p>Vestibulum lacus erat, pharetra et sodales ut, porta sit amet nibh. Sed vestibulum lacinia quam, vel iaculis nunc condimentum eget. Aliquam in mi pharetra, molestie augue ac, fermentum orci.</p>
            <a href="#" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <!-- Single Blog Area -->
        <div class="single-blog-area mb-50">
          <a href="#" class="mb-30"><img src="./img/bg-img/24.jpg" alt=""></a>
          <!-- Content -->
          <div class="post-content">
            <a href="#" class="post-date">December 9, 2018</a>
            <a href="#" class="post-title">TLS #281: The Lively Show</a>
            <div class="post-meta mb-15">
              <a href="#" class="post-author">By Admin</a> |
              <a href="#" class="post-catagory">Tutorials</a>
            </div>
            <p>Vestibulum lacus erat, pharetra et sodales ut, porta sit amet nibh. Sed vestibulum lacinia quam, vel iaculis nunc condimentum eget. Aliquam in mi pharetra, molestie augue ac, fermentum orci.</p>
            <a href="#" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <!-- Pagination -->
        <div class="poca-pager d-flex mb-80">
          <a href="#">Previous Post <span>Episode 3 – Wardrobe For Busy People</span></a>
          <a href="#">Next Post <span>Episode 6 – Defining Your Style</span></a>
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
            <h5 class="widget-title">Categories</h5>

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
            <h5 class="widget-title">Recent Posts</h5>

            <!-- Single News Area -->
            <div class="single-news-area d-flex">
              <div class="blog-thumbnail">
                <img src="./img/bg-img/11.jpg" alt="">
              </div>
              <div class="blog-content">
                <a href="#" class="post-title">Episode 10: Season Finale</a>
                <span class="post-date">December 9, 2018</span>
              </div>
            </div>

            <!-- Single News Area -->
            <div class="single-news-area d-flex">
              <div class="blog-thumbnail">
                <img src="./img/bg-img/12.jpg" alt="">
              </div>
              <div class="blog-content">
                <a href="#" class="post-title">Episode 6: SoundCloud Example</a>
                <span class="post-date">December 9, 2018</span>
              </div>
            </div>

            <!-- Single News Area -->
            <div class="single-news-area d-flex">
              <div class="blog-thumbnail">
                <img src="./img/bg-img/13.jpg" alt="">
              </div>
              <div class="blog-content">
                <a href="#" class="post-title">Episode 7: Best Mics for Podcasting</a>
                <span class="post-date">December 9, 2018</span>
              </div>
            </div>

            <!-- Single News Area -->
            <div class="single-news-area d-flex">
              <div class="blog-thumbnail">
                <img src="./img/bg-img/14.jpg" alt="">
              </div>
              <div class="blog-content">
                <a href="#" class="post-title">Episode 6 – Defining Your Style</a>
                <span class="post-date">December 9, 2018</span>
              </div>
            </div>

          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area adds-widget mb-80">
            <a href="#"><img class="w-100" src="./img/bg-img/banner.png" alt=""></a>
          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area tags-widget mb-80">
            <h5 class="widget-title">Popular Tags</h5>

            <ul class="tags-list">
              <li><a href="#">Creative</a></li>
              <li><a href="#">Unique</a></li>
              <li><a href="#">audio</a></li>
              <li><a href="#">Episodes</a></li>
              <li><a href="#">ideas</a></li>
              <li><a href="#">Podcasts</a></li>
              <li><a href="#">Wordpress Template</a></li>
              <li><a href="#">startup</a></li>
              <li><a href="#">video</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Blog Area End ***** -->
@endsection