@extends('front.blog.layout')

@section('subtext', $subtext)

@section('blog')
@if(isset($category_description))
<div class="sixteen columns">
  <div class="blockquotes-box-1 grey-section">
    {!! $category_description !!}
  </div>
</div>
@endif
<div class="sixteen columns">
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
<script type="text/javascript" src="{{ asset('front_assets/js/custom-blog-large-full.js') }}"></script>
@endsection