@extends('front.template')

@section('title','Contact')

@section('content')
<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
  <div class="parallax-blog-2" style="background: url('{{ $img }}') no-repeat fixed; background-size: cover;"></div>
  <div class="container">
    <div class="eight columns">
      <h1>Contact</h1>
    </div>
    <div class="eight columns">
      <div id="owl-top-page-slider" class="owl-carousel owl-theme">
        <div class="item"><div class="page-top-icon">&#xf041;</div><div class="page-top-text">{{ $config->sub_address }}</div></div>
        <div class="item"><div class="page-top-icon">&#xf095;</div><div class="page-top-text">{{ $config->phone }}</div></div>
        <div class="item"><div class="page-top-icon">&#xf0e0;</div><div class="page-top-text">{{ $config->email }}</div></div>
      </div>
    </div>
  </div>
</section>

<section class="section white-section section-padding-top-bottom">
  <div class="container">
    <div class="sixteen columns">
      <div class="section-title">
        <h3>Leave Us a Message</h3>
      </div>
    </div>
    <div class="clear"></div>
    <form name="ajax-form" id="ajax-form" action="{{ route('front.message') }}" method="post" autocomplete="off">
      <div class="eight columns">
        <label for="name">
          <span class="error" id="err-name">please enter name</span>
        </label>
        <input name="name" id="name" type="text" placeholder="Your Name: *"/>
      </div>
      <div class="eight columns">
        <label for="email">
          <span class="error" id="err-email">please enter e-mail</span>
          <span class="error" id="err-emailvld">e-mail is not a valid format</span>
        </label>
        <input name="email" id="email" type="text" placeholder="E-Mail: *"/>
      </div>
      <div class="sixteen columns">
        <label for="message">
          <span class="error" id="err-message">please enter message</span>
        </label>
        <input name="message" id="message" type="text" placeholder="Message: *"/>
      </div>
      <div class="sixteen columns">
        <div id="button-con"><button class="send_message" id="send">submit</button></div>
      </div>
      <div class="clear"></div>
      <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
      <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
      <div class="error" id="err-state"></div>
    </form>
    <div class="clear"></div>
    <div id="ajaxsuccess">Successfully sent!!</div>
  </div>
  <div class="clear"></div>
</section>

<section class="section">
  <a class="button-map close-map"><span>Locate Us on Map</span></a>
  <div id="google_map"></div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('front_assets/js/send-message.js') }}"></script>
<script type="text/javascript">
    var webname = '{{ $config->website_name }}';
    var weblat = '{{ str_before($config->gmaps, ',') }}';
    var weblng = '{{ str_after($config->gmaps, ', ') }}';
    (function ($) { "use strict";
        jQuery(document).ready(function ($) {
            var e=new google.maps.LatLng(weblat,weblng),
                o={zoom:14,center:new google.maps.LatLng(weblat,weblng), mapTypeId:google.maps.MapTypeId.ROADMAP, mapTypeControl:!1, scrollwheel:!1, draggable:!0, navigationControl:!1},
                n=new google.maps.Map(document.getElementById("google_map"),o);
            google.maps.event.addDomListener(window,"resize",function(){var e=n.getCenter();
            google.maps.event.trigger(n,"resize"),n.setCenter(e)});
            var g='<div class="map-tooltip"><h6>'+webname+'</h6></div>',a=new google.maps.InfoWindow({content:g}),
                t=new google.maps.MarkerImage("front_assets/images/map-pin.png",new google.maps.Size(40,70),
                new google.maps.Point(0,0),new google.maps.Point(20,55)),
                i=new google.maps.LatLng(weblat,weblng),
                p=new google.maps.Marker({position:i,map:n,icon:t,zIndex:3});
            google.maps.event.addListener(p,"click",function(){a.open(n,p)});
            $(".button-map").click(function(){$("#google_map").slideToggle(300,function(){google.maps.event.trigger(n,"resize"),n.setCenter(e)}),
            $(this).toggleClass("close-map show-map")});
        });
    })(jQuery);
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCmWLSHagl6oBio0276GM1VXua6R-yoQWw&sensor=true"></script>
<script type="text/javascript" src="{{ asset('front_assets/js/custom-contact.js') }}"></script>
@endsection