@if(Session::has('alert-info'))
<div class="alert alert-info" style="background-color: #fff;" role="alert">
  {{ Session::get('alert-info') }}
</div>
@endif