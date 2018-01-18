@extends('front.template')

@section('title', 'Search Product Result')

@section('content')
<section class="section white-section section-padding-top-bottom">
  <div class="container padding-top50 padding-bottom50">
    <div class="sixteen columns">
      <div class="blockquotes-box-1 grey-section">
        Found {{ count($product) }} Product
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