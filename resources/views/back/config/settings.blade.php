<h3 class="text-right">Settings</h3>
<form id="form-data" action="{{ route('back.config_settings', 1) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
  {!! csrf_field() !!}
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-name">Website Name</label>
    <div class="col-md-8">
      <input type="text" id="example-name" name="website_name" class="form-control" placeholder="Name" required value="{{ $config->website_name }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Website Description</label>
    <div class="col-md-8">
      <textarea id="textarea-ckeditor" name="website_description" class="ckeditor">{!! $config->website_description !!}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Maintenance</label>
    <div class="col-md-8">
      <label class="switch switch-primary"><input name="maintenance" type="checkbox" {{ ($config->maintenance == 'enable') ? 'checked' : '' }}><span></span></label>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Maintenance Message</label>
    <div class="col-md-8">
      <textarea id="textarea-ckeditor" name="maintenance_message" class="ckeditor">{!! $config->maintenance_message !!}</textarea>
    </div>
  </div>
  <div class="form-group form-actions">
    <div class="col-md-12 text-right">
      <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
    </div>
  </div>
</form>