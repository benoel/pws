@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.devolution_cost.store') }}">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('cost_devolution') ? ' has-danger' : '' }}">
          <label class="form-control-label">Biaya Peralihan</label>
          <input type="text" name="cost_devolution" value="{{ old('cost_devolution') }}" class="form-control">
          @if ($errors->has('cost_devolution'))
          <small class="form-text">{{ $errors->first('cost_devolution') }}</small>
          @else
          <small class="form-text">Tuliskan tanpa "," atau "."</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Buat" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
