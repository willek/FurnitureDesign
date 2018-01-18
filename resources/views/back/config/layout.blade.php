@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h3>Configuration</h3>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li>Configuration</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <ul class="nav nav-tabs" data-toggle="tabs">
      <li class="active"><a href="#block-tabs-settings" data-toggle="tooltip" title="Settings"><i class="gi gi-settings"></i></a></li>
      <li><a href="#block-tabs-contact" data-toggle="tooltip" title="Contact"><i class="fa fa-phone"></i></a></li>
      <li><a href="#block-tabs-maps" data-toggle="tooltip" title="Maps"><i class="fa fa-map"></i></a></li>
      <li><a href="#block-tabs-images" data-toggle="tooltip" title="Images"><i class="fa fa-leaf"></i></a></li>
      <li><a href="#block-tabs-admin" data-toggle="tooltip" title="Admin"><i class="fa fa-user-secret"></i></a></li>
    </ul>
  </div>
  <div class="tab-content">
    <div class="tab-pane active" id="block-tabs-settings">
      @include('back.config.settings')
    </div>
    <div class="tab-pane" id="block-tabs-contact">
      @include('back.config.contact')
    </div>
    <div class="tab-pane" id="block-tabs-maps">
      @include('back.config.maps')
    </div>
    <div class="tab-pane" id="block-tabs-images">
      @include('back.config.images')
    </div>
    <div class="tab-pane" id="block-tabs-admin">
      @include('back.config.admin')
    </div>
  </div>
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
