@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h1>Inbox</h1>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li>Inbox</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2>Inbox</h2>
  </div>
  <div class="table-responsive">
    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;">No.</th>
          <th class="text-center">Name</th>
          <th class="text-center" style="width: 500px;">Content</th>
          <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach($inbox as $key => $result)
        <tr class="{{ ($result->status == 'new') ? 'success' : ''}}">
          <td class="text-center">{{ $key+1 }}</td>
          <td class="text-center">
            <strong>{{ ucwords($result->name) }}</strong><br>
            <span class="text-muted">{{ custom_date($result->created_at) }}</span>
          </td>
          <td class="text-muted">
            {!! read_more($result->message, 150) !!}
          </td>
          <td class="text-center">
            <a href="{{ route('back.view_inbox', $result->id) }}" data-toggle="tooltip" title="View Message" class="btn btn-effect-ripple btn-xs btn-info"><i class="fa fa-eye"></i></a>
            <a onclick="deleteIt(this)" data-url="{{ route('back.delete_inbox', $result->id) }}" href="javascript:void(0)" data-toggle="tooltip" title="Delete Message" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
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