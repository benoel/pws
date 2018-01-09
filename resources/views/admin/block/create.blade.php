@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.block.store') }}">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nama Blok</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control">
          @if ($errors->has('name'))
          <small class="form-text">{{ $errors->first('name') }}</small>
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
