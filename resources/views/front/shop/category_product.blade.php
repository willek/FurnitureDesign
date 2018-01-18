@extends('front.template')

@section('title', 'Category Product')

@section('content')
<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
  <div class="parallax-about" style="background: url('{{$category->imagedir }}') no-repeat fixed; background-size: cover;"></div>
  <div class="container">
    <div class="eight columns">
      <h1>{{ $category->name }}</h1>
    </div>
    <div class="eight columns">
      <div id="owl-top-page-slider" class="owl-carousel owl-theme">
        <div class="item"><div class="page-top-icon">&#xf118;</div><div class="page-top-text">Good Choice</div></div>
        <div class="item"><div class="page-top-icon">&#xf0d6;</div><div class="page-top-text">Easy</div></div>
      </div>
    </div>
  </div>
</section>

<section class="section white-section section-padding-top-bottom">
  <div class="container padding-bottom50">
    <div class="sixteen columns">
      <div class="blockquotes-box-1 grey-section">
        {!! $category->description !!}
      </div>
    </div>
  </div>
  <div class="shop-wrapper">
    <div id="shop-grid-masonry">
      @foreach($product as $result)
      <div class="shop-box-3">
        <div class="shop-box grey-section">
          <img src="{{ $result->imagedir }}" alt="{{ $result->name }}">
            <div class="mask-shop-white"></div>
            <div class="shop-price">Rp. {{ number_format($result->price) }}</div>
            <a class="animsition-link" href="{{ route('front.view_product', $result->id) }}"><h5>{{ $result->name }}</h5></a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/custom-shop-all.js') }}"></script>
@endsection