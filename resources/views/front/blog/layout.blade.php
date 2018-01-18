@extends('front.template')

@section('title', 'Blog')

@section('content')
<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
  <div class="parallax-blog-2" style="background: url('{{ $img }}') no-repeat fixed; background-size: cover;"></div>
  <div class="container">
    <div class="eight columns">
      <h1>blog</h1>
    </div>
    <div class="eight columns">
      <div id="owl-top-page-slider" class="owl-carousel owl-theme">
        <div class="item"><div class="page-top-icon">&#xf0a1;</div><div class="page-top-text">Innovative</div></div>
        <div class="item"><div class="page-top-icon">&#xf007;</div><div class="page-top-text">Creative</div></div>
        <div class="item"><div class="page-top-icon">&#xf086;</div><div class="page-top-text">Inspirative</div></div>
      </div>
    </div>
  </div>
  <div class="subtext-blog">
    <h4 class="center-text">@yield('subtext')</h4>
  </div>
</section>

<section class="section white-section section-padding-top-bottom">
  <div class="container">
    @yield('blog')
  </div>
</section>

@if($paging == true)
{{ $blog->links() }}
@endif
@endsection