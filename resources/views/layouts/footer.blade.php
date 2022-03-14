<footer class="footer-area section-padding-80-0">
  <div class="container">
    <div class="row">

      <!-- Single Footer Widget -->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-footer-widget mb-80">
          <!-- Widget Title -->
          <h4 class="widget-title">About Us</h4>

          <p>It is a long established fact that a reader will be distracted by the readable content.</p>
          <div class="copywrite-content">
            <p>&copy; 

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | !nema
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>

      <!-- Single Footer Widget -->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-footer-widget mb-80">
          <!-- Widget Title -->
          <h4 class="widget-title">Our Records</h4>

          <!-- Catagories Nav -->
          <nav>
            <ul class="catagories-nav">
              <li><a href="{{ url('songs' , 'seynema') }}">Seynema Worship</a></li>
              <li><a href="{{ url('songs' , 'verse') }}">Verse Records</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <!-- Single Footer Widget -->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-footer-widget mb-80">
          <!-- Widget Title -->
          <h4 class="widget-title">Lastest Episodes</h4>
          @foreach ($allsongs as $song )
          <!-- Single Latest Episodes -->
          <div class="single-latest-episodes">
            <p class="episodes-date">{{ $song->created_at }}</p>
            <a href="#" class="episodes-title">{{ $song->title }}</a>
          </div>
          @endforeach
        </div>
      </div>

      {{-- @dd($allsongs) --}}

      <!-- Single Footer Widget -->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-footer-widget mb-80">
          <!-- Widget Title -->
          <h4 class="widget-title">Follow Us</h4>
          <!-- Social Info -->
          <div class="footer-social-info">
            <a href="{{ isset($compro->facebook) ? $compro->facebook : '' }}" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="{{ isset($compro->twitter) ? $compro->twitter : '' }}" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="{{ isset($compro->spotify) ? $compro->spotify : '' }}" class="spotify" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-spotify"></i></a>
            <a href="{{ isset($compro->instagram) ? $compro->instagram : '' }}" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
            <a href="{{ isset($compro->youtube) ? $compro->youtube : '' }}" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</footer>