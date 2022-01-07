<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  @if(isset($links))
    <meta name="keywords" content="{{ $links == null ? 'Synema' : $links->keywords }}">
    <meta name="description" content="{{ $links == null ? 'Synema' : $links->description }}">
    <meta name="author" content="Synema">
    {{-- SCRIPT CODE --}}
    {!! $links == null ? '' : $links->script !!}
  @else
    <meta name="keywords" content="Synema">
    <meta name="description" content="Synema">
    <meta name="author" content="Synema">
  @endif
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Title -->
  <title>
    @if ($activePage == 'songs-item')
        {{ $songs->name }} | Synema
    @elseif ($activePage == 'blog-item')
        {{ $articles->title }} | Synema
    @else
        {{ $activePage }} | Synema
    @endif
  </title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
  <!-- Core Stylesheet -->
  <link  rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader-thumbnail">
      <img src="{{ asset('img/core-img/preloader.png') }}" alt="">
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  @include('layouts.header')
  <!-- ***** Header Area End ***** -->
  
  <!-- ***** Content ***** -->
  @yield('content')
  @if(session('success'))
    <div class="alert alert-success">{{ session ('success') }}</div>
  @endif

  @if(session('error'))
      <div class="alert alert-danger">{{ session ('error') }}</div>
  @endif
  <!-- ***** Content End ***** -->

  <!-- ***** Newsletter Area Start ***** -->
  <section class="poca-newsletter-area bg-img bg-overlay pt-50 jarallax" style="background-image: url(img/bg-img/15.jpg') }});">
    <div class="container">
      <div class="row align-items-center">
        <!-- Newsletter Content -->
        <div class="col-12 col-lg-6">
          <div class="newsletter-content mb-50">
            <h2>Sign Up To Newsletter</h2>
            <h6>Subscribe to receive info on our latest news and episodes</h6>
          </div>
        </div>
        <!-- Newsletter Form -->
        <div class="col-12 col-lg-6">
          <div class="newsletter-form mb-50">
            <form action="{{ url('subscribe') }}" method="post">
              @csrf
              <input type="email" name="email" class="form-control" placeholder="Your Email">
              <button type="submit" class="btn">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Newsletter Area End ***** -->

  <!-- ***** Footer Area Start ***** -->
  @include('layouts.footer')
  <!-- ***** Footer Area End ***** -->

  <!-- ******* All JS ******* -->
  <!-- jQuery js -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- Popper js -->
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- All js -->
  <script src="{{ asset('js/poca.bundle.js') }}"></script>
  <!-- Active js -->
  <script src="{{ asset('js/default-assets/active.js') }}"></script>

</body>

</html>