<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $config->website_name }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <link rel="shortcut icon" href="{{ $config->favicondir }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/themes.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/swal/sweetalert2.min.css') }}">
  </head>
  <body>
    <div id="page-wrapper" class="page-loading">
      <div class="preloader">
        <div class="inner">
          <div class="preloader-spinner themed-background hidden-lt-ie10"></div>
          <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
        </div>
      </div>
      <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
        <div id="sidebar">
          <div id="sidebar-brand" class="themed-background">
            <div class="sidebar-title">
              <i class="gi gi-settings"></i>
              <span class="sidebar-nav-mini-hide">Admin<strong>Panel</strong></span>
            </div>
          </div>
          <div id="sidebar-scroll">
            <div class="sidebar-content">
              <ul class="sidebar-nav">
                <li><a href="{{ route('back.dashboard') }}" class="{{ ($sidebar_menu == 'dashboard') ? 'active' : ''  }}"><i class="hi hi-home sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a></li>
                <li class="sidebar-separator"><i class="fa fa-ellipsis-h"></i></li>
                <li><a href="{{ route('back.slider') }}" class="{{ ($sidebar_menu == 'slider') ? 'active' : ''  }}"><i class="gi gi-picture sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Slider</span></a></li>
                <li><a href="{{ route('back.gallery') }}" class="{{ ($sidebar_menu == 'gallery') ? 'active' : ''  }}"><i class="fa fa-file-image-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gallery</span></a></li>
                <li class="{{ ($sidebar_menu == 'blog' || $sidebar_menu == 'category_blog') ? 'active' : ''}}">
                  <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-newspaper-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Blog</span></a>
                  <ul>
                    <li><a href="{{ route('back.blog') }}" class="{{ ($sidebar_menu == 'blog') ? 'active' : ''  }}"><span class="sidebar-nav-mini-hide">Blog</span></a></li>
                    <li><a href="{{ route('back.category_blog') }}" class="{{ ($sidebar_menu == 'category_blog') ? 'active' : ''  }}"><span class="sidebar-nav-mini-hide">Category</span></a></li>
                  </ul>
                </li>
                <li><a href="{{ route('back.social_media') }}" class="{{ ($sidebar_menu == 'social_media') ? 'active' : ''  }}"><i class="fa fa-globe sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Social Media</span></a></li>
                <li class="sidebar-separator"><i class="fa fa-ellipsis-h"></i></li>
                <li class="{{ ($sidebar_menu == 'product' || $sidebar_menu == 'product_set' || $sidebar_menu == 'category_product') ? 'active' : ''}}">
                  <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-shopping-bag sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Product</span></a>
                  <ul>
                    <li><a href="{{ route('back.product') }}" class="{{ ($sidebar_menu == 'product') ? 'active' : '' }}"><span class="sidebar-nav-mini-hide">Product</span></a></li>
{{--                    <li><a href=""  class="{{ ($sidebar_menu == 'product_set') ? 'active' : '' }}">Product (Set)</a></li>--}}
                    <li><a href="{{ route('back.category_product') }}"  class="{{ ($sidebar_menu == 'category_product') ? 'active' : '' }}"><span class="sidebar-nav-mini-hide">Category</span></a></li>
                  </ul>
                </li>
                <li><a href="{{ route('back.partnership') }}" class="{{ ($sidebar_menu == 'partnership') ? 'active' : ''  }}"><i class="gi gi-group sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Partnership</span></a></li>
                <li><a href="{{ route('back.testimonials') }}" class="{{ ($sidebar_menu == 'testimonials') ? 'active' : ''  }}"><i class="fa fa-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Testimonials</span></a></li>
                <li><a href="{{ route('back.inbox') }}" class="{{ ($sidebar_menu == 'inbox') ? 'active' : ''  }}"><i class="fa fa-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Inbox {!! ($new_message > 0) ? "<span class=\"badge\">$new_message</span>" : "" !!}</span></a></li>
                <li class="sidebar-separator"><i class="fa fa-ellipsis-h"></i></li>
                <li><a href="{{ route('back.config') }}" class="{{ ($sidebar_menu == 'config') ? 'active' : ''  }}"><i class="gi gi-settings sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Configuration</span></a></li>
                <li><a href="{{ route('back.header') }}" class="{{ ($sidebar_menu == 'header') ? 'active' : ''  }}"><i class="fa fa-ellipsis-h sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Header Image</span></a></li>
                <li><a href="{{ route('back.logout') }}"><i class="fa fa-sign-out sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Log Out</span></a></li>
              </ul>
            </div>
          </div>
          <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
            <div class="text-center">
              <small><a href="{{ route('front.index') }}" target="_blank">{{ $config->website_name }}</a></small>
            </div>
          </div>
        </div>
        <div id="main-container">
          <header class="navbar navbar-inverse navbar-fixed-top">
            <ul class="nav navbar-nav-custom">
              <li>
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                  <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                  <i class="fa fa-bars fa-fw animation-fadeInLeft" id="sidebar-toggle-full"></i>
                </a>
              </li>
              <li class="hidden-xs animation-fadeInQuick">
                <a href="{{ route('front.index') }}" target="_blank"><strong>{{ $config->website_name }}</strong></a>
              </li>
            </ul>
          </header>
          <div id="page-content">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('back_assets/js/vendor/modernizr-3.3.1.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('back_assets/js/app.js') }}"></script>
    <script src="{{ asset('back_assets/js/custom/helper.js') }}"></script>
    <script src="{{ asset('back_assets/swal/sweetalert2.min.js') }}"></script>
    @yield('script')
  </body>
</html>
