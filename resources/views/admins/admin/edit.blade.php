@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.update', [$admin->id]) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nama</label>
          <input type="text" name="nama" placeholder="Nama" value="{{ $admin->name }}" class="form-control">
          @if ($errors->has('nama'))
          <small class="form-text">{{ $errors->first('nama') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
          <label class="form-control-label">Email</label>
          <input type="email" name="email" placeholder="Alamat email" value="{{ $admin->email }}" class="form-control">
          @if ($errors->has('email'))
          <small class="form-text">{{ $errors->first('email') }}</small>
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
