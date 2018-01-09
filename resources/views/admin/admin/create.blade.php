@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.store') }}">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nama</label>
          <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" class="form-control">
          @if ($errors->has('name'))
          <small class="form-text">{{ $errors->first('name') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
          <label class="form-control-label">Email</label>
          <input type="email" name="email" placeholder="Alamat email" value="{{ old('email') }}" class="form-control">
          @if ($errors->has('email'))
          <small class="form-text">{{ $errors->first('email') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">       
          <label class="form-control-label">Password</label>
          <input type="password" name="password" placeholder="Password" class="form-control">
          @if ($errors->has('password'))
          <small class="form-text">{{ $errors->first('password') }}</small>
          @endif
        </div>
        <div class="form-group">       
          <label class="form-control-label">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" placeholder="Konfirmasi password" class="form-control">
        </div>
        <div class="form-group">       
          <input type="submit" value="Buat" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
