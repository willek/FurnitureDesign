@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h1>Testimonials</h1>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('back.testimonials') }}">Testimonials</a></li>
          <li>Add Testimonials</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block">
  <div class="block-title">
    <h2>Data Testimonials</h2>
  </div>
  <form id="form-data" action="{{ route('back.created_testimonials') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
    {!! csrf_field() !!}
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-name">Name</label>
      <div class="col-md-8">
        <input type="text" id="example-name" name="name" class="form-control" placeholder="Name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-occupation">Occupation</label>
      <div class="col-md-8">
        <input type="text" id="example-occupation" name="occupation" class="form-control" placeholder="Occupation" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-file">Image</label>
      <div class="col-md-8">
        <input type="file" id="example-file" class="file-input-custom" name="image" accept="image/*" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-textarea-content">Content</label>
      <div class="col-md-8">
        <textarea id="example-textarea-content" name="content" rows="7" class="form-control" style="resize: none;"></textarea>
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
        <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
        <a href="{{ route('back.testimonials') }}" type="button" class="btn btn-effect-ripple btn-info">Cancel</a>
      </div>
    </div>
  </form>
</div>
@endsection

@section('script')
<script src="{{ asset('back_assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
@if(Session::get('status'))
<script type="text/javascript">
    var session = '{{ Session::get('status') }}';
    swal({
        title: 	(( session == 'failed') ? "Error!" : 'Success!'),
        text: 	(( session == 'failed') ? "Invalid data!" : "Data has been saved!"),
        type: 	(( session == 'failed') ? "error" : "success"),
    }). then(function() {
        if (session == 'success'){
            redirect('{{route('back.testimonials')}}');
        }
    });
</script>
@endif
@endsection