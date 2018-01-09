@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.type.update', [$type->id]) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nama tipe</label>
          <input type="text" name="name" placeholder="Nama" value="{{ $type->name }}" class="form-control">
          @if ($errors->has('name'))
          <small class="form-text">{{ $errors->first('name') }}</small>
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
