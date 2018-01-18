<h3 class="text-right">Admin</h3>
<form id="form-data" action="{{ route('back.config_admin', 1) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
  {!! csrf_field() !!}
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-auth_name">Name</label>
    <div class="col-md-8">
      <input type="text" id="example-auth_name" name="name" class="form-control" placeholder="Name" required value="{{ $auth->name }}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-recent_password">Recent Password</label>
    <div class="col-md-8">
      <input type="password" id="example-recent_password" name="recent_password" class="form-control" placeholder="min:8" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-new_password">New Password</label>
    <div class="col-md-8">
      <input type="password" id="example-new_password" name="new_password" class="form-control" placeholder="min:8" required>
      <small class="text-muted">*Enter the same password (recent password) if you don't want to change</small>
    </div>
  </div>
  <div class="form-group form-actions">
    <div class="col-md-12 text-right">
      <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
    </div>
  </div>
</form>