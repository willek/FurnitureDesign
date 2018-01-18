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
    <img src="{{ $config->logindir }}" alt="Full Background" class="full-bg animation-pulseSlow">
    <div id="login-container">
      <h1 class="h2 text-light text-center push-top-bottom animation-pullDown">
        <img src="{{ $config->favicondir }}" style="vertical-align: top;" class="img-favicon"> <strong>{{ $config->website_name }}</strong>
      </h1>
      <div class="block animation-fadeInQuick">
        <form id="form-login" action="{{ route('auth.submit') }}" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="login-name" class="col-xs-12">Name</label>
            <div class="col-xs-12">
              <input type="text" id="login-name" name="name" class="form-control" placeholder="Name : admin" required>
            </div>
          </div>
          <div class="form-group">
            <label for="login-password" class="col-xs-12">Password</label>
            <div class="col-xs-12">
              <input type="password" id="login-password" name="password" class="form-control" placeholder="******** : adminfurniture" required>
            </div>
          </div>
          <div class="form-group form-actions">
            <div class="col-xs-push-8 col-xs-4 text-right">
              <button type="submit" class="btn btn-effect-ripple btn-sm btn-success">Log In</button>
            </div>
          </div>
          {!! csrf_field() !!}
        </form>
      </div>
      <footer class="text-muted text-center animation-pullUp">
        <small class="text-light"> 2017 &copy <a href="{{ route('front.index') }}" target="_blank">{{ $config->website_name }}</a></small>
      </footer>
    </div>
    <script src="{{ asset('back_assets/js/vendor/modernizr-3.3.1.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('back_assets/js/app.js') }}"></script>
    <script src="{{ asset('back_assets/js/pages/readyLogin.js') }}"></script>
    <script>$(function(){ ReadyLogin.init(); });</script>
    <script src="{{ asset('back_assets/swal/sweetalert2.min.js') }}"></script>
    @if(Session::get('message'))
    <script>
        swal({
            title: 'Error!',
            type: 'error',
            text: '{{ Session::get('message') }}'
        });
    </script>
    @endif
  </body>
</html>
