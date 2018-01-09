@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.tenant.store') }}">
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
        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
          <label class="form-control-label">Alamat Identitas</label>
          <textarea class="form-control" name="address" placeholder="Alamat Domisili" rows="3">{{ old('address') }}</textarea>
          @if ($errors->has('address'))
          <small class="form-text">{{ $errors->first('address') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('identity_card_number') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nomor Identitas</label>
          <input type="text" class="form-control" placeholder="Nomor KTP/Pasport/dll" name="identity_card_number" value="{{ old('identity_card_number') }}">
          @if ($errors->has('identity_card_number'))
          <small class="form-text">{{ $errors->first('identity_card_number') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('npwp') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nomor NPWP</label>
          <input type="text" class="form-control" name="npwp" value="{{ old('npwp') }}">
          @if ($errors->has('npwp'))
          <small class="form-text">{{ $errors->first('npwp') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nomor Telp/Hp</label>
          <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
          @if ($errors->has('phone_number'))
          <small class="form-text">{{ $errors->first('phone_number') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nama Perusahaan</label>
          <input type="text" class="form-control" placeholder="Lewati jika perorangan" name="company" value="{{ old('company') }}">
          @if ($errors->has('company'))
          <small class="form-text">{{ $errors->first('company') }}</small>
          @endif
        </div>
        <div style="width: 100%;" class="form-group{{ $errors->has('business_field_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Jenis Usaha</label>
          <select name="business_field_id" class="form-control select2">
            <option selected disabled>Pilih jenis usaha</option>
            @foreach ($business_fields as $bf)
            <option {{ old('business_field_id') == $bf->id ? 'selected' : '' }} value="{{ $bf->id }}">{{ $bf->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('business_field_id'))
          <small class="form-text">{{ $errors->first('business_field_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">       
          <label class="form-control-label">Set password</label>
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
