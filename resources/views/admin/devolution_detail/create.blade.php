@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.devolution_detail.store', [$devolution_id]) }}">
        {{csrf_field()}}
        <div class="form-group">
          <label class="form-control-label">Pilih unit yang ingin di alihkan</label>
        </div>

        @foreach ($units_user as $unit)
        <div class="i-checks">
          <input id="{{ $unit->unit->id }}" name="unit_id[{{ $unit->unit->id }}]" type="checkbox" value="{{ $unit->unit->id }}" class="checkbox-template">
          <label for="{{ $unit->unit->id }}">{{ $unit->unit->unit_identity }}</label>
        </div>
        @endforeach
        <br>

        <div class="form-group">       
          <input type="submit" value="Selesai" class="btn btn-primary">
        </div>
      </form>
      <form class="form-aksi" method="post" action="{{ route('admin.devolution.destroy', [$devolution_id]) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <input type="submit" class="btn btn-primary" onclick="return conf('Yakin ingin membatalkan?')" value="Batal">
      </form>
    </div>
  </div>
</div>
@endsection
