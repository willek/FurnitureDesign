{{--admin webimg--}}
<div class="form-group">
  <label class="col-md-2 control-label" for="example-webimg">Website Profile Image</label>
  <div class="col-md-8">
    <a href="{{ $config->websiteimgdir }}" data-toggle="lightbox-image">
      <img src="{{ $config->websiteimgdir }}" class="img-responsive img-rounded img-edit">
    </a>
    <input type="file" id="example-webimg" class="file-input-custom" name="webimg" accept="image/*">
  </div>
</div>
{{--admin webimg--}}

{{--admin header--}}
<div class="form-group">
  <label class="col-md-2 control-label" for="example-productset">Product Set Page</label>
  <div class="col-md-8">
    <a href="{{ $header->productset }}" data-toggle="lightbox-image">
      <img src="{{ $header->productset }}" class="img-responsive img-rounded img-edit">
    </a>
    <input type="file" id="example-productset" class="file-input-custom" name="productset" accept="image/*">
  </div>
</div>
{{--admin header--}}