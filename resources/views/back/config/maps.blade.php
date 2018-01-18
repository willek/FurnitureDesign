<h3 class="text-right">Maps</h3>
<form id="form-data" action="{{ route('back.config_maps', 1) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
  {!! csrf_field() !!}
  <div class="form-group">
    <label class="col-md-2 control-label" for="example-address">Latitude & Longtitude</label>
    <div class="col-md-8">
      <input type="text" id="example-address" name="gmaps" class="form-control" placeholder="Address" required value="{{ $config->gmaps }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <small class="text-muted">
      *Follow the steps below to get the latitude and longitude coordinates for a location on Google Maps.<br>
      1. Open Google Maps in a browser.<br>
      2. Right-click the exact location on the map for which you require coordinates.<br>
      3. Select <b>What's here</b> from the context menu that appears. The map displays a card at the bottom of the screen. Find the latitude and longitude coordinates in the last row of the card.
    </small>
    </div>
  </div>
  <div class="form-group form-actions">
    <div class="col-md-12 text-right">
      <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
    </div>
  </div>
</form>