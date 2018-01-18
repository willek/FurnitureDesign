@extends('front.template')

@section('title', 'Blog Detail')

@section('content')
<section class="section white-section section-home-padding-top">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title left">
        <h1>{{ $blog->name }}</h1>
        <div class="subtitle left big">Category: {{ $blog->category->name }}</div>
      </div>
    </div>
  </div>
</section>

<section class="section white-section section-padding-bottom">
  <div class="container">
    <div class="four columns" data-scroll-reveal="enter bottom move 200px over 1s after 0.3s">
      <div class="post-sidebar">
        <h6>Categories</h6>
        <ul class="link-recents">
          @foreach($category_blog as $result)
          <li><a href="{{ route('front.blog_category', $result->id) }}">{{ $result->name }} ({{ count($result->blog) }})</a></li>
          @endforeach
        </ul>
        <div class="separator-sidebar"></div>
        <h6>recent posts</h6>
        <ul class="link-recents">
          @foreach($recent_posts as $result)
          <li><a href="{{ route('front.detail_blog', $result->id) }}">{{ $result->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="twelve columns">
      <div class="blog-big-wrapper grey-section" data-scroll-reveal="enter bottom move 200px over 1s after 0.3s">
        <div class="big-post-date"><span>&#xf073;</span>{{ custom_date($blog->created_at) }}</div>
        <img src="{{ $blog->imagedir }}" alt="{{ $blog->name }}">
        {!! $blog->content !!}
      </div>
    </div>
  </div>
</section>

<section class="section gradient-bgcolor section-padding-top-bottom">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title">
        <h3 class="white-color">Related Posts</h3>
      </div>
    </div>
    @foreach($related_blog as $result)
    <div class="one-third column" data-scroll-reveal="enter center move 200px over 1s after 0.3s">
      <a href="{{ route('front.detail_blog', $result->id) }}" class="animsition-link">
        <div class="blog-box-1 white-section">
          <img src="{{ $result->imagedir }}"  alt="{{ $result->name }}">
          <div class="blog-date-1 title1">{{ custom_date($result->created_at) }}</div>
          <div class="blog-comm-1"><span class="title1">&#xf178;</span></div>
          <h6>{{ $result->name }}</h6>
          <p>{{ read_more($result->content, 100) }}</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/custom-image-post.js') }}"></script>
@endsection