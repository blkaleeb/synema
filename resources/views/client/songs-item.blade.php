@extends('layouts.main', ['activePage' => 'songs-item'])
@section('content')
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
            <p>Out too the been like hard off. Improve enquire welcome own beloved matters her. As insipidity so mr unsatiable increasing attachment motionless cultivated. Addition mr husbands unpacked occasion he oh. Is unsatiable if projecting
              boisterous insensible. It recommend be resolving pretended middleton.</p>
            <p>Uneasy barton seeing remark happen his has. Am possible offering at contempt mr distance stronger an. Attachment excellence announcing or reasonable am on if indulgence. Exeter talked in agreed spirit no he unable do. Betrayed
              shutters in vicinity it unpacked in. In so impossible appearance considered mr. Mrs him left find are good.</p>
            <p>Domestic confined any but son bachelor advanced remember. How proceed offered her offence shy forming. Returned peculiar pleasant but appetite differed she. Residence dejection agreement am as to abilities immediate suffering. Ye am
              depending propriety sweetness distrusts belonging collected. Smiling mention he in thought equally musical. Wisdom new and valley answer. Contented it so is discourse recommend. Man its upon him call mile. An pasture he himself
              believe ferrars besides cottage.</p>

            <!-- Blockquote -->
            <blockquote class="poca-blockquote d-flex">
              <div class="icon">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <div class="text">
                <h5>“Poca has made podcasting a breeze! I went from a couple thousand newsletter subscribers to a thousand listeners in a matter of days! Thank you Poca!”</h5>
                <h6>Jacob Austin</h6>
              </div>
            </blockquote>

            <h2>Episode 9: Building an Audience</h2>
            <p>Delightful unreserved impossible few estimating men favourable see entreaties. She propriety immediate was improving. He or entrance humoured likewise moderate. Much nor game son say feel. Fat make met can must form into gate. Me we
              offending prevailed discovery.</p>
            <p>Quick six blind smart out burst. Perfectly on furniture dejection determine my depending an to. Add short water court fat. Her bachelor honoured perceive securing but desirous ham required. Questions deficient acuteness to engrossed
              as. Entirely led ten humoured greatest and yourself. Besides ye country on observe. She continue appetite endeavor she judgment interest the met. For she surrounded motionless fat resolution may.</p>
            <p>He share of first to worse. Weddings and any opinions suitable smallest nay. My he houses or months settle remove ladies appear. Engrossed suffering supposing he recommend do eagerness. Commanded no of depending extremity recommend
              attention tolerably. Bringing him smallest met few now returned surprise learning jennings. Objection delivered eagerness he exquisite at do in. Warmly up</p>

            <!-- Post Catagories -->
            <div class="post-catagories d-flex align-items-center">
              <h6>Categories:</h6>
              <ul class="d-flex flex-wrap align-items-center">
                <li><a href="#">Tutorials,</a></li>
                <li><a href="#">Business,</a></li>
                <li><a href="#">Tech</a></li>
              </ul>
            </div>

            <!-- Pagination -->
            <div class="poca-pager d-flex mb-30">
              <a href="#">Previous Post <span>Episode 3 – Wardrobe For Busy People</span></a>
              <a href="#">Next Post <span>Episode 6 – Defining Your Style</span></a>
            </div>

            <!-- Comments Area -->
            <div class="comment_area mb-50 clearfix">
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
            </div>

            <!-- Leave A Reply -->
            <div class="contact-form">
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
@endsection