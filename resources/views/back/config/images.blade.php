<h3 class="text-right">Images</h3>
<form id="form-data" action="{{ route('back.config_images', 1) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
  {!! csrf_field() !!}
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-favicon">Favicon</label>
    <div class="col-md-8">
      <a href="{{ $config->favicondir }}" data-toggle="lightbox-image">
        <img src="{{ $config->favicondir }}" class="img-responsive img-rounded img-favicon">
      </a>
      <input type="file" id="example-favicon" class="file-input-custom" name="favicon" accept="image/*">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-icon">Icon</label>
    <div class="col-md-8">
      <a href="{{ $config->icondir }}" data-toggle="lightbox-image">
        <img src="{{ $config->icondir }}" class="img-responsive img-rounded img-edit">
      </a>
      <input type="file" id="example-icon" class="file-input-custom" name="icon" accept="image/*">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-not_found">Not Found Image</label>
    <div class="col-md-8">
      <a href="{{ $config->notfounddir }}" data-toggle="lightbox-image">
        <img src="{{ $config->notfounddir }}" class="img-responsive img-rounded img-edit">
      </a>
      <input type="file" id="example-not_found" class="file-input-custom" name="not_found" accept="image/*">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-login">Login Admin Image</label>
    <div class="col-md-8">
      <a href="{{ $config->logindir }}" data-toggle="lightbox-image">
        <img src="{{ $config->logindir }}" class="img-responsive img-rounded img-edit">
      </a>
      <input type="file" id="example-login" class="file-input-custom" name="login" accept="image/*">
    </div>
  </div>
  <div class="form-group form-actions">
    <div class="col-md-12 text-right">
      <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
    </div>
  </div>
</form>