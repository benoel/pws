@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('tenant.password.update', [Auth::user()->id]) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group{{ $errors->has('new_password') ? ' has-danger' : '' }}">       
          <label class="form-control-label">Password baru</label>
          <input type="password" name="new_password" placeholder="Password baru" class="form-control">
          @if ($errors->has('new_password'))
          <small class="form-text">{{ $errors->first('new_password') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('new_confirm_password') ? ' has-danger' : '' }}">       
          <label class="form-control-label">Konfirmasi Password Baru</label>
          <input type="password" name="new_confirm_password" placeholder="Konfirmasi password baru" class="form-control">
          @if ($errors->has('new_confirm_password'))
          <small class="form-text">{{ $errors->first('new_confirm_password') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">       
          <label class="form-control-label">Password lama</label>
          <input type="password" name="old_password" placeholder="Password lama" class="form-control">
          @if ($errors->has('old_password'))
          <small class="form-text">{{ $errors->first('old_password') }}</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Rubah" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
