@extends('front.template')

@section('title', 'Home')

@section('content')
<section class="home">
  <div class="slider-container">
    <div class="tp-banner-container">
      <div class="tp-banner" >
        <ul>
          @foreach($slider as $result)
          <li data-transition="fade" data-slotamount="1" data-masterspeed="500"  data-saveperformance="on"  data-title="Intro Slide">
            <img src="{{ $result->imagedir }}"  alt="{{ $result->name }}" data-lazyload="{{ $result->imagedir }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section white-section section-padding-top section-padding-bottom" id="scroll-link">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title">
        <h2 class="title1">WELCOME TO</h2><h2 class="title2">{{ $config->website_name }}</h2>
        <div class="subtitle">{!! $config->website_description !!}</div>
      </div>
    </div>
    <div class="sixteen columns remove-bottom" data-scroll-reveal="enter bottom move 400px over 1s after 0.1s">
      <div class="full-image">
        <img src="{{ $img }}">
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title">
        <h3 class="title1">Our Latest Product</h3>
      </div>
    </div>
  </div>
  <div class="portfolio-wrap-1">
    @foreach($latest_product as $result)
    <a href="{{ route('front.view_product', $result->id) }}" class="animsition-link">
      <div class="portfolio-box-1">
        <div class="mask-1"></div>
        <img src="{{ $result->imagedir }}" alt="{{ $result->name }}">
        <h6>{{ $result->name }}<br>Rp. {{ number_format($result->price) }}</h6>
      </div>
    </a>
    @endforeach
  </div>
</section>

<section class="section white-section section-padding-top-bottom">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title">
        <h3 class="title1">WHAT THEY SAY ABOUT US</h3>
      </div>
    </div>
    <div class="sixteen columns">
      <div id="owl-blockquotes" class="owl-carousel owl-theme">
        @foreach($testimonials as $result)
        <div class="item blockquotes-1">
        <div class="arrow-right"></div>
          <img src="{{ $result->imagedir }}" alt="{{ $result->name }}">
          <h6>{{ $result->name }}</h6>
          {{ $result->content }}
          <div class="company-name">{{ $result->occupation }}</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/custom-index.js') }}"></script>
@endsection