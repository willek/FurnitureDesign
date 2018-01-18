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
          <li><a href="{{ route('back.inbox') }}">Inbox</a></li>
          <li>View Message</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block">
  <div class="block-title">
    <h2>Data Inbox</h2>
  </div>
  <form class="form-horizontal form-bordered">
    <div class="form-group">
      <label class="col-md-2 control-label">Name: </label>
      <span class="col-md-8 control-label text-left">{{ $inbox->name }}</span>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label">Email: </label>
      <span class="col-md-8 control-label text-left">{{ $inbox->email }}</span>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label">Message: </label>
      <span class="col-md-8 control-label text-left">{{ $inbox->message }}</span>
    </div>
    <div class="form-group form-actions">
      <div class="col-md-12 text-right">
        <a href="{{ route('back.inbox') }}" type="button" class="btn btn-effect-ripple btn-info">Back</a>
      </div>
    </div>
  </form>
</div>
@endsection