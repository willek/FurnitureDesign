@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h1>Category Blog</h1>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li>Category Blog</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2>Category Blog</h2>
  </div>
  <p>
    <a href="{{ route('back.create_category_blog') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Category Blog</a>
  </p>
  <div class="table-responsive">
    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;">No.</th>
          <th class="text-center" style="width: 150px;">Name</th>
          <th class="text-center">Description</th>
          <th class="text-center" style="width: 75px;">Blog</th>
          <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach($category_blog as $key => $result)
        <tr>
          <td class="text-center">{{ $key+1 }}</td>
          <td class="text-center">
            <strong>{{ $result->name }}</strong><br>
            <span class="text-size-small text-muted">
              {{ custom_date($result->created_at) }}
            </span>
          </td>
          <td>
            {!! read_more($result->description, 250) !!}
          </td>
          <td class="text-center">
            <span class="label label-info"><i class="fa fa-newspaper-o"></i> {{ count($result->blog) }} Blog</span>
          </td>
          <td class="text-center">
            <a href="{{ route('back.update_category_blog', $result->id) }}" data-toggle="tooltip" title="Edit Data" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick="deleteIt(this)" data-url="{{ route('back.delete_category_blog', $result->id) }}" href="javascript:void(0)" data-toggle="tooltip" title="Delete Data" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
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