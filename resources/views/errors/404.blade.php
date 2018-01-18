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
  </head>
  <body>
    <img src="{{ $config->notfounddir }}" class="full-bg full-bg-bottom animation-pulseSlow">
    <div id="error-container">
      <div class="row text-center">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="text-light animation-fadeInQuick">
              <strong>404<br>Not Found</strong>
          </h1>
          <h2 class="text-light animation-fadeInQuickInv"><em>Feeling Lost?<br>Sorry, but this page can't be found..</em></h2>
        </div>
        <div class="col-md-4 col-md-offset-4">
          <a href="{{ route('front.index') }}" class="btn btn-effect-ripple btn-default">
            <img src="{{ $config->favicondir }}" style="width: 32px; height: 32px;">
            {{ $config->website_name }}
          </a>
        </div>
      </div>
    </div>
    <script src="{{ asset('back_assets/js/vendor/modernizr-3.3.1.min.js') }}"></script>
  </body>
</html>