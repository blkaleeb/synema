@extends('layouts.main', ['activePage' => 'Blog'])
@section('content')
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/BannerBlog.jpg);">
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
        @if($articles->isEmpty()) 
          <div class="single-blog-area mt-50 mb-50">
            <br><br> <div class="post-title"> Sorry, we cannot find what you are looking for. </div>
          </div>
        @else
        @foreach ($articles as $article)
        <!-- Single Blog Area -->
        <div class="single-blog-area mt-50 mb-50">
          <a href="{{ url('blog-item/'.$article->id)}}" class="mb-30"><img src="{{ asset('storage/'.$article->image) }}" alt=""></a>
          <!-- Content -->
          <div class="post-content">
            <a href="{{ url('blog-item/'.$article->id)}}" class="post-date">{{ $article->created_at }}</a>
            <a href="{{ url('blog-item/'.$article->id)}}" class="post-title">{{ $article->title }}</a>
            <div class="post-meta mb-15">
              <a href="{{ url('blog-item/'.$article->id)}}" class="post-author">By Admin</a> |
              <a href="{{ url('blog-item/'.$article->id)}}" class="post-catagory">{{ $article->category->name }}</a>
            </div>
            <p>{{ $article->subtitle }}</p>
            <a href="{{ url('blog-item/'.$article->id)}}" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <div class="col-12 col-lg-4">
        <div class="sidebar-area mt-5">

          <!-- Single Widget Area -->
          <div class="single-widget-area search-widget-area mb-80">
            <form>
              <input type="search" name="search" class="form-control" placeholder="Search ..." value="{{ request('search')}}">
              <a onclick="onArticleSearch()" class="tt-btn-icon icon-search"></a>
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area catagories-widget mb-80">
            <h5 class="widget-title">Categories</h5>

            <!-- catagories list -->
            <ul class="catagories-list">
              @foreach ($articleCategories as $category )
              <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $category->name }}</a></li>
              {{-- <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entrepreneurship</a></li> --}}
              @endforeach
            </ul>
          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area news-widget mb-80">
            <h5 class="widget-title">Recent Posts</h5>

            <!-- Single News Area -->
            @foreach ($newArticles as $article)
            <div class="single-news-area d-flex">
              <div class="blog-thumbnail">
                <img src="./img/bg-img/11.jpg" alt="">
              </div>
              <div class="blog-content">
                <a href="#" class="post-title">{{ $article->title }}</a>
                <span class="post-date">{{ $article->created_at }}</span>
              </div>
            </div>
            @endforeach

          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area adds-widget mb-80">
            <a href="#"><img class="w-100" src="./img/bg-img/banner.png" alt=""></a>
          </div>

          <!-- Single Widget Area -->
          <div class="single-widget-area tags-widget mb-80">
            <h5 class="widget-title">Popular Tags</h5>

            <ul class="tags-list">
              @foreach ($tags as $tag)
              <li><a href="#">{{ $tag->name }}</a></li>
              @endforeach
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Blog Area End ***** -->
@endsection

@section('javascript')
<script type="text/javascript">
	const onArticleSearch = () => {
		const search = document.getElementById("search").value || '';
		const urlSearchParams = new URLSearchParams(window.location.search);
		urlSearchParams.set('search', search)

		window.location = `{{ url('blog?${urlSearchParams}')}}`;
	}
</script>
@endsection