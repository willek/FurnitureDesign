<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title') - {{ $config->website_name }}</title>
    <meta name="description" content="{{ $config->website_description }}">
    <meta name="author" content="{{ $config->website_name }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/skeleton.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/settings.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/retina.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/colorbox.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/animsition.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front_assets/css/edit.css') }}"/>
    <link rel="shortcut icon" href="{{ $config->favicondir }}">
  </head>
  <body>
    <div class="animsition">
      <div class="header-top">
        <header class="cd-main-header">
          <a class="cd-logo animsition-link" href="{{ route('front.index') }}"><img src="{{ $config->icondir }}" alt="{{ $config->website_name }}"></a>
          <ul class="cd-header-buttons">
            <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
            <li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
          </ul>
        </header>
        <nav class="cd-nav">
          <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
            <li><a href="{{ route('front.index') }}" class="animsition-link">Home</a></li>
            <li class="has-children">
              <a href="javaScript:void(0)">Catalog</a>
              <ul class="cd-nav-gallery is-hidden">
                <li class="go-back"><a href="javaScript:void(0)">Menu</a></li>
                <li></li>
                @foreach($category_product as $result)
                <li><a class="cd-nav-item animsition-link" href="{{ route('front.category_product', $result->id) }}"><img src="{{ $result->imagedir }}" alt="{{ $result->name }}"><h3>{{ $result->name }}</h3></a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="{{ route('front.blog') }}" class="animsition-link">Blog</a></li>
            <li><a href="{{ route('front.gallery') }}" class="animsition-link">Gallery</a></li>
            <li><a href="{{ route('front.contact') }}" class="animsition-link">Contact</a></li>
            {{--<li><a href="" class="animsition-link"><i class="fa fa-fw">&#xf07a;</i>cart</a></li>--}}
          </ul>
        </nav>
        <div id="cd-search" class="cd-search">
          <form action="{{ route('front.search_product') }}" method="get" autocomplete="off">
            <input name="search" type="text" placeholder="Search Product ...">
          </form>
        </div>
      </div>
      <main class="cd-main-content">
        @yield('content')
        <section class="section grey-section section-padding-top-bottom">
          <div class="container">
            <div class="sixteen columns">
              <ul id="owl-logos" class="owl-carousel owl-theme">
                @foreach($partnership as $result)
                <li><img src="{{ $result->imagedir }}" alt="{{ $result->name }}" /></li>
                @endforeach
              </ul>
            </div>
          </div>
        </section>
        <section class="section footer-1 section-padding-top-bottom">
          <div class="container">
            <div class="one-third column center-text" data-scroll-reveal="enter left move 200px over 0.5s after 0.8s">
              <a href="{{ route('front.index') }}" class="animsition-link"><div class="logo-footer" style="background:url('{{ $config->icondir }}') no-repeat center center; background-size:100% auto;"></div></a>
            </div>
            <div class="one-third column center-text" data-scroll-reveal="enter center move 200px over 0.5s after 0.3s">
              <h6><i class="icon-footer">&#xf041;</i>{{ $config->address }}</h6>
              <p>{{ $config->sub_address }}<br/>{{ $config->phone }}</p>
            </div>
            <div class="one-third column center-text" data-scroll-reveal="enter right move 200px over 0.5s after 0.8s">
              <div class="social-bottom">
                <ul class="list-social">
                  @foreach($social_media as $result)
                  <li class="icon-soc"><a href="{{ $result->url }}" target="_blank">{{ str_before($result->type, ' -')}}</a></li>
                  @endforeach
                </ul>
              </div>
              <p><i class="icon-footer">&#xf0e0;</i><a href="mailto:{{$config->email}}">{{ $config->email }}</a></p>
            </div>
          </div>
        </section>
        <section class="section footer-bottom">
          <div class="container">
            <div class="sixteen columns">
              <p>&copy; ALL RIGHTS RESERVED. MADE BY {{ $config->website_name }} <3</p>
            </div>
          </div>
        </section>
      </main>
      <div class="scroll-to-top">&#xf106;</div>
    </div>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery-2.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/modernizr.custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.mobile.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/retina-1.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.hidescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/smoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/scrollReveal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.animsition.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/isotope.js') }}"></script>
    <script type="text/javascript">
        $('.header-top').hidescroll();

        (function($) { "use strict";
            $(document).ready(function() {
                var owl = $("#owl-logos");
                owl.owlCarousel({
                    itemsCustom : [
                        [0, 2],
                        [450, 2],
                        [600, 2],
                        [700, 3],
                        [1000, 4],
                        [1200, 4],
                        [1400, 4],
                        [1600, 4]
                    ],
                    navigation : false,
                    pagination: false,
                    autoPlay: 2000
                });
            });
        })(jQuery);

        (function($) { "use strict";
            $(document).ready(function() {
                $(".animsition").animsition({
                    inClass               :   'zoom-in-sm',
                    outClass              :   'zoom-out-sm',
                    inDuration            :    1500,
                    outDuration           :    800,
                    linkElement           :   '.animsition-link',
                    loading               :    true,
                    loadingParentElement  :   'body',
                    loadingClass          :   'animsition-loading',
                    unSupportCss          : [
                        'animation-duration',
                        '-webkit-animation-duration',
                        '-o-animation-duration'
                    ],
                    overlay               :   false,
                    overlayClass          :   'animsition-overlay-slide',
                    overlayParentElement  :   'body'
                });
            });
        })(jQuery);

        (function($) { "use strict";
            window.scrollReveal = new scrollReveal();
        })(jQuery);

        (function($) { "use strict";
            jQuery(document).ready(function() {
                var offset = 450;
                var duration = 500;
                jQuery(window).scroll(function() {
                    if (jQuery(this).scrollTop() > offset) {
                        jQuery('.scroll-to-top').fadeIn(duration);
                    } else {
                        jQuery('.scroll-to-top').fadeOut(duration);
                    }
                });

                jQuery('.scroll-to-top').click(function(event) {
                    event.preventDefault();
                    jQuery('html, body').animate({scrollTop: 0}, duration);
                    return false;
                })
            });
        })(jQuery);
    </script>
    @yield('script')
  </body>
</html>