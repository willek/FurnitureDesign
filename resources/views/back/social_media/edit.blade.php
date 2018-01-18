@extends('back.template')

@section('content')
<div class="content-header">
  <div class="row">
    <div class="col-sm-6">
      <div class="header-section">
        <h1>Social Media</h1>
      </div>
    </div>
    <div class="col-sm-6 hidden-xs">
      <div class="header-section">
        <ul class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('back.social_media') }}">Social Media</a></li>
          <li>Edit Social Media</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block">
  <div class="block-title">
    <h2>Data Social Media</h2>
  </div>
  <form id="form-data" action="{{ route('back.updated_social_media', $social_media->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
    {!! csrf_field() !!}
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-name">Name</label>
      <div class="col-md-8">
        <input type="text" id="example-name" name="name" class="form-control" placeholder="Name" required value="{{ $social_media->name }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-name">URL</label>
      <div class="col-md-8">
        <input type="text" id="example-url" name="url" class="form-control" placeholder="https://url.com/profile" required value="{{ $social_media->url }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label" for="example-select2">Type</label>
      <div class="col-md-8">
        <select id="example-select2" name="type" class="select-select2" style="width: 100%;" data-placeholder="Select Type" required>
          <option></option>
          <option value="&amp;#xf09a; - fa fa-facebook" {{ ($social_media->type == '&#xf09a; - fa fa-facebook') ? 'selected' : '' }}>Facebook</option>
          <option value="&amp;#xf0d5; - fa fa-google-plus" {{ ($social_media->type == '&#xf0d5; - fa fa-google-plus') ? 'selected' : ''}}>Google+</option>
          <option value="&amp;#xf16d; - fa fa-instagram" {{ ($social_media->type == '&#xf16d; - fa fa-instagram') ? 'selected' : ''}}>Instagram</option>
          <option value="&amp;#xf0d2; - fa fa-pinterest" {{ ($social_media->type == '&#xf0d2; - fa fa-pinterest-p') ? 'selected' : '' }}>Pinterest</option>
          <option value="&amp;#xf17e; - fa fa-skype" {{ ($social_media->type == '&#xf17e; - fa fa-skype') ? 'selected' : '' }}>Skype</option>
          <option value="&amp;#xf1be; - fa fa-soundcloud" {{ ($social_media->type == '&#xf1be; - fa fa-soundcloud') ? 'selected' : '' }}>SoundCloud</option>
          <option value="&amp;#xf1bc; - fa fa-spotify" {{ ($social_media->type == '&#xf1bc; - fa fa-spotify') ? 'selected' : ''}}>Spotify</option>
          <option value="&amp;#xf1b6; - fa fa-steam" {{ ($social_media->type == '&#xf1b6; - fa fa-steam') ? 'selected' : '' }}>Steam</option>
          <option value="&amp;#xf1d8; - fa fa-send" {{ ($social_media->type == '&#xf1d8; - fa fa-send') ? 'selected' : ''}}>Telegram</option>
          <option value="&amp;#xf173; - fa fa-tumblr" {{ ($social_media->type == '&#xf173; - fa fa-tumblr') ? 'selected' : '' }}>Tumblr</option>
          <option value="&amp;#xf1e8; - fa fa-twitch" {{ ($social_media->type == '&#xf1e8; - fa fa-twitch') ? 'selected' : '' }}>Twitch</option>
          <option value="&amp;#xf099; - fa fa-twitter" {{ ($social_media->type == '&#xf099; - fa fa-twitter') ? 'selected' : '' }}>Twitter</option>
          <option value="&amp;#xf16a; - fa fa-youtube-play" {{ ($social_media->type == '&#xf16a; - fa fa-youtube-play') ? 'selected' : '' }}>Youtube</option>
          <option value="&amp;#xf0c1; - fa fa-link" {{ ($social_media->type == '&#xf0c1; - fa fa-link') ? 'selected' : '' }}>Others</option>
        </select>
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
        <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
        <a href="{{ route('back.social_media') }}" type="button" class="btn btn-effect-ripple btn-info">Cancel</a>
      </div>
    </div>
  </form>
</div>
@endsection

@section('script')
@if(Session::get('status'))
<script type="text/javascript">
    var session = '{{ Session::get('status') }}';
    swal({
        title: 	(( session == 'failed') ? "Error!" : 'Success!'),
        text: 	(( session == 'failed') ? "Invalid data!" : "Data has been saved!"),
        type: 	(( session == 'failed') ? "error" : "success"),
    }). then(function() {
        if (session == 'success'){
            redirect('{{route('back.social_media')}}');
        }
    });
</script>
@endif
@endsection