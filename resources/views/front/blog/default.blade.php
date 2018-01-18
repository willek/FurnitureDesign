@extends('front.blog.layout')

@section('blog')
<div class="four columns">
  <div class="post-sidebar">
    <form action="{{ route('front.search_blog') }}" method="get" autocomplete="off">
      <input name="q" type="text" placeholder="type to search and hit enter"/>
    </form>
    <div class="separator-sidebar"></div>
    <h6>Categories</h6>
    <ul class="link-recents">
      @foreach($category_blog as $result)
      <li><a href="{{ route('front.blog_category', $result->id) }}">{{ $result->name }} ({{ count($result->blog) }})</a></li>
      @endforeach
    </ul>
    <div class="separator-sidebar"></div>
    <h6>Recent Posts</h6>
    <ul class="link-recents">
      @foreach($recent_posts as $result)
      <li><a href="{{ route('front.detail_blog', $result->id) }}">{{ $result->name }}</a></li>
      @endforeach
    </ul>
  </div>
</div>

<div class="twelve columns">
  @foreach($blog as $result)
  <div class="blog-big-wrapper grey-section">
    <div class="big-post-date"><span>&#xf073;</span>{{ custom_date($result->created_at) }}</div>
    <img src="{{ $result->imagedir }}" alt="{{ $result->name }}">
    <a href="{{ route('front.detail_blog', $result->id) }}" class="animsition-link"><h5>{{ $result->name }}</h5></a>
    {{ read_more($result->content, 250) }}
    <div class="blog-links-edit">
      <div class="blog-left-link-edit"><a href="{{ route('front.blog_category', $result->category->id) }}"><p><span class="fa fa-fw">&#xf02c;</span>{{ $result->category->name }}</p></a></div>
      <div class="blog-right-link-edit"><a href="{{ route('front.detail_blog', $result->id) }}"><p>read more <span class="fa fa-fw">&#xf178;</span></p></a></div>
    </div>
  </div>
  @endforeach
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/custom-blog-large-left.js') }}"></script>
@endsection