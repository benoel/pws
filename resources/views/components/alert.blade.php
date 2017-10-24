<div class="container">
  @if (Session::has('alert-success'))
  <div class="alert alert-success" style="background-color: #fff;" role="alert">
    {{ Session::get('alert-success') }}
  </div>
  @elseif(Session::has('alert-danger'))
  <div class="alert alert-danger" style="background-color: #fff;" role="alert">
    {{ Session::get('alert-danger') }}
  </div>
  @elseif(Session::has('alert-info'))
  <div class="alert alert-info" style="background-color: #fff;" role="alert">
    {{ Session::get('alert-info') }}
  </div>
  @endif
</div>