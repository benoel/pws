@if(Session::has('alert-info'))
<div class="alert alert-danger" style="background-color: #fff;" role="alert">
  {{ Session::get('alert-info') }}
</div>
@endif