<h3 class="text-right">Contact</h3>
<form id="form-data" action="{{ route('back.config_contact', 1) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
  {!! csrf_field() !!}
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-email">Email</label>
    <div class="col-md-8">
      <input type="email" id="example-email" name="email" class="form-control" placeholder="email@domain.com" required value="{{ $config->email }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-phone">Phone</label>
    <div class="col-md-8">
      <input type="text" id="example-phone" name="phone" class="form-control" placeholder="+6200000001234" required value="{{ $config->phone }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-address">Address</label>
    <div class="col-md-8">
      <input type="text" id="example-address" name="address" class="form-control" placeholder="Address" required value="{{ $config->address }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-sub_address">Sub Address</label>
    <div class="col-md-8">
        <input type="text" id="example-sub_address" name="sub_address" class="form-control" placeholder="Sub Address" required value="{{ $config->sub_address }}">
    </div>
  </div>
  <div class="form-group form-actions">
    <div class="col-md-12 text-right">
      <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
    </div>
  </div>
</form>