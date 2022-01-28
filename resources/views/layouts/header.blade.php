<header class="header-area">
  <!-- Main Header Start -->
  <div class="main-header-area">
    <div class="classy-nav-container breakpoint-off">
      <!-- Classy Menu -->
      <nav class="classy-navbar justify-content-between" id="pocaNav">

        <!-- Logo -->
        <a class="nav-brand" href="index.html"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>

        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
          <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>

        <!-- Menu -->
        <div class="classy-menu">

          <!-- Menu Close Button -->
          <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
          </div>

          <!-- Nav Start -->
          <div class="classynav">
            <ul id="nav">
              <li class="{{ $activePage == 'Home' ? 'current-item' : '' }}"><a href="{{ url('home') }}">Home</a></li>
              {{-- <li><a href="#">Pages</a>
                <ul class="dropdown">
                  <li><a href="{{ url('home') }}">- Home</a></li>
                  <li><a href="{{ url('songs') }}">- Songs</a></li>
                  <li><a href="{{ url('about') }}">- About Us</a></li>
                  <li><a href="{{ url('blog') }}">- Blog</a></li>
                  <li><a href="{{ url('blog-item') }}">- Blog Details</a></li>
                  <li><a href="{{ url('hom') }}">- Contact</a></li>
                  <li><a href="#">- Dropdown</a>
                    <ul class="dropdown">
                      <li><a href="#">- Dropdown Item</a></li>
                      <li><a href="#">- Dropdown Item</a>
                        <ul class="dropdown">
                          <li><a href="#">- Even Dropdown</a></li>
                          <li><a href="#">- Even Dropdown</a></li>
                          <li><a href="#">- Even Dropdown</a></li>
                          <li><a href="#">- Even Dropdown</a></li>
                        </ul>
                      </li>
                      <li><a href="#">- Dropdown Item</a></li>
                      <li><a href="#">- Dropdown Item</a></li>
                    </ul>
                  </li>
                </ul>
              </li> --}}
              <li class="{{ $activePage == '!nema' ? 'current-item' : '' }}"><a href="{{ url('songs' , 'inema') }}">!nema</a></li>
              <li class="{{ $activePage == 'Synema' ? 'current-item' : '' }}"><a href="{{ url('songs', 'synema') }}">Synema</a></li>
              <li class="{{ $activePage == 'Blog' ? 'current-item' : '' }}"><a href="{{ url('blog') }}">Blog</a></li>
              <li class="{{ $activePage == 'About' ? 'current-item' : '' }}"><a href="./about.html">About</a></li>
              <li class="{{ $activePage == 'Contact' ? 'current-item' : '' }}"><a href="{{ url('contact') }}">Contact</a></li>
            </ul>

            <!-- Top Search Area -->
            <div class="top-search-area">
              <form action="index.html" method="post">
                <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>
            </div>

            <!-- Top Social Area -->
            {{-- @dd($compro) --}}
            <div class="top-social-area">
              <a href="{{ isset($compro->facebook) ? $compro->facebook : '' }}" target="a_blank" class="fa fa-facebook" aria-hidden="true"></a>
              <a href="{{ isset($compro->twitter) ? $compro->twitter : '' }}" target="a_blank" class="fa fa-twitter" aria-hidden="true"></a>
              <a href="{{ isset($compro->instagram) ? $compro->instagram : '' }}" target="a_blank" class="fa fa-instagram" aria-hidden="true"></a>
              <a href="{{ isset($compro->spotify) ? $compro->spotify : '' }}" target="a_blank" class="fa fa-spotify" aria-hidden="true"></a>
              <a href="{{ isset($compro->youtube) ? $compro->youtube : '' }}" target="a_blank" class="fa fa-youtube-play" aria-hidden="true"></a>
            </div>
          </div>
          <!-- Nav End -->
        </div>
      </nav>
    </div>
  </div>
</header>