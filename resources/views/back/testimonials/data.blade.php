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
          <li>Testimonials</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2>Testimonials</h2>
  </div>
  <p>
    <a href="{{ route('back.create_testimonials') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Testimonials</a>
  </p>
  <div class="table-responsive">
    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;">No.</th>
          <th class="text-center">Name</th>
          <th class="text-center">Image</th>
          <th class="text-center" style="width: 300px;">Content</th>
          <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach($testimonials as $key => $result)
        <tr>
          <td class="text-center">{{ $key+1 }}</td>
          <td class="text-center">
            <strong>{{ $result->name }}</strong><br>
            <h5 class="text-muted">{{ $result->occupation }}</h5>
          </td>
          <td>
            <a href="{{ $result->imagedir }}" data-toggle="lightbox-image">
              <img src="{{ $result->imagedir }}" class="img-responsive center-block img-testi img-circle">
            </a>
          </td>
          <td class="text-center text-info">
            {!! read_more($result->content, 250) !!}
          </td>
          <td class="text-center">
            <a href="{{ route('back.update_testimonials', $result->id) }}" data-toggle="tooltip" title="Edit Data" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick="deleteIt(this)" data-url="{{ route('back.delete_testimonials', $result->id) }}" href="javascript:void(0)" data-toggle="tooltip" title="Delete Data" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('back_assets/js/pages/uiTables.js') }}"></script>
<script>$(function(){ UiTables.init(); });</script>
@endsection