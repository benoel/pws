@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.service_charge.update', [$sc->id]) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group{{ $errors->has('cost_service') ? ' has-danger' : '' }}">
          <label class="form-control-label">Biaya Servis</label>
          <input type="text" name="cost_service" value="{{ $sc->cost }}" class="form-control">
          @if ($errors->has('cost_service'))
          <small class="form-text">{{ $errors->first('cost_service') }}</small>
          @else
          <small class="form-text" style="color: #999;">Tuliskan tanpa "," atau "."</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Edit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
