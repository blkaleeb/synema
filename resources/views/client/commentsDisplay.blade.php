@foreach($comments as $comment)
<ol @if($comment->parent_id != null) class="children" @endif>
  <!-- Single Comment Area -->
  <li class="single_comment_area">
    <!-- Comment Content -->
    <div class="comment-content d-flex">
      <!-- Comment Author -->
      <div class="comment-author">
        <img src="{{ asset('img/bg-img/user-icon.png') }}" alt="author">
      </div>
      <!-- Comment Meta -->
      <div class="comment-meta">
        <a href="#" class="post-date">{{ $comment->created_at }}</a>
        <h5>{{ $comment->name }}</h5>
        <p>{{ $comment->body }}</p>
        {{-- <a href="#" class="like">Like</a>
        <a href="#" class="reply">Reply</a> --}}
      </div>
    </div>
</ol>
@endforeach

