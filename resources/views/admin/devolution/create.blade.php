@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.devolution.store') }}">
        {{csrf_field()}}
        <div class="form-group">
          <label class="form-control-label">Nomor Transaksi</label>&nbsp;:&nbsp;
          {{ $trans_num }}
        </div>
        <div class="form-group{{ $errors->has('from_user') ? ' has-danger' : '' }}">
          <label class="form-control-label">Dari Penyewa</label>
          <select name="from_user" class="form-control select2">
            <option selected disabled>Pilih</option>
            @foreach ($tenants as $tenant)
            <option {{ old('from_user') == $tenant->id ? 'selected' : '' }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('from_user'))
          <small class="form-text">{{ $errors->first('from_user') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('to_user') ? ' has-danger' : '' }}">
          <label class="form-control-label">Ke Penyewa</label>
          <select name="to_user" class="form-control select2">
            <option selected disabled>Pilih</option>
            @foreach ($tenants as $tenant)
            <option {{ old('to_user') == $tenant->id ? 'selected' : '' }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('to_user'))
          <small class="form-text">{{ $errors->first('to_user') }}</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Selanjutnya" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
