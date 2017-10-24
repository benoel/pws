@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      @if (Session::has('alert-danger'))
      <h1>sdlkfjalskdfj</h1>
      @endif
      <form method="post" action="{{ route('admin.update_password', [Auth::user()->id]) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
          <label class="form-control-label">Password Baru</label>
          <input type="password" name="password" placeholder="Password baru" class="form-control">
          @if ($errors->has('password'))
          <small class="form-text">{{ $errors->first('password') }}</small>
          @endif
        </div>
        <div class="form-group">       
          <label class="form-control-label">Konfirmasi Password Baru</label>
          <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" class="form-control">
        </div>

        <div class="form-group{{ Session::has('alert-danger') ? ' has-danger' : '' }}">       
          <label class="form-control-label">Password</label>
          <input type="password" name="old_password" placeholder="Password lama" class="form-control">
        </div>

        <div class="form-group">       
          <input type="submit" value="Rubah" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
