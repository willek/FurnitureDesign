@extends('front.template')

@section('title', 'Gallery')

@section('content')
<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
  <div class="parallax-blog-2" style="background: url('{{ $img }}') no-repeat fixed; background-size: cover;"></div>
  <div class="container">
    <div class="eight columns">
      <h1>Gallery</h1>
    </div>
    <div class="eight columns">
      <div id="owl-top-page-slider" class="owl-carousel owl-theme">
        <div class="item"><div class="page-top-icon">&#xf03e;</div><div class="page-top-text">Beautiful</div></div>
        <div class="item"><div class="page-top-icon">&#xf18c;</div><div class="page-top-text">Friendly</div></div>
        <div class="item"><div class="page-top-icon">&#xf043;</div><div class="page-top-text">Colorful</div></div>
      </div>
    </div>
  </div>
</section>

<section class="section white-section section-padding-top-bottom">
  <div class="container">
    <div class="projects-wrapper">
      <div id="projects-grid-masonry">
        @foreach($gallery as $result)
        <div class="portfolio-box-3 qvart-box-3">
          <a class="group1" href="{{ $result->imagedir }}">
            <img src="{{ $result->imagedir }}" alt="{{ $result->name }}">
            <h6>{{ $result->name }}</h6>
            <div class="mask-2"></div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/jquery.colorbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/masonry.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/custom-masonry-4col.js') }}"></script>
@endsection
