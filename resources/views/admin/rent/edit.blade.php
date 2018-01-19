@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.rent.update', $rent->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('invoice_number') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nomor Invoice</label>&nbsp;:&nbsp;
          {{ $rent->invoice_number }}
        </div>
        <div class="form-group{{ $errors->has('unit_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nomor Unit</label>
          <select name="unit_id" class="form-control select2">
            <option selected disabled>Pilih Unit</option>
            @foreach ($units as $unit)
            <option {{ $rent->unit->id == $unit->id ? 'selected' : '' }} value="{{ $unit->id }}">{{ $unit->unit_identity }}</option>
            @endforeach
          </select>
          @if ($errors->has('unit_id'))
          <small class="form-text">{{ $errors->first('unit_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Penyewa</label>
          <select name="user_id" class="form-control select2">
            <option selected disabled>Pilih Unit</option>
            @foreach ($users as $user)
            <option {{ $rent->user->id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('user_id'))
          <small class="form-text">{{ $errors->first('user_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('rent_length') ? ' has-danger' : '' }}">
          <label class="form-control-label">Lama sewa</label>
          <input type="text" name="rent_length" value="{{ $rent->rent_length }}" class="form-control">
          @if ($errors->has('rent_length'))
          <small class="form-text">{{ $errors->first('rent_length') }}</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Ubah" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
