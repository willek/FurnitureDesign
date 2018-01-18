@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h3>Header</h3>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li>Header</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2>Header</h2>
  </div>
  <form id="form-data" action="{{ route('back.save_header', 1) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
    {!! csrf_field() !!}
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-about">About Page</label>
      <div class="col-md-8">
        <a href="{{ $header->about }}" data-toggle="lightbox-image">
          <img src="{{ $header->about }}" class="img-responsive img-rounded img-edit">
        </a>
        <input type="file" id="example-about" class="file-input-custom" name="about" accept="image/*">
      </div>
    </div>
    {{--<div class="form-group">--}}
      {{--<label class="col-md-2 control-label" for="example-product">Product Page</label>--}}
      {{--<div class="col-md-8">--}}
        {{--<a href="{{ $header->product }}" data-toggle="lightbox-image">--}}
          {{--<img src="{{ $header->product }}" class="img-responsive img-rounded img-edit">--}}
        {{--</a>--}}
        {{--<input type="file" id="example-product" class="file-input-custom" name="product" accept="image/*">--}}
      {{--</div>--}}
    {{--</div>--}}
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-gallery">Gallery Page</label>
      <div class="col-md-8">
        <a href="{{ $header->gallery }}" data-toggle="lightbox-image">
          <img src="{{ $header->gallery }}" class="img-responsive img-rounded img-edit">
        </a>
        <input type="file" id="example-gallery" class="file-input-custom" name="gallery" accept="image/*">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-blog">Blog Page</label>
      <div class="col-md-8">
        <a href="{{ $header->blog }}" data-toggle="lightbox-image">
          <img src="{{ $header->blog }}" class="img-responsive img-rounded img-edit">
        </a>
        <input type="file" id="example-blog" class="file-input-custom" name="blog" accept="image/*">
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection

@section('script')
<script src="{{ asset('back_assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACYY2pt8Qt71aJa0i33lr9xvEJ8&libraries=places&callback=initMap" async defer></script>
@if(Session::get('status'))
<script type="text/javascript">
    var session = '{{ Session::get('status') }}';
    swal({
        title: 	(( session == 'failed') ? "Error!" : 'Success!'),
        text: 	(( session == 'failed') ? "Invalid data!" : "Data has been saved!"),
        type: 	(( session == 'failed') ? "error" : "success"),
    });
</script>
@endif
@endsection
