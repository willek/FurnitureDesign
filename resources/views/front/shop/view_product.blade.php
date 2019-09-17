@extends('front.template')

@section('title', 'View Product')

@section('content')
<section class="section white-section section-home-padding-top">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title left">
        <h2>{{ $product->name }}</h2>
        <div class="subtitle left">Category: {{ $product->category->name }}</div>
      </div>
    </div>
  </div>
</section>

<section class="section white-section section-padding-bottom">
  <div class="container">
    <div class="six columns">
      <div class="shop-carousel-wrap">
        <a class="product-image" href="{{ $product->imagedir }}">
          <img style="width: 100%;" src="{{ $product->imagedir }}" alt="{{ $product->name }}">
        </a>
      </div>
    </div>
    <div class="ten columns">
      <div class="shop-item-details">
        <div class="price">Rp. {{ number_format($product->price) }}</div>
        {{--<div class="num-itm-ic">&#xf068;</div>--}}
        {{--<div class="num-itm">1</div>--}}
        {{--<div class="num-itm-ic">&#xf067;</div>--}}
        {{--<a href="#"><div class="button-shop">add to cart</div></a>--}}
      </div>
      <div class="after-button">
        {!! $product->description !!}
      </div>
    </div>
  </div>
</section>

@if($related_product->isNotEmpty())
<section class="section gradient-bgcolor section-padding-top-bottom">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title">
        <h3 class="white-color">Related Products</h3>
      </div>
    </div>
    @foreach($related_product as $result)
    <div class="one-third column">
      <div class="shop-box grey-section">
        <img class="related-product" src="{{ $result->imagedir }}" alt="{{ $result->name }}">
        <div class="mask-shop-white"></div>
        <div class="shop-price">Rp. {{ number_format($result->price) }}</div>
        <a class="animsition-link" href="{{ route('front.view_product', $result->id) }}"><h5>{{ $result->name }}</h5></a>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/jquery.colorbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/custom-shop-item.js') }}"></script>
<script type="text/javascript">
$(".product-image").colorbox({rel:'product-image', transition:"fade", maxWidth:'95%', maxHeight:'95%'});
</script>
@endsection
