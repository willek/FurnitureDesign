@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h1>Blog</h1>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('back.blog') }}">Blog</a></li>
          <li>Edit Blog</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block">
  <div class="block-title">
    <h2>Data Blog</h2>
  </div>
  <form id="form-data" action="{{ route('back.updated_blog', $blog->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
    {!! csrf_field() !!}
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-name">Name</label>
      <div class="col-md-8">
        <input type="text" id="example-name" name="name" class="form-control" placeholder="Name" required value="{{ $blog->name }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-select2">Category</label>
      <div class="col-md-8">
        <select required id="example-select2" name="category" class="select-select2" style="width: 100%;" data-placeholder="Select Category">
          <option></option>
          @foreach($category as $result)
          <option value="{{ $result->id }}" {{ ($result->id == $blog->category['id']) ? 'selected' : '' }}>{{ $result->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-file">Image</label>
      <div class="col-md-8">
        <a href="{{ $blog->imagedir }}" data-toggle="lightbox-image">
          <img src="{{ $blog->imagedir }}" class="img-responsive img-rounded img-edit">
        </a>
        <input type="file" id="example-file" class="file-input-custom" name="image" accept="image/*">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label">Content</label>
      <div class="col-md-8">
        <textarea id="textarea-ckeditor" name="content" class="ckeditor">{!! $blog->content !!}</textarea>
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
        <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
        <a href="{{ route('back.blog') }}" type="button" class="btn btn-effect-ripple btn-info">Cancel</a>
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
            redirect('{{route('back.blog')}}');
        }
    });
</script>
@endif
@endsection